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
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! $post->content !!}</div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
