<?php

namespace App\Http\Controllers\Blogcrud;

use App\Models\blogcrud\BlogcrudPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class BlogcrudPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogcrudPost::all();
        return view('blogcrud.posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogcrud.posts.create');
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
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . 
        $request->image->extension();

        $slug = SlugService::createSlug(BlogcrudPost::class, 'slug', request()->title);

        $posts = BlogcrudPost::create([
            'slug' => $slug,
            'title' => request()->title,
            'description' => request()->description,
            'image_path'  => request()->file('image')->store('image'),
            'blogcrud_user_id' => auth()->user()->id
        ]);

        return redirect()->route('blogcrud.post.index')->with('message', 'successed to create your post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = BlogcrudPost::where('slug', $slug)->first();
        
        return view('blogcrud.posts.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = BlogcrudPost::where('slug', $slug)->first();
        
        return view('blogcrud.posts.edit', compact(['post'])); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = BlogcrudPost::where('slug', $slug)->first();

        $post->update([
            'title' => request()->title,
            'description' => request()->description,
        ]);

        return redirect()->route('blogcrud.post.index')->with('message', 'successed to update your post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = BlogcrudPost::where('slug', $slug)->first();
        $post->delte();

        return redirect()->route('blogcrud.post.index')->with('message', 'successed to delete your post');
    }
}
