<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\Article\StoreRequest;
use App\Http\Requests\Blog\Admin\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles_count = Article::count();
        $articles = Article::paginate(10);

        return view('blog.admin.article.index', compact('articles', 'articles_count'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('blog.admin.article.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $input = $request->validated();
        $input['image'] = Storage::disk('public')->put('/images/blog/article', $input['image']);

        $article = Article::create($input);


        return redirect()->route('blog.admin.article.show', $article->id);
    }

    public function show(Article $article)
    {
        return view('blog.admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('blog.admin.article.edit', compact('article', 'categories'));
    }

    public function update(UpdateRequest $request, Article $article)
    {
        $input = $request->validated();
        if (empty($input['image'])){
            $input['image'] = $article->image;
        } else {
            $input['image'] = Storage::disk('public')->put('/images/blog', $input['image']);
        }

        $article->update($input);

        return redirect()->route('blog.admin.article.show', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('blog.admin.article.index');
    }
}
