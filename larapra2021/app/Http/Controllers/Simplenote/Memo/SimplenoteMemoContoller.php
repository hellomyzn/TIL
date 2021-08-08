<?php

namespace App\Http\Controllers\Simplenote\Memo;

use App\Models\simplenote\SimplenoteTag;
use App\Models\simplenote\SimplenoteMemo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SimplenoteMemoContoller extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $simplenote_user = auth()->user()->simplenote_user;        

        logger("Success to access memo index: User name: {{ $simplenote_user->name }} ");
        return view('simplenote.memos.create', compact(['tags', 'memos']));
    }

    public function create ()
    {
        $simplenote_user = auth()->user()->simplenote_user;

        logger("Success to access memo create: User name: {{ $simplenote_user->name }} ");
        return view('simplenote.memos.create');
    }

    public function store (Request $request)
    {
        $simplenote_user = auth()->user()->simplenote_user;
        $data = $request->all();

        request()->validate([
            'content' => 'required|max:255',
        ]);

        $exist_tag = SimplenoteTag::where('name', $data['tag'])
            ->where('simplenote_user_id', $simplenote_user->id)
            ->first();
        

        if (empty($exist_tag))
        {
            $tag_id = SimplenoteTag::insertGetId([
                'name' => $data['tag'],
                'simplenote_user_id' => $simplenote_user->id,
            ]);
        } else{
            $tag_id = $exist_tag->id;
        }


        $memo_id = SimplenoteMemo::insertGetId([
            'content' => $data['content'],
            'simplenote_user_id' => $simplenote_user->id,
            'simplenote_tag_id' => $tag_id,
            'status' => 1,
        ]);
        
        

        logger("Success to create a new memo : User name: {{ $simplenote_user->name }}, Memo id: {{ $memo_id }}");
        return redirect()->route('simplenote.memos.home');
    }

    public function edit(SimplenoteMemo $memo)
    {
        $simplenote_user = auth()->user()->simplenote_user;        
        $tags = $simplenote_user->simplenote_tags;

        logger("Success to access memo edit: User name: {{ $simplenote_user->name }} ");
        return view('simplenote.memos.edit', compact(['memo', 'tags']));
    }

    public function update(Request $request, SimplenoteMemo $memo)
    {
        $simplenote_user = auth()->user()->simplenote_user;
        $data = $request->all();
        request()->validate([
            'content'                 => 'required|max:255',
        ]);
        
        $memo_id = $memo->update([
            'content' => $data['content'],
            'simplenote_tag_id' => $data['tag_id'],
        ]);

        logger("Success to edit memo : User name: {{ $simplenote_user->name }}, Memo id: {{ $memo_id }}");
        return redirect()->route('simplenote.memos.home');
    }

    public function destroy(SimplenoteMemo $memo)
    {
        $simplenote_user = auth()->user()->simplenote_user;
        $memo = $memo->delete();

        logger("Success to delete memo : User name: {{ $simplenote_user->name }}, Memo id: {{ $memo }}");
        return redirect()->route('simplenote.memos.home')->with('success', 'success to delte memo');
    }
}
