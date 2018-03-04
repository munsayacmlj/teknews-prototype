<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    // Make user one follow user 2 (does not check if already following)
    public function followsUser(Request $request, $name)
    {   
        // Find user with ID 1
        $user1 = Auth::user();

        // Find user with ID 2
        $user2 = User::find($request->userId);

        if ($user1 && $user2) {
            $user1->following()->save($user2);
        }
    }
    // Make user one unfollow user two
    public function unfollowUser(Request $request, $name){

    	$user1 = Auth::user()->id;
    	$user2 = $request->userId;

    	Follower::where('user_id', $user1)->where('follow_id', $user2)->delete();
    	
    }


    // Get all user two followers (if previous method run it should return user 1)
    public function userTwoFollowers()
    {
        // Find user with ID 2
        $user2 = User::find(2);

        if ($user2) {
            foreach ($user2->followers AS $follower) {
                echo $follower->username . "<br />";
            }
        }
    }
}
