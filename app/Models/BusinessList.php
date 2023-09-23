<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessList  extends Model
{
    protected $table = 'businesslist';
protected $fillable = ['uId'];

    use HasFactory;
}
