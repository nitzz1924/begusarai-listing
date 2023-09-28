<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\BusinessList;
use App\Models\Lead;

use DB;
use Exception;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $businesses = BusinessList::orderBy('created_at', 'desc')->get();

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
        $category = Master::orderBy('created_at', 'asc')
        ->where('type', '=', 'category')
        ->get();
        $city = Master::orderBy('created_at', 'asc')
        ->where('type', '=', 'category')
        ->get();

        $lead = Lead::leftJoin('businesslist', function ($join) {
            $join->on('lead.business_id', '=', 'businesslist.id');
        })
            ->select('lead.*', 'businesslist.businessName AS businessName1')
            ->orderBy('lead.created_at', 'desc')
            ->get();
         



            $currentDate = now(); // Get the current date and time

            $Todayleads = Lead::leftJoin('businesslist', function ($join) {
                    $join->on('lead.business_id', '=', 'businesslist.id');
                })
                ->select('lead.*', 'businesslist.businessName AS businessName1')
                ->whereDate('lead.created_at', '=', $currentDate->toDateString()) // Filter by the current date
                ->orderBy('lead.created_at', 'desc')
                ->get();
            

        return view('backend.admin.view.index', compact('Result','category','city','lead','Todayleads'));
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
