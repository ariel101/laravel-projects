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
        //
        $administrator = User::create([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $administrator->assignRole('admin');

        $client = User::create([
            'name' => 'client',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make('cliente')
        ]);

        $client->assignRole('client');
    }
}
