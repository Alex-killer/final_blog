@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('Category creating') }}
@endsection

@section('content')

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Category create') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('blog.admin.category.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input
                        name="title"
                        type="text"
                        class="form-control"
                        id="title"
                        placeholder="Enter title"
                        value="{{ old('title') }}"
                        autofocus>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection
