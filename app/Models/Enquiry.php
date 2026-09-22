<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Enquiry extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'enquiries';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}