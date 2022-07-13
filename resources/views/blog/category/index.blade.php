@extends('blog.layouts.master')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ __('Categories') }}</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{ route('blog.category.show', $category->id) }}">
                                    <img src="https://picsum.photos/id/56/1024/800" alt="blog post" >
                                </a>
                            </div>
                            <a href="{{ route('blog.category.show', $category->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $category->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                    <div class="mx-auto" style="margin-top: -100px; ">
                        {{ $categories->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
