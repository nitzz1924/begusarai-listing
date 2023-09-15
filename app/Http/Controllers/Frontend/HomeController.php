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
use App\Models\Testimonial;
use App\Models\Bookmark;
use View;

class HomeController extends Controller
{
    use AuthenticatesUsers;

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
            return response()->json(['success' => true, 'redirect' => route('setPassword', compact('user'))]);
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the database operation
            return response()->json(['success' => false, 'errors' => ['An error occurred during signup.']]);
        }
    }

    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();
        if ($user) {
            $businesses = BusinessList::leftJoin('bookmarks', function ($join) use ($user) {
                $join->on('businesslist.id', '=', 'bookmarks.business_id')->where('bookmarks.user_id', '=', $user->id);
            })
                ->select('businesslist.*', 'bookmarks.id AS bookmark_status')
                ->orderBy('businesslist.created_at', 'desc')
                ->get();
        } else {
            $businesses = BusinessList::orderBy('created_at', 'desc')->get();
        }
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
        $Mastercity = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'City')
            ->get();
        return View::make('frontend.index', compact('submaster', 'businesses', 'Mastercity', 'TestimonialData', 'blog'));
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

    public function contactUs()
    {
        return view('frontend.contactUs');
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
        // dd($id);
        // Validation rules (same as savePlace)
        $rules = [
            'category' => 'required',
            'placeType' => 'required',

            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'highlight' => 'required',

            'city' => 'required',
            'placeAddress' => 'required',
            'email' => 'required',
            'phoneNumber1' => 'required',
            'phoneNumber2' => 'nullable',
            'whatsappNo' => 'nullable',
            'websiteUrl' => 'nullable',
            'additionalFields' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable|url',
            'bookingType' => 'required',
            'bookingurl' => 'nullable',
            'businessName' => 'required',
            'youtube' => 'nullable|url',
            'video' => 'nullable',
        ];

        foreach (['coverImage', 'galleryImage', 'documentImage', 'logo'] as $fileField) {
            if ($request->hasFile($fileField)) {
                // Dynamically add validation rules for the file fields if they are present in the request.
                $rules[$fileField] = 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048';
            }
        }

        $this->validate($request, $rules);

        // Find the existing business by ID
        $business = BusinessList::findOrFail($id);

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

        // Handle file uploads (same as savePlace)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
        $destinationPath = public_path('uploads');

        foreach (['coverImage', 'galleryImage', 'documentImage', 'logo'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);

                $extension = strtolower($file->getClientOriginalExtension());

                if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                    $fileName = time() . '.' . $extension;
                    $file->move($destinationPath, $fileName);
                    $business->$fileField = $fileName;
                }
            }
        }

        // Save the updated business to the database
        $business->save();

        // Redirect back on success
        return redirect()
            ->route('ownerListing')
            ->with('success', 'Business details updated successfully.');
    }

    public function savePlace(Request $request)
    {
        $rules = [
            'category' => 'required',
            'placeType' => 'required',

            'description' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'highlight' => 'required',
            'highlight' => 'required',
            'city' => 'required',
            'placeAddress' => 'required',
            'email' => 'required',
            'phoneNumber1' => 'required',
            'phoneNumber2' => 'nullable',
            'whatsappNo' => 'nullable',
            'websiteUrl' => 'nullable ',
            'additionalFields' => 'nullable',
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'twitter' => 'nullable|url',
            'bookingType' => 'required',
            'bookingurl' => 'nullable',
            'businessName' => 'required',
            'youtube' => 'nullable|url',
            'video' => 'nullable',
        ];

        foreach (['coverImage', 'galleryImage', 'documentImage', 'logo'] as $fileField) {
            if ($request->hasFile($fileField)) {
                // Dynamically add validation rules for the file fields if they are present in the request.
                $rules[$fileField] = 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048';
            }
        }
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
            // dd($business->all());

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg', 'webp'];
            $destinationPath = public_path('uploads');

            foreach (['coverImage', 'galleryImage', 'documentImage', 'logo'] as $fileField) {
                if ($request->hasFile($fileField)) {
                    $file = $request->file($fileField);

                    $extension = strtolower($file->getClientOriginalExtension());

                    if (in_array($extension, $allowedExtensions) && $file->isValid()) {
                        $fileName = time() . '.' . $extension;
                        $file->move($destinationPath, $fileName);
                        $business->$fileField = $fileName;
                    }
                }
            }

            // Save the model to the database
            $business->save();

            // Redirect back with a success message or do something else
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

    public function packages()
    {
        return view('frontend.packages');
    }

    public function setPassword(Request $request)
    {
        $User_id = $request->user;

        return view('frontend.setPassword', compact('User_id'));
    }

    public function SubmitPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'new_password' => 'required|min:6|confirmed', // Ensure 'new_password' and 're_new' match
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
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

        return redirect()
            ->route('index')
            ->with('success', 'Thank you For Creating Account.');
    }

    public function ownerDashboard()
    {
        return view('frontend.ownerDashboard');
    }

    public function listingDetail(Request $request, $id, $category)
    {
        $businesses = BusinessList::orderBy('created_at', 'desc')->get();
        $similer = BusinessList::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->get();
        $businessesDetail = BusinessList::where('id', $id)->first();
        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        return view('frontend.listingDetail', compact('businessesDetail', 'submaster', 'businesses', 'similer'));
    }

    public function blogDetails(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();

        return view('frontend.blogDetails', compact('blog'));
    }
    public function ownerListing()
    {
        $businesses = BusinessList::all(); // Fetch all businesses from the database
        return view('frontend.ownerListing', compact('businesses'));
    }

    public function ownerWishlist()
    {
        // Get the authenticated user
        $user = auth()->user();
        if ($user) {
            $bookmarkedBusinessIds = Bookmark::where('user_id', $user->id)->pluck('business_id');
        }
        // Get the bookmarked business IDs for the user

        $submaster = Master::orderBy('created_at', 'asc')
            ->where('type', '=', 'category')
            ->get();
        // Get the businesses that match the bookmarked IDs
        $businesses = BusinessList::whereIn('id', $bookmarkedBusinessIds)
            ->orderBy('created_at', 'desc')
            ->get();

        // You can also pass the list of bookmarked business IDs to the view if needed
        return view('frontend.ownerWishlist', compact('businesses', 'submaster'));
    }

    // public function listingDetail(Request $request, $id, $category)
    // {
    //     $businesses = BusinessList::orderBy('created_at', 'desc')->get();
    //     $similer = BusinessList::where('category', $category)
    //         ->orderBy('created_at', 'desc')
    //         ->get();
    //     $businessesDetail = BusinessList::where('id', $id)->first();
    //     $submaster = Master::orderBy('created_at', 'asc')
    //         ->where('type', '=', 'category')
    //         ->get();
    //     return view('frontend.listingDetail', compact('businessesDetail', 'submaster', 'businesses', 'similer'));
    // }

    public function ownerProfile()
    {
        return view('frontend.ownerProfile');
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

    public function ownerShop()
    {
        return view('frontend.ownerShop');
    }

    public function searchFilter()
    {
        return view('frontend.searchFilter');
    }

    public function searchCity()
    {
        return view('frontend.searchCity');
    }

    public function businessOwnerPage()
    {
        return view('frontend.businessOwnerPage');
    }

    public function checkoutPage()
    {
        return view('frontend.checkoutPage');
    }
    public function career()
    {
        return view('frontend.career');
    }
    public function ownerLeads()
    {
        return view('frontend.ownerLeads');
    }

    public function blogs()
    {
        $blog = Blog::orderBy('created_at', 'desc')->paginate(3);
        // $blog = Blog::orderBy('created_at', 'asc')->get();
        return view('frontend.blogs', compact('blog'));
    }
}
