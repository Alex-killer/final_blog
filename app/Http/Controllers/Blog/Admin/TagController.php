<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Admin\Tag\StoreRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);
        $tags_count = Tag::all()->count();

        return view('blog.admin.tag.index', compact('tags', 'tags_count'));
    }

    public function create()
    {
        return view('blog.admin.tag.create');

    }

    public function store(StoreRequest $request, Tag $tag)
    {
        $input = $request->all();
        $tag->create($input);

        return redirect()->route('blog.admin.tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('blog.admin.tag.index');
    }
}
