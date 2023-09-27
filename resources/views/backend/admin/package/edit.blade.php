@extends('backend.layouts.master')
@section('title', 'Edit Package')
@section('content')

    <style>
        /* Your CSS styles */
    </style>
    @if (session('error'))
        <section class="container">
            <div class="row py-3 justify-content-center">
                <div class="col-12 col-md-6 alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            </div>
        </section>
    @endif

    <div class="card">
        <h5 class="card-header">Edit Package</h5>
        <div class="card-body">
            <form id="edit" action="{{ route('admin.package.update', $package->id) }}" enctype="multipart/form-data"
                method="post" accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div id="status"></div>
                <div class="form-row">
                    {{-- <div class="form-group col-md-6">
                    <label for="type">Type:</label>
                    <input type="text" id="type" name="type" class="form-control" value="{{ old('type', $package->type) }}"
                        required>
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div> --}}



                    <div class="form-group col-md-6">
                        <label for="type">Type:</label>
                        <select class="form-select form-control @error('type') is-invalid @enderror" id="type"
                            name="type" aria-label="category-form-select">
                            <option selected disabled>Select Category Type</option> <!-- Default selection -->
                            @foreach ($master as $value)
                                <option value="{{ $value->title }}" {{ old('type') == $value->title ? 'selected' : '' }}>
                                    {{ $value->title }}
                                </option>
                            @endforeach
                        </select>
                        {{-- @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>


                    <div class="form-group col-md-6">
                        <label for="title"> Offer Title:</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $package->title) }}" required>
                        {{-- @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="duration">Duration (in months/years):</label>
                        <select id="duration" name="duration" class="form-control custom-select @error('duration') is-invalid @enderror" required>
                            <option value="" selected>Select</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}"
                                    {{ old('duration', $package->duration) == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        {{-- @error('duration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="durationMY">Duration Type:</label>
                        <select id="durationMY" name="durationMY" class="form-control custom-select @error('durationMY') is-invalid @enderror" required>
                            <option value="" selected>Select</option>
                            <option value="0" {{ old('durationMY', $package->durationMY) == '0' ? 'selected' : '' }}>
                                months
                            </option>
                            <option value="1" {{ old('durationMY', $package->durationMY) == '1' ? 'selected' : '' }}>
                                years
                            </option>
                        </select>
                        {{-- @error('durationMY')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price:</label>
                        <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $package->price) }}" required>
                        {{-- @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="off">High Price:</label>
                        <input type="text" id="off" name="off" class="form-control @error('off') is-invalid @enderror"
                            value="{{ old('off', $package->off) }}" required>
                        {{-- @error('off')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                  



                    <div class="form-group col-md-6">
                        <label for="noOfPlace">Number of Places:</label>
                        <select id="noOfPlace" name="noOfPlace" class="form-control" required>
                            <option  value="{{ old('noOfPlace', $package->noOfPlace) }}">{{ old('noOfPlace', $package->noOfPlace) }} </option> <!-- Default placeholder -->
                            
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                        </select>
                        @error('noOfPlace')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>







                    <div class="form-group col-md-6">
                        <label for="featuredListings">Featured Listings:</label>
                        <input type="text" id="featuredListings" name="featuredListings" class="form-control @error('featuredListings') is-invalid @enderror"
                            value="{{ old('featuredListings', $package->featuredListings) }}" required>
                        {{-- @error('featuredListings')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="featuredType">Featured Type:</label>
                        <select id="featuredType" name="featuredType" class="form-control @error('featuredType') is-invalid @enderror" required>
                            <option value="home_featured"
                                {{ old('featuredType', $package->featuredType) == 'home_featured' ? 'selected' : '' }}>
                                Home Featured</option>
                            <option value="city_listing"
                                {{ old('featuredType', $package->featuredType) == 'city_listing' ? 'selected' : '' }}>
                                City Listing</option>
                            <option value="category_listing"
                                {{ old('featuredType', $package->featuredType) == 'category_listing' ? 'selected' : '' }}>
                                Category Listing</option>
                            <option value="search_ results"
                                {{ old('featuredType', $package->featuredType) == 'search_ results' ? 'selected' : '' }}>
                                Search Results </option>
                        </select>
                        {{-- @error('featuredType')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror --}}
                    </div>
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-success"><span class="fa fa-save fa-fw"></span> Update</button>
                </div>
            </form>
        </div>
    </div>

@stop
