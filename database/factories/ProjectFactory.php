<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = \App\Models\User::factory()->create();

        return [
            'client_id' => $user->id,
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(10),
            'due_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'status' => $this->faker->randomElement(['in progress', 'completed', 'pending']),
            'logo' => $this->faker->imageUrl(640, 480),  
        ];
    }
}
