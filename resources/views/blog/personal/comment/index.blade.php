@extends('blog.personal.layouts.personal-master')

@section('title')
    {{ __('All comments') }}
@endsection

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
                    <th >{{ __('Message') }}</th>
                    <th >{{ __('Post') }}</th>
                    <th style="width: 10%">{{ __('Create') }}</th>
                    <th class="text-center" style="width: 15%">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comment_posts as $comment_post)
                    <tr>
                        <td>{{ $comment_post->id }}.</td>
                        <td>{{ Str::limit($comment_post->description, 50) }}</td>
                        <td>{{ $comment_post->post->title }}.</td>
                        <td>{{ $comment_post->created_at }}</td>
                        <td class="project-actions text-center">
                            <a href="{{ route('blog.admin.category.edit', $comment_post->id) }}" role="button" data-bs-toggle="button">
                                <i class="fas fa-pencil-alt">
                                </i>
                            </a>
                            <form method="POST" action="{{ route('blog.admin.category.destroy', $comment_post->id) }}" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fas fa-trash text-danger" role="button px-1">
                                    </i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        @if(isset($comment_posts))
            <div class="card-footer clearfix">
                <div class="pagination pagination-sm m-0 float-right">
                    {{ $comment_posts->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection
