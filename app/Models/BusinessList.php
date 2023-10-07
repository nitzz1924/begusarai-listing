<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessList extends Model
{
    use HasFactory;

    protected $table = 'businesslist';

    protected $fillable = [
        'category',
        'placeType',
        'description',
        'price',
        'duration',
        'highlight',
        'city',
        'placeAddress',
        'email',
        'phoneNumber1',
        'phoneNumber2',
        'whatsappNo',
        'websiteUrl',
        'additionalFields',
        'facebook',
        'instagram',
        'twitter',
        'bookingType',
        'bookingurl',
        'businessName',
        'youtube',
        'video',
        'coverImage',
        'galleryImage',
        'documentImage',
        'logo',
        'leadStatus',

    ];

    protected $casts = [
        'placeType' => 'array',
        'highlight' => 'array',
        'galleryImage' => 'array',
    ];
}
