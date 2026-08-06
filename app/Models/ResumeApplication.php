<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'message',
        'resume_path',
    ];

    public function getResumeUrlAttribute(): string
    {
        return asset('storage/'.$this->resume_path);
    }
}
