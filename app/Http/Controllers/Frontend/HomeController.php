<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use View;


class HomeController extends Controller
{

   public function index()
   {
      $latest_news = Blog::where('category', 'Latest News')->where('status', 1)->orderby('created_at', 'desc')->take(4)->get();
      return View::make('frontend.index', compact('latest_news'));
   }

   public function aboutUs()
   {
      return view('frontend.aboutUs');
   }

   public function contactUs()
   {
      return view('frontend.contactUs');
   }
   
   public function addPlace()
   {
      return view('frontend.addPlace');
   }
   
   public function packages()
   {
      return view('frontend.packages');
   }
   
   public function businessDashboard()
   {
      return view('frontend.businessDashboard');
   }
   
   public function businessOwnerPage()
   {
      return view('frontend.businessOwnerPage');
   }

   public function setPassword()
   {
      return view('frontend.setPassword');
   }

}
