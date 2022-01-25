<?php

namespace App\View\Components\Layouts;

use App\Models\Memo;
use App\Models\Tag;
use Illuminate\View\Component;

class app extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // $memos = $this->simplenoteMemoRepository->myMemos($simplenote_user->id);
        $user = auth()->user();  
        $tags = $user->tags;
        $memos = $user->memos;
        return view('components.layouts.app', compact(['tags', 'memos']));
    }
}