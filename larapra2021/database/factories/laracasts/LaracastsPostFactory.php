<?php

namespace Database\Factories\laracasts;

use App\Models\laracasts\LaracastsPost;
use App\Models\laracasts\LaracastsCategory;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LaracastsPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaracastsPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph,
            'laracasts_category_id' => rand(1,LaracastsCategory::count()),
            'laracasts_user_id' => rand(1, LaracastsUser::count()),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'published_at' => $this->faker->date,
        ];
    }
}
