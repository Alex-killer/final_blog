@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('All Articles') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Articles') }}</h3>
            <div></div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('blog.admin.article.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                    <th  style="width: 25%">{{ __('Content') }}</th>
                    <th>{{ __('Category') }}</th>
                    <th>{{ __('Create') }}</th>
                    <th class="text-center">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                <tr>
                    <td>{{ $article->id }}.</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ Str::limit($article->description, 50) }}</td>
                    <td>{{ $article->category->title }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td class="project-actions text-center">
                        <a href="{{ route('blog.admin.article.show', $article->id) }}" role="button" data-bs-toggle="button">
                            <i class="fas fa-eye text-success px-1"></i>
                        </a>
                        <a href="{{ route('blog.admin.article.edit', $article->id) }}" role="button" data-bs-toggle="button">
                            <i class="fas fa-pencil-alt px-1"></i>
                        </a>
                        <form method="POST" action="{{ route('blog.admin.article.destroy', $article->id) }}" style="display: inline-block">
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
        @if($articles_count >= 10)
        <div class="card-footer clearfix">
            <div class="pagination pagination-sm m-0 float-right">
                {{ $articles->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
