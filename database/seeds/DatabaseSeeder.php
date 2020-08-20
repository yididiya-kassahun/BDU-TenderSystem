<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(FilesTableSeeder::class);
        //$this->call(DefaultTableSeeder::class);
        // $this->call(RoleTableSeeder::class);
        // $this->call(AdminTableSeeder::class);
       
    }
}
