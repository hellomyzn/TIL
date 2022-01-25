<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemoRequest;
use App\Http\Requests\UpdateMemoRequest;
use Log; 
use App\Models\Memo;
use App\Models\Tag;

class MemoController extends Controller
{
    public function __contruct(){

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug('ACCESS', ['url' => \Request::fullUrl(), 
                    'user_id' => auth()->user()->id, 
                    'user_name' => auth()->user()->name ]);

        return view('memos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::debug('ACCESS', ['url' => \Request::fullUrl(), 
                    'user_id' => auth()->user()->id, 
                    'user_name' => auth()->user()->name ]);

        return view('memos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoRequest $request)
    {
        $user = auth()->user();
        $validated_data = $request->validated();

        $exist_tag = Tag::where('name', $validated_data['tag'])
        ->where('user_id', $user->id)
        ->first();
    

        if (empty($exist_tag)){
            $tag_id = Tag::insertGetId([
                'name' => $validated_data['tag'],
                'user_id' => $user->id,
            ]);
        } else{
            $tag_id = $exist_tag->id;
        }


        $memo_id = Memo::insertGetId([
            'content' => $validated_data['content'],
            'user_id' => $user->id,
            'tag_id' => $tag_id,
            'status' => 1,
        ]);

        $memo = Memo::find($memo_id);
        
        Log::debug('STORE', ['url' => \Request::fullUrl(), 
                    'user_id' => auth()->user()->id, 
                    'user_name' => auth()->user()->name ]);

        return redirect()->route('memos.edit', ['memo', $memo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(Memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        $user = auth()->user();  
        $tags = $user->tags;
        Log::debug('ACCESS', ['url' => \Request::fullUrl(), 
                    'user_id' => auth()->user()->id, 
                    'user_name' => auth()->user()->name ]);
        return view('memos.edit', compact(['memo', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoRequest  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoRequest $request, Memo $memo)
    {
        $user = auth()->user();
        $validated_data = $request->validated();

        $memo_id = $memo->update([
            'content' => $validated_data['content'],
            'tag_id' => $validated_data['tag_id'],
        ]);

        Log::debug('ACCESS', ['url' => \Request::fullUrl(), 
        'user_id' => auth()->user()->id, 
        'user_name' => auth()->user()->name ]);

        return redirect()->back()->with('success', 'success to update memo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $user = auth()->user();
        $memo_id = $memo->delete();

        Log::debug('ACCESS', ['url' => \Request::fullUrl(), 
        'user_id' => auth()->user()->id, 
        'user_name' => auth()->user()->name ]);

        return redirect()->route('memos.index')->with('success', 'success to delte memo');
    }
}
