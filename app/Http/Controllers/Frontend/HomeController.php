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

   // News Details
   public function viewNews(Blog $blog)
   {
      return view('frontend.newsDetails', compact('blog'));
   }


}
