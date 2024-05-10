<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'city',
        'private',
        'description',
        'image',
        'items',
        'date',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    protected $dates = [
        'date',
        ];
}
