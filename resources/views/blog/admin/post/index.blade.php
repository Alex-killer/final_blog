@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('All posts') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Posts') }}</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('blog.admin.post.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
            </div>
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
                    <th>{{ __('Create') }}</th>
                    <th class="text-center" style="width: 15%">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}.</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td class="project-actions text-center">
                        <a href="{{ route('blog.admin.post.edit', $post->id) }}" class="btn btn-info btn-sm" role="button" data-bs-toggle="button">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form method="POST" action="{{ route('blog.admin.post.destroy', $post->id) }}" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                <i class="fas fa-trash">
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
        @if($posts_count >= 10)
        <div class="card-footer clearfix">
            <div class="pagination pagination-sm m-0 float-right">
                {{ $posts->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
