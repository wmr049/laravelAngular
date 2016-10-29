<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use App\Http\Requests;

class PostController extends Controller
{

    public function get()
    {
        $posts = App\Post::all();  
      
        return response()->success('posts', $posts);
    }
    
    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|string|min:10',
            'topic' => 'required|string',
        ]);

        $post = new Post;
        $post->name = $request->input('name');
        $post->topic = $request->input('topic');

        $post->save();

        return response()->success(compact('post'));
    }
    
}
