<?php

namespace Database\Factories\blogcrud;

use App\Models\blogcrud\BlogcrudPost;
use App\Models\blogcrud\BlogcrudUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogcrudPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogcrudPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [

            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->unique()->sentence,
            'description' => '<p>' . implode("</p><p>",  [$this->faker->paragraph(12)]) . '</p>',
            'image_path' => '6034f2b4ac8f1-This is my title.jpg',
            'blogcrud_user_id' => rand(1, BlogcrudUser::count()),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
    }
}
