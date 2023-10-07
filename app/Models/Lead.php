<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'lead';



    protected $fillable = [
        'name',
        'number', // Make sure it's defined as a string or text type
        'message',
        'user_id',
        'status',
    ];
    
    use HasFactory;
}
