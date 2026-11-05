<?php

namespace Tests\Unit;

use App\Mail\PortfolioMail;
use Tests\TestCase;

class PortfolioMailTest extends TestCase
{
    public function test_it_prefixes_the_subject_and_sets_the_visitor_as_reply_to(): void
    {
        $mail = new PortfolioMail(
            'Jane Doe',
            'jane@example.com',
            'Portfolio Contact Message',
            'Hello, I would like to talk about an opportunity.',
        );

        $envelope = $mail->envelope();

        $this->assertSame('Portfolio: Portfolio Contact Message', $envelope->subject);
        $this->assertSame('jane@example.com', $envelope->replyTo[0]->address);
        $this->assertSame('Jane Doe', $envelope->replyTo[0]->name);

        $this->assertSame('emails.contact', $mail->content()->view);
        $this->assertSame('Jane Doe', $mail->content()->with['name']);
        $this->assertSame('jane@example.com', $mail->content()->with['email']);
    }
}
