<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);


        return view('blog.post.index', compact('posts', 'randomPosts'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(3)->get();
        $date = Carbon::parse($post->created_at)->locale('us');

        return view('blog.post.show', compact('post', 'relatedPosts', 'date'));
    }
}
