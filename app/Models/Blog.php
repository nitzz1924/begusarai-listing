<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title', // Add other attributes that you want to be mass-assigned here
        'description',
        'type',
        'keyword',
        'post',
        'image',
        'videourl',
    ];

    protected $table = 'blogs';


    use HasFactory;
}
