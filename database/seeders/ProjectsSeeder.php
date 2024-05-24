<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Project::count() === 0) {

            $clientRole = Role::findByName('client');

            $clientUsers = $clientRole->users;

            Project::factory(50)
                ->create()
                ->each(function ($project) use ($clientUsers) {
                    $project->client_id = $clientUsers->random()->id;
                    $project->save();
                });

            $this->command->info('Projects table seeded!');
        } else {
            $this->command->info('Projects table is not empty, skipping seeding.');
        }

    }
}
