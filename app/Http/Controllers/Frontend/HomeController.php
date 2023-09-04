<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use View;


class HomeController extends Controller
{

   public function index()
   {

      return View::make('frontend.index');
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

}
