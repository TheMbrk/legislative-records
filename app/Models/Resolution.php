<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    protected $fillable = [
        'resolution_number',
        'title',
        'date_passed',
        'author',
        'description',
    ];

    protected $casts = [
        'date_passed' => 'date',
    ];
}
