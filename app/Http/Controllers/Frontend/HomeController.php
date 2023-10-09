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
use Illuminate\Support\Facades\Hash;
use App\Models\BusinessList;
use App\Models\Master;
use App\Models\Testimonial;
use App\Models\Lead;

use App\Models\Bookmark;
use App\Models\Career;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Package;
use App\Models\BuyPlan;
use App\Models\Popup_ads;

use Carbon\Carbon;
use Razorpay\Api\Api;
use DB;
use Log;
use View;

class HomeController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function loginForm(Request $request)
    // {
    //     $request->validate([
    //         'mobileNumber' => 'required|numeric|digits:10',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('mobileNumber', 'password');

    //     if (Auth::guard('user')->attempt($credentials)) {
    //         // Authentication passed
    //         return redirect()->intended('/'); // Redirect to the dashboard or any other page after login
    //     }

    //     // If authentication fails, you can optionally add a message here
    //     return back()->withErrors(['password' => 'Invalid credentials']);
    // }

    public function loginForm(Request $request)
    {
        $request->validate([
            'mobileNumber' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);

        $credentials = $request->only('mobileNumber', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            // Authentication passed
            return response()->json(['success' => true, 'redirect' => '/']);
        }

        // If authentication fails, return an error message
        return response()->json(['success' => false, 'message' => ' Oops!  Try again with the right info']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function signup(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'mobileNumberotp' => 'required|digits:10',

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
            $user->mobileNumber = $request->input('mobileNumberotp');
            $user->verificationCode = $request->input('verificationCode');
            $user->save();

            // Your processing logic here

            // Clear the stored OTP from the session
            $request->session()->forget('generatedOTP');

            // Return a success response=.
            //   return view('frontend.setPassword', compact('user'));
            return response()->json(['success' => true, 'redirect' => route('setPassword', compact('user'))]);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                // Handle duplicate entry error (user already exists)
                return response()->json(['success' => false, 'errors' => ['This mobile number is already registered.']]);
            } else {
                // Handle other exceptions
                return response()->json(['success' => false, 'errors' => [$e->getMessage()]]);
            }
        }
    }

    public function index()
    {
        $IndexPageVideo = Popup_ads::orderBy('created_at', 'asc')
            ->where('type', '=', 'Home Ads')
            ->get();

        //  dd($popupHome);

        // Get the authenticated user
        $user = auth()->user();
        $businessesCount = BusinessList::count();
        if ($user) {
            $businesses = BusinessList::leftJoin('bookmarks', function ($join) use ($user) {
                $join->on('businesslist.id', '=', 'bookmarks.business_id')->where('bookmarks.user_id', '=', $user->id);
            })
                ->select('businesslist.*', 'bookmarks.id AS bookmark_status')
                ->orderBy('businesslist.home_featured', 'asc')
                ->take(4)
                ->get();
        } else {
            $businesses = BusinessList::orderBy('home_featured', 'asc')
                ->take(4)
                ->get();
        }
        $Result = [];

        foreach ($businesses as $value) {
            $reviews = DB::table('reviews')
                ->select('reviews.*', 'users_login.image')
                ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
                ->orderBy('reviews.created_at', 'desc')
                ->where('listing_id', $value->id)
                ->get();

            $totalRating = 0;
            $totalReviews = count($reviews);

            foreach ($reviews as $review) {
                $totalRating += $review->rating;
            }

            if ($totalReviews > 0) {
                $averageRating = $totalRating / $totalReviews;
                $averageRating = number_format($averageRating, 1); // Display average rating with 1 decimal place
            } else {
                $averageRating = 0; // No reviews available
            }

            // Merge the average rating into the business data
            $value->rating = $averageRating;
            $value->count = count($reviews);
            $Result[] = $value;
        }

        // dd($businesses);
        // Retrieve businesses with bookmark status for the user

        $blog = Blog::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        $TestimonialData = Testimonial::orderBy('created_at', 'asc')
            ->where('status', '=', '1')
            ->get();

        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        $categoryCount;
        foreach ($submaster as $list) {
            $count = BusinessList::where('category', '=', $list->title)
                ->where('status', '=', '1')
                ->count();
            $categoryCount[$list->title] = $count;
        }
        $Mastercity = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'City')
            ->get();
        $cityCount;
        foreach ($Mastercity as $list) {
            $count = BusinessList::where('city', '=', $list->title)
                ->where('status', '=', '1')
                ->count();
            $cityCount[$list->title] = $count;
        }
        $popup = Popup_ads::orderBy('created_at', 'asc')
            ->where('type', '=', 'Popup Ads')
            ->first();

        // Update expair plans --------------------------------------------------------------------------------------------------------------------------------
        $currentDate = now();
        $expairPlanData = BuyPlan::whereDate('expair_at', '=', $currentDate->toDateString())->get();
        foreach ($expairPlanData as $expairPlanItem) {
            $plan = Package::orderBy('created_at', 'asc')
                ->where('id', '=', $expairPlanItem['planId'])
                ->first();
            $resource = BusinessList::find($expairPlanItem['businessId']);
            if (!$resource) {
            } else {
                if ($plan->type == 'BUSINESS LISTING') {
                    $resource->status = '0';
                    $resource->planStatus = '0';
                } elseif ($plan->type == 'FEATURED LISTING') {
                    $resource->featured_ranking = 11;
                } elseif ($plan->type == 'Ranking') {
                    if ($plan->featuredType == 'city_listing') {
                        $resource->city_ranking = 11;
                    }
                    if ($plan->featuredType == 'home_featured') {
                        $resource->home_featured = 11;
                    }
                    if ($plan->featuredType == 'category_listing') {
                        $resource->category_ranking = 11;
                    }
                    if ($plan->featuredType == 'search_results') {
                        $resource->search_results = 11;
                    }
                }
                $resource->save();
            }
        }
        // dd($IndexPageVideo);
        return View::make('frontend.index', compact('submaster', 'businesses', 'Mastercity', 'TestimonialData', 'blog', 'Result', 'popup', 'businessesCount', 'categoryCount', 'cityCount', 'IndexPageVideo'));
    }

    // public function toggleBookmark(Request $request, $businessId)
    // {
    //     $user = auth()->user(); // Get the authenticated user
    //     $bookmark = Bookmark::where('user_id', $user->id)
    //         ->where('business_id', $businessId)
    //         ->first();

    //     if ($bookmark) {
    //         // If the bookmark exists, remove it
    //         $bookmark->delete();
    //         $message = 'Bookmark removed.';
    //     } else {
    //         // If the bookmark doesn't exist, create it
    //         Bookmark::create([
    //             'user_id' => $user->id,
    //             'business_id' => $businessId,
    //         ]);
    //         $message = 'Bookmark added.';
    //     }

    //     return response()->json(['message' => $message]);
    // }

    public function toggleBookmark(Request $request, $businessId)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $user = auth()->user(); // Get the authenticated user

            // Check if the business with the specified ID exists
            $business = BusinessList::find($businessId);

            if ($business) {
                $bookmark = Bookmark::where('user_id', $user->id)
                    ->where('business_id', $businessId)
                    ->first(); // Use first() to get a single bookmark or null

                if ($bookmark) {
                    // If the bookmark exists, remove it
                    $bookmark->delete();
                    $message = 'Bookmark removed.';
                } else {
                    // If the bookmark doesn't exist, create it
                    Bookmark::create([
                        'user_id' => $user->id,
                        'business_id' => $businessId,
                    ]);
                    $message = 'Bookmark added.';
                }

                return response()->json(['message' => $message]);
            } else {
                return response()->json(['message' => 'Business not found.'], 404);
            }
        } else {
            return response()->json(['message' => 'User not authenticated.'], 401);
        }
    }

    public function aboutUs()
    {
        return view('frontend.aboutUs');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function savecontact(Request $request)
    {
        try {
            // Validate the form input
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'cnumber' => 'required',
                'message' => 'required',
            ]);

            // Create a new instance of the Contact model and set its properties
            $contact = new Contact();
            $contact->first_name = $request->input('first_name');
            $contact->last_name = $request->input('last_name');
            $contact->email = $request->input('email');
            $contact->cnumber = $request->input('cnumber');
            $contact->message = $request->input('message');
            $contact->save();

            // Redirect back with a success message
            return back()->with('success', 'Message submitted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the process
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function addPlace()
    {
        $types = ['category', 'Placetype', 'Highlight', 'City', 'bookingType'];
        $data = [];

        foreach ($types as $type) {
            $data[$type] = Master::orderBy('created_at', 'desc')
                ->where('type', $type)
                ->get();
        }

        return view('frontend.addPlace', $data);
    }

    public function editPlace($id)
    {
        $types = ['category', 'Placetype', 'Highlight', 'City', 'bookingType'];
        $data = [];

        foreach ($types as $type) {
            $data[$type] = Master::orderBy('created_at', 'desc')
                ->where('type', $type)
                ->get();
        }

        $business = BusinessList::findOrFail($id);
        // dd($business);
        $business->placeType = explode(',', $business->placeType);
        $business->highlight = explode(',', $business->highlight);

        return view('frontend.editPlace', compact('data', 'business'));
    }
    public function updatePlace(Request $request, $id)
    {
        // Validation rules (same as savePlace)
        $rules = [
            'category' => 'required',
            'placeType' => 'required',
            'description' => 'required',
            'price' => 'nullable',
            'duration' => 'required',
            'highlight' => 'required',
            'city' => 'required',
            'placeAddress' => 'required',
            'ownerName' => 'required',
            'email' => 'required',
            'phoneNumber1' => 'required',
            'phoneNumber2' => 'required',
            'whatsappNo' => 'nullable',
            'websiteUrl' => 'required|url', // Changed to validate as a URL
            'additionalFields' => 'nullable', // Changed to validate as a URL
            'facebook' => 'nullable', // Changed to validate as a URL
            'instagram' => 'nullable', // Changed to validate as a URL
            'twitter' => 'nullable',
            'bookingType' => 'required',
            'bookingurl' => 'required|url', // Changed to validate as a URL
            'businessName' => 'required',
            'youtube' => 'nullable', // Changed to validate as a URL
            'video' => 'nullable',
            'documentImage' => 'required|mimes:pdf', // Validate PDF
            'dType' => 'nullable', // dType field
            'dNumber' => 'nullable', // CIN field
        ];

        foreach (['coverImage', 'logo'] as $fileField) {
            if ($request->hasFile($fileField)) {
                // Dynamically add validation rules for the file fields if they are present in the request.
                $rules[$fileField] = 'required|image|mimes:jpg,jpeg,png,svg,webp';
            }
        }
        $galleryImages = $request->file('galleryImage');
        if (!empty($galleryImages)) {
            foreach ($galleryImages as $key => $file) {
                $rules["galleryImage.{$key}"] = 'nullable|image|mimes:jpg,jpeg,png,svg,webp';
            }
        }

        $this->validate($request, $rules);
        $this->validate($request, $rules);

        // Find the existing business by ID
        $business = BusinessList::findOrFail($id);
        try {
            // Update business properties
            $business->userId = Auth::id();
            $business->category = $request->input('category');
            $business->placeType = implode(',', $request->input('placeType'));
            $business->description = $request->input('description');
            $business->price = $request->input('price');
            $business->duration = $request->input('duration');
            $business->highlight = implode(',', $request->input('highlight'));
            $business->city = $request->input('city');
            $business->placeAddress = $request->input('placeAddress');
            $business->ownerName = $request->input('ownerName');
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
            $business->video = $request->input('video');
            $business->dType = $request->input('dType'); // Update dType field
            $business->dNumber = $request->input('dNumber'); // Update CIN field

            // Handle file uploads (same as savePlace)
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'pdf'];
            $destinationPath = public_path('uploads');

            foreach (['coverImage', 'documentImage', 'logo'] as $fileField) {
                if ($request->hasFile($fileField)) {
                    $file = $request->file($fileField);
                    $extension = strtolower($file->getClientOriginalExtension());

                    if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                        $fileName = time() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $business->$fileField = $fileName;
                    } else {
                        // Handle invalid files for coverImage, documentImage, and logo
                    }
                }
            }
            if (!empty($galleryImages)) {
                $filePaths = [];

                foreach ($galleryImages as $file) {
                    $extension = strtolower($file->getClientOriginalExtension());

                    if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $filePaths[] = $fileName;
                    } else {
                        // Handle invalid files for galleryImage
                    }
                }

                // Store the file paths in the database as a JSON array
                $business->galleryImage = json_encode($filePaths);
            }
            // Save the updated business to the database
            $business->save();

            // Redirect back on success
            return redirect()
                ->route('ownerListing')
                ->with('success', 'Business updated successfully');
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('ownerListing')
                ->withErrors($e->validator->errors())
                ->withInput();
        } catch (\Exception $e) {
            // Handle other errors, log them, or display an error message
            return redirect()
                ->route('ownerListing')
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // public function delete($id)
    // {
    //     try {

    //         $business = BusinessList::findOrFail($id);

    //         $business->delete();

    //         return redirect()
    //             ->route('ownerListing')
    //             ->with('success', 'Business deleted successfully');
    //     } catch (\Exception $e) {

    //         return redirect()
    //             ->route('ownerListing')
    //             ->with('error', 'Error: ' . $e->getMessage());
    //     }
    // }

    public function delete($id)
    {
        try {
            // Find the record by ID
            $business = BusinessList::find($id);

            if (!$business) {
                return back()->with('error', 'Record not found.');
            }

            // Get the image file name associated with the record
            $coverImageFileName = $business->coverImage; // Assuming coverImage is the image field
            $galleryImages = json_decode($business->galleryImage, true); // Decode the JSON array of gallery images
            $documentImageFileName = $business->documentImage; // Assuming documentImage is the PDF field

            // Delete the record from the database
            $business->delete();

            // Delete the associated image files from storage
            if ($coverImageFileName) {
                $coverImagePath = public_path('uploads') . '/' . $coverImageFileName;
                if (file_exists($coverImagePath)) {
                    unlink($coverImagePath);
                }
            }

            if (!empty($galleryImages)) {
                foreach ($galleryImages as $galleryImage) {
                    $galleryImagePath = public_path('uploads') . '/' . $galleryImage;
                    if (file_exists($galleryImagePath)) {
                        unlink($galleryImagePath);
                    }
                }
            }

            // Delete the associated PDF file from storage
            if ($documentImageFileName) {
                $documentImagePath = public_path('uploads') . '/' . $documentImageFileName;
                if (file_exists($documentImagePath)) {
                    unlink($documentImagePath);
                }
            }

            return back()->with('success', 'Record deleted successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during deletion
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function savePlace(Request $request)
    {
        //  dd($request->all());
        //  dd($request->input('cin'));
        $rules = [
            'category' => 'required',
            'placeType' => 'required',
            'description' => 'required',
            'price' => 'nullable',
            'duration' => 'required',
            'highlight' => 'required',
            'city' => 'required',
            'placeAddress' => 'required',
            'ownerName' => 'required',
            'email' => 'required',
            'phoneNumber1' => 'required',
            'phoneNumber2' => 'required',
            'whatsappNo' => 'nullable',
            'websiteUrl' => 'required|url', // Changed to validate as a URL
            'additionalFields' => 'nullable', // Changed to validate as a URL
            'facebook' => 'nullable', // Changed to validate as a URL
            'instagram' => 'nullable', // Changed to validate as a URL
            'twitter' => 'nullable',
            'bookingType' => 'required',
            'bookingurl' => 'required|url', // Changed to validate as a URL
            'businessName' => 'required',
            'youtube' => 'nullable', // Changed to validate as a URL
            'video' => 'nullable',
            'documentImage' => 'required|mimes:pdf', // Validate PDF
            'dType' => 'nullable|string|max:255', // Adjust the validation rules as needed
            'dNumber' => 'nullable|string|max:255',
        ];

        foreach (['coverImage', 'logo'] as $fileField) {
            if ($request->hasFile($fileField)) {
                // Dynamically add validation rules for the file fields if they are present in the request.
                $rules[$fileField] = 'required|image|mimes:jpg,jpeg,png,svg,webp';
            }
        }
        $galleryImages = $request->file('galleryImage');
        if (!empty($galleryImages)) {
            foreach ($galleryImages as $key => $file) {
                $rules["galleryImage.{$key}"] = 'nullable|image|mimes:jpg,jpeg,png,svg,webp';
            }
        }

        $this->validate($request, $rules);
        $this->validate($request, $rules);
        $editId = $request->input('editId');
        $business = $editId ? BusinessList::findOrFail($editId) : new BusinessList();

        try {
            $business->userId = Auth::id();
            $business->category = $request->input('category');
            $business->placeType = implode(',', $request->input('placeType'));
            $business->description = $request->input('description');
            $business->price = $request->input('price');
            $business->duration = $request->input('duration');
            $business->highlight = implode(',', $request->input('highlight'));
            $business->city = $request->input('city');
            $business->placeAddress = $request->input('placeAddress');
            $business->ownerName = $request->input('ownerName');
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
            $business->video = $request->input('video');
            $business->dType = $request->input('dType');
            $business->dNumber = $request->input('dNumber');

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'pdf'];
            $destinationPath = public_path('uploads');

            foreach (['coverImage', 'documentImage', 'logo'] as $fileField) {
                if ($request->hasFile($fileField)) {
                    $file = $request->file($fileField);
                    $extension = strtolower($file->getClientOriginalExtension());

                    if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                        $fileName = time() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $business->$fileField = $fileName;
                    } else {
                        // Handle invalid files for coverImage, documentImage, and logo
                    }
                }
            }
            if (!empty($galleryImages)) {
                $filePaths = [];

                foreach ($galleryImages as $file) {
                    $extension = strtolower($file->getClientOriginalExtension());

                    if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                        $fileName = time() . '_' . uniqid() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $filePaths[] = $fileName;
                    } else {
                        // Handle invalid files for galleryImage
                    }
                }

                // Store the file paths in the database as a JSON array
                $business->galleryImage = json_encode($filePaths);
            }
            // Save the model to the database
            $business->save();

            // Redirect back with a success message or do something else
            //  return back()->with('success', 'Business added successfully');

            return redirect()
                ->route('ownerListing')
                ->with('success', $editId ? 'Business updated successfully' : 'Business added successfully');
        } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->back()
                ->withErrors($e->validator->errors())
                ->withInput();
        } catch (\Exception $e) {
            // Handle other errors, log them, or display an error message
            return redirect()
                ->back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function packages($id)
    {
        $user = auth()->user();
        $userId = $user ? $user->id : 0;
        $businessId = $id;
        $ranking = Package::orderBy('created_at', 'asc')
            ->where('type', '=', 'Ranking')
            ->get();
        // $packages = Package::orderBy('created_at', 'desc')->get();
        $packages = Package::orderBy('created_at', 'desc')
            ->orWhere('type', '!=', 'Ranking')
            ->get();

        return view('frontend.packages', compact('packages', 'ranking', 'businessId', 'userId'));
    }

    public function category($id)
    {
        $user = auth()->user();
        $userId = $user ? $user->id : 0;
        $businessId = $id;
        $ranking = Package::orderBy('created_at', 'asc')
            ->where('type', '=', 'Ranking')
            ->get();
        $packages = Package::orderBy('created_at', 'desc')
            ->orWhere('type', '!=', 'Ranking')
            ->get();
        $businesses = BusinessList::where('id', $id)
            ->where('status', '=', '1')
            ->first();
        return view('frontend.category', compact('packages', 'ranking', 'businessId', 'userId', 'businesses', 'id'));
    }

    public function setPassword(Request $request)
    {
        $User_id = $request->user;

        return view('frontend.setPassword', compact('User_id'));
    }

    public function submitPassword(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'type' => 'required|in:guest,owner',
            'new_password' => 'required|min:6|confirmed', // Ensure 'new_password' and 're_new' match
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find the user record by mobileNumber
        $record = User_Login::where('id', $request->mobileNumber)->first();

        if ($record) {
            // Update the user record with the provided data
            $record->name = $request->input('first_name');
            $record->type = $request->input('type');
            $record->password = bcrypt($request->input('new_password')); // Hash the password
            $record->status = '1';
            $record->save();

            // Attempt to authenticate the user
            $credentials = [
                'mobileNumber' => $record->mobileNumber,
                'password' => $request->input('new_password'),
            ];

            if (Auth::guard('user')->attempt($credentials)) {
                // Authentication passed
                return redirect()
                    ->route('index') // Replace 'dashboard' with the actual route you want to redirect to after login
                    ->with('success', 'Welcome to our community! Your account has been successfully created.');
            }
        }

        // Handle the case where the user record was not found or authentication failed
        return redirect()
            ->back()
            ->with('error', 'Registration failed. Please try again.');
    }
    public function listingDetail(Request $request, $id, $category)
    {
        // $VisitCount = Lead:: where('business_id')  ->get();
        $VisitCount = Lead::where('business_id', $id)->count();

        $businesses = BusinessList::orderBy('created_at', 'desc')->get();

        $similer = BusinessList::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        $Result = [];

        foreach ($similer as $value) {
            $reviews = DB::table('reviews')
                ->select('reviews.*', 'users_login.image')
                ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
                ->orderBy('reviews.created_at', 'desc')
                ->where('listing_id', $value->id)
                ->get();

            $totalRating = 0;
            $totalReviews = count($reviews);

            foreach ($reviews as $review) {
                $totalRating += $review->rating;
            }

            if ($totalReviews > 0) {
                $averageRating = $totalRating / $totalReviews;
                $averageRating = number_format($averageRating, 1); // Display average rating with 1 decimal place
            } else {
                $averageRating = 0; // No reviews available
            }

            // Merge the average rating into the business data
            $value->rating = $averageRating;
            $value->count = count($reviews);
            $Result[] = $value;
        }

        $businessesDetail = BusinessList::where('id', $id)->first();
        if (Auth::check()) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check for duplicate lead record
            $existingLead = Lead::where([
                'user_id' => $user->id,
                'business_id' => $id,
                'created_at' => now()->toDateString(),
            ])->first();

            if (!$existingLead) {
                $lead = new Lead();

                $lead->user_id = $user->id;
                $lead->name = $user->name;
                $lead->number = $user->mobileNumber;
                $lead->message = 'They explored your business profile !';
                $lead->created_at = now()->toDateString();
                $lead->business_id = $id;
                if ($businessesDetail->leadStatus == 1) {
                    $lead->status = '1';
                } else {
                    $lead->status = '0';
                }
                $lead->save();
            }
        }
        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();

        $reviews = DB::table('reviews')
            ->select('reviews.*', 'users_login.image')
            ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
            ->orderBy('reviews.created_at', 'desc')
            ->where('listing_id', $id)
            ->get();

        return view('frontend.listingDetail', compact('businessesDetail', 'submaster', 'businesses', 'Result', 'reviews', 'VisitCount'));
    }
    public function blogDetails(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('frontend.blogDetails', compact('blog'));
    }
    public function ownerListing()
    {
        $user = auth()->user();
        $Mastercity = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'City')
            ->get();
        $MasterCategory = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        $businesses = BusinessList::orderBy('created_at', 'desc')
            ->where('userId', $user->id)
            ->get(); // Fetch all businesses from the database

        return view('frontend.ownerListing', compact('businesses', 'Mastercity', 'MasterCategory'));
    }

    public function ownerDashboard()
    {
        $user = auth()->user();
        $countReview = 0;
        $countReviewlist = [];
        $countLeadlist = [];
        $countLead = 0;
        $countView = 0;
        $businesses = BusinessList::where('userId', $user->id)
            ->where('status', '=', '1')
            ->get(); // Fetch all businesses from the database
        foreach ($businesses as $list) {
            $currentDate = now()->format('Y-m-d');
            $listR = [];
            $listL = [];
            $listR = DB::table('reviews')
                ->select('reviews.*', 'users_login.image')
                ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
                ->orderBy('reviews.created_at', 'desc')
                ->where('listing_id', $list->id)
                ->whereDate('reviews.created_at', $currentDate)
                ->get();
            $arrayListR = json_decode(json_encode($listR), true);
            $countReviewlist = array_merge($countReviewlist, $arrayListR);

            $listL = DB::table('lead')
                ->select('lead.*', 'users_login.image')
                ->leftJoin('users_login', 'lead.user_id', '=', 'users_login.id')
                ->orderBy('lead.created_at', 'desc')
                ->where('business_id', $list->id)
                ->where('lead.status', '1')
                ->whereDate('lead.created_at', $currentDate)
                ->get();

            $arrayListL = json_decode(json_encode($listL), true);
            $countLeadlist = array_merge($countLeadlist, $arrayListL);
            $countReview = $countReview + review::where('listing_id', '=', $list->id)->count();
            $countLead =
                $countLead +
                Lead::where('status', '=', '1')
                    ->where('business_id', '=', $list->id)
                    ->count();
            $countView = $countView + Lead::where('business_id', '=', $list->id)->count();
        }

        //dd($countReviewlist);
        $ActivePlaces = BusinessList::where('status', '=', '1')
            ->where('userId', $user->id)
            ->get();
        $VisitCount = Lead::orderBy('created_at', 'asc')
            ->where('status', '=', '1')
            ->where('business_id', $user->id)
            ->get();
        $currentDate = Carbon::now()->format('Y-m-d');
        $lead = Lead::where('status', '1')
            ->where('business_id', $user->id)
            ->whereDate('created_at', $currentDate)
            ->get();

        $VisitCount = Lead::orderBy('created_at', 'asc')
            ->where('business_id', '=', $user->id)
            ->where('status', '=', '1')
            ->get();
        $ActivePlaces = BusinessList::where('userId', $user->id)
            ->where('status', '=', '1')
            ->count();

        return view('frontend.ownerDashboard', compact('ActivePlaces', 'countLead', 'countReview', 'countLeadlist', 'businesses', 'countView', 'countReviewlist'));
    }

    public function ownerWishlist()
    {
        $user = auth()->user();
        if ($user) {
            $bookmarkedBusinessIds = Bookmark::where('user_id', $user->id)->pluck('business_id');
        }

        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        $businesses = BusinessList::whereIn('id', $bookmarkedBusinessIds)
            ->orderBy('created_at', 'desc')
            ->get();

        $Result = [];

        foreach ($businesses as $value) {
            $reviews = DB::table('reviews')
                ->select('reviews.*', 'users_login.image')
                ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
                ->orderBy('reviews.created_at', 'desc')
                ->where('listing_id', $value->id)
                ->get();

            $totalRating = 0;
            $totalReviews = count($reviews);

            foreach ($reviews as $review) {
                $totalRating += $review->rating;
            }

            if ($totalReviews > 0) {
                $averageRating = $totalRating / $totalReviews;
                $averageRating = number_format($averageRating, 1); // Display average rating with 1 decimal place
            } else {
                $averageRating = 0; // No reviews available
            }

            // Merge the average rating into the business data
            $value->rating = $averageRating;
            $value->count = count($reviews);
            $Result[] = $value;
        }

        return view('frontend.ownerWishlist', compact('Result', 'submaster'));
    }

    public function Testimonial()
    {
        return view('frontend.testimonial');
    }

    public function testimonialStore(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create and save a new testimonial record in the database

        $testimonial = new Testimonial([
            'name' => $validatedData['name'],
            'message' => $validatedData['message'],
        ]);
        $testimonial->user_id = $user->id;

        $testimonial->save();
        return redirect()
            ->route('testimonial')
            ->with('success', 'FeedBack submitted successfully!');
    }

    public function ownerLeads($id)
    {
        $lead = Lead::orderBy('created_at', 'asc')
            ->where('business_id', '=', $id)
            ->where('status', '=', '1')
            ->get();

        return view('frontend.ownerLeads', compact('lead'));
    }

    public function LeadStore(Request $request)
    {
        // Retrieve the business ID from the input data
        $businessId = $request->input('business_id');

        // Create and save a new lead record in the database
        $rules = [
            'name' => 'required',
            'number' => 'required',
            'message' => 'required',
        ];

        // Validate the input data
        $validatedData = $request->validate($rules);

        $lead = new Lead();
        $lead->name = $validatedData['name'];
        $lead->number = $validatedData['number'];
        $lead->message = $validatedData['message'];
        $lead->business_id = $businessId;

        $lead->save();

        return back()->with('success', 'Message submitted successfully!');
    }

    public function ownerShop()
    {
        return view('frontend.ownerShop');
    }

    public function searchCity()
    {
        return view('frontend.searchCity');
    }

    public function businessOwnerPage()
    {
        return view('frontend.businessOwnerPage');
    }
    public function checkoutPage($businessId, $userid, $planId)
    {
        $planidv = $planId;
        $businessData = BusinessList::where('id', $businessId)->first();
        $userData = User_login::where('id', $userid)->first();
        $planData = Package::where('id', $planId)->first();

        if ($businessData || $userData || $planData) {
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            // Create a Razorpay order
            $order = $api->order->create([
                // Pass value of 18% GST and display here for razorpay display add GST value --------
                // 'amount' => $planData->price != null ? $planData->price * 100 : 0,
                'amount' => $planData->price != null ? $planData->price * 100 + $planData->price * 100 * 0.18 : 0,

                'currency' => 'INR',
                'receipt' => 'order_rcptid_' . $businessId,
                'notes' => [
                    'plan_number' => $planId,
                    'businessId' => $businessId,
                    'userId' => $userid,
                ],
            ]);
            $orderId = $order->id;
            return view('frontend.checkoutPage', compact('businessData', 'userData', 'planData', 'planidv', 'orderId'));
        } else {
            return view('frontend.index');
        }
    }
    public function career()
    {
        return view('frontend.career');
    }
    public function careerStore(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required',
            'number' => 'required',
            'message' => 'required',
            'email' => 'required',
        ]);

        // Create and save a new testimonial record in the database

        $career = new Career([
            'name' => $validatedData['name'],
            'message' => $validatedData['message'],
            'number' => $validatedData['number'],
            'email' => $validatedData['email'],
        ]);
        $career->user_id = $user->id;

        $career->save();
        return redirect()
            ->route('career')
            ->with('success', 'FeedBack submitted successfully!');
    }

    public function allCategories()
    {
        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        $categoryCount;
        foreach ($submaster as $list) {
            $count = BusinessList::where('category', '=', $list->title)
                ->where('status', '=', '1')
                ->count();
            $categoryCount[$list->title] = $count;
        }
        return View::make('frontend.allCategories', compact('submaster', 'categoryCount'));
    }

    public function comingSoon()
    {
        return view('frontend.comingSoon');
    }
    public function privacyPolicy()
    {
        return view('frontend.privacyPolicy');
    }
    public function returnsPolicy()
    {
        return view('frontend.returnsPolicy');
    }
    public function termsAndConditions()
    {
        return view('frontend.termsAndConditions');
    }
    public function pageNotFound()
    {
        return view('frontend.pageNotFound');
    }

    public function blogs()
    {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(3);
        // $blog = Blog::orderBy('created_at', 'asc')->get();
        return view('frontend.blogs', compact('blog'));
    }

    public function searchFilter(Request $request, $category, $city, $highlight)
    {
        if ($city == 'all' && $highlight == 'all' && $category != 'all') {
            $similer = BusinessList::where('category', $category)
                ->where('status', '1')
                ->orderBy('category_ranking', 'asc')
                ->paginate(10);
        }

        if ($city != 'all' && $highlight == 'all' && $category == 'all') {
            $similer = BusinessList::where('city', $city)
                ->where('status', '1')
                ->orderBy('city_ranking', 'asc')
                ->paginate(10);
        }

        if ($city == 'all' && $highlight == 'all' && $category == 'all') {
            $similer = BusinessList::where('status', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        $submasterCategory = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();

        $submasterHighlight = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'highlight')
            ->get();

        $Result = [];

        foreach ($similer as $value) {
            $reviews = DB::table('reviews')
                ->select('reviews.*', 'users_login.image')
                ->leftJoin('users_login', 'reviews.user_id', '=', 'users_login.id')
                ->orderBy('reviews.created_at', 'desc')
                ->where('listing_id', $value->id)
                ->get();

            $totalRating = 0;
            $totalReviews = count($reviews);

            foreach ($reviews as $review) {
                $totalRating += $review->rating;
            }

            if ($totalReviews > 0) {
                $averageRating = $totalRating / $totalReviews;
                $averageRating = number_format($averageRating, 1); // Display average rating with 1 decimal place
            } else {
                $averageRating = 0; // No reviews available
            }

            // Merge the average rating into the business data
            $value->rating = $averageRating;
            $value->count = count($reviews);
            $Result[] = $value;
            // Debugging statements
            // dd($subvalue->title, $value->category, $subvalue->value);
        }

        $submasterCategory = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();

        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'city')
            ->get();

        $submasterHighlight = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'highlight')
            ->get();

        return view('frontend.searchFilter', compact('Result', 'submaster', 'submasterCategory', 'submasterHighlight', 'similer'));
    }

    // public function User()
    // {

    //    $user = User_Login::orderBy('created_at', 'asc')->get();

    //    return view('backend.admin.user.index', compact('user'));
    // }

    public function ownerProfile()
    {
        $user = User_Login::find(auth()->user()->id);

        return view('frontend.ownerProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobileNumber' => 'required|numeric|digits:10',
        ]);

        try {
            $id = $request->input('id'); // Get the user's ID from the form input
            $user = User_Login::find($id);

            if (!$user) {
                return redirect()
                    ->route('ownerProfile')
                    ->with('error', 'User not found');
            }

            $user->name = $request->input('name');
            $user->mobileNumber = $request->input('mobileNumber');

            if ($request->hasFile('image')) {
                $extension = strtolower($request->file('image')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('image')->isValid()) {
                        $destinationPath = public_path('uploads'); // upload path
                        $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                        $fileName = time() . '.' . $extension; // renameing image
                        $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                        $user->image = $fileName;
                    }
                }
            }

            // Update other fields as needed
            $user->save();

            return redirect()
                ->route('ownerProfile')
                ->with('success', 'Profile updated successfully');
        } catch (\Exception $e) {
            // Handle any exceptions here, e.g., log the error
            return redirect()
                ->route('ownerProfile')
                ->with('error', 'An error occurred while updating the profile');
        }
    }

    public function changePassword()
    {
        // Fetch the authenticated user
        $user = auth()->user();

        return view('frontend.ownerProfile', compact('user'));
    }

    public function savepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Fetch the authenticated user
        $user = auth()->user();

        if (Hash::check($request->password, $user->password)) {
            $user
                ->fill([
                    'password' => Hash::make($request->new_password),
                ])
                ->save();

            $request->session()->flash('success', 'Password changed successfully.');
            return redirect()->route('ownerProfile');
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect()->route('ownerProfile');
        }
    }

    public function showReviews()
    {
        $reviews = Review::all(); // Replace with your actual logic to fetch reviews
        return view('frontend.review', compact('reviews'));
    }
    public function showListingDetail($id, $category)
    {
        $reviews = Review::all(); // Replace with your actual logic to fetch reviews
        return view('frontend.listingDetail', compact('reviews'));
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'listing_id');
    }

    public function reviewStore(Request $request, $listing_id)
    {
        $this->validate($request, [
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string',
        ]);

        // Check if the user has already submitted a review for the same listing
        $existingReview = Review::where('user_id', Auth::id())
            ->where('listing_id', $listing_id)
            ->first();

        if ($existingReview) {
            return redirect()
                ->back()
                ->with('error', 'You have already submitted a review for this listing.');
        }

        // Create a new review record
        $review = new Review();
        $review->user_id = Auth::id();
        $review->author = auth()->user()->name; // Assuming you have user authentication
        $review->rating = $request->input('rating');
        $review->content = $request->input('content');
        $review->avatar = 'default_avatar.jpg'; // You can set a default avatar path here
        $review->listing_id = $listing_id;
        $review->save();

        // Redirect back to the listing detail page with a success message
        return redirect()
            ->back()
            ->with('success', 'Review submitted successfully.');
    }
    public function Faq()
    {
        $faqs = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'FAQ')
            ->get();

        return view('frontend.faq', compact('faqs'));
    }

    public function resetPassword(Request $request)
    {
        return view('frontend.resetPassword');
    }
    public function showResetPasswordForm(Request $request)
    {
        return view('frontend.resetPassword');
    }

    public function submitResetPasswordForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|digits:10',
            'RverificationCode' => 'required|digits:6',
            'new_password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('resetPassword')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User_Login::where('mobileNumber', $request->input('phone_number'))->first();

        if (!$user) {
            return redirect()
                ->route('resetPassword')
                ->withErrors(['phone_number' => 'This number is not registered, Please sign up first!'])
                ->withInput();
        }

        $generatedOTP = $request->input('RgeneratedOTP');
        $verificationCode = $request->input('RverificationCode');

        if ($generatedOTP != $verificationCode) {
            return redirect()
                ->route('resetPassword')
                ->withErrors(['RverificationCode' => 'The OTP is invalid.'])
                ->withInput();
        }

        $user->password = bcrypt($request->input('new_password'));
        $user->save();

        return redirect()
            ->route('resetPassword')
            ->with('success', 'Password reset successfully.');
    }
}
