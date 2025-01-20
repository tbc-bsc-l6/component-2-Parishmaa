<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'user'];

        foreach ($roles as $role) {
            // Use Spatie's Role model to create roles
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }
    }
}
