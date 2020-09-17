<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class SecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::update('ALTER TABLE roles AUTO_INCREMENT = 1');
        DB::table('permissions')->delete();
        DB::update('ALTER TABLE permissions AUTO_INCREMENT = 1');
        
        $adminRole = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin'
        ]);
        $rootPermission = Permission::create([
            'name' => 'All permissions',
            'slug' => 'root'
        ]);

        $adminRole->permissions()->attach($rootPermission);

        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user'
        ]);
        $shopPermission = Permission::create([
            'name' => 'Shop',
            'slug' => 'shop'
        ]);
        
        $userRole->permissions()->attach($shopPermission);
    }
}
