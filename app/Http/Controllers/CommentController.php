<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;
use App\User;
use Auth;

class CommentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tweet_id)
    {
        $tweet = \App\Tweet::find($tweet_id);
        return view('comments.create', compact('tweet_id', 'tweet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//, $tweet_id)
    {
        $data = $request->validate([
            'body' => 'required|max:300',
            'tweet_id' => 'required'
        ]);

        $comment = new \App\Comment;
        $comment->user_id = Auth::id();
        $comment->tweet_id = $request->tweet_id;
        $comment->body = $request->body;



        if($comment->save()) {
            return redirect('/tweets/' . $comment->tweet_id);
        }
}

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
     public function show($id)
     {
         $comment = \App\Comment::find($id);

         return view('comments.show', compact('comment'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = \App\Comment::find($id);

        return view('comments.edit', compact('comment'));
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
        $comment = \App\Comment::find($id);
        $comment->body = $request->body;

        if($comment->save()) {
            return redirect('/tweets/' . $comment->tweet_id);
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
        $delete = \App\Comment::destroy($id);

        if($delete){
            return redirect('/tweets');
        }

        return back();
    }
}
