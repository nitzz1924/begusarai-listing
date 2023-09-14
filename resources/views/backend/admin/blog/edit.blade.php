@extends('backend.layouts.master')
@section('title', 'Edit Blog Entry')
@section('content')
    <div class="container">
        <h1>Edit Blog Entry</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Title -->
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $blog->title) }}" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $blog->description) }}</textarea>
            </div>


            <div class="mb-3">
                <label for="type" class="form-label">Blog Type:</label>
                <select class="form-select form-control" id="type" name="type" aria-label="category-form-select">
                    <option disabled>Select Category Type</option> <!-- Default selection -->
                    @foreach ($submaster as $value)
                        <option value="{{ $value->title }}"
                            {{ old('type', $blog->type) == $value->title ? 'selected' : '' }}>
                            {{ $value->title }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <div class="has-error mt-2">Please select a blog type</div>
                @enderror
            </div>




            <div class="mb-3">
                <label for="keyword" class="form-label">Keyword:</label>
                <input type="text" class="form-control" name="keyword" id="keyword"
                    value="{{ old('title', $blog->keyword) }}">
                @error('keyword')
                    <div class="has-error mt-2">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="post" class="form-label">Post:</label>
                <textarea class="form-control" name="post" id="post">   value="{{ old('title', $blog->post) }}"</textarea>
                @error('post')
                    <div class="has-error mt-2">{{ $message }}</div>
                @enderror
            </div>


            <!-- Current Image -->
            @if ($blog->image)
                <div class="form-group">
                    <label for="current_image">Current Image</label><br>
                    <img src="{{ asset('/uploads/' . $blog->image) }}" alt="Current Image" width="200">
                </div>
            @endif




            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">New Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="videourl" class="form-label">Video URL:</label>
                <input type="text" class="form-control" name="videourl" id="videourl" value="videourl">
                @error('videourl')
                    <div class="has-error mt-2">{{ $message }}</div>
                @enderror
            </div>



            <!-- Other fields -->
            <!-- Add other fields and form elements as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@stop
