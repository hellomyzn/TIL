<?php

namespace Database\Factories\simablog;


use App\Models\simablog\SimablogPost;
use App\Models\simablog\SimablogUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimablogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SimablogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => '<p>' . implode("</p><p>",  [$this->faker->paragraph(12)]) . '</p>',
            'simablog_user_id' => rand(1, SimablogUser::count()),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }
}
