<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index()
    {

        $tweets = Tweet::latest()->get();

        return view('tweets.index')->with('tweets', auth()->user()->timeline());
    }

    public function store(Request $request){

        $messages = [
            'body.required' => 'Texto obligatorio',
            'body.max' => 'Máximo 255 caracteres'
        ];

        $attributes = $request->validate([
            'body' => 'required|max:255',
        ], $messages);


        $tweet = new Tweet();
        $tweet->user_id = Auth::id();
        $tweet->body = $request->body;

        $tweet->save();

        return redirect('/tweets');

    }

    public function destroy(Tweet $tweet){

        $tweet->delete();

        return redirect('/tweets');
    }
}
