<?php

namespace Database\Factories\simablog;

use App\Models\User;
use App\Models\simablog\SimablogUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SimablogUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimablogUser::class;

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
