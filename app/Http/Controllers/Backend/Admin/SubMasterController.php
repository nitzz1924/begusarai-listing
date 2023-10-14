<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Master;
use Exception;

class SubMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $submaster = submaster::orderby('created_at', 'desc')->get();
    //   return view('backend.admin.submaster.index',compact("submaster"));
    // }

    public function index(Request $request)
    {
        $submaster = Master::orderBy('created_at', 'desc')
            ->where('type', '<>', 'Master')
            ->get();
        return view('backend.admin.submaster.index', compact('submaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = Master::orderby('created_at', 'desc')
            ->where('type', '=', 'Master')
            ->get();
        return view('backend.admin.submaster.create', compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'value' => 'required',
            'type' => 'required',
        ]);
        try {
            $submaster = new Master();

            $submaster->title = $request->input('title');
            $submaster->value = $request->input('value');
            $submaster->type = $request->input('type');

            // logo/Image Session
            if ($request->hasFile('logo')) {
                $extension = strtolower($request->file('logo')->getClientOriginalExtension());
                if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                    if ($request->file('logo')->isValid()) {
                        $destinationPath = public_path('uploads');
                        $extension = $request->file('logo')->getClientOriginalExtension();
                        $fileName = time() . '.' . $extension; // renameing logo
                        $request->file('logo')->move($destinationPath, $fileName);
                        $submaster->logo = $fileName;
                    }
                }
            }

            $submaster->save(); //
            return redirect()->route('admin.submaster.index');
        } catch (Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
    }

    // catch (Exception $e) {
    //     session()->flash('sticky_error', $e->getMessage());
    //     print_r($e->getMessage());
    //     die();
    //     return back();
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\submaster  $submaster
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\submaster  $submaster
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submaster = Master::find($id);
        $master = Master::orderBy('created_at', 'desc')
            ->where('type', '=', 'Master')
            ->get();
        return view('backend.admin.submaster.edit', compact('submaster', 'master'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'value' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Modify the file validation as needed.
        ]);

        $submaster = Master::find($id);
        $submaster->type = $request->input('type');
        $submaster->title = $request->input('title');
        $submaster->value = $request->input('value');

        // logo/Image Session
        if ($request->hasFile('logo')) {
            $extension = strtolower($request->file('logo')->getClientOriginalExtension());
            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                if ($request->file('logo')->isValid()) {
                    $destinationPath = public_path('uploads');
                    $extension = $request->file('logo')->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension; // renameing logo
                    $request->file('logo')->move($destinationPath, $fileName);
                    $submaster->logo = $fileName;
                }
            }
        }

        $submaster->save();

        return redirect()
            ->route('admin.submaster.index')
            ->with('success', 'SubMaster updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\submaster  $submaster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Find the Master record by ID
            $submaster = Master::find($id);

            if (!$submaster) {
                return back()->with('error', 'Record not found.');
            }

            // Delete the Master record from the database
            $submaster->delete();

            // Delete the associated logo file from storage if it exists
            if ($submaster->logo) {
                $logoPath = public_path('uploads') . '/' . $submaster->logo;

                // Check if the file exists before attempting to delete it
                if (file_exists($logoPath)) {
                    unlink($logoPath);
                }
            }

            return back()->with('success', 'Record and associated logo deleted successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during deletion
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}

// ------------------->>  Print Error Message

// catch (Exception $e) {
//     session()->flash('sticky_error', $e->getMessage());
//     print_r($e->getMessage());
//     die();
//     return back();
// }
