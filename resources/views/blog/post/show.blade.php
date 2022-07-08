@extends('blog.layouts.master')
@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $post->user->name }} • {{ $date->translatedFormat('j F Y') }} • {{ $post->comments->count() }} Comments</p>
        <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ $post->image }}" alt="featured image" class="w-90">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ $relatedPost->image }}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <h5 class="post-title"><a href="{{ $relatedPost->id }}">{{ $relatedPost->title }}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </section>
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    @foreach($post->comments as $comment)
                        <ul class="list-group list-group-flush mb-5">
                            <li class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><i class="fas fa-user text-info"></i> {{ $comment->user->name }}</h5>
                                    <small class="text-muted">{{ $comment->dateAsCarbon->diffForHumans() }}</small>
                                </div>
                                {{ $comment->description }}
                            </li>
                        </ul>
                    @endforeach
                    <form action="/" method="post">
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4" data-aos="fade-right">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                            </div>
                            <div class="form-group col-md-4" data-aos="fade-up">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="form-group col-md-4" data-aos="fade-left">
                                <label for="website" class="sr-only">Website</label>
                                <input type="url" name="website" id="website" class="form-control" placeholder="Website*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
