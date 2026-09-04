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
                'message' => 'Too many requests. Please try again in ' . $seconds . ' seconds.',
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send email. Please try again later.',
            ], 500);
        }
    }
}
