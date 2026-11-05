<?php

namespace Tests\Feature;

use App\Mail\PortfolioMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_sends_an_email(): void
    {
        Mail::fake();

        $response = $this->postJson('/api/sendmail', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Hello, I would like to talk about an opportunity.',
        ]);

        $response->assertOk()->assertJson(['status' => 'success']);
        Mail::assertSent(PortfolioMail::class);
    }

    public function test_contact_form_requires_valid_input(): void
    {
        Mail::fake();

        $this->postJson('/api/sendmail', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);

        $this->postJson('/api/sendmail', [
            'name' => 'Jane Doe',
            'email' => 'not-an-email',
            'message' => 'Hi',
        ])->assertStatus(422)->assertJsonValidationErrors(['email']);

        Mail::assertNothingSent();
    }

    public function test_contact_form_rejects_overly_long_input(): void
    {
        Mail::fake();

        $this->postJson('/api/sendmail', [
            'name' => str_repeat('a', 256),
            'email' => 'jane@example.com',
            'message' => 'Hello',
        ])->assertStatus(422)->assertJsonValidationErrors(['name']);

        $this->postJson('/api/sendmail', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => str_repeat('a', 5001),
        ])->assertStatus(422)->assertJsonValidationErrors(['message']);

        Mail::assertNothingSent();
    }

    public function test_contact_form_is_rate_limited(): void
    {
        Mail::fake();

        $payload = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Hello there.',
        ];

        for ($i = 0; $i < 5; $i++) {
            $this->postJson('/api/sendmail', $payload)->assertOk();
        }

        $this->postJson('/api/sendmail', $payload)
            ->assertStatus(429)
            ->assertJson(['status' => 'error']);
    }
}
