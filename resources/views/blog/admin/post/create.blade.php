@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('Post creating') }}
@endsection

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Post create') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('blog.admin.post.store') }}" enctype="multipart/form-data">
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
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">{{ __('Description') }}</label>
                    <textarea
                        id="summernote"
                        name="content"
                        placeholder="{{ __('Enter description') }}">{{ old('content') }}</textarea>
                    @error('content')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Category') }}</label>
                    <select
                        class="form-control"
                        name="category_id"
                        id="category_id">
                        @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">{{ __('Image input') }}</label>
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
                <div class="form-group">
                    <label>{{ __('Tags') }}</label>
                    <select
                        name="tag_ids[]"
                        id="tags"
                        class="select2"
                        multiple="multiple"
                        data-placeholder="Select a State"
                        style="width: 100%;">
                        @foreach($tags as $tag)
                        <option
                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                            value="{{ $tag->id }}">{{ $tag->title }}
                        </option>
                        @endforeach
                    </select>
                    @error('tag_ids')
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
