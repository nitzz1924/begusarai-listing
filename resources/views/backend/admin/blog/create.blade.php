@extends('backend.layouts.master')
@section('title', 'SubMaster')
@section('content')

    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-6 alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            </div>
        </section>
    @endif

    <div class="card">
        <h5 class="card-header">SubMaster</h5>
        <div class="card-body">
            <!-- Form -->
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf



                <!-- Other Fields -->
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                    @error('title')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" id="description"></textarea>
                    @error('description')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>






                <div class="mb-3">
                    <label for="type" class="form-label">Blog Type:</label>
                    <select class="form-select form-control" id="type" name="type"
                        aria-label="category-form-select">
                        <option selected disabled>Select Category Type</option> <!-- Default selection -->
                        @foreach ($submaster as $value)
                            <option>{{ $value->title }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <div class="has-error mt-2">please select blog type</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="keyword" class="form-label">Keyword:</label>
                    <input type="text" class="form-control" name="keyword" id="keyword">
                    @error('keyword')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="postcontent" class="form-label">Blog Post:</label>
                    <textarea class="form-control" name="postcontent" id="postcontent"></textarea>
                    @error('postcontent')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div> <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Video URL -->
                <div class="mb-3">
                    <label for="videourl" class="form-label">Video URL:</label>
                    <input type="text" class="form-control" name="videourl" id="videourl">
                    @error('videourl')
                        <div class="has-error mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- End Form -->
        </div>
    </div>

@stop
