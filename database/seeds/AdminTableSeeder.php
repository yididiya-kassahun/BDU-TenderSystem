<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','Super_admin')->first();

        $user = new User();
        $user->first_name = 'Mahder';
        $user->last_name = 'yeshiwas';
        $user->gender = 'F';
        $user->email = 'mahder@gmail.com';
        $user->phone_num = '0923433244';
        $user->org_id = '1';
        $user->password =bcrypt('1234');
        $user->save();
        $user->roles()->attach($role_admin);
    }
 }
