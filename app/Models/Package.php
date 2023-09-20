<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = [
        'type',
        'title',
        'duration',
        'duration_type',
        'price',
        'discount',
        'places',
        'featured_listings',
        'featured_type',
    ];
    
    use HasFactory;
}
