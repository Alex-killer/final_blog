@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('Post edit') }}
@endsection

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Post create') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('blog.admin.post.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input
                        name="title"
                        type="text"
                        class="form-control"
                        id="title"
                        placeholder="Enter title"
                        value="{{ $post->title }}"
                        autofocus>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">{{ __('Description') }}</label>
                    <textarea
                        id="summernote"
                        name="content"
                        placeholder="{{ __('Enter description') }}">
                        {{ $post->content }}
                    </textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Select') }}</label>
                    <select
                        class="form-control"
                        name="category_id"
                        id="category_id">
                        @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ $category->id == $post->category->id ? ' selected' : ''}}>
                            {{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">{{ __('Image input') }}</label>
                    <div class="mb-3">
                        <img src="{{ url('storage/'.$post->image) }}" width="100">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input
                                name="image"
                                type="file"
                                class="custom-file-input"
                                id="image">
                            <label class="custom-file-label" for="exampleInputFile">{{ __('Choose image') }}</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">{{ __('Upload') }}</span>
                        </div>
                    </div>
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
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
