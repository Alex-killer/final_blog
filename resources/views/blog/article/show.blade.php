@extends('blog.layouts.master')
@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $article->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->translatedFormat('j F Y') }}</p>
        <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ url('storage/'.$article->image) }}" alt="featured image" height="600">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $article->description !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">{{ __('Related Articles') }}</h2>
                    <div class="row">
                        @foreach($relatedArticles as $relatedArticle)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ url('storage/'.$relatedArticle->image) }}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relatedArticle->category->title }}</p>
                            <h5 class="post-title"><a href="{{ $relatedArticle->title }}">{{ $relatedArticle->title }}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
