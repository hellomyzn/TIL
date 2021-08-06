<?php

namespace App\Http\Controllers\Blogcrud;

use App\Http\Controllers\Controller;
use App\Models\blogcrud\BlogcrudUser;
use App\Models\User;
use App\Repositories\Auth\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;


class BlogcrudRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * StudentRegisterController constructor.
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }


    public function create()
    {
        return view('blogcrud.auth.register');
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:laracasts_users,email',
            'password' => 'required|min:7|max:255',
        ]);

        // create user
        $user = BlogcrudUser::create($attributes);
        logger("Success to register User id: {{ $user->id }} User name: {{ $user->name }} ");

        // Login
        auth()->login($user);
        logger("Success to login User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts')->with('success', 'Your account has been created.');
    }

    public function showRegistrationForm()
    {
        return view('blogcrud.auth.register');
    }

    public function register () {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:laracasts_users,email',
            'password' => 'required|min:7|max:255',
        ]);
        
        $user = $this->userRepository->create($attributes, User::USER_ROLE_BLOGCRUD);

        auth()->login($user);
        return redirect()->route('blogcrud.post.index')->with('success', 'Your account has been created.');
    }
}
