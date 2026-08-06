<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'subject',
        'message',
    ];

    public function getSubjectLabelAttribute(): string
    {
        return match ($this->subject) {
            'general' => 'General Inquiry',
            'products' => 'Product Information',
            'partnership' => 'Partnership & Distribution',
            'support' => 'Customer Support',
            'other' => 'Other',
            default => ucfirst($this->subject),
        };
    }
}
