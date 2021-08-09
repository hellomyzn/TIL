<?php

namespace App\Http\Controllers\Ilumukita\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\Auth\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class IlumukitaRegisterController extends Controller
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


    public function showRegistrationForm()
    {
        return view('ilumukita.auth.register');
    }

    public function register () {
        // validation
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);
        $user = $this->userRepository->create($attributes, User::USER_ROLE_ILUMUKITA);

        auth()->login($user);
        return redirect()->route('ilumukita.dashboard.home')->with('success', 'Your account has been created.');
    }
}
