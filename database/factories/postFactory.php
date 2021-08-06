<?php

namespace Database\Factories;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class postFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText($maxNbChars = 50, $indexSize = 2);
        return [

                'title' => $title,
                'slug' => Str::slug($title),
                'body' => $this->faker->text(),
                'image' => $this->faker->imageUrl(640 ,480),
        ];
    }
}
