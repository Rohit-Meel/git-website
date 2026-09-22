<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Service extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'services';

    protected $fillable = [
        'name',
        'icon',
        'description',
        'tags',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'tags' => 'array',
        'sort_order' => 'integer',
    ];
}