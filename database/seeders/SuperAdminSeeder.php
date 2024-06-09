<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
            'password' => Hash::make("1234567890") ,

        ]);

        $profilePicturePath = $this->uploadProfilePicture('C:/Users/ayaqa/Downloads/chuuya.jpg');
        $director->profile_picture = $profilePicturePath;
        $director->save();

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

    private function uploadProfilePicture($path)
{
    // Generate a unique file name
    $fileName = uniqid('profile_', true) . '.' . pathinfo($path, PATHINFO_EXTENSION);

    // Upload the file to storage using the public disk
    Storage::disk('public')->putFileAs('profile_pictures', new \Illuminate\Http\File($path), $fileName);

    // Return the file path
    return 'profile_pictures/' . $fileName;
}


}
