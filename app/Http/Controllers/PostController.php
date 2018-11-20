<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use App\Tag;
use Auth;

class PostController extends Controller
{
    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $tags = Tag::all();
        return response()->json(array(
            'code'      =>  200,
            'posts'   =>  $posts,
            'tags'=> $tags,
        ));
    }

    public function getPost(Request $request)
    {
        \Log::info('This is Id: '.$request->id);
        $id= $request->id;

        $post = Post::where('id', $id)->with('likes')->first();
        $Tlikes = count($post->likes);
        $tags = Tag::all();
        return response()->json(array(
            'code'      =>  200,
            'post'   =>  $post,
            'Tlikes'=> $Tlikes,
        ));
    }


    public function getLikePost(Request $request)
    {
        $id= $request->id;
        $post = Post::find($id);
        $like = new Like();
        $post->likes()->save($like);
        $Tlikes = count($post->likes);

        return response()->json(array(
            'code'      =>  200,
            'Tlikes'=> $Tlikes,
            
        ));
        
    }
 
    public function postAdminCreate(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post([
            'title'=> $request->input('title'),
            'content'=> $request->input('content')

        ]);
        // $user->posts()->save($post);
        $post->save();
        
        $post->tags()->attach($request->input('tags') === null ? [] : $request->tags );
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json([
            'message' => 'Post has been added successfully!',
            'posts'=> $posts,
        ],200);
       
    }

    public function getAdminDelete(Request $request)
    {
        // if (Gate::denies('manipulate-post', $post)) {
        //     return redirect()->back();
        // }
        $id= $request->id;
        $post = Post::find($id);
        $post->likes()->delete();
        $post->tags()->detach();
        $post->delete();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json([
            'message' => 'Post has been Deleted !!!',
            'posts'=> $posts,
        ],200);
    }
}
