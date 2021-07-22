<x-laracasts.dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left inline-flex flex lg:inline-flex">
            
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : "Category"}}
            <x-laracasts.icon name="down-arrow" class="absolute pointer-events-none" />
        </button>
    </x-slot>

    <x-laracasts.dropdown-item href="/laracasts/posts">All</x-laracasts.dropdown-item>
        @foreach ($categories as $category)
            <x-laracasts.dropdown-item 
                href="/laracasts/posts?category={{ $category->slug }}"
                :active="isset($currentCategory) && $currentCategory->is($category)"
                >{{ ucwords($category->name) }} 
            </x-laracasts.dropdown-item>
        @endforeach
    
</x-laracasts.dropdown>