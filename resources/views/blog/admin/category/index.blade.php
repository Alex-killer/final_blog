@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('All categories') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Categories') }}</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('blog.admin.category.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}.</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td class="project-actions text-center">
                        <a href="{{ route('blog.admin.category.edit', $category->id) }}" class="btn btn-info btn-sm" role="button" data-bs-toggle="button">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form method="POST" action="{{ route('blog.admin.category.destroy', $category->id) }}" style="display: inline-block">
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
        @if($categories_count >= 10)
        <div class="card-footer clearfix">
            <div class="pagination pagination-sm m-0 float-right">
                {{ $categories->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
