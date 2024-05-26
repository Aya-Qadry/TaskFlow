<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Hash ; 
use App\Models\User ; 
use Carbon\Carbon;

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

        $client = User::create([
            'name' => 'client' , 
            'email' => 'client@gmail.com',
            'password' => Hash::make("1234567890") ,
            'company' =>'Company'
        ]);

        $client->assignRole('client');

        $team_manager = User::create([
            'name' => 'manager' , 
            'email' => 'manager@gmail.com',
            'password' => Hash::make("1234567890") 
        ]) ; 
        
        $team_manager->assignRole('team_manager') ; 
 

        for ($i = 0; $i < 30; $i++) {
            $user = User::factory()->create([
                'name' => 'Client' . ($i + 1),
                'email' => 'client' . ($i + 1) . '@example.com',
                'company' => 'Company ' . ($i + 1),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

            $user->assignRole('client');
        }


 
    }
}
