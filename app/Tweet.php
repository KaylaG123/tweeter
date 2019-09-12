<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tweet extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // set a property to see if the tweet is liked by a user
    public function getLikedByUserAttribute()
    {
        $id = Auth::id();
        $like = $this->likes->first(function ($row) use ($id) {
            return $row->user_id === $id;
        });

        if($like) return true;
        return false;
    }

    public function getBelongsToUserAttribute()
    {
        return $this->user_id === Auth::id();
    }

    public function getFeed(User $user)
      {
          $following = Auth::user()->followings()->pluck('id')
                                                  ->toArray();

          $following = Auth::user()->followings()->lists('user_id');
          $userIds[] = $user->id;
          return \App\Tweet::whereIn('user_id', $userIds)->latest()->get();
      }
}
