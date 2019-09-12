<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'tweet_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }

    // public function likeIt()
    // {
    //     $like = new Like();
    //     $like->user_id = auth()->user()->id;
    //     $this->likes()->save($like);
    //     return $like;
    // }
    // public function likes()
    // {
    //     return $this->morphMany(Like::class, 'likable');
    // }
    // public function unlikeIt()
    // {
    //     //$like = Like::find($id);
    //     $this->likes()->where('user_id',auth()->id())->delete();
    // }
    // public function isLiked()
    // {
    //     return !!$this->likes()->where('user_id',auth()->id())->count();
    // }
}
