<?php

namespace Database\Factories\blogcrud;

use App\Models\blogcrud\BlogcrudPost;
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
            'image_path' => $this->faker->unique()->sentence,
            'blogcrud_user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        
    }
}
