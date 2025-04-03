<?php

namespace Tests\Feature\Laracasts\Auth;

use App\Models\User;
use App\Models\laracasts\LaracastsUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function login_screen_can_be_rendered()
    {
        $response = $this->get(route('laracasts.auth.login.create'));

        $response->assertStatus(200);
    }

    public function users_can_authenticate_using_the_login_screen()
    {
        $email = 'hoge@hoge.com';
        $password = 'password';

        $user = LaracastsUser::factory(1)->create([
            'email' => $email,
            'password' => $password,
        ]);

        // Login
        $response = $this->post(route('laracasts.auth.login.create'),[
            'email' => $email,
            'password' => $password,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
