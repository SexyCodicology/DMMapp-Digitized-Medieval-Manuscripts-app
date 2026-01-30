<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_the_contact_form()
    {
        $response = $this->get(route('contact.show'));

        $response->assertStatus(200);
        $response->assertViewIs('contact.form');
    }

    /** @test */
    public function it_submits_the_contact_form_successfully()
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
            'form_timestamp' => time() - 5, // Submitted 5 seconds ago
        ];

        $response = $this->post(route('contact.submit'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Thank you for your message. We will get back to you soon.');
        Mail::assertSent(ContactFormMail::class, function ($mail) use ($data) {
            return $mail->hasTo(config('mail.to.address')) &&
                   $mail->data['name'] === $data['name'] &&
                   $mail->data['email'] === $data['email'] &&
                   $mail->data['subject'] === $data['subject'] &&
                   $mail->data['message'] === $data['message'];
        });

        // Assert rate limiting cache is updated
        $ip = $this->app['request']->ip();
        $cacheKey = 'contact_form_'.$ip;
        $this->assertEquals(1, Cache::get($cacheKey));
    }

    /** @test */
    public function it_rejects_submission_if_honeypot_field_is_filled()
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
            'website' => 'spam.com', // Honeypot field
            'form_timestamp' => time() - 5,
        ];

        $response = $this->post(route('contact.submit'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Thank you for your message. We will get back to you soon.'); // Fake success
        Mail::assertNotSent(ContactFormMail::class);
    }

    /** @test */
    public function it_rejects_submission_if_submitted_too_quickly()
    {
        Mail::fake();

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
            'form_timestamp' => time() - 1, // Submitted 1 second ago
        ];

        $response = $this->post(route('contact.submit'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Thank you for your message. We will get back to you soon.'); // Fake success
        Mail::assertNotSent(ContactFormMail::class);
    }

    /** @test */
    public function it_rejects_submission_if_rate_limit_exceeded()
    {
        Mail::fake();
        $ip = $this->app['request']->ip();
        $cacheKey = 'contact_form_'.$ip;
        Cache::put($cacheKey, 5, now()->addHour()); // Simulate 5 previous attempts

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
            'form_timestamp' => time() - 5,
        ];

        $response = $this->post(route('contact.submit'), $data);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['Too many submissions. Please try again later.']);
        Mail::assertNotSent(ContactFormMail::class);
        $this->assertEquals(5, Cache::get($cacheKey)); // Assert cache was not incremented further
    }

    /**
     * @test
     *
     * @dataProvider validationDataProvider
     */
    public function it_fails_validation_for_invalid_data($field, $value, $errorMessage)
    {
        Mail::fake();
        $data = $this->getValidData([$field => $value]);

        $response = $this->post(route('contact.submit'), $data);

        $response->assertRedirect();
        $response->assertSessionHasErrors([$field => $errorMessage]);
        Mail::assertNotSent(ContactFormMail::class);
    }

    public static function validationDataProvider(): array
    {
        return [
            'name missing' => ['name', '', 'The name field is required.'],
            'name too short' => ['name', 'A', 'The name must be at least 2 characters.'],
            'email missing' => ['email', '', 'The email field is required.'],
            'email invalid' => ['email', 'not-an-email', 'The email must be a valid email address.'],
            'subject missing' => ['subject', '', 'The subject field is required.'],
            'subject too short' => ['subject', 'Hi', 'The subject must be at least 3 characters.'],
            'message missing' => ['message', '', 'The message field is required.'],
            'message too short' => ['message', 'Too short', 'The message must be at least 10 characters.'],
        ];
    }

    private function getValidData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Valid Name',
            'email' => 'valid@example.com',
            'subject' => 'Valid Subject',
            'message' => 'This is a valid message with enough characters.',
            'form_timestamp' => time() - 10, // Submitted 10 seconds ago
            'website' => '', // Honeypot empty
        ], $overrides);
    }
}
