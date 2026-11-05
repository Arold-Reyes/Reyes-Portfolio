<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\SendMailRequest;
use App\Mail\PortfolioMail;
use Illuminate\Support\Facades\Mail;

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

        try {
            $validated = $request->validated();

            Mail::to('torolreyes0615@gmail.com')->send(new PortfolioMail(
                $validated['name'],
                $validated['email'],
                'Portfolio Contact Message',
                $validated['message']
            ));

            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been sent successfully.',
            ], 200);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Contact mail failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => config('app.debug')
                    ? 'Failed to send email: ' . $e->getMessage()
                    : 'Failed to send email. Please try again later.',
            ], 500);
        }
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
