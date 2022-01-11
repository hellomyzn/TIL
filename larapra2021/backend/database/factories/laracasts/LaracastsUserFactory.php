<?php

namespace Database\Factories\laracasts;

use App\Models\User;
use App\Models\laracasts\LaracastsUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LaracastsUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaracastsUser::class;

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
            'username' => $this->faker->unique()->userName,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
