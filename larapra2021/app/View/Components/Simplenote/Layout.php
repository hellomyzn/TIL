<?php

namespace App\View\Components\Simplenote;

use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteTag;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $simplenote_user = auth()->user()->simplenote_user;        
        $tags = $simplenote_user->simplenote_tags;
        $memos = $simplenote_user->simplenote_memos;

        return view('components.simplenote.layout', compact(['tags', 'memos']));
    }
}
