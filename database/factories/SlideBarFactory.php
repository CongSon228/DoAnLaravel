<?php

namespace Database\Factories;

use App\Models\SlideBar;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideBarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SlideBar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slideName'=>$this->faker->name(),
            'title'=>$this->faker->title,
            'image'=>$this->faker->image(),
        ];
    }
}
