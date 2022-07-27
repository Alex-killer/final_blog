@extends('blog.layouts.master')

@section('title')
    {{ __('Article') }}
@endsection

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ __('Blog') }}</h1>
        <section class="featured-posts-section">
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-5" data-aos="fade-up">
                    <form action="{{ route('blog.article.index') }}">
                        <div class="input-group">
                            <input name="search" type="search" class="form-control form-control-lg" placeholder="{{ __('Type your keywords here') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="featured-posts-section">
            <div class="row">
                @if($articles->isNotEmpty())
                    @foreach($articles as $article)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ url('storage/'.$article->image) }}" alt="blog post">
                        </div>
                        <a href="{{ route('blog.category.show', $article->category->id) }}">
                            <p class="blog-post-category">{{ $article->category->title }}</p>
                        </a>
                        <a href="{{ route('blog.post.show', $article->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{!! Str::limit($article->description, 80) !!}</h6>
                        </a>
                    </div>
                    @endforeach
                @else
                    <div class="col-md-12 fetured-post blog-post text-center mb-1" data-aos="fade-right">
                        <div class="blog-post-thumbnail-wrapper">
                            <h2 >{{ __('No articles found') }}</h2>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                <div class="mx-auto" style="margin-top: -100px; ">
                    {{ $articles->links() }}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($randomArticles as $article)
                        <div class="col-md-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ url('storage/'.$article->image) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ $article->category->title }}</p>
                            <a href="{{ route('blog.post.show', $article->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{!! Str::limit($article->description, 100) !!}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">{{ __('Articles') }}</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach($likedPosts as $key => $likedPost)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ url('storage/'.$likedPost->image) }}" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="{{ route('blog.post.show', $likedPost->id) }}">{!! Str::limit($likedPost->content, 50) !!}</a>
                                    </figcaption>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
