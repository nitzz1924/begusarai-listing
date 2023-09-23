<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyPlan extends Model
{
    protected $table = 'buy_plan';
    protected $fillable = [
        'userId',
        'businessId', // Make sure it's defined as a string or text type
        'expair_at',
        'planId',
        'status',
    ];
    
    use HasFactory;
}
