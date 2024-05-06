<?php

namespace App\Http\Controllers\Backend\Admin;
use Illuminate\Database\QueryException;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Master;

use Exception;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $blog = blog::orderby('created_at', 'desc')->get();
    //   return view('backend.admin.blog.index',compact("blog"));
    // }

    public function index(Request $request)
    {
        $blog = Blog::orderBy('created_at', 'asc')->get();
        return view('backend.admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $submaster = Master::orderby('created_at', 'desc')
            ->where('type', '=', 'blog_type')
            ->get();
        return view('backend.admin.blog.create', compact('submaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'videourl' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'keyword' => 'required',
            'postcontent' => 'required',
        ]);

        // Upload the image
        $imagePath = '';

        if ($request->hasFile('image')) {
            $extension = strtolower($request->file('image')->getClientOriginalExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                if ($request->file('image')->isValid()) {
                    $destinationPath = public_path('uploads'); // upload path
                    $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                    $fileName = time() . '.' . $extension; // renaming image
                    $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                    $imagePath = $fileName;
                }
            }
        }

        // Create a new blog entry
        Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'keyword' => $request->input('keyword'),
            'post' => $request->input('postcontent'),
            'image' => $imagePath, // Store the file name in the 'image' column
            'videourl' => $request->input('videourl'),
        ]);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog created successfully.');
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
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    //  public function edit($id)
    //  {
    //      $blog = Master::where('id', $id)->first();
    //      return view('backend.admin.blog.edit', compact('blog'));
    //  }
    public function edit($id)
    {
        $submaster = Master::orderby('created_at', 'desc')
            ->where('type', '=', 'blog_type')
            ->get();
        $blog = Blog::findOrFail($id);
        return view('backend.admin.blog.edit', compact('blog', 'submaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image to be optional
            'videourl' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'keyword' => 'required',
            'postcontent' => 'required',
        ]);

        // Find the blog entry to update
        $blog = Blog::findOrFail($id);

        // Update the blog entry
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->type = $request->input('type');
        $blog->keyword = $request->input('keyword');
        // $blog->post = $request->input('postcontent');
        $imagePath = $blog->image; // Store the current image path
        $videoPath = $blog->videourl; // Store the current image path

        $postcontent = $request->input('postcontent');
        Log::info('Post Content from Request: ' . $postcontent); // Log the value to see if it's correct
        $blog->post = $postcontent;


        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $extension = strtolower($request->file('image')->getClientOriginalExtension());
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'svg', 'webp'])) {
                if ($request->file('image')->isValid()) {
                    $destinationPath = public_path('uploads'); // upload path
                    $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                    $fileName = time() . '.' . $extension; // renaming image
                    $request->file('image')->move($destinationPath, $fileName); // uploading file to given path
                    $imagePath = $fileName;
                }
            }
        }

        // Update the 'image' column with the new or existing image path
        $blog->image = $imagePath;

        // $blog->videourl = $request->input('videourl');
        $blog->videourl = $videoPath;

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        try {
            // Find the Blog record by ID
            $blog = Blog::find($id);

            if (!$blog) {
                return back()->with('error', 'Blog not found.');
            }

            // Delete the associated image file from storage
            if ($blog->image) {
                $imagePath = public_path('uploads') . '/' . $blog->image;

                // Check if the file exists before attempting to delete it
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Delete the Blog record from the database
            $blog->delete();

            return back()->with('success', 'Blog and associated image deleted successfully');
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
