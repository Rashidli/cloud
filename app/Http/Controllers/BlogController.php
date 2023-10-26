<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct( )

    {

        $this->middleware('permission:list-blogs|create-blogs|edit-blogs|delete-blogs', ['only' => ['index','show']]);
        $this->middleware('permission:create-blogs', ['only' => ['create','store']]);
        $this->middleware('permission:edit-blogs', ['only' => ['edit']]);
        $this->middleware('permission:delete-blogs', ['only' => ['destroy']]);

    }
    public function index()
    {

        $blogs = Blog::paginate(10);
        return view('blogs.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Blog::create([
            'image'=> url('/') . '/storage/' . $filename,
            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]
        ]);

        return redirect()->route('blogs.index')->with('message','Blog added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        return view('blogs.edit', compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $blog->image = url('/') .  '/storage/'  . $filename;
        }


        $blog->update( [

            'is_active'=> $request->is_active,

            'az'=>[
                'title'=>$request->az_title,
                'content'=>$request->az_content
            ],
            'en'=>[
                'title'=>$request->en_title,
                'content'=>$request->en_content
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'content'=>$request->ru_content
            ]

        ]);

        return redirect()->back()->with('message','Blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        $blog->delete();

        return redirect()->route('blogs.index')->with('message', 'Blog deleted successfully');

    }
}
