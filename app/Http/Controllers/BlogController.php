<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (auth()->user() != null && auth()->user()->role == 'admin') {
            return view('pages.blogs', ["data" => Blog::all()]);
        } else {
            return view('pages.blogs', ["data" => Blog::where('active', 1)->get()]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|url',
            'active' => 'required|boolean',
        ]);
        $blog = new Blog();
        $blog->clause = substr($request->description, 0, 130);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->active = $request->active;
        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('pages.blog', ['data' => $blog->makeHidden(['active', 'id'])]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('pages.update', ["data" => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|url',
            'active' => 'required|boolean',
        ]);
        
        $blog->clause = substr($request->description, 0, 130);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->image = $request->image;
        $blog->active = $request->active;
        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index');
    }
}
