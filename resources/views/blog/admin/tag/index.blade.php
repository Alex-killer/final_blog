@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('All tags') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Tags') }}</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('blog.admin.tag.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}.</td>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td class="project-actions text-center">
                        <a href="{{ route('blog.admin.tag.edit', $tag->id) }}" role="button" data-bs-toggle="button">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form method="POST" action="{{ route('blog.admin.tag.destroy', $tag->id) }}" style="display: inline-block">
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
        @if($tags_count >= 10)
        <div class="card-footer clearfix">
            <div class="pagination pagination-sm m-0 float-right">
                {{ $tags->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
