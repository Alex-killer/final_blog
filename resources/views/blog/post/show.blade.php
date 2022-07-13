@extends('blog.layouts.master')
@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $post->user->name }} • {{ $date->translatedFormat('j F Y') }} • {{ $post->comments->count() }} {{ __('Comments') }}</p>
        <section class="blog-post-featured-img text-center" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ url('storage/'.$post->image) }}" alt="featured image" class="w-90">
{{--            <img src="{{ $post->image }}" alt="featured image" class="w-90">--}}
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <section class="post-content">
            <div class="col-lg-9 mx-auto" data-aos="fade-up">
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
                </div>
            @endguest
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">{{ __('Related Posts') }}</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ url('storage/'.$relatedPost->image) }}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relatedPost->category->title }}</p>
                            <h5 class="post-title"><a href="{{ $relatedPost->id }}">{{ $relatedPost->title }}</a></h5>
                        </div>
                        @endforeach
                    </div>
                </section>
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">{{ __('Comments') }} ({{ $post->comments->count() }})</h2>
                    @if($post->comments->count() > 0)
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
                    @else
                        <h3 class="font-weight-light text-secondary text-center" data-aos="fade-up">{{ __('No comments yet') }}</h3>
                    @endif
                        @auth
                    <form action="{{ route('blog.post.comment.store', $post->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="description" class="sr-only">{{ __('Comment') }}</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Comment" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="{{ __('Send Message') }}" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                    @endauth
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
