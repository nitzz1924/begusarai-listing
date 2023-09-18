<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Lead;
use App\Models\BusinessList;

use Exception;

class LeadController extends Controller
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

    //     public function index(Request $request)
    // {

    //     $businessId = $request->input('business_id');
    //     if ($businessId) {
    //         $businesses = BusinessList::leftJoin('lead', function ($join) use ($businessId) {
    //             $join->on('lead.id', '=', 'businesslist.id')->where('businesslist.id', '=', $businessId->id);
    //         })
    //             ->select('businesslist.*', 'businesslist.id AS business_status')
    //             ->orderBy('businesslist.created_at', 'desc')
    //             ->get();
    //     } else {
    //         $businesses = BusinessList::orderBy('created_at', 'desc')->get();
    //     }

    //     $lead = Lead::orderBy('created_at', 'asc')->get();
    //     return view('backend.admin.lead.index', compact('lead'));
    // }

    public function index(Request $request)
    {
        $businesses = BusinessList::leftJoin('lead', function ($join) {
            $join->on('lead.business_id', '=', 'businesslist.id');
        })
            ->select('lead.*', 'businesslist.businessName AS businessName1')
            ->orderBy('lead.created_at', 'desc')
            ->get();
        return view('backend.admin.lead.index', compact('businesses'));
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
        } catch (Exception $e) {
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
        $user = Testimonial::where('id', $id)->first();
        return view('backend.admin.user.edit', compact('user'));

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
    // public function destroy($id)
    // {
    //     $lead = Lead::where(['id' => $id])->delete();
    //     return back();
    // }

    public function destroy($lead)
    {
        try {
            // Find the lead record by ID and delete it
            $lead = Lead::findOrFail($lead);
            $lead->delete();

            // Return a success response, e.g., JSON response
            return response()->json(['message' => 'Record deleted successfully']);
        } catch (\Exception $e) {
            // Handle any exceptions or errors that occur during deletion
            return response()->json(['error' => 'Error deleting record'], 500);
        }
    }

    public function active($id)
    {
        // dd('Active method called with ID: ' . $id);
        Lead::where('id', $id)->update(['status' => '0']);
        return redirect()->route('admin.lead.index');
    }

    public function inactive($id)
    {
        // dd('Inactive method called with ID: ' . $id);
        try {
            Lead::where('id', $id)->update(['status' => '1']);
            return redirect()->route('admin.lead.index');
        } catch (\Exception $e) {
            print_r($e->getMessage());
            die();
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
