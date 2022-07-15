@extends('blog.personal.layouts.personal-master')
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $user_liked }}</h3>

                        <p>{{ __('Liked posts') }}</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-list"></i>
                    </div>
                    <a href="{{ route('blog.admin.category.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $comment_posts }}</h3>

                        <p>{{ __('Comment in posts') }}</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-paste"></i>
                    </div>
                    <a href="{{ route('blog.admin.post.index') }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
