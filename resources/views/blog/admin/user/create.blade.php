@extends('blog.admin.layouts.admin-master')

@section('title')
    {{ __('User creating') }}
@endsection

@section('content')

<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('User create') }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="{{ route('blog.admin.user.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">{{ __('Name') }}</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Enter name"
                        value="{{ old('name') }}"
                        autofocus>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('Email') }}</label>
                    <input
                        name="email"
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="{{ __('Enter email') }}"
                        value="{{ old('email') }}"
                        autofocus>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('Role') }}</label>
                    <select
                        class="form-control"
                        name="role_id"
                        id="role_id">
                        @foreach($roles as $role)
                            <option
                                {{ old('role_id') == $role->id ? 'selected' : '' }}
                                value="{{ $role->id }}">{{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">{{ __('Password') }}</label>
                    <input
                        name="password"
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Enter password"
                        autofocus>
                    @error('password')
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
