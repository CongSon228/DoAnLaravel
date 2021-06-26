<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'proName'=>$this->faker->title,
            'price'=>$this->faker->word,
            'image'=>$this->faker->image(),
            'content'=>$this->faker->text($maxNbChar=250),
            'type_id'=>Type::all()->random()->id
        ];
    }
}
