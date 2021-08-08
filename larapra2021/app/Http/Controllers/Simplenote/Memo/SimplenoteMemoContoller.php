<?php

namespace App\Http\Controllers\Simplenote\Memo;

use App\Models\simplenote\SimplenoteTag;
use App\Models\simplenote\SimplenoteMemo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimplenoteMemoContoller extends Controller
{
    public function index ()
    {
        
        $simplenote_user = auth()->user()->simplenote_user;        
        $tags = $simplenote_user->simplenote_tags;
        $memos = $simplenote_user->simplenote_memos;

        return view('simplenote.memos.index', compact(['tags', 'memos']));
    }

    public function create ()
    {
        return "create";
    }
    public function store ()
    {
        return "store";
    }
}
