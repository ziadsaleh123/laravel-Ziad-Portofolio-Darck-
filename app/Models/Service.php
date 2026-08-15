<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_title',
        'service_description',
        'service_status',
        'service_image',
    ];
}