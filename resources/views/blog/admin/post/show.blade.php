@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('Post show') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img src="{{ url('storage/'.$post->image) }}" class="product-image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $post->title }}
                            <a href="{{ route('blog.admin.post.edit', $post->id) }}" role="button" data-bs-toggle="button">
                                <i class="fas fa-pencil-alt text-lg px-1"></i>
                            </a>
                        </h3>

                        <hr>
                        <h4>{{ __('Tags') }}</h4>
                            @foreach($post->tags as $tag)
                                <a class="btn btn-primary" href="#" role="button">{{ $tag->title}}</a>
                            @endforeach
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! $post->content !!}</div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
