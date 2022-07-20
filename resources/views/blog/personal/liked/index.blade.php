@extends('blog.personal.layouts.personal-master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Comments') }}</h3>
        </div>
        <div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('Title') }}</th>
                    <th  style="width: 25%">{{ __('Content') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Create') }}</th>
                    <th class="text-center">{{ __('Likes') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($liked_posts as $liked_post)
                    <tr>
                        <td>{{ $liked_post->id }}.</td>
                        <td>{!! $liked_post->title !!}</td>
                        <td>{!! Str::limit($liked_post->content, 50) !!}</td>
                        <td>{{ $liked_post->category->title }}</td>
                        <td>{{ $liked_post->user->name }}</td>
                        <td>{{ $liked_post->created_at }}</td>
                        <td class="project-actions text-center">
                            <form method="POST" action="{{ route('blog.post.like.update', $liked_post->id) }}">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($liked_post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        @if(isset($liked_posts))
            <div class="card-footer clearfix">
                <div class="pagination pagination-sm m-0 float-right">
                    {{ $liked_posts->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
