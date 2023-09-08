<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Role;
use App\Models\User_Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

use View;
use DB;

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
            'verificationCode' => 'required',
            'password' => 'required',
           
        ]);
    
        // Find the user by ID
        $user = User_Login::findOrFail($id);
    
        // Update the user's attributes
        $user->name = $request->input('name');
        $user->mobileNumber = $request->input('number');
        $user->verificationCode = $request->input('verificationCode');
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
}


// return redirect()->route('admin.submaster.index');
// } catch (\Exception $e) {
//     session()->flash('sticky_error', $e->getMessage());
//     print_r($e->getMessage());
//     die();
//     return back();
// }
