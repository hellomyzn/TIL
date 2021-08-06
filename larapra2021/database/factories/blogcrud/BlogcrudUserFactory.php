<?php

namespace Database\Factories\blogcrud;

use App\Models\User;
use App\Models\blogcrud\BlogcrudUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BlogcrudUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogcrudUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, User::count()),
            'name' => $this->faker->name,
        ];
    }
}
