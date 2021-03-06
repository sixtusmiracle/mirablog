<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request; //? test case

        $newReply = $request->validate([
            'content' => 'required',
            'comment_id' => 'required',
        ]);

        $reply = new Reply();
        $reply->content = $newReply['content'];
        $reply->user_id = auth()->user()->id;
        $reply->comment_id = $newReply['comment_id'];
        $reply->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        // return $request; //? test case

        Reply::destroy($id);

        return redirect()->back();
    }
}
