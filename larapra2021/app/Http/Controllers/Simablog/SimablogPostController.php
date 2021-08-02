<?php

namespace App\Http\Controllers\Simablog;

use App\Models\Simablog\SimablogPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SimablogPostController extends Controller
{
    public function index()
    {
        $posts = SimablogPost::all();
        return view('simablog.posts.index', compact(['posts']));
    }

    public function create()
    {
        return view('simablog.posts.create');
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        //インスタンス作成
        $post = new SimablogPost();
        
        $post->body = $request->body;
        $post->user_id = $id;

        $post->save();

       return redirect()->route('simablog.post.index');
    }

    public function show(SimablogPost $post)
    {
        $user = $post->simablog_user;

        return view('simablog.posts.show', compact(['post', 'user']));
    }

    public function edit($id)
    {
        $post = SimablogPost::findOrFail($id);

        return view('simablog.posts.edit', compact(['post']));
    }

    public function update(Request $request)
    {
        $id = $request->post_id;
        
        
        $post = SimablogPost::findOrFail($id);
        
        $post->body = $request->body;
        
        $post->save();
        
        return redirect()->route('simablog.post.index');
    }

    public function destroy($id)
    {
        $post = SimablogPost::findOrFail($id);
        //削除
        $post->delete();

        return redirect()->route('simablog.post.index');
    }
}
