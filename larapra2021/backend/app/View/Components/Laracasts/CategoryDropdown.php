<?php

namespace App\View\Components\Laracasts;

use App\Models\laracasts\LaracastsCategory;
use Illuminate\View\Component;

class CategoryDropdown extends Component
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
        return view('components.laracasts.category-dropdown',[
            'categories' => LaracastsCategory::all(),
            'currentCategory' => LaracastsCategory::firstWhere('slug', request('category'))
        ]);
    }
}
