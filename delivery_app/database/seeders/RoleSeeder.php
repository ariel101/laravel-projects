<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name'=>'admin']);
        $client = Role::create(['name'=>'client']);
        $driver = Role::create(['name'=>'driver']);

        //permiso para admin
        $permission_read_products = Permission::create(['name'=>'read products']);
        $permission_create_products = Permission::create(['name' => 'create products']);
        $permission_update_products = Permission::create(['name' => 'update products']);
        $permission_delete_products = Permission::create(['name' => 'delete products']);
        $permission_manage_users = Permission::create(['name'=>'manage users']);
        $permission_manage_orders = Permission::create(['name'=>'manage orders']);
        $permission_view_reports = Permission::create(['name'=>'view reports']);


        //permisos cliente
        $permission_create_orders = Permission::create(['name'=>'create orders']);
        $permission_view_own_orders = Permission::create(['name'=>'view own orders']);
        $permission_update_profile = Permission::create(['name'=>'update profile']);
        $permission_view_order_history = Permission::create(['name'=>'view order profile']);


        //permisos drivers
        $permission_view_asigned_orders = Permission::create(['name'=>'view order asigned']);
        $permission_update_order_status = Permission::create(['name'=>'update order status']);
        $permission_view_detail_client = Permission::create(['name'=>'view detail client']);
        $permission_confirm_delivery = Permission::create(['name'=>'confirm delivery']);
        $permission_access_delivery_routes = Permission::create(['name'=>'access delivery routes']);

        $permission_admin = [$permission_read_products, $permission_create_products, $permission_update_products, $permission_delete_products, $permission_manage_users, $permission_manage_orders, $permission_view_reports];

        $permission_client = [$permission_create_orders, $permission_view_own_orders, $permission_update_profile, $permission_view_order_history];

        $permission_driver = [$permission_view_asigned_orders, $permission_update_order_status, $permission_view_detail_client, $permission_confirm_delivery, $permission_access_delivery_routes];

        $admin->syncPermissions($permission_admin);
        $client->syncPermissions($permission_client);
        $driver->syncPermissions($permission_driver);
    }
}
