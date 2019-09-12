<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Comment;
use App\Like;
use App\User;
use App\Profile;
use Auth;
use Illuminate\Support\Facades\Session;

class TweetController extends Controller
{

    // public function __construct() {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $following = Auth::user()->followings()->pluck('id')
                                                ->toArray();


        $tweets = \App\Tweet::whereIn('user_id', $following)
                                ->get();

        $tweets = \App\Tweet::latest()->paginate(10);
            return view('tweets/index', compact('tweets'));
    }

    public function list()
    {
        $tweets = \App\Tweet::whereIn('user_id', $following)
                                ->get();
        // $tweets = \App\Tweet::latest()->get();
         return view($tweets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tweets/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|max:500'
        ]);

        // new tweet object
        $tweet = new \App\Tweet;

        // set some properties
        $tweet->body = $request->body;
        $tweet->user_id = Auth::user()->id;

        // save, redirect to show view
        if($tweet->save()) {
            $request->Session()->flash('alert alert-success', 'message', 'Post created!');
            return redirect('/tweets/' . $tweet->id);
        } else {
            $request->Session()->flash('alert alert-danger', 'message', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tweet = \App\Tweet::find($id);
            return view('tweets/show', compact('tweet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tweet = \App\Tweet::find($id);
        $edit = \App\Tweet::where('user_id', Auth::id())
                            ->where('id', $id)
                            ->get();
        return view('tweets/edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tweet = \App\Tweet::find($id);

        $tweet->body = $request->body;

        if($tweet->save()) {
            return redirect('/tweets/' . $tweet->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing = \App\Tweet::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->delete();
        if($existing) {
            $delete = \App\Tweet::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->delete();
            if($existing)
                return redirect('/tweets/');
        }

        $delete = new \App\Tweet;
        $delete->users_id = Auth::id();
        $delete->id = $id;

        if($delete->save()) {
            return back();
        }

        dd('ERROR');
    }

    // public function likeTweet(Request $request){
    //     $tweet_id = $request['tweet_id'];
    //     $is_like = $request['isLike'] === 'true';
    //     $update = false;
    //     $tweet = Tweet::find($tweet_id);
    //
    //     if (!$tweet) {
    //         return null;
    //     }
    //
    //     $user = Auth::user();
    //     $like = $user->likes()->where('tweet_id', $tweet_id)->first();
    //     if($like) {
    //         $already_like = $like->like;
    //         $update = true;
    //         if ($already_like == $is_like) {
    //             $like->delete();
    //             return null;
    //         }
    //     } else {
    //         $like = new Like();
    //     }
    //
    //     $like->like = $is_like;
    //     $like->user_id = $user->id;
    //     $like->tweet_id = $tweet->id;
    //
    //     if($update) {
    //         $like->update();
    //     } else {
    //         $like->save();
    //     }
    //     return null;
    // }

    public function like($id)
    {
        $userId = Auth::id();


        $like = new \App\Like;
        $like->user_id = Auth::id();
        $like->tweet_id = $id;

        if($like->save()) {
            return json_encode([
                'status' => 'success'
            ]);
        }
            return json_encode([
                'status' => 'success'
            ]);
    }

    public function unlike($id)
    {
        $like = \App\Like::where('tweet_id', $id )
                            ->where('user_id', Auth::id())
                            ->first();
        if($like->delete()) {
            return json_encode([
                'status' => 'success'
            ]);
        }
            return json_encode([
                'status' => 'success'
            ]);
    }

    // public function like($id)
    // {
    //     // Check for exisiting like
    //     $existing = \App\Like::where('user_id', Auth::id())
    //                             ->where('tweet_id', $id)
    //                             ->count();
    //     if($existing) {
    //         $delete = \App\Like::where('user_id', Auth::id())
    //                             ->where('tweet_id', $id)
    //                             ->delete();
    //         if($delete)
    //             return back();
    //     }
    //
    //     $like = new \App\Like;
    //     $like->user_id = Auth::id();
    //     $like->tweet_id = $id;
    //
    //     if($like->save()) {
    //         return back();
    //     }
    //
    //     dd("ERROR");
    // }
}
