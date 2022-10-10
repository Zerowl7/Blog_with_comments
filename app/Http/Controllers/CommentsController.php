<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CommentsController extends Controller
{
    public function store(Post $post, CommentsRequest $request)
    {
        $data = $request->validated();
        $comment = new Comment();

        $comment->post_id = $post->id;
        $comment->author = $data['author'];
        $comment->comment = $data['comment'];

        $comment->save();

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
