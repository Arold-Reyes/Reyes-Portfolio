<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\PortfolioMail;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function sendMail(SendMailRequest $request)
    {
        $ip = $request->ip();

        if (RateLimiter::tooManyAttempts('sendmail:' . $ip, 5)) {
            $seconds = RateLimiter::availableIn('sendmail:' . $ip);

            return response()->json([
                'status' => 'error',
                'message' => 'Too many requests. Please try again in ' . $this->humanDuration($seconds) . '.',
            ], 429);
        }

        RateLimiter::hit('sendmail:' . $ip, 3600);

        $validated = $request->validated();

        try {
            $contactMessage = ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'message' => $validated['message'],
                'ip_address' => $ip,
                'user_agent' => mb_substr((string) $request->userAgent(), 0, 500),
            ]);
        } catch (\Throwable $e) {
            Log::error('Contact message could not be stored', [
                'exception' => $e::class,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'We could not save your message. Please try again or email me directly.',
            ], 500);
        }

        try {
            Mail::to(config('portfolio.contact_email'))->send(new PortfolioMail(
                $validated['name'],
                $validated['email'],
                'Portfolio Contact Message',
                $validated['message']
            ));

            $contactMessage->forceFill(['mail_sent' => true])->save();
        } catch (\Throwable $e) {
            // The inquiry is safely stored, so the visitor does not need to resend it.
            Log::error('Contact notification mail failed', [
                'contact_message_id' => $contactMessage->id,
                'exception' => $e::class,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been received. I will get back to you soon.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent successfully.',
        ], 200);
    }

    /**
     * Format a duration in seconds into a human-readable string.
     */
    protected function humanDuration(int $seconds): string
    {
        if ($seconds < 60) {
            return $seconds . ' second' . ($seconds === 1 ? '' : 's');
        }

        $minutes = (int) floor($seconds / 60);
        if ($minutes < 60) {
            return $minutes . ' minute' . ($minutes === 1 ? '' : 's');
        }

        $hours = (int) floor($seconds / 3600);
        $remaining = $seconds % 3600;
        $remMinutes = (int) floor($remaining / 60);

        $parts = [$hours . ' hour' . ($hours === 1 ? '' : 's')];
        if ($remMinutes > 0) {
            $parts[] = $remMinutes . ' minute' . ($remMinutes === 1 ? '' : 's');
        }

        return implode(' ', $parts);
    }
}
