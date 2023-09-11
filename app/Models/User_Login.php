<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class User extends Model
// {
//     protected $table = 'users';


//     use HasFactory;
// }
// namespace App\Models;
// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
//  use Illuminate\Database\Eloquent\Model;


// class User_Login extends Model implements Authenticatable
// {
//     use AuthenticableTrait;

//     protected $table = 'users_login';


//     use HasFactory;
// }



// namespace App\Providers;
// namespace App\Models;

// use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\EloquentUserProvider;
// use App\Models\User_Login;

// class AuthServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any authentication / authorization services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//         $this->registerPolicies();

//         Auth::provider('users_login', function ($app, array $config) {
//             return new EloquentUserProvider($app['hash'], $config['model']);
//         });
//     }
// }


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;

class User_Login extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'users_login';

    use HasFactory;
}