<?php

namespace App\Http\Controllers;

use DB;
use File;
use App\Post;
use App\Topic;
use App\Comment;
use App\Follower;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PostController extends BaseController
{
  public function showAllPosts(Request $request) {
    $f = Follower::select('follow_id')->where('user_id', Auth::user()->id)->get();
    $following = [];
    foreach ($f as $value) {
      array_push($following, $value->follow_id);
    }
    $topics = Topic::all();
    $user = str_replace(" ", "-", strtolower(Auth::user()->name));

    if ($request->query('topic') != null) {
      $topic_name = $request->query('topic');
      $topic_id = Topic::where('topic', ucwords($topic_name))->get(['id']);
      $posts = Post::where('topic_id', $topic_id[0]['id'])->latest()->paginate(15);

      return view('pages/allposts', compact('posts', 'topics', 'user'))->with('following', $following)->with('topic_name', ucwords($topic_name));
    }
    elseif ($request->query('filter') != null){
      if (strtolower($request->query('filter')) == "trending") {
        $topic_name = "trending";
                // $posts = Post::with('comments')->get()->sortByDesc('comments')->paginate(15);
        $posts = Post::leftJoin('comments', 'posts.id', '=', 'comments.post_id')
        ->selectRaw('posts.*, count(comments.post_id) AS count')
        ->groupBy('posts.id', 'posts.title', 'posts.content', 'posts.image', 'posts.video', 'posts.user_id', 'posts.topic_id', 'posts.created_at', 'posts.updated_at')
        ->orderBy('count', 'DESC')
        ->paginate(15);
                // $posts = $posts->sortByDesc('comments');
                // dd($posts);
        return view('pages/allposts', compact('posts', 'topics', 'user'))->with('following', $following)->with('topic_name', ucwords($topic_name));
      }
    }
    else{
      $posts = Post::latest()->paginate(15);
            // $posts = $posts->paginate(15);
    }
    return view('pages/allposts', compact('posts', 'topics', 'user'))->with('following', $following)->with('topic_name', 'Most Recent');
  }

  public function showPost($id) {
    $post = Post::find($id);
    $topics = Topic::all();
    $user = str_replace(" ", "-", strtolower(Auth::user()->name));

    return view('pages/post', compact('post', 'topics', 'user'));
  }

  public function savePost(Request $request) {
    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content ? $request->content : '';
    $post->video = '';
    $post->user_id = Auth::user()->id;
    $post->topic_id = $request->topic_id;

    if ($request->hasFile('image')) {

      $filename = $request->file('image')->getClientOriginalName();
      /*
       * Upload the image to Storage::disk('uploads')
       */
      $request->file('image')->storeAs('post', $filename, 'uploads');

      $post->image = $filename;
    }
    else{
      $post->image = "";
    }
    $post->save();

    return redirect('/posts');
  }

  public function deletePost($id) {
    Comment::where('post_id', $id)->delete();
    Post::findOrFail($id)->delete();
    return redirect('/posts');
  }

  public function editPostForm(Request $request, $id) {
   $post = Post::find($id);
   $topics = Topic::all();
   $ip = $request->getClientIp();
   $user = str_replace(" ", "-", strtolower(Auth::user()->name));



   return view('pages/edit', compact('post', 'topics', 'ip', 'user'));
  }

  public function updatePost(Request $request, $id) {
    $post = Post::find($id);
    $post->title = $request->title;
    $post->content = $request->content;
    $post->topic_id = $request->topic;

    if ($request->delete_image) {
      if ( $post->hasImage() ) {
        $this->deleteImage($post->image);
        $post->image = "";
      }  
    }

    if ($request->hasFile('image')) {
      if ( $post->hasImage() ) {
        $this->deleteImage($post->image);
      }

      $filename = $request->file('image')->getClientOriginalName();
       /*
       * Upload the image to Storage::disk('uploads')
       */   
      $request->file('image')->storeAs('post', $filename, 'uploads');

      $post->image = $filename;
    }

    $post->save();

    $request->session()->flash('status', 'Post updated.');

    $url = "posts/".$id."/edit";
    return redirect($url);
  }

  public function showTopic(Request $request) {

    dd($request->query('topic'));
  }

  private function deleteImage($image_name) {
    $image_path = public_path() . '\\uploads\\post\\' . $image_name;
    unlink($image_path);
  }
}
