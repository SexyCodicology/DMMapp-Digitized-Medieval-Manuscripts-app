<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\ContactController;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    /**
     * It detects honeypot and redirects.
     */
    public function test_detects_honeypot_and_redirects()
    {
        $request = Request::create('/contact', 'POST', [
            'website' => 'spammy',
            'form_timestamp' => now()->timestamp,
        ]);
        $controller = new ContactController;
        $response = $controller->submit($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue(session()->has('success'));
    }

    /**
     * It detects fast submission and redirects.
     */
    public function test_detects_fast_submission_and_redirects()
    {
        $request = Request::create('/contact', 'POST', [
            'form_timestamp' => now()->timestamp,
        ]);
        $controller = new ContactController;
        $response = $controller->submit($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue(session()->has('success'));
    }

    /**
     * It limits submissions per IP.
     */
    public function test_limits_submissions_per_ip()
    {
        $ip = '127.0.0.1';
        Cache::put('contact_form_' . $ip, 5, now()->addHour());

        $request = Request::create('/contact', 'POST', [
            'form_timestamp' => now()->timestamp - 10,
        ]);
        $request->server->set('REMOTE_ADDR', $ip);

        $controller = new ContactController;
        $response = $controller->submit($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue(session()->has('errors'));
    }

    /**
     * It validates form and sends email.
     */
    public function test_validates_form_and_sends_email()
    {
        $ip = '127.0.0.1';
        $request = Request::create('/contact', 'POST', [
            'form_timestamp' => now()->timestamp - 10,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a valid message.',
        ]);
        $request->server->set('REMOTE_ADDR', $ip);

        $controller = new ContactController;
        $response = $controller->submit($request);

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertTrue(session()->has('success'));
        Mail::assertSent(ContactFormMail::class);
    }

    /**
     * It checks that the correct view is returned.
     */

    public function test_show_returns_contact_form_view()
    {
        $controller = new ContactController();
        $response = $controller->show();

        $this->assertEquals('contact.form', $response->getName());
    }

    /**
     * Set up test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
        Cache::flush();
        $this->withoutMiddleware();
    }

    /**
     * Clean up after test.
     */
    protected function tearDown(): void
    {
        Mail::fake();
        Cache::flush();
        parent::tearDown();
    }
}
