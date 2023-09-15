<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class User extends Model
// {
//     protected $table = 'users';


//     use HasFactory;
// }
namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
 use Illuminate\Database\Eloquent\Model;


class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'users';


    use HasFactory;
}