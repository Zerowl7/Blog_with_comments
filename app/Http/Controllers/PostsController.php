<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index',[
           
            "posts" => Post::latest()->get(),

        ]);

    }

    public function create(){

        return view('posts.create');
    }
    public function store(PostsRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->text = $data['text'];
        $post->save();
        return redirect('/posts/'.$post->id);
    }

    public function show(Post $post)
    {
        
        return view('posts.show', [
            
            'post' => $post,
            'comments' => $post->comments()->paginate(5)
        
        
        ]);
    }


    

}
