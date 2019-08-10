<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'name' => 'Kayla',
                    'email' => 'kayla@something.com',
                    'password' => bcrypt('admin')
                ],
                [
                    'name' => 'Ally',
                    'email' => 'Ally@something.com',
                    'password' => bcrypt('admin')
                ],
                [
                    'name' => 'James',
                    'email' => 'james@something.com',
                    'password' => bcrypt('admin')
                ],
                [
                    'name' => 'Ahmmed',
                    'email' => 'ahmmed@something.com',
                    'password' => bcrypt('admin')
                ]

            ]);
    }
}
