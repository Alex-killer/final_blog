@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('All users') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Users') }}</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ route('blog.admin.user.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Create') }}</th>
                    <th class="text-center" style="width: 15%">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}.</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="project-actions text-center">
                        <a href="{{ route('blog.admin.user.edit', $user->id) }}" role="button" data-bs-toggle="button">
                            <i class="fas fa-pencil-alt">
                            </i>
                        </a>
                        <form method="POST" action="{{ route('blog.admin.user.destroy', $user->id) }}" style="display: inline-block">
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
        @if($users_count >= 10)
        <div class="card-footer clearfix">
            <div class="pagination pagination-sm m-0 float-right">
                {{ $users->links() }}
            </div>
        </div>
        @endif
    </div>
@endsection
