@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('Article show') }}
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
                            <img src="{{ url('storage/'.$article->image) }}" class="product-image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $article->title }}
                            <a href="{{ route('blog.admin.article.edit', $article->id) }}" role="button" data-bs-toggle="button">
                                <i class="fas fa-pencil-alt text-lg px-1"></i>
                            </a>
                        </h3>

                        <hr>
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! $article->description !!}</div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
