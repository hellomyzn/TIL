<?php

namespace Database\Factories\ilumukita;

use App\Models\User;
use App\Models\ilumukita\IlumukitaUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class IlumukitaUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = IlumukitaUser::class;

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
