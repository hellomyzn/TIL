<?php

namespace App\Http\Controllers\Simablog\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\simablog\SimablogUser;
use App\Models\User;
use App\Repositories\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SimablogRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SIMABLOG_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }


    public function registerShow()
    {
        return view('simablog.auth.register');
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
        
        $user = $this->userRepository->create($attributes, User::USER_ROLE_SIMABLOG);

        auth()->login($user);
        return redirect()->route('blogcrud.post.index')->with('success', 'Your account has been created.');
    }
}
