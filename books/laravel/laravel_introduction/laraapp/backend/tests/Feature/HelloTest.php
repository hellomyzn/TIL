<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testHello(){
        $this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $msg = "Hello";
        $this->assertEquals('Hello', $msg);

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);


        $response = $this->get('/rest');
        $response->assertStatus(200);

        $response = $this->get('/hello/index_auth');
        $response->assertStatus(302);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/hello/index_auth');
        $response->assertStatus(200);

        $response = $this->get('/hoge');
        $response->assertStatus(404);
    }
}
