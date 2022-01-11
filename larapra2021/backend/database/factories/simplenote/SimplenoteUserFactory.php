<?php

namespace Database\Factories\Simplenote;

use App\Models\User;
use App\Models\simplenote\SimplenoteUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimplenoteUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimplenoteUser::class;

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
