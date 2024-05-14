<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'director']);
        $team_manager = Role::create(['name' => 'team_manager']);
        $client = Role::create(['name' => 'client']);

        $team_manager->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'list-project',
            'create-project',
            'edit-project',
            'delete-project'
        ]);

        $client->givePermissionTo([
            'create-project',
            'edit-project',
            'delete-project'
        ]);
    }
}
