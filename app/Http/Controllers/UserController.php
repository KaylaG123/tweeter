<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use App\Comment;
use App\Like;
use App\User;
use App\Profile;
use Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function toggle(Request $request)
    {
        $user = User::find($request->user_id);
        $data = auth()->user()->toggleFollow($user);
        return response()->json(['success' => $data]);
    }
}
