<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Hash ; 
use App\Models\User ; 

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Director
        $director = User::create([
            'name' => 'aya' , 
            'email' => 'aya@gmail.com',
            'password' => Hash::make("1234567890") 
        ]);

        $director->assignRole('director');
        // $director->givePermissionTo(['create-project']);
        //maybe add the other users just to test
    }
}
