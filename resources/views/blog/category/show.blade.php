@extends('blog.layouts.master')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $category->title }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ url('storage/'.$post->image) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <a href="{{ route('blog.post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{!! Str::limit($post->content, 100) !!}</h6>
                            </a>
                            @auth()
                                <form method="POST" action="{{ route('blog.post.like.update', $post->id) }}">
                                    @csrf
                                    <span>{{ $post->liked_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    </button>

                                </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{ $post->likedUsers->count('post_id') }}</span>
                                    <i class="far fa-heart"></i>
                                </div>
                            @endguest
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="mx-auto" style="margin-top: -100px; ">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
        </div>

    </main>
@endsection
