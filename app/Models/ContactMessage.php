<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'ip_address',
        'user_agent',
        'mail_sent',
    ];

    protected function casts(): array
    {
        return [
            'mail_sent' => 'boolean',
        ];
    }
}
