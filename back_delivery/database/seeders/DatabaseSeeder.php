<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Category;
use App\Models\Clients;
use App\Models\Drivers;
use App\Models\Menu;
use App\Models\Order_detail;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Restaurant_menu;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

            $this->call([
                RoleSeeder::class,
                UserSeeder::class,
                AdministratorSeeder::class,
                ClientsSeeder::class,
                DriversSeeder::class,
                OrdersSeeder::class,
                RestaurantSeeder::class,
                MenuSeeder::class,
                RestaurantMenuSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                OrderDetailSeeder::class
            ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'jose seguro',
        //     'email' => 'jose@gmail.com',
        // ]);
    }
}
