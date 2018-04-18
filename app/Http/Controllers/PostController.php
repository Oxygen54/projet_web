<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Like;
use App\Post;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function idea(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('idea_box', ['posts' => $posts]);

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
            'title_idea' => 'required|max: 30',
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->title = $request['title_idea'];
        $post->body = $request['body'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('idea')->with(['message' => $message]);
    }

    public function DeletePost($post_id)
    {

        $this->authorize('delete', $post_id);

        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('idea')->with(['message' => 'Successfully deleted!']);
    }

    public function EditPost(Request $request)
    {

        $this->authorize('update', $request);

        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

}
