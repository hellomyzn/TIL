<?php

namespace App\View\Components\Layouts;

use App\Models\Memo;
use App\Models\Tag;
use App\Services\MemoService;
use Illuminate\View\Component;

class app extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        MemoService $memoService
    )
    {
        $this->memoService = $memoService;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = auth()->user();  
        $tags = $user->tags;
        $memos = $this->memoService->myMemos($user->id);
        return view('components.layouts.app', compact(['tags', 'memos']));
    }
}