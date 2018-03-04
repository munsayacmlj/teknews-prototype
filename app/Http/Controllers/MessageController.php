<?php

namespace App\Http\Controllers;

use Auth;
use App\Topic;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use App\Events\MessagePosted;

class MessageController extends Controller
{
    public function viewChat() {
    	$topics = Topic::all();
		$user = str_replace(" ", "-", strtolower(Auth::user()->name));
	    return view('pages/groupchat', compact('topics', 'user'));
    }

    public function getMessages() {

    	// $message_time = Message::all();
    	// echo $message_time[0]->created_at->diffForHumans();
        $images = [];
        $msgs = Message::with('user')->get();

        foreach ($msgs as $msg) {
            array_push($images,$msg->user->userDetail->avatar);
        }

        // dd($images);
        return $msgs;
    	// return response()->json(['msgs' => $msgs, 'images' => $images ]);
    }

    public function saveMessages(Request $request) {

    	$user = Auth::user();

        $message = $user->messages()->create([
            'message' => request()->get('message')
        ]);


        // Announce that a new message has been posted

        broadcast(new MessagePosted($message, $user))->toOthers();

        return ['status' => 'OK'];
        // return redirect('/messages');
    }
}
