<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');


        $randomArticles = Article::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);

        if(request('search')) {
            $articles = Article::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function (Builder $query) use ($search) {
                    $query->where('title', 'LIKE', "%{$search}%");
                })
                ->paginate(6);
        } else {
            $articles = Article::paginate(6);
        }

        return view('blog.article.index', compact('articles', 'randomArticles', 'likedPosts'));
    }

    public function show(Article $article)
    {
        $relatedArticles = Article::where('category_id', $article->category_id)->where('id', '!=', $article->id)->take(3)->get();
        $date = Carbon::parse($article->created_at)->locale('us');

        return view('blog.article.show', compact('article', 'date', 'relatedArticles'));
    }
}
