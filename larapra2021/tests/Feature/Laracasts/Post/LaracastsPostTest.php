<?php

namespace Tests\Feature\Laracasts\Post;

use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LaracastsPostTest extends TestCase
{
    // use RefreshDatabase;


    /**
     * A basic feature test example.
     * 
     *
     * @return void
     */
     
     /** @test */
    public function home_post_route_exist()
    {
        // Create User
        $user = LaracastsUser::factory(1)->create([
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        // Login
        $this->post(route('laracasts.auth.login.create'),[
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        // Access Home page
        $this->get(route('laracasts.post.home'))->assertStatus(200);
    }


    /** @test */
    public function check_post()
    {
        LaracastsUser::factory(3)->create();
        LaracastsCategory::factory(3)->create();
        LaracastsPost::factory(10)->create();

        $posts = LaracastsPost::latest()->filter(
            request(['search', 'category', 'user'])
            )->paginate(6)->withQueryString();
        
        $first = $posts[0];

        $view = $this->view('laracasts.posts.index', ['posts' => $posts]);
        $view->assertSee('Laravel');
        $view->assertSee($first->title);        
    }
}
