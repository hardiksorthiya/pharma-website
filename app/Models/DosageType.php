<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DosageType extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
