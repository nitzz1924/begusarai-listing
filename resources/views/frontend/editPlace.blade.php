@extends('frontend.layouts.master')
@section('title', 'Add/Edit Place')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
                <div class="card px-1 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Ready to Update your business?</h2>
                    <p>Fill all form field to go to next step</p>
                    <form action="{{ route('updatePlace', ['id' => $business->id]) }}" method="POST" class="upload-form"
                        enctype="multipart/form-data" id="msform">
                        @csrf
                        @method('PUT')
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Genaral info</strong></li>
                            <li id="personal"><strong>Hightlight</strong></li>
                            <li id="payment"><strong>Location</strong></li>
                            <li id="confirm"><strong>Submission </strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">General:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Business Name: <span style='color:red'>*</span></label>
                                <input type="text" placeholder="What is the name of the place" name="businessName"
                                    id="businessName" class="form-control"
                                    value="{{ isset($business) ? $business->businessName : old('businessName') }}">

                                @error('businessName')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Owner Name/Authorized person:<span
                                        style='color:red'>*</span></label>
                                <input type="text" placeholder="Owner Name" id="ownerName" name="ownerName"
                                    class="form-control"
                                    value="{{ isset($business) ? $business->ownerName : old('ownerName') }}">
                                @error('ownerName')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Price: </label>
                                <input type="text" placeholder="Price" name="price" id="price" class="form-control"
                                    value="{{ isset($business) ? $business->price : old('price') }}">
                                @error('price')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Business Description: <span style='color:red'>*</span></label>
                                <textarea placeholder="Description" id="description" name="description" rows="4" cols="65"
                                    class="form-control">{{ isset($business) ? $business->description : old('description') }}</textarea>
                                @error('description')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <!-- <label class="fieldlabels">Duration: *</label>
                                                                                                                                                                                                                                                                            <input type="text" placeholder="Duration" id="duration" name="duration"
                                                                                                                                                                                                                                                                                value="{{ isset($business) ? $business->duration : old('duration') }}"
                                                                                                                                                                                                                                                                                class="form-control">
                                                                                                                                                                                                                                                                            @error('duration')
        <div class="has-error mt-2">{{ $message }}</div>
    @enderror -->

                                <label class="fieldlabels">Category: <span style='color:red'>*</span></label>

                                <select data-placeholder="Select Category" class=" form-control mb-3" id="category"
                                    name="category">
                                    <option value="" selected disable>Select</option>
                                    @foreach ($data['category'] as $value)
                                        <option
                                            {{ isset($business) && $business->category == $value->title ? 'selected' : '' }}>
                                            {{ $value->title }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Place Type: </label>
                                <select data-placeholder="Select Place Type" multiple class="chosen-select form-control"
                                    id="placeType" name="placeType[]">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($data['Placetype'] as $value)
                                        <option
                                            {{ isset($business) && in_array($value->title, $business->placeType) ? 'selected' : '' }}>
                                            {{ $value->title }}</option>
                                    @endforeach
                                </select>
                                @error('placeType')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels mt-4">Business id Number: </label>
                                <select data-placeholder="Select Place option" id="dType" name="dType"
                                    class=" form-control" onchange="showTextBox()" class="mb-3">
                                    <option value="" selected disabled>Select an option</option>
                                    <option value="gst" @if ($business->dType === 'gst') selected @endif>GST (optional)
                                    </option>
                                    <option value="cin" @if ($business->dType === 'cin') selected @endif>CIN (optional)
                                    </option>
                                </select>

                                <div id="textBoxContainer" style="display: <?php $business->dNumber != '' ? 'block' : 'none'; ?>" class="my-3">
                                    <label for="textBox">Enter the details:</label>
                                    <input type="text" id="dNumber"
                                        value="{{ isset($business) ? $business->dNumber : old('dNumber') }}"
                                        name="dNumber" placeholder="Enter GST or CIN">
                                </div>

                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>

                        <fieldset>

                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Highlight:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="fieldlabels">City:<span style='color:red'>*</span></label>
                                    <select data-placeholder="Select City" class=" form-control" id="city"
                                        name="city">
                                        <option value="" selected disabled>Select City</option>
                                        @foreach ($data['City'] as $value)
                                            <option
                                                {{ isset($business) && $business->city == $value->title ? 'selected' : '' }}>
                                                {{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="fieldlabels">Booking Type :</label>

                                <div class="mb-3">
                                    <select data-placeholder="Select Booking Type" class=" form-control" id="bookingType"
                                        name="bookingType">
                                        <option value="" selected disabled></option>
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

                                <label class="fieldlabels">Social Networks :</label>
                                <input type="url" placeholder="Your YouTube URL" name="youtube" id="youtube"
                                    class="form-control ">

                                <label class="fieldlabels">Twitter URL :</label>
                                <input type="url" placeholder="Your Twitter URL" name="twitter" id="twitter"
                                    value="{{ isset($business) ? $business->twitter : old('twitter') }}">

                                <label class="fieldlabels">Instagram URL :</label>
                                <input type="url" placeholder="Your Instagram URL" name="instagram" id="instagram"
                                    value="{{ isset($business) ? $business->instagram : old('instagram') }}">

                                <label class="fieldlabels">Facebook URL :</label>
                                <input type="url" placeholder="Your Facebook URL" name="facebook" id="facebook"
                                    value="{{ isset($business) ? $business->facebook : old('facebook') }}">

                                <label class="fieldlabels">Website :</label>
                                <input type="url" placeholder="Your website url" name="websiteUrl" id="websiteUrl"
                                    value="{{ isset($business) ? $business->websiteUrl : old('websiteUrl') }}">
                                @error('websiteUrl')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Additional Fields :</label>
                                <input type="url" placeholder="Your additional fields url" name="additionalFields"
                                    id="additionalFields"
                                    value="{{ isset($business) ? $business->additionalFields : old('additionalFields') }}">
                                <label class="fieldlabels mb-3">Highlight :</label>
                                <br>
                                @foreach ($data['Highlight'] as $value)
                                    <label for="highlight_{{ $value->id }}" class="fieldlabels custom-checkbox">
                                        <input type="checkbox" name="highlight[]" id="highlight_{{ $value->id }}"
                                            value="{{ $value->title }}"
                                            {{ isset($business) && in_array($value->title, $business->highlight) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                        {{ $value->title }}
                                        {{-- <i class="la la-check"></i> --}}
                                    </label>
                                @endforeach

                            </div>
                            @error('highlight')
                                <div class="has-error mb-3">{{ $message }}</div>
                            @enderror

                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Location:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div>

                                <label class="fieldlabels">Business Address:<span style='color:red'>*</span></label>
                                <input type="text" placeholder="Full ontact Info" id="placeAddress"
                                    name="placeAddress" class="form-control "
                                    value="{{ isset($business) ? $business->placeAddress : old('placeAddress') }}">
                                @error('placeAddress')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Email:</label>
                                <input type="email" placeholder="Your email address" id="email" name="email"
                                    class="form-control"
                                    value="{{ isset($business) ? $business->email : old('email') }}">
                                @error('email')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Email:</label>

                                <label class="fieldlabels">Business Number:<span style='color:red'>*</span></label>
                                <input type="tel" placeholder="Your phone number" name="phoneNumber1"
                                    id="phoneNumber1" class="form-control  "
                                    value="{{ isset($business) ? $business->phoneNumber1 : old('phoneNumber1') }}">
                                @error('phoneNumber1')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Phone number 2 (optional) :</label>
                                <input type="tel" placeholder="Your phone number" name="phoneNumber2"
                                    id="phoneNumber2"
                                    value="{{ isset($business) ? $business->phoneNumber2 : old('phoneNumber2') }}">
                                @error('phoneNumber2')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Business Whatsapp :</label>
                                <input type="tel" placeholder="Your WhatsApp number" name="whatsappNo"
                                    id="whatsappNo" class="form-control"
                                    value="{{ isset($business) ? $business->whatsappNo : old('whatsappNo') }}">

                                <label class="fieldlabels">Booking URL :</label>
                                <input type="url" placeholder="Your booking URL" name="bookingurl" id="bookingurl"
                                    value="{{ isset($business) ? $business->bookingurl : old('bookingurl') }}">
                                @error('bookingurl')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                                <label class="fieldlabels">Business Video (Youtube Link) :</label>
                                <input type="url" placeholder="Your video URL" name="video" id="video"
                                    value="{{ isset($business) ? $business->video : old('video') }}">

                                <div class='row mb-4'>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="fieldlabels">Cover image:<span
                                                    style='color:red'>*</span></label>
                                            <div class="input-group">
                                                <input type="file" name="coverImage" id="coverImage"
                                                    data-max-size="1024">


                                                <div class="mt-3 d-grid justify-items-center">
                                                    <img class="rounded-3 img-fluids shadow"
                                                        src="{{ isset($business) && $business->coverImage ? asset('uploads/' . $business->coverImage) : asset('images/no-image.png') }}"
                                                        alt="" style="height: 100px;" />
                                                </div>
                                            </div>
                                            @error('coverImage')
                                                <div class="has-error mt-2">{{ $message }}</div>
                                            @enderror



                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fieldlabels">Author:<span style='color:red'>*</span></label>
                                            <div class="input-group">
                                                <input type="file" name="logo" id="logo"
                                                    data-max-size="1024">


                                                <div class="mt-3 d-grid justify-items-center ">
                                                    <img class="rounded-3 img-fluids shadow"
                                                        src="{{ isset($business) && $business->logo ? asset('uploads/' . $business->logo) : asset('images/no-image.png') }}"
                                                        alt="" style="height: 100px;" />
                                                </div>
                                            </div>
                                            @error('logo')
                                                <div class="has-error mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fieldlabels">Business Photos (Drag & Drop Images Here Max 5 ):</label>
                                    <div id="drop-area" class="border rounded p-3">

                                        <input type="file" name="galleryImage[]" id="galleryImage"
                                            data-max-size="1024" multiple accept="image/*">
                                        <input type="hidden" name="galleryImageCount" id="galleryImageCount"
                                            value="0">
                                        <div class="selected-files-count mt-2"></div>
                                        <div class="row">
                                            @if ($business->galleryImage)
                                                @foreach (json_decode($business->galleryImage) as $image)
                                                    <div class="col-2">
                                                        <img src="{{ URL::to('uploads/' . $image) }}">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    @error('galleryImage')
                                        <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Business Ownership Proof (Upload PDF):</label>
                                    <label for="fieldlabels" class=" " style='color:red'>
                                        No business docs? Use Aadhar card for ID verification. </label>
                                    <div class="input-group">
                                        <input type="file" name="documentImage" id="documentImage" accept=".pdf">
                                        <a class="btn btn-dark"
                                            href="{{ isset($business) && $business->documentImage ? asset('uploads/' . $business->documentImage) : asset('images/no-image.png') }}"
                                            alt="" download>Uploaded Document <i class="fa fa-file"></i></a>
                                    </div>
                                    @error('documentImage')
                                        <div class="has-error mt-2">The all image field are required.</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Submit" class="next action-button"
                                id="upload-btn" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>

                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center" style='color:darksalmon'>
                                    <strong>Processing ... </strong>
                                    <i class="las la-cogs" style="font-size: 70px;"></i>
                                </h2>

                                <br>
                                <div class="row justify-content-center">

                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center"></h5>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; // fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            // Handle "Next" button click
            $(".next").click(function() {
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                // Add class "active" to the corresponding progress bar step
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                // Show the next fieldset
                next_fs.show();

                // Hide the current fieldset with a fade-out animation
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // For making fieldset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative"
                        });

                        next_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500
                });

                setProgressBar(++current);
            });

            // Handle "Previous" button click
            $(".previous").click(function() {
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                // Remove class "active" from the corresponding progress bar step
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                // Show the previous fieldset
                previous_fs.show();

                // Hide the current fieldset with a fade-out animation
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // For making fieldset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative"
                        });

                        previous_fs.css({
                            opacity: opacity
                        });
                    },
                    duration: 500
                });

                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat((100 / steps) * curStep);
                percent = percent.toFixed();
                $(".progress-bar").css("width", percent + "%");
            }

            // Prevent form submission on "Submit" button click
            $(".submit").click(function() {
                return false;
            });
        });
    </script>

    <script>
        showTextBox();
        document.getElementById('changeFileBtn').addEventListener('click', function() {
            document.getElementById('documentImage').click();
        });
    </script>

    <script>
        function showTextBox() {
            console.log('open Extra Filed')
            var selectField = document.getElementById("dType");
            var textBoxContainer = document.getElementById("textBoxContainer");

            if (selectField.value === "gst") {

                textBoxContainer.style.display = "block";
            } else if (selectField.value === "cin") {

                textBoxContainer.style.display = "block";
            } else {

                textBoxContainer.style.display = "none";
            }
        }
    </script>

@endsection
