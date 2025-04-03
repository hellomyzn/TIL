<?php

namespace Database\Factories\Simplenote;

use App\Models\User;
use App\Models\simplenote\SimplenoteUser;
use App\Models\simplenote\SimplenoteMemo;
use App\Models\simplenote\SimplenoteTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SimplenoteMemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimplenoteMemo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => '<p>' . implode("</p><p>",  [$this->faker->paragraph(12)]) . '</p>',
            'simplenote_user_id' => rand(1, SimplenoteUser::count()),
            'simplenote_tag_id' => rand(1, SimplenoteTag::count()),
            'status' => 1
        ];
    }
}
