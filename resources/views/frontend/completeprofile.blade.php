@extends('frontend.layouts.master')
@section('title', 'Complete Profile')
@section('content')
<div class="container-fluid">
    <style>
        .has-error {
            color: red;
            font-size: 0.875rem;
        }

        .form-control:invalid {
            border-color: red;
        }

        .form-control:invalid:focus {
            border-color: red;
            box-shadow: 0 0 5px red;
        }

        .error-message {
            color: red;
            font-size: 1rem;
            margin-top: 10px;
            display: none;
        }
    </style>
    @if ($mymess = Session::get('success'))
    <div class="alert border-0 alert-success text-center" role="alert" id="successAlert">
        <strong>{{ $mymess }}</strong>
    </div>
    @endif
    @if ($mymess = Session::get('error'))
    <div class="alert border-0 alert-danger text-center" role="alert" id="dangerAlert">
        <strong>{{ $mymess }}</strong>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-1 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Complete Your Profile here</h2>
                <p>Update your Details Below</p>
                {{-- <ul id="progressbar">
                    <li class="active" id="account"><strong>Genaral info</strong></li>
                    <li id="personal"><strong>Hightlight</strong></li>
                    <li id="payment"><strong>Location</strong></li>
                    <li id="confirm"><strong>Submission </strong></li>
                </ul> --}}
                <div class="nav flex-row d-flex justify-content-around nav-pills me-3 pt-4 pb-3" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Highlights</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Location</button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active p-4" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <form action="{{ route('updateHighlights', ['id' => $business->id]) }}" method="POST"
                            class="upload-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-card">
                                <div class="mb-3">
                                    <label class="fieldlabels">City:<span style='color:red'>*</span></label>
                                    <select data-placeholder="Select City" class=" form-control" required id="city"
                                        name="city">
                                        <option value="" selected disabled>Select City</option>
                                        @foreach ($data['City'] as $value)
                                        <option {{ isset($business) && $business->city == $value->title ? 'selected' :
                                            ''
                                            }}>
                                            {{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="fieldlabels">Booking Type :</label>

                                <div class="mb-3">
                                    <select data-placeholder="Select Booking Type" class=" form-control"
                                        id="bookingType" name="bookingType">
                                        <option value="" selected disabled></option>
                                        @foreach ($data['bookingType'] as $value)
                                        <option {{ isset($business) && $business->bookingType == $value->title ?
                                            'selected'
                                            : '' }}>
                                            {{ $value->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('bookingType')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <label class="fieldlabels">YouTube channel URL:</label>
                                <input type="url" placeholder="Your YouTube URL" name="youtube" id="youtube"
                                    class="form-control mb-3">

                                <label class="fieldlabels">Twitter URL :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your Twitter URL"
                                    name="twitter" id="twitter"
                                    value="{{ isset($business) ? $business->twitter : old('twitter') }}">

                                <label class="fieldlabels">Instagram URL :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your Instagram URL"
                                    name="instagram" id="instagram"
                                    value="{{ isset($business) ? $business->instagram : old('instagram') }}">

                                <label class="fieldlabels">Facebook URL :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your Facebook URL"
                                    name="facebook" id="facebook"
                                    value="{{ isset($business) ? $business->facebook : old('facebook') }}">

                                <label class="fieldlabels">Website :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your website url"
                                    name="websiteUrl" id="websiteUrl"
                                    value="{{ isset($business) ? $business->websiteUrl : old('websiteUrl') }}">
                                @error('websiteUrl')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Tagline :</label>
                                <input class="form-control mb-3" type="text" placeholder="Your tagline here"
                                    name="additionalFields" id="additionalFields"
                                    value="{{ isset($business) ? $business->additionalFields : old('additionalFields') }}">
                                <label class="fieldlabels mb-3">Highlight :</label>
                                <br>
                                @foreach ($data['Highlight'] as $value)
                                <label for="highlight_{{ $value->id }}" class="fieldlabels custom-checkbox">
                                    <input class="form-control mb-3" type="checkbox" name="highlight[]"
                                        id="highlight_{{ $value->id }}" value="{{ $value->title }}" {{ isset($business)
                                        && in_array($value->title,
                                    $business->highlight) ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    {{ $value->title }}
                                    {{-- <i class="la la-check"></i> --}}
                                </label>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                        @error('highlight')
                        <div class="has-error mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="tab-pane fade  p-4" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('updateLocations', ['id' => $business->id]) }}" method="POST"
                            class="upload-form" enctype="multipart/form-data" id="msform">
                            @csrf
                            @method('PUT')
                            <div class="form-card">
                                <label class="fieldlabels">Business Address:<span style='color:red'>*</span></label>
                                <input type="text" required placeholder="Full Contact Info" id="placeAddress"
                                    name="placeAddress" class="form-control mb-3"
                                    value="{{ isset($business) ? $business->placeAddress : old('placeAddress') }}">
                                @error('placeAddress')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Email:</label>
                                <input type="email" placeholder="Your email address" id="email" name="email"
                                    class="form-control mb-3"
                                    value="{{ isset($business) ? $business->email : old('email') }}">

                                <label class="fieldlabels">Business Number:<span style='color:red'>*</span></label>
                                <input type="tel" required placeholder="Your phone number" name="phoneNumber1"
                                    id="phoneNumber1" class="form-control mb-3"
                                    value="{{ isset($business) ? $business->phoneNumber1 : old('phoneNumber1') }}">
                                @error('phoneNumber1')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                                <label class="fieldlabels">Phone number 2 (optional) :</label>
                                <input class="form-control mb-3" type="tel" placeholder="Your phone number"
                                    name="phoneNumber2" id="phoneNumber2"
                                    value="{{ isset($business) ? $business->phoneNumber2 : old('phoneNumber2') }}">

                                <label class="fieldlabels">Business Whatsapp :</label>
                                <input type="tel" placeholder="Your WhatsApp number" name="whatsappNo" id="whatsappNo"
                                    class="form-control mb-3"
                                    value="{{ isset($business) ? $business->whatsappNo : old('whatsappNo') }}">

                                <label class="fieldlabels">Booking URL :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your booking URL"
                                    name="bookingurl" id="bookingurl"
                                    value="{{ isset($business) ? $business->bookingurl : old('bookingurl') }}">

                                <label class="fieldlabels">Business Video (Youtube Link) :</label>
                                <input class="form-control mb-3" type="url" placeholder="Your video URL" name="video"
                                    id="video" value="{{ isset($business) ? $business->video : old('video') }}">

                                <div class='row mb-4'>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fieldlabels">Cover image:
                                                <span class="text-secondary"><span class="text-danger">* </span>Maximum
                                                    image size:
                                                    2MB (W:1080× H:600)
                                                </span>
                                            </label>
                                            <div class="input-group">
                                                <input type="file" required class="form-control mb-3" name="coverImage"
                                                    id="coverImage" data-max-size="1024">
                                                <div class="mt-3 d-grid justify-items-center">
                                                    <img class="rounded-3 img-fluids shadow"
                                                        src="{{ isset($business) && $business->coverImage ? asset('uploads/' . $business->coverImage) : asset('images/no-image.png') }}"
                                                        alt="" style="height: 100px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="fieldlabels" class=" fieldlabels">
                                                Author:<span class="text-secondary"><span class="text-danger">*
                                                    </span>Maximum image size: 2MB(W:1080×
                                                    H:600)</span>
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control mb-3" required type="file" name="logo"
                                                    id="logo" data-max-size="1024">
                                                <div class="mt-3 d-grid justify-items-center ">
                                                    <img class="rounded-3 img-fluids shadow"
                                                        src="{{ isset($business) && $business->logo ? asset('uploads/' . $business->logo) : asset('images/no-image.png') }}"
                                                        alt="" style="height: 100px;" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="fieldlabels">Business Photos (Drag & Drop Images Here Max 5 ):<span
                                            class="text-secondary"><span class="text-danger">* </span>Maximum image
                                            size:2MB (W:1080× H:600)
                                        </span></label>
                                    <div id="drop-area" class="border rounded p-3">
                                        <input type="file" class="form-control mb-3" required name="galleryImage[]"
                                            id="galleryImage" data-max-size="1024" multiple accept="image/*">
                                        <input type="hidden" name="galleryImageCount" id="galleryImageCount" value="0">
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
                                </div>

                                <div class="form-group">
                                    <label for="fieldlabels" class=" fieldlabels">
                                        Business Ownership Proof (Upload PDF):<span class="text-secondary"><span
                                                class="text-danger">* </span>Maximum image
                                            size: 2MB(W:1080× H:600) </span></label>
                                    <div class="input-group">
                                        <input class="form-control mb-3" type="file" required name="documentImage"
                                            id="documentImage" accept=".pdf">
                                        <a class="btn btn-dark"
                                            href="{{ isset($business) && $business->documentImage ? asset('uploads/' . $business->documentImage) : asset('images/no-image.png') }}"
                                            alt="" download>Uploaded Document <i class="fa fa-file"></i></a>
                                    </div>
                                    <p>No business docs?
                                        Use Aadhar card for ID verification.</p>
                                </div>

                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('msform').addEventListener('submit', function(event) {
        var placeAddress = document.getElementById('placeAddress').value.trim();
        console.log(placeAddress);
        if (!placeAddress) {
            event.preventDefault(); // Prevent form submission
            alert('error-message');
            document.getElementById('error-message').style.display = 'block'; // Display error message
        } else {
            alert('error-message');
            document.getElementById('error-message').style.display = 'block'; // Hide error message if filled
        }
    });
</script>
<script>
    $(document).ready(function() {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function() {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(++current);
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $(".submit").click(function() {
        return false;
    })

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
document.getElementById('documentImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const pdfPreview = document.getElementById('pdfPreview');

    if (file && file.type === 'application/pdf') {
        const reader = new FileReader();

        reader.onload = function(e) {
            const pdfData = new Uint8Array(e.target.result);

            // Initialize PDF.js
            pdfjsLib.getDocument({
                data: pdfData
            }).promise.then(function(pdf) {
                pdf.getPage(1).then(function(page) {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    const viewport = page.getViewport({
                        scale: 0.5
                    });

                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    page.render({
                        canvasContext: context,
                        viewport: viewport
                    }).promise.then(function() {
                        const imageData = canvas.toDataURL();
                        pdfPreview.src = imageData;
                    });
                });
            });
        };

        reader.readAsArrayBuffer(file);
    } else {
        // Handle cases where the selected file is not a PDF
        pdfPreview.src = 'images/no-image.png'; // Display a default image
    }
});
</script>

<script>
    // Handle the checkbox state
$('.custom-checkbox input[type="checkbox"]').on('change', function() {
    if ($(this).is(':checked')) {
        // Checkbox is checked
        $(this).next('.checkmark').css('background-color', '#23d3d3'); // Update selected color
    } else {
        // Checkbox is unchecked
        $(this).next('.checkmark').css('background-color', '#ddd'); // Revert to normal color
    }
});

var editor = CKEDITOR.replace('description', {});

</script>
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);
</script>

@endsection
