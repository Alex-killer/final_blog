@extends('blog.layouts.master')
@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ __('Blog') }}</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{ url('storage/'.$post->image) }}" alt="blog post">
                    </div>
                    <a href="{{ route('blog.category.show', $post->category->id) }}">
                        <p class="blog-post-category">{{ $post->category->title }}</p>
                    </a>
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
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($randomPosts as $post)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
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
                                <div class="mb-3">
                                    <span>{{ $post->likedUsers->count('post_id') }}</span>
                                    <i class="far fa-heart"></i>
                                </div>
                            @endguest
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">Post Lists</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <figure class="carousel-item active">
                                    <img src="assets/images/blog_widget_carousel.jpg" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                    </figcaption>
                                </figure>
                                <figure class="carousel-item">
                                    <img src="assets/images/blog_7.jpg" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                    </figcaption>
                                </figure>
                                <div class="carousel-item">
                                    <img src="assets/images/blog_5.jpg" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                    </figcaption>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-post-list">
                    <h5 class="widget-title">{{ __('Popular posts') }}</h5>
                    <ul class="post-list">
                        @foreach($likedPost as $post)
                            <li class="post">
                                <a href="{{ route('blog.admin.post.show', $post->id) }}" class="post-permalink media">
                                    <img src="{{ url('storage/'.$post->image) }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
