<?php

namespace App\Http\Controllers\Blogcrud\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\blogcrud\BlogcrudUser;
use App\Services\Auth\UserService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;


class BlogcrudRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * StudentRegisterController constructor.
     */
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }


    public function showRegistrationForm()
    {
        return view('blogcrud.auth.register');
    }

    public function register () {

        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
        
        $user = $this->userService->create($attributes, User::USER_ROLE_BLOGCRUD);

        auth()->login($user);
        return redirect()->route('blogcrud.post.index')->with('success', 'Your account has been created.');
    }
}
