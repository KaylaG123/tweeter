<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Reponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Tweet;
use App\Comment;
use App\Like;
use App\LikeableTrait;
use App\User;
use App\Profile;
use Auth;

class ProfileController extends Controller
{

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
        $this->middleware('auth')->only(['edit', 'update']);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = \App\User::get();
        $tweets = \App\Tweet::all();
        $comments = \App\Comment::all();
        return view('profile.index' ,compact('tweets', 'comments', 'user'));
        // $users = \App\User::all();
        // return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // new profile
        $profile = new \App\Profile;

        // set some properties

        $profile->user_id = Auth::user()->id;
        $profile->avatar = $request->avatar;
        $profile->location = $request->location;
        $profile->birthday = $request->birthday;
        $profile->bio = $request->bio;

        // save, redirect to show view
        if($profile->save()) {
            $request->Session()->flash('alert alert-success', 'message', 'Post created!');
            return redirect('/profile/' . $id);
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
        $profile = \App\Profile::find($id);
            return view('/profile/show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = \App\Profile::where('user_id', Auth::id())
                            ->first();
        return view('profile/edit', compact('profile'));
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
        $profile = \App\Profile::where('user_id', $id)->first();

        $file = $request->file('image');
        $profile->location = $request->location;
        $profile->birthday = $request->birthday;
        $profile->bio = $request->bio;
        $filename = time(). '.'.$request->file('image')->getClientOriginalExtension();
        if($file) {
            Storage::disk('local')->put('public/images/' . $filename, File::get($file));
        }
        $profile->avatar = $filename;

        if($profile->save()) {
            return redirect('/users/profile/' . $profile->user_id);
        }
    }

    public function getProfileImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing = \App\Profile::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->delete();
        if($existing) {
            $delete = \App\Profile::where('user_id', Auth::id())
                                ->where('id', $id)
                                ->delete();
            if($delete)
                return back();
    }
    $delete = new \App\Profile;
    $delete->users_id = Auth::id();
    $delete->id = $id;

    if($delete->save()) {
        return back();
    }

    dd('ERROR');

    }

    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data = auth()->user()->toggleFollow($user);
        return response()->json(['success' => $data]);
    }
}
