<?php

namespace Database\Factories\laracasts;

use App\Models\Laracasts\LaracastsComment;
use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaracastsCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaracastsComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'laracasts_post_id' => rand(1, LaracastsPost::count()),
            'laracasts_user_id' => rand(1, LaracastsUser::count()),
            'body' => '<p>' . implode("</p><p>",  [$this->faker->paragraph(4)]) . '</p>',            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
