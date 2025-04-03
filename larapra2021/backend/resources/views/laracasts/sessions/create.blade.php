<x-laracasts.layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form method="POST" action="/laracasts/login" class="mt-10">
                @csrf
                
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Email
                    </label>
                    <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" required value="{{ old('email')}}">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-us text-gray-700">
                        Password
                    </label>
                    <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4" hover:bg-blue-500>Log In</button>
                </div>
            </form>
        </main> 
    </section>



</x-laracasts.layout>