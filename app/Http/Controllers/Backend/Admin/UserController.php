<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\BusinessList;
use App\Models\Role;
use App\Models\User_Login;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;
use App\Models\Master;
use View;
use DB;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user = User_Login::orderBy('created_at', 'asc')->get();


        return view('backend.admin.user.index', compact('user'));
    }

    public function getAll()
    {
        $can_edit = $can_delete = '';
        if (!auth()->user()->can('user-edit')) {
            $can_edit = "style='display:none;'";
        }
        if (!auth()->user()->can('user-delete')) {
            $can_delete = "style='display:none;'";
        }
        $users = User_Login::all();
        return Datatables::of($users)
            ->addColumn('file_path', function ($users) {
                return "<img src='" . asset($users->file_path) . "' class='img-thumbnail' width='50px'>";
            })
            ->addColumn('role', function ($user) {
                return '<label class="badge badge-secondary">' . ucfirst($user->roles->pluck('name')->implode(' , ')) . '</label>';
            })
            ->addColumn('status', function ($users) {
                return $users->status ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>';
            })
            ->addColumn('action', function ($user) use ($can_edit, $can_delete) {
                $html = '<div class="btn-group">';
                $html .= '<a data-toggle="tooltip" ' . $can_edit . '  id="' . $user->id . '" class="btn btn-xs btn-info mr-1 edit" title="Edit"><i class="fa fa-edit"></i> </a>';
                $html .= '<a data-toggle="tooltip" ' . $can_delete . ' id="' . $user->id . '" class="btn btn-xs btn-danger mr-1 delete" title="Delete"><i class="fa fa-trash"></i> </a>';
                $html .= '</div>';
                return $html;
            })
            ->rawColumns(['action', 'file_path', 'status', 'role'])
            ->addIndexColumn()
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */



    public function create(Request $request)
    {
        $user = User_Login::orderby('created_at', 'asc')->get();
        return view('backend.admin.user.create', compact('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            // Setup the validator
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'photo' => 'image|max:2024|mimes:jpeg,jpg,png'
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'type' => 'error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            } else {

                $file_path = "assets/images/users/default.png";

                if ($request->hasFile('photo')) {
                    if ($request->file('photo')->isValid()) {
                        $destinationPath = public_path('assets/images/users/');
                        $extension = $request->file('photo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension;
                        $file_path = 'assets/images/users/' . $fileName;
                        $request->file('photo')->move($destinationPath, $fileName);
                    } else {
                        return response()->json([
                            'type' => 'error',
                            'message' => "<div class='alert alert-warning'>Please! File is not valid</div>"
                        ]);
                    }
                }


                DB::beginTransaction();
                try {

                    $user = new User_Login();
                    $user->name = $request->input('name');
                    $user->email = $request->input('email');
                    $user->password = Hash::make($request->password);
                    $user->file_path = $file_path;
                    $user->save();

                    // generate role
                    $roles = $request->input('roles');
                    if (isset($roles)) {
                        $user->assignRole($roles);
                    }

                    DB::commit();
                    return response()->json(['type' => 'success', 'message' => "Successfully Created"]);

                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['type' => 'error', 'message' => $e->getMessage()]);
                }

            }
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $user = User_Login::findOrFail($id);
            $view = View::make('backend.admin.user.view', compact('user'))->render();
            return response()->json(['html' => $view]);
        } else {
            return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    // public function edit($id, Request $request)
    // {
    //    if ($request->ajax()) {
    //       $haspermision = auth()->user()->can('user-edit');
    //       if ($haspermision) {
    //          $user = User_Login::with('roles')->where('id', $id)->first();
    //          $roles = Role::all(); //Get all roles
    //          $view = View::make('backend.admin.user.edit', compact('user', 'roles'))->render();
    //          return response()->json(['html' => $view]);
    //       } else {
    //          abort(403, 'Sorry, you are not authorized to access the page');
    //       }
    //    } else {
    //       return response()->json(['status' => 'false', 'message' => "Access only ajax request"]);
    //    }
    // }

    // public function edit($id, Request $request)
    // {
    //    $user = User_Login::with('roles')->where('id', $id)->first();
    //     return view('backend.admin.user.edit', compact('user'));
    // }
    public function edit($id)
    {
        $user = User_Login::where('id', $id)->first();
        return view('backend.admin.user.edit', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            // 'verificationCode' => 'required',
            'password' => 'required',

        ]);

        // Find the user by ID
        $user = User_Login::findOrFail($id);

        // Update the user's attributes
        $user->name = $request->input('name');
        $user->mobileNumber = $request->input('number');
        //   $user->verificationCode = $request->input('verificationCode');
        $user->password = $request->input('password');
        $user->status = $request->input('status');


        if ($request->hasFile('file_path')) {
            $extension = strtolower($request->file('file_path')->getClientOriginalExtension());
            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                if ($request->file('file_path')->isValid()) {
                    $destinationPath = public_path('uploads'); // upload path
                    $extension = $request->file('file_path')->getClientOriginalExtension(); // getting file_path extension
                    $fileName = time() . '.' . $extension; // renameing file_path
                    $request->file('file_path')->move($destinationPath, $fileName); // uploading file to given path
                    $user->file_path = $fileName;
                }
            }
        }


        // Save the updated user
        $user->save();

        // Redirect to a success page or return a response
        return redirect()->route('admin.users.index')->with('success', 'User_Login updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User_Login::where(['id' => $id])->delete();
        return back();
    }

    public function createuser(Request $req)
    {
        // dd($req->all());
        try {
            $imagePath = null;
            //Images Uploading
            if ($req->hasFile('image')) {
                $image = $req->file('image');
                $imagePath = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $imagePath);
            }
            $user = new User_Login();
            $user->name = $req->name;
            $user->type = $req->type;
            $user->mobileNumber = $req->mobileNumber;
            $user->address_filing = $req->address_filing;
            $user->block_number = $req->block_number;
            $user->village_ward = $req->village_ward;
            $user->password = bcrypt($req->password);
            $user->image = $imagePath;
            $user->email = null;
            $user->verificationCode = '12345';
            $user->viewPassword = $req->password;
            $user->city_name = null;
            $user->save();
            return back()->with('success', 'User Added Successfully..!!!!');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
            //return redirect()->route('createuser')->with('error', 'Not Created Try Again...');
        }
    }

    public function userlistings($id)
    {
        $userid = $id;
        $businessdata = BusinessList::where('userId', '=', $id)->get();
        // dd($businessdata);
        return view('backend.admin.user.userlisting', compact('businessdata', 'userid'));
    }

    public function viewlistingform($id)
    {
        $userid = $id;
        $types = ['category', 'Placetype', 'Highlight', 'City', 'bookingType'];
        $data = [];

        foreach ($types as $type) {
            $data[$type] = Master::orderBy('created_at', 'desc')
                ->where('type', $type)
                ->get();
        }
        $data['userid'] = $userid;
        return view('backend.admin.listing.addlistting', $data);
    }

    public function createbusinessListing(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'businessName' => 'required',
            'ownerName' => 'required',
            'description' => 'required',
            'category' => 'required',
            'city' => 'required',
            'placeAddress' => 'required',
            'phoneNumber1' => 'required',
            'coverImage' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:2048', // Adjust the 'max' value as needed (in kilobytes) 2mb
            'documentImage' => 'required|mimes:pdf|max:2048', // Adjust the 'max' value as needed (in kilobytes) 2 mb
        ]);

        try {
            // Create a new BusinessList instance or retrieve existing instance if editId is provided
            $editId = $request->input('editId');
            $business = $editId ? BusinessList::findOrFail($editId) : new BusinessList();

            // Set the values of the business properties from the request data
            $business->userId = $request->userid;
            $business->category = $request->input('category');
            $business->placeType = $request->has('placeType') ? implode(',', $request->input('placeType')) : ' ';
            $business->highlight = $request->has('highlight') ? implode(',', $request->input('highlight')) : ' ';
            $business->description = $request->input('description');
            $business->price = $request->input('price');
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

            // Move and store uploaded files
            $destinationPath = public_path('uploads');

            if ($request->hasFile('coverImage')) {
                $coverImage = $request->file('coverImage');
                $coverImageName = time() . '_cover.' . $coverImage->getClientOriginalExtension();
                $coverImage->move($destinationPath, $coverImageName);
                $business->coverImage = $coverImageName;
            }

            if ($request->hasFile('documentImage')) {
                $documentImage = $request->file('documentImage');
                $documentImageName = time() . '_document.' . $documentImage->getClientOriginalExtension();
                $documentImage->move($destinationPath, $documentImageName);
                $business->documentImage = $documentImageName;
            }
            // Handle gallery images if provided
            $galleryImages = $request->file('galleryImage');
            if (!empty($galleryImages)) {
                $filePaths = [];

                foreach ($galleryImages as $file) {
                    $galleryImageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($destinationPath, $galleryImageName);
                    $filePaths[] = $galleryImageName;
                }

                // Store the file paths in the database as a JSON array
                $business->galleryImage = json_encode($filePaths);
            }
            // Save the model to the database
            $business->save();
            // Redirect back with a success message
            return back()->with('success', $editId ? 'Business updated successfully' : 'Business added successfully');
        } catch (Exception $e) {
            // Handle errors
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

}





