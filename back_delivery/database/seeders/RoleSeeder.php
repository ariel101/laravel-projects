<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name' => 'admin']);
        $client = Role::create(['name' => 'client']);
        $driver = Role::create(['name' => 'driver']);

        $permission_read_products = Permission::create(['name' => 'read products']);
        $permission_create_products = Permission::create(['name' => 'create products']);
        $permission_update_products = Permission::create(['name' => 'update products']);
        $permission_delete_products = Permission::create(['name' => 'delete products']);


        $permission_admin = [$permission_read_products, $permission_create_products, $permission_update_products, $permission_delete_products];

        $permission_client = [$permission_read_products];

        $admin->syncPermissions($permission_admin);
        $client->syncPermissions($permission_client);
    }
}
