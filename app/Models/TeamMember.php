<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class TeamMember extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'role',
        'image',
        'bio',
        'email',
        'phone',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}