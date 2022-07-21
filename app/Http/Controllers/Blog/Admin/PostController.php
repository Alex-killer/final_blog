<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\Post\StoreRequest;
use App\Http\Requests\Blog\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts_count = Post::count();
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->orWhereHas('category', function (Builder $query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%");
            })
            ->paginate(10);

        return view('blog.admin.post.index', compact('posts', 'posts_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Post $post)
    {
        $input = $request->validated();
        if (isset($input['tag_ids']))
        $tagIds = $input['tag_ids'];
        unset($input['tag_ids']);
        $input['user_id'] = \Auth::user()->id;
        $input['image'] = Storage::disk('public')->put('/images/blog/post', $input['image']);

        $post = Post::create($input);
            if(isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }


        return redirect()->route('blog.admin.post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog.admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog.admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $input = $request->validated();
        if (isset($input['tag_ids']))
            $tagIds = $input['tag_ids'];
        unset($input['tag_ids']);
        $input['user_id'] = \Auth::user()->id;
        if (empty($input['image'])){
            $input['image'] = $post->image;
        } else {
            $input['image'] = Storage::disk('public')->put('/images/blog', $input['image']);
        }

        $post->update($input);
        if(isset($tagIds)) {
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('blog.admin.post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('blog.admin.post.index');
    }
}
