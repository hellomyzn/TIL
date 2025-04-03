<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgs = [
            'https://c1.staticflickr.com/4/3851/14948376317_a97232356c_z.jpg',
            'https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1502630859934-b3b41d18206c?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1498471731312-b6d2b8280c61?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1515023115689-589c33041d3c?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1504214208698-ea1916a2195a?w=500&h=500&fit=crop',
            'https://images.unsplash.com/photo-1515814472071-4d632dbc5d4a?w=500&h=500&fit=crop',
          ];

        return [
            'user_id' => User::factory()->create()->id,
            'description' => 'looks greate',
            'img_url' => $imgs[rand(0, 8)],
        ];
    }
}
