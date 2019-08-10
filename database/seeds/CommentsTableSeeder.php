<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')
            ->insert([
                [
                    'user_id' => 4,
                    'tweet_id' => 5,

                    'body' => 'This sucks',
                    'created_at'    =>  DB::raw('NOW()')
                ],
                [
                    'user_id' => 1,
                    'tweet_id' => 5,

                    'body' => 'Yeah it does',
                    'created_at'    =>  DB::raw('NOW()')
                ],
                [
                    'user_id' => 3,
                    'tweet_id' => 1,

                    'body' => "You're doing fine",
                    'created_at'    =>  DB::raw('NOW()')
                ],
                [
                    'user_id' => 2,
                    'tweet_id' => 3,
                    
                    'body' => 'Yay Horses!',
                    'created_at'    =>  DB::raw('NOW()')
                ]
            ]);
    }
}
