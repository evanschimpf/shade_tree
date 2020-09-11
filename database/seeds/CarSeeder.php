<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'user_id' => '1',
            'description' => 'My Miata!',
            'year' => 1996,
            'make' => 'Mazda',
            'model' => 'Miata',
            'sub_model' => 'base',
            'engine' => '1.8',
            'mileage' => '100000'
        ]);

        DB::table('cars')->insert([
            'user_id' => '2',
            'description' => 'My Mazda3!',
            'year' => 2004,
            'make' => 'Mazda',
            'model' => 'Mazda3',
            'sub_model' => 'S',
            'engine' => '2.3',
            'mileage' => '170000'
        ]);
    }
}
