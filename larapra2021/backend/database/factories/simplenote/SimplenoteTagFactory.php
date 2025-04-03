<?php

namespace Database\Factories\Simplenote;

use App\Models\Model;
use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimplenoteTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimplenoteTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'simplenote_user_id' => rand(1, SimplenoteUser::count()),
        ];
    }
}
