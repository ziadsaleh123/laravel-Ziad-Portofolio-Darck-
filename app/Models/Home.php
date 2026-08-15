<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'logo',
        'main_title',
        'description',
        'button_text',
        'main_image',
        'experience_years',
        'projects_count',
        'skills_count',
        'happy_clients',
    ];
}
