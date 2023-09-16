@extends('frontend.layouts.master')
@section('title', 'Add Place')
@section('content')

    <main class="site-main listing-main">
        <div class="listing-nav">
            <div class="listing-menu nav-scroll">
                <ul>
                    <li class="active"><a href="#genaral" title="Genaral"><span class="icon"><i
                                    class="la la-cog"></i></span><span>Genaral</span></a></li>
                    <li><a href="#hightlight" title="Hightlight"><span class="icon"><i
                                    class="la la-wifi"></i></span><span>Hightlight</span></a></li>
                    <li><a href="#location" title="Location"><span class="icon"><i
                                    class="la la-map-marker"></i></span><span>Location</span></a></li>
                    <li><a href="#contact" title="Contact info"><span class="icon"><i
                                    class="la la-phone"></i></span><span>Contact info</span></a></li>
                    <li><a href="#social" title="Social network"><span class="icon"><i
                                    class="la la-link"></i></span><span>Social network</span></a></li>
                    <li><a href="#open" title="Open hourses"><span class="icon"><i
                                    class="la la-business-time"></i></span><span>Open hourses</span></a></li>
                    <li><a href="#media" title="Media"><span class="icon"><i
                                    class="la la-image"></i></span><span>Media</span></a></li>
                </ul>
            </div>
        </div><!-- .listing-nav -->
        <div class="listing-content">
            <h2>Add new place</h2>
            <form action="{{ route('savePlace') }}" method="POST" class="upload-form" enctype="multipart/form-data">
                @csrf

                <div class="listing-box">
                    <h3>General</h3>
                    <div class="field-inline">
                        <div class="field-group field-input">
                            <label for="businessName">Business Name</label>
                            <input type="text" placeholder="What is the name of the place" name="businessName"
                                id="businessName">
                            @error('businessName')
                                <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field-group field-input">
                            <label for="price">Price</label>
                            <input type="text" placeholder="Price" name="price" id="price">
                            @error('price')
                                <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="field-group">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" id="description" name="description"></textarea>
                        @error('description')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="duration">Duration</label>
                        <input type="text" placeholder="Duration" id="duration" name="duration">
                        @error('duration')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group field-select">
                        <label for="type">category</label>
                        <select data-placeholder="Select category" class="chosen-select" id="category" name="category">
                            <option selected></option>
                            @foreach ($category as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group field-select">
                        <label for="placeType">Place Type</label>
                        <select data-placeholder="Select Place Type" multiple class="chosen-select" id="placeType"
                            name="placeType[]">
                            <option disabled>Select</option>
                            @foreach ($Placetype as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('placeType')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="listing-box">
                    <h3>Highlight</h3>
                    <div class="field-group field-check">
                        @foreach ($Highlight as $value)
                            <label for="highlight_{{ $value->id }}">
                                <input type="checkbox" name="highlight[]" id="highlight_{{ $value->id }}"
                                    value="{{ $value->title }}">
                                {{ $value->title }}
                                <span class="checkmark">
                                    <i class="la la-check"></i>
                                </span>
                            </label>
                        @endforeach
                        @error('highlight')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="listing-box">
                    <h3>Location</h3>
                    <div class="field-group field-select">
                        <label for="city">City</label>
                        <select data-placeholder="Select City" class="chosen-select" id="city" name="city">
                            <option selected></option>
                            @foreach ($City as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="placeAddress">Place Address</label>
                        <input type="text" placeholder="Full Address" id="placeAddress" name="placeAddress">
                        @error('placeAddress')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Additional location fields can be added here -->
                </div>
                <div class="listing-box">
                    <h3>Contact Info</h3>
                    <div class="field-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Your email address" id="email" name="email">
                        @error('email')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="phoneNumber1">Phone number</label>
                        <input type="tel" placeholder="Your phone number" name="phoneNumber1" id="phoneNumber1">
                        @error('phoneNumber1')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="phoneNumber2">Phone number 2 (optional)</label>
                        <input type="tel" placeholder="Your phone number" name="phoneNumber2" id="phoneNumber2">
                    </div>
                    <div class="field-group">
                        <label for="whatsappNo">WhatsApp No</label>
                        <input type="tel" placeholder="Your WhatsApp number" name="whatsappNo" id="whatsappNo">
                        @error('whatsappNo')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="websiteUrl">Website</label>
                        <input type="url" placeholder="Your website url" name="websiteUrl" id="websiteUrl">
                        @error('websiteUrl')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="additionalFields">Additional Fields</label>
                        <input type="url" placeholder="Your additional fields url" name="additionalFields"
                            id="additionalFields">
                        @error('additionalFields')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box">
                    <h3>Social Networks</h3>
                    <div class="field-group">
                        <label for="youtube">Youtube URL</label>
                        <input type="url" placeholder="Your YouTube URL" name="youtube" id="youtube">
                        @error('youtube')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" placeholder="Your Twitter URL" name="twitter" id="twitter">
                        @error('twitter')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="instagram">Instagram URL</label>
                        <input type="url" placeholder="Your Instagram URL" name="instagram" id="instagram">
                        @error('instagram')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" placeholder="Your Facebook URL" name="facebook" id="facebook">
                        @error('facebook')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box">
                    <h3>Opening Hours</h3>
                    <div class="field-group field-select">
                        <label for="bookingType">Booking Type</label>
                        <select data-placeholder="Select Booking Type" class="chosen-select" id="bookingType"
                            name="bookingType">
                            <option selected></option>
                            @foreach ($bookingType as $value)
                                <option>{{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('bookingType')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label for="bookingurl">Booking URL</label>
                        <input type="url" placeholder="Your booking URL" name="bookingurl" id="bookingurl">
                        @error('bookingurl')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box">
                    <h3>Media</h3>
                    <div class="field-group field-file">
                        <label for="coverImage">Cover image</label>
                        <label for="coverImage" class="preview">
                            <input type="file" name="coverImage" id="coverImage" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('coverImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <div class="field-group field-file">
                        <label for="galleryImage">Gallery Images (optional)</label>
                        <label for="galleryImage" class="preview">
                            <input type="file" name="galleryImage" id="galleryImage" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('galleryImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <div class="field-group field-file">
                        <label for="documentImage">Document Images (Upload PDF)</label>
                        <label for="documentImage" class="preview">
                            <input type="file" name="documentImage" id="documentImage" class="upload-file"
                            accept=".pdf">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('documentImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                






                    <div class="field-group field-file">
                        <label for="logo">Logo (optional)</label>
                        <label for="logo" class="preview">
                            <input type="file" name="logo" id="logo" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('logo')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <div class="field-group">
                        <label for="video">Video (optional)</label>
                        <input type="url" placeholder="Your video URL" name="video" id="video">
                        @error('video')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->
                <div class="field-group field-submit">
                    <input type="submit" name="submit" value="Submit" class="btn">
                </div>
            </form>

        </div><!-- .listing-content -->
    </main><!-- .site-main -->


@endsection
