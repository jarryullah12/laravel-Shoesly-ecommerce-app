<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $membershipTypes = ['Basic', 'Bronze', 'Silver', 'Gold', 'Premium'];
        $statuses = ['Active', 'Inactive', 'Pending'];
        
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'membership_type' => $this->faker->randomElement($membershipTypes),
            'points' => $this->faker->numberBetween(0, 5000),
            'joined_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}