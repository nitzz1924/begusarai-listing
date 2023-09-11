<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\User_Login;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;

use App\Models\BusinessList;
use App\Models\Master;
    

use View;

class HomeController extends Controller
{
    
   use AuthenticatesUsers ;

    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    
    
    public function loginForm(Request $request)
    {
        $request->validate([
            'mobileNumber' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('mobileNumber', 'password');
    
        if (Auth::guard('user')->attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/'); // Redirect to the dashboard or any other page after login
        }
    
        // If authentication fails, you can optionally add a message here
        return back()->withErrors(['password' => 'Invalid credentials']);
    }
    

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->intended('/');
    }
   
   public function signup(Request $request)
   {
       // Validate the form data
       $validator = Validator::make($request->all(), [
           'type' => 'required|in:guest,owner',
           'mobileNumber' => 'required|digits:10',
           
           function ($attribute, $value, $fail) use ($request) {
            // Check if the mobileNumber already exists in the database
            $existingUser = User_Login::where('mobileNumber', $value)->first();

            if ($existingUser) {
                $fail('The mobile number already exists.');
            }
        },
           
           
           'verificationCode' => [
               'required',
               'digits:6',
               function ($attribute, $value, $fail) use ($request) {
                   // Retrieve the stored OTP from the session
                   $generatedOTP = $request->input('generatedOTP');

                   // Check if the submitted OTP matches the generated OTP
                   if ($value != $generatedOTP) {
                       $fail('The OTP is invalid.');
                   }
               },
           ],
           'accept' => 'accepted',
       ]);
   
       if ($validator->fails()) {
           return response()->json(['success' => false, 'errors' => $validator->errors()->all()]);
       }
   
       try {
           // Create a new Login_User instance and fill it with the validated data
           $user = new User_Login();
           $user->type = $request->input('type');
           $user->mobileNumber = $request->input('mobileNumber');
           $user->verificationCode = $request->input('verificationCode');
           $user->save();
   
           // Your processing logic here
   
           // Clear the stored OTP from the session
           $request->session()->forget('generatedOTP');
   
           // Return a success response=.
         //   return view('frontend.setPassword', compact('user'));
           return response()->json(['success' => true, 'redirect' => route('setPassword',compact('user'))]);

       } catch (\Exception $e) {
           // Handle any exceptions that occur during the database operation
           return response()->json(['success' => false, 'errors' => ['An error occurred during signup.']]);
       }
   }
   
   
   
  
   
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



    $types = ['Category', 'Placetype', 'Highlight', 'City','Booking_Type'];
    $data = [];
    
    foreach ($types as $type) {
        $data[$type] = Master::orderBy('created_at', 'desc')->where('type', $type)->get();
    }   

      return view('frontend.addPlace', $data);
   }

   
   public function savePlace(Request $request)
   {
       // Validation rules for all fields
       $rules = [
           'type' => 'required',
           'placeType' => 'required',
           'description' => 'required',
           'price' => 'required',
           'duration' => 'required',
           'highlights' => 'required|array',
           'city' => 'required',
           'placeAddress' => 'required',
           'email' => 'required|email',
           'phoneNumber1' => 'required',
           'whatsappNo' => 'required',
           'websiteUrl' => 'required|url',
           'additionalFields' => 'required|url',
           'facebook' => 'required|url',
           'instagram' => 'required|url',
           'twitter' => 'required|url',
           'bookingType' => 'required',
           'bookingurl' => 'required|url',
           'businessName' => 'required',
           'youtube' => 'required|url',
           'coverImage' => 'required|image|max:1024', // Max 1 MB
           'galleryImage' => 'required|image|max:1024', // Max 1 MB
           'documentImage' => 'required|image|max:1024', // Max 1 MB
           'logo' => 'required|image|max:1024', // Max 1 MB
           'video' => 'required|url',
       ];
   
       // Validate the request data
       $request->validate($rules);
   
       // Create a new BusinessList instance and populate it with the validated data
       $business = new BusinessList();
       $business->type = $request->input('type');
       $business->placeType = implode(',', $request->input('placeType'));
       $business->description = $request->input('description');
       $business->price = $request->input('price');
       $business->duration = $request->input('duration');
       $business->highlights = implode(',', $request->input('highlights'));
       $business->city = $request->input('city');
       $business->placeAddress = $request->input('placeAddress');
       $business->email = $request->input('email');
       $business->phoneNumber1 = $request->input('phoneNumber1');
       $business->phoneNumber2 = $request->input('phoneNumber2');
       $business->whatsappNo = $request->input('whatsappNo');
       $business->websiteUrl = $request->input('websiteUrl');
       $business->additionalFields = $request->input('additionalFields');
       $business->facebook = $request->input('facebook');
       $business->instagram = $request->input('instagram');
       $business->twitter = $request->input('twitter');
       $business->bookingType = $request->input('bookingType');
       $business->bookingurl = $request->input('bookingurl');
       $business->businessName = $request->input('businessName');
       $business->youtube = $request->input('youtube');
       
       // Handle file uploads (coverImage, galleryImage, documentImage, logo) if needed
       // Save the model to the database
       $business->save();
   
       // Redirect back with a success message or do something else
       return redirect()->back()->with('success', 'Business added successfully');
   }
   






   public function packages()
   {
      return view('frontend.packages');
   }
   
   public function setPassword(Request $request)
   {

      $User_id = $request->user;
      
      return view('frontend.setPassword',compact('User_id'));
   } 

   public function SubmitPassword(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'first_name' => 'required',
           'new_password' => 'required|min:6|confirmed', // Ensure 'new_password' and 're_new' match
       ]);
   
       if ($validator->fails()) {
           return redirect()->back()
               ->withErrors($validator)
               ->withInput();
       }
   
       $record = User_Login::where('id', $request->mobileNumber)->first();
   
       if ($record) {
           // Record found: Update it
           $record->name = $request->input('first_name');
           $record->password = bcrypt($request->input('new_password')); // Hash the password
           $record->status = '1';
           $record->save();
       } 
   
       return redirect()->route('index')->with('success', 'Thank you For Creating Account.');
   }
   

   public function ownerDashboard()
   {
      return view('frontend.ownerDashboard');
   }
   
   public function businessOwnerPage()
   {
      return view('frontend.businessOwnerPage');
   }

   public function ownerListing()
   {
      return view('frontend.ownerListing');
   }
   
   public function ownerWishlist()
   {
      return view('frontend.ownerWishlist');
   }

   public function ownerProfile()
   {
      return view('frontend.ownerProfile');
   }

   public function ownerLeads()
   {
      return view('frontend.ownerLeads');
   }

}
