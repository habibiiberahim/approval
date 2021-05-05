<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//use model from spatie to create role model user
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
        //create 3 role can be use for user model ex: admin, user, supervisor
        $admin = Role::create(['name'=>'admin']);
        $user = Role::create(['name'=>'user']);
        $supervisor = Role::create(['name'=>'supervisor']);

    }
}
