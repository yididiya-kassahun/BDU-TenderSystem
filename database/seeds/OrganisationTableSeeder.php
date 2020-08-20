<?php

use Illuminate\Database\Seeder;
use App\Organisation;

class OrganisationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $org = new Organisation();
        $org->org_id = '1';
        $org->org_name = 'Bahir Dar University';
        $org->org_city = 'Bahir Dar';
        $org->save();

    }
}
