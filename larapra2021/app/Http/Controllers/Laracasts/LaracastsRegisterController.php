<?php

namespace App\Http\Controllers\Laracasts;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\laracasts\LaracastsUser;
use App\Repositories\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class LaracastsRegisterController extends Controller
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
        return view('laracasts.register.create');
    }

    public function store()
    {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:laracasts_users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        
        // create user
        $user = $this->userRepository->create($attributes, User::USER_ROLE_LARACASTS);
        logger("Success to register User id: {{ $user->id }} User name: {{ $user->laracasts_user->name }} ");

        // Login
        auth()->login($user);
        logger("Success to login User id: {{ $user->id }} User name: {{ $user->name }} ");

        return redirect('/laracasts/posts')->with('success', 'Your account has been created.');
    }
}
