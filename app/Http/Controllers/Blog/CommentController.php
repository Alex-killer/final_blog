<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreRequest $request, Comment $comment, Post $post)
    {
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;
        $input['post_id'] = $post->id;
        $comment->create($input);

        return redirect()->back();
    }
}
