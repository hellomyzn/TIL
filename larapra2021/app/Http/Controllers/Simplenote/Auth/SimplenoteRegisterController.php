<?php

namespace App\Http\Controllers\Simplenote\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\blogcrud\BlogcrudUser;
use App\Services\Auth\UserService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class SimplenoteRegisterController extends Controller
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
        UserService $userService
    ) {
        $this->userService = $userService;
    }


    public function showRegistrationForm()
    {
        return view('simplenote.auth.register');
    }

    public function register () {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
        $user = $this->userService->create($attributes, User::USER_ROLE_SIMPLENOTE);

        auth()->login($user);
        return redirect()->route('simplenote.memos.home')->with('success', 'Your account has been created.');
    }
}
