<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Popup_ads;

use Exception;

class popupSettingController extends Controller
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
        $model = Popup_ads::orderBy('created_at', 'desc')
            //    ->where('type', '=', 'ads_featured')
            ->get();
        return view('backend.admin.popupsetting.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Master::orderby('created_at', 'desc')
            ->where('type', '=', 'ads_featured')
            ->get();
        return view('backend.admin.popupsetting.create', compact('model'));
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
            'type' => 'required',
            'content_type' => 'required',
            'value' => 'required',
        ]);

        try {
            $model = new Popup_ads();

            $model->title = $request->input('title');
            $model->type = $request->input('type');
            $model->value = $request->input('value');
            $model->content_type = $request->input('content_type');

            if ($request->input('content_type') == 'image') {
                if ($request->hasFile('logo')) {
                    $extension = strtolower($request->file('logo')->getClientOriginalExtension());
                    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'svg' || $extension == 'webp') {
                        if ($request->file('logo')->isValid()) {
                            $destinationPath = public_path('uploads');
                            $extension = $request->file('logo')->getClientOriginalExtension();
                            $fileName = time() . '.' . $extension; // renaming logo
                            $request->file('logo')->move($destinationPath, $fileName);
                            $model->logo = $fileName;
                        }
                    }
                }
            } elseif ($request->input('content_type') == 'video') {
                if ($request->hasFile('logo')) {
                    $videoExtension = strtolower($request->file('logo')->getClientOriginalExtension());
                    if ($videoExtension == 'mp4' || $videoExtension == 'avi' || $videoExtension == 'mov') {
                        if ($request->file('logo')->isValid()) {
                        }
                    }
                }
            }

            $model->save();

            // Set a custom success flash message
            session()->flash('success', 'Record saved successfully.');

            return redirect()->route('admin.popupSetting.index');
        } catch (\Exception $e) {
            // Handle exceptions and errors
            session()->flash('error', 'An error occurred while saving the record.');
            Log::error($e);

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
        $submaster = Popup_ads::where('id', $id)->first();
        return view('backend.admin.popupsetting.edit', compact('submaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\submaster  $submaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'value' => 'required',
        ]);
        try {
            $submaster = Popup_ads::find($id);
            $submaster->title = $request->title;
            $submaster->value = $request->value;
            $submaster->save();
            return redirect()->route('admin.popupsetting.index');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            print_r($e->getMessage());
            die();
            return back();
        }
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
            $model = Popup_ads::find($id);

            if (!$model) {
                return back()->with('error', 'Record not found.');
            }

            // Delete the Master record from the database
            $model->delete();

            // Delete the associated logo file from storage if it exists
            if ($model->logo) {
                $logoPath = public_path('uploads') . '/' . $model->logo;

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
