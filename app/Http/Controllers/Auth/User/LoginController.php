<?php

namespace App\Http\Controllers\Auth\User;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

class LoginController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.user.login');
    }

    public function loginUser(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->route('user.dashboard');
        }
        // if unsuccessful, then redirect back to the login with the form data
        $errors = ['email' => 'Sorry! Wrong email or password '];
        return redirect()
            ->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors($errors);
    }

    // public function loginUser(Request $request)
    // {
    //     // if successful, then redirect to their intended location
    //     //dd($request->all());
    //     // Validate the form data
    //     $this->validate($request, [
    //         'mobileNumber' => 'required',
    //         'password' => 'required',
    //     ]);
    //     try {
    //         // Attempt to log the user in using the "user" guard
    //         if (Auth::guard('user')->attempt(['mobileNumber' => $request->mobileNumber, 'password' => $request->password, 'status' => 1], $request->remember)) {
    //             $user = Auth::user();
    //             // If successful, then redirect to their intended location
    //             return redirect()->route('user.home');
    //         }
    //     } catch (Exception $e) {
    //         // Handle exceptions here
    //         // For example, you can log the exception or show an error message
    //         return redirect()
    //             ->route('loginForm')
    //             ->with('error', 'Login failed.');
    //     }
    //     // if unsuccessful, then redirect back to the login with the form data
    //     $errors = ['mobileNumber' => 'Sorry! Wrong mobileNumber or password '];
    //     return redirect()
    //         ->back()
    //         ->withInput($request->only('mobileNumber', 'remember'))
    //         ->withErrors($errors);
    // }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.auth.login');
    }
}
