<?php

use Illuminate\Database\Seeder;
use App\file;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new file();
        $file->name = 'Paper of Buisness License';
        $file->save();

        $file = new file();
        $file->name = 'License Cerificate';
        $file->save();

        $file = new file();
        $file->name = 'Tax Certificate';
        $file->save();

        $file = new file();
        $file->name = 'Bid Bond guarantee';
        $file->save();

        $file = new file();
        $file->name = 'Business Registration Certificate';
        $file->save();

        $file = new file();
        $file->name = 'Tax Duty Impose';
        $file->save();
    }
}
