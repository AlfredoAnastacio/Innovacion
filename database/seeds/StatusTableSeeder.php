<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            ['user_id' => 1, 'state' => 'Activo', 'range' => 1]
        ]);
    }
}
