@extends('blog.layouts.master')
@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
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
                </div>
                @endforeach
            </div>
            <div class="row">
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
                    <h5 class="widget-title">Post List</h5>
                    <ul class="post-list">
                        <li class="post">
                            <a href="#!" class="post-permalink media">
                                <img src="assets/images/blog_widget_1.jpg" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                </div>
                            </a>
                        </li>
                        <li class="post">
                            <a href="#!" class="post-permalink media">
                                <img src="assets/images/blog_widget_2.jpg" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                </div>
                            </a>
                        </li>
                        <li class="post">
                            <a href="#!" class="post-permalink media">
                                <img src="assets/images/blog_widget_3.jpg" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                </div>
                            </a>
                        </li>
                        <li class="post">
                            <a href="#!" class="post-permalink media">
                                <img src="assets/images/blog_widget_4.jpg" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <img src="assets/images/blog_widget_categories.jpg" alt="categories" class="w-100">
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
