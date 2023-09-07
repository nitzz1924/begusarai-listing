<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;
use Exception;

class MasterController extends Controller
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

   

    public function index(Request $request)
{
    $master = Master::orderBy('created_at', 'asc')->where('type','=','Master')->get();
    return view('backend.admin.master.index', compact('master'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master = Master::orderby('created_at', 'asc')->get();
        return view('backend.admin.master.create', compact('master'));
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
        ]);
        try {
            $master = new Master();
           

            $master->title = $request->input('title');
            $master->value = $request->input('value');


            //  $master->uploaded_by = auth()->user()->id;

            $master->save(); //
            return redirect()->route('admin.master.index');
        }  catch (Exception $e) {
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
        $master = Master::where('id', $id)->first();
        return view('backend.admin.master.edit', compact('master'));
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
            'title' => 'required',
            'value' => 'required',
        ]);
        try {
            $master = Master::find($id);
            $master->title = $request->title;
            $master->value = $request->value;
            $master->save();
            return redirect()->route('admin.master.index');
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
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master = Master::where(['id' => $id])->delete();
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

    