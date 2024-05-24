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
        $logos = [
            'https://via.placeholder.com/150/2c3e50/ffffff?text=Project+A',
            'https://via.placeholder.com/150/34495e/ffffff?text=Project+B',
            'https://via.placeholder.com/150/7f8c8d/ffffff?text=Project+C',
            'https://via.placeholder.com/150/16a085/ffffff?text=Project+D',
            'https://via.placeholder.com/150/2980b9/ffffff?text=Project+E',
        ];

        $client = \App\Models\User::role('client')->inRandomOrder()->first();

        return [
            'client_id' => $client->id,
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(40),
            'due_date' => $this->faker->dateTimeBetween('+1 week', '+2 months'),
            'status' => $this->faker->randomElement(['in progress', 'completed', 'pending']),
            'logo' => $this->faker->randomElement($logos),
        ];
    }
}
