<x-laracasts.layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-laracasts.panel >
            <form method="POST" action="/laracasts/admin/posts" class="mt-10" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Title
                    </label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="title" id="title" required value="{{ old('title')}}">
                </div>
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Slug
                    </label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="slug" id="slug" required value="{{ old('slug')}}">
                </div>
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Thumbnail
                    </label>
                    <input type="file" class="border border-gray-400 p-2 w-full" name="thumbnail" id="thumbnail" required value="{{ old('thumbnail')}}">
                </div>
                @error('thumbnail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <label for="excerpt" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required value="{{ old('excerpt')}}"></textarea>
                </div>
                @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <label for="body" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" required value="{{ old('body')}}"></textarea>
                </div>
                @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <label for="laracasts_category_id" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Category
                    </label>
                    <select name="laracasts_category_id" id="laracasts_category_id">
                        @foreach ($categories as $category)
                            <option 
                                value="{{ $category->id}}"
                                {{ old('laracasts_category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('laracasts_category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


                <div class="mb-6">
                    <x-laracasts.button>Publish</x-laracasts.button>
                </div>
            </form>
        </x-laracasts.panel>
    </section>
</x-laracasts.layout>