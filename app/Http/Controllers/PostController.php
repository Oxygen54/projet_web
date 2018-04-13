<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Like;
use App\Post;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', ['posts' => $posts]);

    }

    public function getLikes(){
        return $this->hasMany('app\Like')->count();
    }

    public function likePost(Request $request){
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;

        $post = Post::find($post_id);

        if(!$post){
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();

        if ($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
               $like->delete();
               return null;
            }
        } else {
            $like = new Like();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;

        if ($update){
            $like->update();
        } else {
            $like->save();
        }

        return null;
    }

    public function CreatePost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        $post->title = $request['title_idea'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('home')->with(['message' => $message]);
    }
}
