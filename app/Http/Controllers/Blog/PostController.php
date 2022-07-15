<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $randomPosts = Post::get()->random(4);
        $likedPost = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $categories = Category::first()->get();

        if(request('search')) {
            $posts = Post::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function (Builder $query) use ($search) {
                    $query->where('title', 'LIKE', "%{$search}%");
                })
                ->paginate(6);
        } else {
            $posts = Post::paginate(6);
    }



        return view('blog.post.index', compact('posts', 'randomPosts', 'likedPost', 'categories'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(3)->get();
        $date = Carbon::parse($post->created_at)->locale('us');

        return view('blog.post.show', compact('post', 'relatedPosts', 'date'));
    }
}
