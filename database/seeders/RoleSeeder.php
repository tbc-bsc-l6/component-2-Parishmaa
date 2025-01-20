<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= [
             [
                 'name' => 'admin',
                 'guard_name'=>'web'
             ],
             [
                 'name' => 'user',
                 'guard_name'=>'web'
             ]
         ];
        foreach ($roles as $key => $role) {
            # code...
            DB::table('roles')->insert([
                'name'=> $role['name'],
                'guard_name'=> $role['guard_name'],
            ]);
        }
    }
}
