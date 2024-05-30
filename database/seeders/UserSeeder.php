<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'is_admin' => true
        ]); //vedere come fare degli utenti 
        User::factory()->create([
            'name' => 'TestUser',
            'email' => 'test@user.com',
            'password' => Hash::make('testuser')
        ]); //vedere come fare degli utenti 

        User::factory(10)->create();
    }
}
