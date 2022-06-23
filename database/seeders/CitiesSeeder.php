<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use File;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/data/cities.json');
        $citiesAndStatesAbbr = json_decode($json);

        foreach ($citiesAndStatesAbbr as $key => $value) {
            DB::table('cities')->insert([
                'name' => $value->name,
                'state_abbreviated' => $value->stateAbbr
            ]);
        }      
    }
}
