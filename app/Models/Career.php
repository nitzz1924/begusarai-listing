<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';


    protected $fillable = [
        'name', // Add 'name' here
        'message',
        'number',
        'email',

    ];
    use HasFactory;
}
