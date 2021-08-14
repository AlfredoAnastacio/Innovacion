<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'sponsor_id' => 0,
                'contract' => 0,
                'name' => 'admin',
                'rol' => 1,
                'email' => 'admin@admin.com',
                'document' => 1,
                'telephone' => 1,
                'password' => '$2y$12$Wq6qJ.5OK9W9gU0P43052OjMFfihfH0i5qq7asxWXwpA.p1gQdUrq'
            ]
        ]);
    }
}
