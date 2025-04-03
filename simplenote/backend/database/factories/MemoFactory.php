<?php

namespace Database\Factories;

use App\Models\Memo;
use App\Models\User;
use App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\Factory;


class MemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Memo::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => '<p>' . implode("</p><p>",  [$this->faker->paragraph(12)]) . '</p>',
            'user_id' => rand(1, User::count()),
            'tag_id' => rand(1, Tag::count()),
            'status' => 1
        ];
    }
}
