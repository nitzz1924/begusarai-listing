@extends('frontend.layouts.master')
@section('title', 'Add/Edit Place')
@section('content')

    <main class="site-main listing-main">
        <div class="listing-nav">
            <!-- Your navigation menu here -->
            <div class="listing-menu nav-scroll">
                <ul>
                    <li class="active"> <a href="#genaral" title="Genaral"><span class="icon">
                                <i class="la la-cog"></i></span><span>Genaral</span></a>
                    </li>
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
            <h2>Edit Place</h2>
            <form action="{{ route('updatePlace', ['id' => $business->id]) }}" method="POST" class="upload-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- @if (isset($business))
                    @method('PUT')
                @endif --}}

                <!-- General Information -->
                <div id="genaral" class="listing-box">
                    <h3>General</h3>
                    <input type="hidden" name="editId" value="{{ $business->id }}" {{-- value="{{ isset($business) ? $business->id : 0 }}" --}} />
                    <!-- Business Name -->
                    <div class="field-group field-input">
                        <label for="businessName">Business Name</label>
                        <input type="text" placeholder="What is the name of the place" name="businessName"
                            id="businessName" class="form-control "
                            value="{{ isset($business) ? $business->businessName : old('businessName') }}">
                        @error('businessName')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Price -->
                    <div class="field-group field-input">
                        <label for="price">Price</label>
                        <input type="text" placeholder="Price" name="price" id="price" class="form-control"
                            value="{{ isset($business) ? $business->price : old('price') }}">
                        @error('price')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div class="field-group">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" id="description" name="description" rows="6" cols="65"
                            class="form-control ">{{ isset($business) ? $business->description : old('description') }}</textarea>
                        @error('description')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Duration -->
                    <div class="field-group">
                        <label for="duration">Duration</label>
                        <input type="text" placeholder="Duration" id="duration" name="duration"
                            value="{{ isset($business) ? $business->duration : old('duration') }}" class="form-control  ">
                        @error('duration')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- category -->
                    <div class="field-group field-select">
                        <label for="category">Category</label>
                        <select data-placeholder="Select category" class="chosen-select" id="category" name="category">
                            <option selected></option>
                            @foreach ($data['category'] as $value)
                                <option {{ isset($business) && $business->category == $value->title ? 'selected' : '' }}>
                                    {{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Place Type -->
                    <div class="field-group field-select">
                        <label for="placeType">Place Type</label>
                        <select data-placeholder="Select Place Type" multiple class="chosen-select" id="placeType"
                            name="placeType[]">
                            <option disabled>Select</option>
                            @foreach ($data['Placetype'] as $value)
                                <option
                                    {{ isset($business) && in_array($value->title, $business->placeType) ? 'selected' : '' }}>
                                    {{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('placeType')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Highlight -->
                <!-- Highlight -->
                <div id="hightlight" class="listing-box">
                    <h3>Highlight</h3>
                    <div class="field-group field-check">
                        @foreach ($data['Highlight'] as $value)
                            <label for="highlight_{{ $value->id }}">
                                <input type="checkbox" name="highlight[]" id="highlight_{{ $value->id }}"
                                    value="{{ $value->title }}"
                                    {{ isset($business) && in_array($value->title, $business->highlight) ? 'checked' : '' }}>
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

                <!-- Location -->
                <div id="location" class="listing-box">
                    <h3>Location</h3>
                    <!-- City -->
                    <div class="field-group field-select">
                        <label for="city">City</label>
                        <select data-placeholder="Select City" class="chosen-select" id="city" name="city">
                            <option selected></option>
                            @foreach ($data['City'] as $value)
                                <option {{ isset($business) && $business->city == $value->title ? 'selected' : '' }}>
                                    {{ $value->title }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Place Address -->
                    <div class="field-group">
                        <label for="placeAddress">Place Address</label>
                        <input type="text" placeholder="Full Address" id="placeAddress" name="placeAddress"
                            class="form-control "
                            value="{{ isset($business) ? $business->placeAddress : old('placeAddress') }}">
                        @error('placeAddress')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Additional location fields can be added here -->
                </div>

                <!-- Contact Info -->
                <div id="contact" class="listing-box">
                    <h3>Contact Info</h3>
                    <!-- Email -->
                    <div class="field-group">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Your email address" id="email" name="email"
                            class="form-control" value="{{ isset($business) ? $business->email : old('email') }}">
                        @error('email')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Phone Number 1 -->
                    <div class="field-group">
                        <label for="phoneNumber1">Phone number</label>
                        <input type="tel" placeholder="Your phone number" name="phoneNumber1" id="phoneNumber1"
                            class="form-control  "
                            value="{{ isset($business) ? $business->phoneNumber1 : old('phoneNumber1') }}">
                        @error('phoneNumber1')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Phone Number 2 (optional) -->
                    <div class="field-group">
                        <label for="phoneNumber2">Phone number 2 (optional)</label>
                        <input type="tel" placeholder="Your phone number" name="phoneNumber2" id="phoneNumber2"
                            value="{{ isset($business) ? $business->phoneNumber2 : old('phoneNumber2') }}">
                        @error('phoneNumber2')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- WhatsApp No -->
                    <div class="field-group">
                        <label for="whatsappNo">WhatsApp No</label>
                        <input type="tel" placeholder="Your WhatsApp number" name="whatsappNo" id="whatsappNo"
                            class="form-control"
                            value="{{ isset($business) ? $business->whatsappNo : old('whatsappNo') }}">
                        {{-- @error('whatsappNo')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror --}}
                    </div>
                    <!-- Website -->
                    <div class="field-group">
                        <label for="websiteUrl">Website</label>
                        <input type="url" placeholder="Your website url" name="websiteUrl" id="websiteUrl"
                            value="{{ isset($business) ? $business->websiteUrl : old('websiteUrl') }}">
                        @error('websiteUrl')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Additional Fields -->
                    <div class="field-group">
                        <label for="additionalFields">Additional Fields</label>
                        <input type="url" placeholder="Your additional fields url" name="additionalFields"
                            id="additionalFields"
                            value="{{ isset($business) ? $business->additionalFields : old('additionalFields') }}">

                    </div>
                </div><!-- .listing-box -->

                <!-- Social Networks -->
                <div id="social" class="listing-box">
                    <h3>Social Networks</h3>
                    <!-- Youtube URL -->
                    <div class="field-group">
                        <label for="youtube">Youtube URL</label>
                        <input type="url" placeholder="Your YouTube URL" name="youtube" id="youtube"
                            value="{{ isset($business) ? $business->youtube : old('youtube') }}">

                    </div>
                    <!-- Twitter URL -->
                    <div class="field-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="url" placeholder="Your Twitter URL" name="twitter" id="twitter"
                            value="{{ isset($business) ? $business->twitter : old('twitter') }}">

                    </div>
                    <!-- Instagram URL -->
                    <div class="field-group">
                        <label for="instagram">Instagram URL</label>
                        <input type="url" placeholder="Your Instagram URL" name="instagram" id="instagram"
                            value="{{ isset($business) ? $business->instagram : old('instagram') }}">

                    </div>
                    <!-- Facebook URL -->
                    <div class="field-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="url" placeholder="Your Facebook URL" name="facebook" id="facebook"
                            value="{{ isset($business) ? $business->facebook : old('facebook') }}">

                    </div>
                </div><!-- .listing-box -->

                <!-- Opening Hours -->
                <div id="open" class="listing-box">
                    <h3>Opening Hours</h3>
                    <!-- Booking Type -->
                    <div class="field-group field-select">
                        <label for="bookingType">Booking Type</label>
                        <select data-placeholder="Select Booking Type" class="chosen-select" id="bookingType"
                            name="bookingType">
                            <option selected></option>
                            @foreach ($data['bookingType'] as $value)
                                <option
                                    {{ isset($business) && $business->bookingType == $value->title ? 'selected' : '' }}>
                                    {{ $value->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('bookingType')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Booking URL -->
                    <div class="field-group">
                        <label for="bookingurl">Booking URL</label>
                        <input type="url" placeholder="Your booking URL" name="bookingurl" id="bookingurl"
                            value="{{ isset($business) ? $business->bookingurl : old('bookingurl') }}">
                        @error('bookingurl')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->

                <!-- Media -->
                <div id="media" class="listing-box">
                    <h3>Media</h3>
                    <!-- Cover Image -->
                    <div class="field-group field-file">
                        <label for="coverImage">Cover image</label>
                        <label for="coverImage" class="preview">
                            <input type="file" name="coverImage" id="coverImage" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview"
                                src="{{ isset($business) && $business->coverImage ? asset('uploads/' . $business->coverImage) : asset('images/no-image.png') }}"
                                alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('coverImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <!-- Gallery Images -->
                    <div class="field-group field-file">
                        <label for="galleryImage">Gallery Images</label>
                        <label for="galleryImage" class="preview">
                            <input type="file" name="galleryImage[]" id="galleryImage" class="upload-file"
                                data-max-size="1024" multiple accept="image/*">
                            <input type="hidden" name="galleryImageCount" id="galleryImageCount"
                                value="{{ count(json_decode($business->galleryImage)) }}">
                            <!-- Store the initial count -->
                            <div class="selected-files-count">{{ count(json_decode($business->galleryImage)) }} images
                                selected</div>
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('galleryImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <!-- Document Images -->
                    <div class="field-group field-file">
                        <label for="documentImage">Document Images(Upload PDF)</label>
                        <label for="documentImage" class="preview">
                            <input type="file" name="documentImage" id="documentImage" class="upload-file"
                                accept=".pdf"
                                value="{{ isset($business) && $business->documentImage ? $business->documentImage : '' }}">
                            <img class="img_preview"
                                src="{{ isset($business) && $business->documentImage ? asset('uploads/' . $business->documentImage) : asset('images/no-image.png') }}"
                                alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('documentImage')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>

                        <!-- Add a "Change File" button -->
                        <div class="mt-2">
                            <button class="btn" type="button" id="changeFileBtn">Change File</button>
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="field-group field-file">
                        <label for="logo">Logo (optional)</label>
                        <label for="logo" class="preview">
                            <input type="file" name="logo" id="logo" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview"
                                src="{{ isset($business) && $business->logo ? asset('uploads/' . $business->logo) : asset('images/no-image.png') }}"
                                alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        @error('logo')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <!-- Video -->
                    <div class="field-group">
                        <label for="video">Video (optional)</label>
                        <input type="url" placeholder="Your video URL" name="video" id="video"
                            value="{{ isset($business) ? $business->video : old('video') }}">
                        @error('video')
                            <div class="has-error mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- .listing-box -->

                <!-- Submit Button -->
                <div class="field-group field-submit">
                    <input type="submit" name="submit" value="{{ isset($business) ? 'Update' : 'Submit' }}"
                        class="btn">
                </div>
            </form>
        </div><!-- .listing-content -->
    </main><!-- .site-main -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropArea = document.getElementById("drop-area");
            const galleryImageInput = document.getElementById("galleryImage");
            const galleryImageCountInput = document.getElementById("galleryImageCount");

            ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
                dropArea.addEventListener(eventName, preventDefault, false);
            });

            function preventDefault(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            dropArea.addEventListener("drop", handleDrop, false);
            galleryImageInput.addEventListener("change", updateGalleryImageCount);

            function handleDrop(e) {
                const files = e.dataTransfer.files;
                const inputElement = galleryImageInput;
                inputElement.files = files;

                // Update label text to show the number of files dropped
                const label = dropArea.querySelector("label");
                label.textContent = files.length === 1 ? "1 file selected" : `${files.length} files selected`;

                // Update the hidden input field with the count
                galleryImageCountInput.value = files.length;
            }

            function updateGalleryImageCount() {
                const files = galleryImageInput.files;
                galleryImageCountInput.value = files.length;
            }
        });
    </script>
    <script>
        document.getElementById('changeFileBtn').addEventListener('click', function() {
            document.getElementById('documentImage').click();
        });
    </script>

@endsection
