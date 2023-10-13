<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Master;

use Exception;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $master = Master::orderby('created_at', 'desc')->get();
    //   return view('backend.admin.master.index',compact("master"));
    // }

   
 
public function index()
{
    $master = Master::orderBy('created_at', 'desc')->where('type','=','Master')->get();
    $packages = Package:: orderBy('created_at', 'desc')->get();
    return view('backend.admin.package.index', compact('packages' , 'master'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = Master::orderBy('created_at', 'desc')->where('type','=','Package')->get();
        return view('backend.admin.package.create' , compact('master'));
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
            'type' => 'required',
            'title' => 'required',
            'duration' => 'required',

            'durationMY' => 'required ', 
            'price' => 'required|numeric ', 
            // 'off' => 'required|numeric ', 
            'noOfPlace' => 'required|numeric ', 
            'featuredListings' => 'required|numeric', 
            'featuredType' => 'required', 
        ]);
    
        try {
            $package = new Package();
    
            $package->type = $request->input('type');
            $package->title = $request->input('title');
            $package->duration = $request->input('duration');
            $package->durationMY = $request->input('durationMY'); 
            $package->price = $request->input('price');
            // $package->off = $request->input('off');
            $package->noOfPlace = $request->input('noOfPlace');
            $package->featuredListings = $request->input('featuredListings');
            $package->featuredType = $request->input('featuredType');
    
            // You may add more fields and their corresponding input processing here.
    
            // Save the package to the database.
            $package->save();
    
            return redirect()->route('admin.package.index');
        } catch (Exception $e) {
            // Handle exceptions if needed.
            print_r($e->getMessage());
            die();
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
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $master = Master::orderBy('created_at', 'asc')->where('type','=','Package')->get();
        $package = Package::where('id', $id)->first();
        return view('backend.admin.package.edit', compact('package','master'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'duration' => 'required',
            'durationMY' => 'required',
            'price' => 'required|numeric',
            // 'off' => 'required|numeric',
            'noOfPlace' => 'required|numeric',
            'featuredListings' => 'required|numeric',
            'featuredType' => 'required',
        ]);
    
        try {
            $package = Package::findOrFail($id);
    
            $package->type = $request->input('type');
            $package->title = $request->input('title');
            $package->duration = $request->input('duration');
            $package->durationMY = $request->input('durationMY'); 
            $package->price = $request->input('price');
            // $package->off = $request->input('off');
            $package->noOfPlace = $request->input('noOfPlace');
            $package->featuredListings = $request->input('featuredListings');
            $package->featuredType = $request->input('featuredType');
    
    
            $package->save();
    
            return redirect()->route('admin.package.index')->with('success', 'Package updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the package.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Package::where(['id' => $id])->delete();
        return back();
    }
}

    // ------------------->>  Print Error Message  

    // catch (Exception $e) {
    //     session()->flash('sticky_error', $e->getMessage());
    //     print_r($e->getMessage());
    //     die();
    //     return back();
    // }

    