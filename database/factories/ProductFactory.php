<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $shoeTypes = [
            'Running Shoes', 'Sneakers', 'Basketball Shoes', 'Training Shoes',
            'Casual Shoes', 'Hiking Boots', 'Slip-ons', 'Loafers', 
            'Athletic Shoes', 'Walking Shoes'
        ];
        
        $brands = [
            'Nike', 'Adidas', 'Puma', 'Reebok', 'New Balance', 
            'Asics', 'Vans', 'Converse', 'Under Armour', 'Skechers'
        ];
        
        $shoeName = $this->faker->randomElement($brands) . ' ' . 
                   $this->faker->randomElement(['Air', 'Pro', 'Ultra', 'Max', 'Boost', 'Lite', 'Elite', 'Flex', 'Classic', 'Sport']) . ' ' .
                   $this->faker->randomElement($shoeTypes);
        
        $price = $this->faker->numberBetween(3000, 20000);
        
        // Create a shorter description
        $description = 'Premium ' . strtolower($this->faker->randomElement($shoeTypes)) . ' with ' .
                      $this->faker->randomElement(['cushioned insoles', 'breathable mesh', 'durable outsole', 'responsive midsole', 'arch support']) . '.';
        
        $baseImageName = strtolower(str_replace(' ', '-', $shoeName));
        $baseImageName = preg_replace('/[^a-z0-9\-]/', '', $baseImageName);
        
        return [
            'name' => $shoeName,
            'price' => $price,
            'description' => $description,
            'category' => 'shoes',
            'gallery' => $baseImageName . '-1.jpg',
            'gallery2' => $baseImageName . '-2.jpg',
            'gallery3' => $baseImageName . '-3.jpg',
        ];
    }
}