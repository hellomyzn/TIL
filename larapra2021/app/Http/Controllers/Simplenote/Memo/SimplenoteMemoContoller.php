<?php

namespace App\Http\Controllers\Simplenote\Memo;

use App\Models\simplenote\SimplenoteTag;
use App\Models\simplenote\SimplenoteMemo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimplenoteMemoContoller extends Controller
{

    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index ()
    {
        $simplenote_user = auth()->user()->simplenote_user;        
        $tags = $simplenote_user->simplenote_tags;
        $memos = $simplenote_user->simplenote_memos;

        logger("Success to access memo index: User name: {{ $simplenote_user->name }} ");
        return view('simplenote.memos.index', compact(['tags', 'memos']));
    }

    public function create ()
    {
        $simplenote_user = auth()->user()->simplenote_user;        
        $tags = $simplenote_user->simplenote_tags;
        $memos = $simplenote_user->simplenote_memos;

        logger("Success to access memo create: User name: {{ $simplenote_user->name }} ");
        return view('simplenote.memos.create', compact(['tags', 'memos']));
    }
    public function store (Request $request)
    {
        $simplenote_user = auth()->user()->simplenote_user;
        $data = $request->all();

        request()->validate([
            'content'                 => 'required|max:255',
        ]);

        $memo_id = SimplenoteMemo::insertGetId([
            'content' => $data['content'],
            'simplenote_user_id' => $simplenote_user->id,
        ]);

        logger("Success to create a new memo : User name: {{ $simplenote_user->name }}, Memo id: {{ $memo_id }}");
        return redirect()->route('simplenote.memos.home');
    }
}
