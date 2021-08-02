<?php

namespace Tests\Feature\Laracasts\Post;

use App\Models\laracasts\LaracastsUser;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;


class LaracastsPostTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic feature test example.
     * 
     *
     * @return void
     */
     
     
    public function home_post_route_exist()
    {
        // Create User
        $user = LaracastsUser::factory(1)->create([
            'id' => 1,
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


    
    public function check_post()
    {
        LaracastsUser::factory(1)->create([
            'id' => 1,
        ]);
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

    
    public function create_post_route_exist()
    {
        LaracastsUser::factory(1)->create([
            'name' => 'hoge',
            'username' => 'hoge',
            'email' => "hoge@hoge.com",
            'password' => 'password',
        ]);

        // Login
        $this->post(route('laracasts.auth.login.create'),[
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        // Access Home page
        $this->get(route('laracasts.post.create'))->assertStatus(200);
    }

    
    public function failure_admin_middleware()
    {

        LaracastsUser::factory(1)->create([
            'name' => 'fuga',
            'username' => 'fuga',
            'email' => "fuga@fuga.com",
            'password' => 'password',
        ]);
        // Login
        $this->post(route('laracasts.auth.login.create'),[
            'email' => "fuga@fuga.com",
            'password' => 'password',
        ]);

        // Access Home page
        $this->get(route('laracasts.post.create'))->assertStatus(403);       
    }


    
    public function store_post()
    {
        // create category
        $category = LaracastsCategory::factory(1)->create();

        // create user
        $user = LaracastsUser::factory(1)->create([
            'name' => 'hoge',
            'username' => 'hoge',
            'email' => "hoge@hoge.com",
            'password' => 'password',
        ]);        

        // Login
        $this->post(route('laracasts.auth.login.create'),[
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        // create post
        $this->post(route('laracasts.post.store'), [
            'title'                 => "hoge",
            'thumbnail'             => UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'slug'                  => "hoge",
            'excerpt'               => "hoge",
            'body'                  => "hoge",
            'laracasts_category_id' => $category->toArray()[0]['id'],
            'laracasts_user_id'     => $user->toArray()[0]['id'],
        ])->assertStatus(302);

        
        // check database
        $this->assertDatabaseHas('laracasts_posts', ['title' => 'hoge']);
    }

    
    public function validate_store_post()
    {
        // create category
        $category = LaracastsCategory::factory(1)->create();

        // create user
        $user = LaracastsUser::factory(1)->create([
            'name' => 'hoge',
            'username' => 'hoge',
            'email' => "hoge@hoge.com",
            'password' => 'password',
        ]);        

        // Login
        $this->post(route('laracasts.auth.login.create'),[
            'email' => 'hoge@hoge.com',
            'password' => 'password',
        ]);

        $file = UploadedFile::fake()->image('avatar.jpg', 200, 100)->size(1000);
        var_dump($file);
        // create post
        $response = $this->post(route('laracasts.post.store'), [
            'title'                 => Null,
            'thumbnail'             => UploadedFile::fake()->create('test.png', $kilobytes = 0),
            'slug'                  => "hoge",
            'excerpt'               => "hoge",
            'body'                  => "hoge",
            'laracasts_category_id' => $category->toArray()[0]['id'],
            'laracasts_user_id'     => $user->toArray()[0]['id'],
        ])->assertStatus(302);

        $response->assertSessionHasErrors(['title']);
    }
}
