<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')
            ->insert([
                [
                    'user_id' => 1,
                    'location' => 'Calgary, AB',
                    'birthday' => '1994-11-01',
                    'bio' => 'I like chicken nuggets'
                ],
                [
                    'user_id' => 2,
                    'location' => 'Calgary, AB',
                    'birthday' => '1990-05-30',
                    'bio' => "My horse isn't slow, I am"
                ],

                [
                    'user_id' => 3,
                    'location' => 'Calgary, AB',
                    'birthday' => '1988-02-02',
                    'bio' => 'Cars and cats are great, people are not'
                ],

                [
                    'user_id' => 4,
                    'location' => 'Calgary, AB',
                    'birthday' => '1991-03-05',
                    'bio' => "I don't know the meaning of five minutes"
                ]
            ]);
    }
}
