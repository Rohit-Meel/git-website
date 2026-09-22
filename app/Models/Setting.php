<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Setting extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'settings';

    protected $fillable = [
        'company_name',
        'admin_email',
        'phone',
        'address',
        'website_email',
        'website_phone',
        'website_location',
    ];
}