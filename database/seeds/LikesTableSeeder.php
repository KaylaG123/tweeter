<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')
            ->insert([
                [
                    'user_id' => 1,
                    'tweet_id' => 5
                ],
                [
                    'user_id' => 2,
                    'tweet_id' => 6
                ],
                [
                    'user_id' => 3,
                    'tweet_id' => 10
                ],
                [
                    'user_id' => 4,
                    'tweet_id' => 8
                ],
                [
                    'user_id' => 2,
                    'tweet_id' => 5
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 9
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 8
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 6
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 1
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 2
                ]

            ]);
    }
}
