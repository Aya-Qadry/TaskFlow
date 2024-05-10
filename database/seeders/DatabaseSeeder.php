<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Director
        $user = User::create([
            'name' => 'aya' , 
            'email' => 'aya@gmail.com',
            'password' => Hash::make('1234567890') 
        ]);

        $role = Role::create([
            'name' => 'director' 
        ]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

    }
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'project-list',
        'project-create',
        'project-edit',
        'project-delete'
    ];





}
