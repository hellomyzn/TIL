<?php

namespace Tests\Feature\Laracasts\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaracastsUserRegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    
     /** @test */
    public function register_route_exist()
    {
        $this->get('/laracasts/register')->assertStatus(200);
    }
    
    /** @test */
    public function register_account()
    {
        $email = 'hoge@hoge.com';

        // create laracasts_users
        $this->post(route('laracasts.auth.register.store'), [
            'name' => 'user',
            'username' => 'username',
            'email' => $email,
            'password' => 'password',
        ])->assertStatus(302);

        // check laracasts_users
        $this->assertDatabaseHas('laracasts_users', ['email' => $email]);
    }

    /** @test */
    public function name_is_required()
    {
        $response = $this->post(route('laracasts.auth.register.store'), [
            'username' => 'username',
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function username_is_required()
    {
        $response = $this->post(route('laracasts.auth.register.store'), [
            'name' => 'user',
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('username');
    }
    
    /** @test */
    public function email_is_required()
    {
        $response = $this->post(route('laracasts.auth.register.store'), [
            'name' => 'user',
            'username' => 'username',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function password_is_required()
    {
        $response = $this->post(route('laracasts.auth.register.store'), [
            'name' => 'user',
            'username' => 'username',
            'email' => 'hoge@hoge.com',
        ]);

        $response->assertSessionHasErrors('password');
    }

    /** @test */
    public function it_redirects_to_posts_after_successful_registration()
    {
        

        $response = $this->post(route('laracasts.auth.register.store'), [
            'name' => 'user',
            'username' => 'username',
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('laracasts.post.home'));
    }
}
