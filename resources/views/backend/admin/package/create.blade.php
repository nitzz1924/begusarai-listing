@extends('backend.layouts.master')
@section('title', 'Tools')
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
        <h5 class="card-header">Master</h5>
        <div class="card-body">
            <form id="create" action="{{ route('admin.package.store') }}" enctype="multipart/form-data" method="post"
                accept-charset="utf-8" class="needs-validation" novalidate>
                @csrf
                <div id="status"></div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="type">Type:</label>
                        <select class="form-select form-control  @error('type')  is-invalid @enderror" id="type"
                            name="type" aria-label="category-form-select">
                            <option selected disabled>Select Category Type</option> <!-- Default selection -->
                            @foreach ($master as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        <!-- @error('type')
        <div class="text-danger">{{ $message }}</div>
    @enderror -->
                    </div>





                    <div class="form-group col-md-6">
                        <label for="title">Offer Title:</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}"
                            required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="duration">Duration (in months/years):</label>
                        <select id="duration" name="duration" class="form-control custom-select" required>
                            <option value="" selected>Select</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ old('duration') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        @error('duration')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="durationMY">Duration Type:</label>
                        <select  id="durationMY" name="durationMY" class="form-control custom-select" required>
                         
                            <option  value="0" selected {{ old('durationMY') == '0' ? 'selected' : '' }}>months</option>
                          
                        </select>
                        @error('durationMY')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" class="form-control"
                            value="{{ old('price') }}" required>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="off">High Price:</label>
                        <input type="text" id="off" name="off" class="form-control"
                            value="{{ old('off') }}" required>
                        @error('off')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> -->
                    
              

                    <div class="form-group col-md-6">
                        <label for="noOfPlace">Number of Places:</label>
                        <select id="noOfPlace" name="noOfPlace" class="form-control" required>
                            <option value="">Select option</option> <!-- Default placeholder -->
                            
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
                        <select id="featuredListings" name="featuredListings" class="form-control" required>
                            <option value="">Select option</option> <!-- Default placeholder -->
                            
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
                        @error('featuredListings')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    











                    <div class="form-group col-md-6">
                        <label for="featuredType">Featured Type:</label>
                        <select id="featuredType" name="featuredType" class="form-control" required>
                            <option value="" selected>Select</option>
                            <option value="home_featured" {{ old('featuredType') == 'home_featured' ? 'selected' : '' }}>
                                Home Featured</option>
                            <option value="city_listing" {{ old('featuredType') == 'city_listing' ? 'selected' : '' }}>City
                                Listing</option>
                            <option value="category_listing"
                                {{ old('featuredType') == 'category_listing' ? 'selected' : '' }}>Category Listing</option>
                            <option value="search_ results"
                                {{ old('featuredType') == 'search_results' ? 'selected' : '' }}>Search Results</option>
                        </select>
                        @error('featuredType')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <p style="margin: 10px 0; font-size: 16px;">
                    <span style="color: red; font-weight: bold;">Note:</span>
                    If you do not wish to fill any field, please enter 0 in the field.
                </p>


                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-success"><span class="fa fa-save fa-fw"></span> Save</button>
                </div>
            </form>
        </div>
    </div>

@stop
