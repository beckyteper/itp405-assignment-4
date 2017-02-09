<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TwitterController extends Controller
{
    public function create() {
        $tweets = DB::table('tweets')
            ->orderBy('id', 'DESC')
            ->get();

        return view('create', [
            'tweets' => $tweets
        ]);
    }

    public function store(Request $request) {
        $validation = Validator::make($request->all(),
        [
            'tweet' => 'required|max:140'
        ]);

        if ($validation->passes()) {
            DB::table('tweets')->insert([
                'tweet' => request('tweet')
            ]);

            return redirect('/')
                ->with('successStatus', 'Tweet was successfully created!');
        } else {
            return redirect('/')
                ->withErrors($validation);
        }
    }

    public function destroy($tweetID) {
        DB::table('tweets')
            ->where('id', '=', $tweetID)
            ->delete();

        return redirect('/')
            ->with('successStatus', 'Tweet was successfully deleted!');
    }

    public function singleTweet($tweetID) {
        $tweets = DB::table('tweets')
            ->where('id', '=', $tweetID)
            ->get();

        return view('singleTweet', [
            'tweetID' => $tweetID,
            'tweets' => $tweets
        ]);
    }
}
