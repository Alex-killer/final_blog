<?php

namespace App\Http\Controllers\Blog\Personal;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment_posts = Comment::where('user_id', Auth::id())->paginate(10);

        return view('blog.personal.comment.index', compact('comment_posts'));
    }
}
