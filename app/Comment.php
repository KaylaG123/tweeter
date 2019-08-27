<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // public function __construct()
    // {
    //     $this->middleware('Auth:api');
    // }

    protected $fillable = ['body', 'user_id', 'tweet_id', 'gif'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweets()
    {
        return $this->belongsTo('App\Tweet');
    }
}
