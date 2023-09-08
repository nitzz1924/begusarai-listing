<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use View;

class HomeController extends Controller
{
    public function index()
    {
        $latest_news = Blog::where('category', 'Latest News')->where('status', 1)->orderby('created_at', 'desc')->take(4)->get();
        return View::make('frontend.index', compact('latest_news'));
    }

    // News Details
    public function viewNews(Blog $blog)
    {
        return view('frontend.newsDetails', compact('blog'));
    }

    public function showLoginForm()
    {
        return view('frontend.layouts.header');
    }

    public function loginForm(Request $request)
    {
        if (Auth::attempt(['mobileNumber' => $request->mobileNumber, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('userApiToken')->accessToken;
            $success['name'] = $user->name;

            return $this->sendResponse($success, 'User logged successfully.');
        } else {
            return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
        }
    }
 

    public function someMethod()
    {
        if (Auth::check()) {
            // Retrieve the authenticated user's data
            $user = Auth::user();

            // You can now access the user's attributes
            $userName = $user->name;
            $userEmail = $user->email;
            // ...

            // Use the user data as needed
        } else {
            // User is not authenticated, handle accordingly
        }
    }
}
