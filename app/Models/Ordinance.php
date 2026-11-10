<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    protected $fillable = [
        'ordinance_number',
        'title',
        'date_passed',
        'author',
        'description',
    ];

    protected $casts = [
        'date_passed' => 'date',
    ];
}
