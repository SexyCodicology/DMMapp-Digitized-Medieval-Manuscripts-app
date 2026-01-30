<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormMail;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

/**
 * Handles the display and submission of the contact form.
 */
class ContactController extends Controller
{
    private const SPAM_SUCCESS_MESSAGE = 'Thank you for your message. We will get back to you soon.';

    private const SPAM_TOO_MANY_SUBMISSIONS_MESSAGE = 'Too many submissions. Please try again later.';

    private const MAX_ATTEMPTS_PER_HOUR = 5;

    private const MIN_SUBMISSION_TIME_SECONDS = 3;

    /**
     * Show the contact form.
     */
    public function show(): View
    {
        return view('contact.form');
    }

    /**
     * Process the contact form submission.
     *
     * Validates the request using ContactFormRequest, checks for spam,
     * sends an email, and redirects with a success or error message.
     *
     * @param  ContactFormRequest  $request  The validated contact form request.
     */
    public function submit(ContactFormRequest $request): RedirectResponse // Changed to use ContactFormRequest
    {
        $spamResponse = $this->handleSpam($request);
        if ($spamResponse) {
            return $spamResponse;
        }

        // Validation is now handled by ContactFormRequest.
        // If validation fails, it will automatically redirect back with errors.
        $validated = $request->validated();

        // Send the email
        try {
            Mail::to(config('mail.to.address'))->send(new ContactFormMail($validated));
        } catch (Exception $e) {
            Log::error('Contact form email sending failed: '.$e->getMessage());

            // Optionally, redirect back with a generic error message
            return redirect()->back()->withErrors(['message' => 'Sorry, there was an issue sending your message. Please try again later.'])->withInput();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', self::SPAM_SUCCESS_MESSAGE);
    }

    /**
     * Check for spam and handle redirection if spam is detected.
     *
     * Implements honeypot, time-based, and rate-limiting spam protection.
     * Logs spam attempts and redirects accordingly.
     *
     * @param  Request  $request  The incoming request.
     * @return RedirectResponse|null A RedirectResponse if spam is detected, otherwise null.
     */
    private function handleSpam(Request $request): ?RedirectResponse // Changed parameter to base Request to access IP and non-validated inputs
    {
        // Check if the honeypot field is filled (bot detection)
        if (! empty($request->input('website'))) {
            Log::info('Honeypot triggered for IP: '.$request->ip());

            return redirect()->back()->with('success', self::SPAM_SUCCESS_MESSAGE);
        }

        // Time-based spam protection: reject if submitted too quickly
        $formTimestamp = (int) $request->input('form_timestamp', 0);
        if ($formTimestamp && (time() - $formTimestamp) < self::MIN_SUBMISSION_TIME_SECONDS) {
            Log::info('Time-based spam protection triggered for IP: '.$request->ip());

            return redirect()->back()->with('success', self::SPAM_SUCCESS_MESSAGE);
        }

        // Rate limiting
        $ip = $request->ip();
        $cacheKey = 'contact_form_attempts_'.$ip;
        $attempts = (int) Cache::get($cacheKey, 0);

        if ($attempts >= self::MAX_ATTEMPTS_PER_HOUR) {
            Log::warning('Rate limit exceeded for IP: '.$ip);

            return redirect()->back()->withErrors(['message' => self::SPAM_TOO_MANY_SUBMISSIONS_MESSAGE])->withInput();
        }

        Cache::put($cacheKey, $attempts + 1, now()->addHour());

        return null; // Not spam
    }
}

