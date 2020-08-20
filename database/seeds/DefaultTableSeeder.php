<?php

use Illuminate\Database\Seeder;
use App\Defaults;

class DefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default = new Defaults();
        $default->status = 'Not Uploaded';
        $default->save();
    }
}
