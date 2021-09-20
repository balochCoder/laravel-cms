<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => $this->faker->word(3),
            'description' => $this->faker->sentence(4),
            'content' => $this->faker->paragraph(7),
            'image' => 'noimage.png',
            'published_at' => now(),
            'category_id'=>1

        ];
    }
}
