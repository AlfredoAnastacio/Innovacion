<?php

use Illuminate\Database\Seeder;

class RangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranges')->insert([
            ['range' => 'Plata', 'total_investment' => 15.00],
            ['range' => 'Oro', 'total_investment' => 60.00],
            ['range' => 'Platino', 'total_investment' => 150.00],
            ['range' => 'Diamante', 'total_investment' => 300.00],
            ['range' => 'Diamante Premium', 'total_investment' => 0.00],
        ]);
    }
}
