<?php

namespace App;

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'author', 'rating', 'avatar', 'content', 'listing_id','user_id', // Add other fields as needed
    ];

    // Define relationships if needed
    // Example: public function listing()
    // {
    //     return $this->belongsTo(Listing::class);
    // }
    use HasFactory;
}