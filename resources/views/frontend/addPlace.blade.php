@extends('frontend.layouts.master')
@section('title', 'Add Place')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-1 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Ready to promote your business?</h2>
                <p>Fill all form field to go to next step</p>
                <form action="{{ route('savePlace') }}" method="POST" class="upload-form" enctype="multipart/form-data"
                    id="msform">
                    @csrf
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
                            <label class="fieldlabels">Business Name:<span style='color:red'>*</span></label>
                            <input type="text" placeholder="What is the name of the place" name="businessName"
                                id="businessName" class="form-control">
                            @error('businessName')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Owner Name/Authorized person:<span
                                    style='color:red'>*</span></label>
                            <input type="text" placeholder="Owner Name" id="ownerName" name="ownerName"
                                class="form-control ">
                            @error('ownerName')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                            <label class="fieldlabels">Price: </label>
                            <input type="text" placeholder="Price" name="price" id="price" class="form-control">
                            @error('price')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Business Description: <span style='color:red'>*</span></label>
                            {{-- CKeditor --}}
                            <textarea name="description" id="description" placeholder="Description" class="form-control"></textarea>

                            {{-- <textarea placeholder="Description" id="description" name="description" rows="4" cols="65"
                                class="form-control"></textarea> --}}
                            @error('description')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <!-- <label class="fieldlabels">Business Timing: <span style='color:red'>*</span></label>
                                <input type="text" placeholder="Duration" id="duration" name="duration"
                                    class="form-control">
                                @error('duration')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                @enderror -->

                            <label class="fieldlabels mt-3 ">Category: <span style='color:red'>*</span></label>
                            <select data-placeholder="Select Category" class=" form-control mb-3" id="category"
                                name="category">
                                <option value="" selected disable>Select</option>
                                @foreach ($category as $value)
                                <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Place Type: </label>
                            <select data-placeholder="Select Place Type" multiple class="chosen-select form-control"
                                id="placeType" name="placeType[]">
                                <option value="" selected disabled>Select</option>
                                @foreach ($Placetype as $value)
                                <option>{{ $value->title }}</option>
                                @endforeach
                            </select>
                            @error('placeType')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels mt-4"> Business Register Number: </label>
                            <select data-placeholder="Select Place option" id="dType" name="dType" class=" form-control"
                                onchange="showTextBox()" class="mb-3">
                                <option value="" selected disabled>Select an option (optional)</option>
                                <option value="gst">GST (optional)</option>
                                <option value="cin">CIN (optional)</option>
                            </select>

                            <div id="textBoxContainer" style="display: none;" class="mt-3">
                                <label for="textBox">Enter the details:</label>
                                <input type="text" id="dNumber" name="dNumber" placeholder="Enter GST or CIN">
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
                                <select data-placeholder="Select City" class=" form-control" id="city" name="city">
                                    <option value="" selected disabled>Select City</option>
                                    @foreach ($City as $value)
                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
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
                                    <option value="" selected disabled>Select Booking Type</option>
                                    @foreach ($bookingType as $value)
                                    <option value="{{ $value->title }}">{{ $value->title }}</option>
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
                                class="form-control ">

                            <label class="fieldlabels">Instagram URL :</label>
                            <input type="url" placeholder="Your Instagram URL" name="instagram" id="instagram"
                                class="form-control ">

                            <label class="fieldlabels">Facebook URL :</label>
                            <input type="url" placeholder="Your Facebook URL" name="facebook" id="facebook"
                                class="form-control ">

                            <label class="fieldlabels">Website :</label>
                            <input type="url" placeholder="Your website url" name="websiteUrl" id="websiteUrl"
                                class="form-control ">
                            @error('websiteUrl')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Additional Fields :</label>
                            <input type="url" placeholder="Your additional fields url" name="additionalFields"
                                id="additionalFields" class="form-control ">
                            <label class="fieldlabels mb-3">Highlight :</label>
                            <br>
                            @foreach ($Highlight as $value)
                            <label for="highlight_{{ $value->id }}" class="fieldlabels custom-checkbox">
                                <input type="checkbox" name="highlight[]" id="highlight_{{ $value->id }}"
                                    value="{{ $value->title }}">
                                <span class="checkmark"></span>
                                {{ $value->title }}
                            </label>
                            @endforeach

                        </div>
                        @error('highlight')
                        <div class="has-error mb-3">{{ $message }}</div>
                        @enderror

                        <input type="button" name="next" class="next action-button" value="Next" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
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
                            <input type="text" placeholder="Full Address" id="placeAddress" name="placeAddress"
                                class="form-control">
                            @error('placeAddress')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                            <label class="fieldlabels">Email:</label>
                            <input type="email" placeholder="Your email address" id="email" name="email"
                                class="form-control ">
                            @error('email')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Business Number:<span style='color:red'>*</span></label>
                            <input type="number" placeholder="Your phone number" name="phoneNumber1" id="phoneNumber1"
                                class="form-control ">
                            @error('phoneNumber1')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                            <label class="fieldlabels">Phone number 2:</label>
                            <input type="tel" placeholder="Your phone number" name="phoneNumber2" id="phoneNumber2">
                            @error('phoneNumber2')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror

                            <label class="fieldlabels">Business Whatsapp :</label>
                            <input type="tel" placeholder="Your WhatsApp number" name="whatsappNo" id="whatsappNo"
                                class="form-control ">

                            <label class="fieldlabels">Booking URL :</label>
                            <input type="url" placeholder="Your booking URL" name="bookingurl" id="bookingurl"
                                class="form-control ">
                            @error('bookingurl')
                            <div class="has-error mt-2">{{ $message }}</div>
                            @enderror
                            <label class="fieldlabels">Business Video (Youtube Link <b style='color:black'>iframe</b>)
                                :</label>
                            <input type="url" placeholder="https://www.youtube.com/embed/Lr2Xur5I-NU?,,...."
                                name="video" id="video">

                            <div class="">
                                <label class="fieldlabels">Cover image:
                                    <span class="text-danger">* Maximum image size:
                                        2MB (W:1080× H:600)
                                    </span>
                                </label>

                                <input type="file" name="coverImage" id="coverImage" class="upload-file"
                                    data-max-size="1024">
                                <img class="img_preview" src="images/no-image.png" alt="" />

                                @error('coverImage')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="">
                                <label class="fieldlabels">Business Photos (Drag & Drop Images Here Max 5 ):<span
                                        class="text-danger">* Maximum image size:2MB (W:1080× H:600)
                                    </span></label>

                                <input type="file" name="galleryImage[]" id="galleryImage" class="upload-file"
                                    data-max-size="1024" multiple accept="image/*">
                                <input type="hidden" name="galleryImageCount" id="galleryImageCount" value="0">
                                <div class="selected-files-count"></div>

                                @error('galleryImage')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="">
                                <!-- <label class="fieldlabels">Author:</label> -->
                                <label for="fieldlabels" class=" fieldlabels">
                                    Author:<span class="text-danger">* Maximum image size: 2MB(W:1080× H:600)</span>

                                </label>

                                <input type="file" name="logo" id="logo" class="upload-file" data-max-size="1024">
                                <img class="img_preview" src="images/no-image.png" alt="" />
                                <!-- <i class="la la-cloud-upload-alt"></i> -->

                                @error('logo')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="">
                                <!-- <label class="fieldlabels"></label> -->
                                <label for="fieldlabels" class=" fieldlabels">
                                    Business Ownership Proof (Upload PDF):<span class="text-danger">* Maximum image
                                        size: 2MB(W:1080× H:600) </span></label>
                                <p class="text-danger"></p>



                                <input type="file" name="documentImage" id="documentImage" class="upload-file"
                                    accept=".pdf">
                                <img class="img_preview" src="images/no-image.png" alt="" id="pdfPreview">

                                <p>No business docs?
                                    Use Aadhar card for ID verification.</p>

                                @error('documentImage')
                                <div class="has-error mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <input type="submit" name="submit" value="Submit" class="next action-button" id="upload-btn" />
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
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

@endsection