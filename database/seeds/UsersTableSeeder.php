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
                'name'    => 'admin',
                'lastname' => 'admin',
                'username' => 'admin',
                'rol' => 1,
                'email' => 'admin@admin.com',
                'document' => 1,
                'telephone' => 1,
                'code_tree_lider' => 0,
                'code_tree_sponsor' => 0,
                'range' => 1,
                'state' => 'Activo',
                'sponsor_id' => 0,
                'tree_sponsor' => 1,
                'password' => '$2y$12$Wq6qJ.5OK9W9gU0P43052OjMFfihfH0i5qq7asxWXwpA.p1gQdUrq',
                'created_at' => '2021-04-30 06:36:24']
        ]);
    }
}
