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
                    <label>{{ __('Category') }}</label>
                    <select
                        class="form-control"
                        name="category_id"
                        id="category_id">
                        @foreach($categories as $category)
                        <option
                            {{ $category->id == $post->category->id ? ' selected' : ''}}
                            value="{{ $category->id }}">
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
                    <div class="form-group">
                        <label>{{ __('Tag') }}</label>
                        <select
                            name="tag_ids[]"
                            class="select2"
                            multiple="multiple"
                            data-placeholder="{{ __('Select tag') }}"
                            style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    {{ is_array($tag->id) == $post->tags->id ? 'selected' : '' }}
                                    value="{{ $tag->id }}">
                                    {{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tag_ids')
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
                                {{ is_array( $post->tags->pluck('id')->toArray() ) &&
                                in_array( $tag->id, $post->tags->pluck('id')->toArray() ) ? ' selected' : '' }}
                                value="{{ $tag->id }}">{{ $tag->title }}</option>
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
