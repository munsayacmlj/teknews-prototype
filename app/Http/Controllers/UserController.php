<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\UserDetail;
use App\Follower;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers() {
    	$all_users = User::all();
        $f = Follower::select('follow_id')->where('user_id', Auth::user()->id)->get();
        $following = [];
        foreach ($f as $value) {
            array_push($following, $value->follow_id);
        }

        $user = str_replace(" ", "-", strtolower(Auth::user()->name));
    	return view('/pages/people', compact('all_users', 'user', 'f'))->with('following', $following);
    }

    public function userPreview($name) {
        // dd($name);
        $origName = str_replace("-", " ", $name);
        $origName = ucwords($origName);
    	$profile = User::where('name', $origName)->first();
        $user = str_replace(" ", "-", strtolower(Auth::user()->name));
        $f = Follower::select('follow_id')->where('user_id', Auth::user()->id)->get();
        $following = [];
        foreach ($f as $value) {
            array_push($following, $value->follow_id);
        }
        // $activities = Activity::with('subject', 'causer')->get();
        $activities = Activity::where('causer_id', $profile->id)->get();
    	return view('/pages/person', compact('profile', 'user', 'origName', 'activities'))->with('following', $following);
    }

    public function editUserForm($name) {
        $profile = User::find(Auth::user()->id);
        $user = str_replace(" ", "-", strtolower(Auth::user()->name));
        return view('/pages/edit_profile', compact('profile', 'details', 'user'));
    }

    public function updateUser(Request $request, $name) {

        $profile = User::find(Auth::user()->id);
        $profile->name = $request->name;
        $profile->userDetail->age = $request->age;
        $profile->userDetail->gender = $request->gender;
        $profile->userDetail->location = $request->location;
        $profile->userDetail->bio = $request->bio;

        if ($request->delete_image) {
            $image_path = public_path() . '\\storage\\upload\\user_avatar\\' . $profile->userDetail->avatar;
            unlink($image_path);
            $profile->userDetail->avatar = "";
        }

        if ($request->hasFile('avatar')) {
            if (!empty($profile->userDetail->avatar)) {
                $image_path = public_path() . '\\storage\\upload\\user_avatar\\' . $profile->userDetail->avatar;
                unlink($image_path);
            }

            $filename = $request->file('avatar')->getClientOriginalName();

            $request->file('avatar')->storeAs('public/upload/user_avatar', $filename);

            $profile->userDetail->avatar = $filename;
        }

        $profile->save();
        $profile->userDetail->save();

        $request->session()->flash('status', 'Profile updated.');

        $user = str_replace(" ", "-", strtolower(Auth::user()->name));
        $url = "people/".$user."/edit";
        return redirect($url);
    }

    public function viewActivities(Request $request) {
        // return $request->id;
        $posts = Post::where('user_id', $request->id)->get();
        $comments = Comment::where('user_id', $request->id)->get();

        // activity()->log('Look, I logged something');
        // return response()->json(
        //     [
        //         'posts' => $posts,
        //         'comments' => $comments
        //     ]);
        // return Activity::all();
    }
}
