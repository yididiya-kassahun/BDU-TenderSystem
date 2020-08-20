<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super = new Role();
        $role_super->name = 'Super_admin';
        $role_super->description ='A Super Administrator';
        $role_super->save();

        $role_po = new Role();
        $role_po->name = 'po';
        $role_po->description ='A Procurement officer';
        $role_po->save();

        $role_coc = new Role();
        $role_coc->name = 'coc';
        $role_coc->description ='A Committe Chair';
        $role_coc->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description ='A System manager';
        $role_manager->save();
    }
}
