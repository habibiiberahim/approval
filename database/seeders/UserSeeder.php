<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//import user model to create account dummy
use App\Models\User;

//use Hash for encrypt password account
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Dummy User
        $user = User::create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('secret'),
            
        ]);
        $user->assignRole('user');

        $user = User::create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('secret'),
            
        ]);
        $user->assignRole('user');
       
        $user = User::create([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('secret'),
            
        ]);
        $user->assignRole('user');
        
       

        // Cretae Dummy Admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            
        ]);

        $admin->assignRole('admin');


        // Create Supervisor Dummy
        $supervisor = User::create([
            'name' => 'supervisor1',
            'email' => 'supervisor1@example.com',
            'password' => Hash::make('secret'),
        
        ]);
        $supervisor->assignRole('supervisor');

        $supervisor = User::create([
            'name' => 'supervisor2',
            'email' => 'supervisor2@example.com',
            'password' => Hash::make('secret'),
        
        ]);
        $supervisor->assignRole('supervisor');

        $supervisor = User::create([
            'name' => 'supervisor3',
            'email' => 'supervisor3@example.com',
            'password' => Hash::make('secret'),
        
        ]);
        $supervisor->assignRole('supervisor');


        // give role to account user
       
     
       
      
        
    }
}
