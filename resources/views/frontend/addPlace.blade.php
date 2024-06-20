@extends('frontend.layouts.master')
@section('title', 'Add Place')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
            <div class="card px-1 pt-4 pb-0 mt-3 mb-3">
                <h2 id="heading">Ready to promote your business?</h2>
                <p>Fill the form below</p>
                {{-- <ul id="progressbar">
                    <li class="active" id="account"><strong>Genaral info</strong></li>
                    <li id="personal"><strong>Hightlight</strong></li>
                    <li id="payment"><strong>Location</strong></li>
                    <li id="confirm"><strong>Submission </strong></li>
                </ul> --}}
                <div class="nav flex-row d-flex justify-content-around nav-pills me-3 pt-4 pb-3" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">General Information</button>
                </div>
                <div class="">
                    <form action="{{ route('savePlace') }}" method="POST" class="upload-form"
                        enctype="multipart/form-data" id="msform">
                        @csrf
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab" tabindex="0">
                                <div class="form-card">

                                    <label class="fieldlabels">Business Name:<span style='color:red'>*</span></label>
                                    <input type="text" placeholder="What is the name of the place" name="businessName"
                                        id="businessName" class="form-control">
                                    @error('businessName')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror
                                    <label class="fieldlabels">Tagline :</label>
                                    <input class="form-control mb-3" type="text" placeholder="Your tagline here"
                                        name="additionalFields" id="additionalFields"
                                        value="">
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

                                    <label class="fieldlabels">Business Description: <span
                                            style='color:red'>*</span></label>
                                    {{-- CKeditor --}}
                                    <textarea name="description" id="description" placeholder="Description"
                                        class="form-control"></textarea>

                                    {{-- <textarea placeholder="Description" id="description" name="description"
                                        rows="4" cols="65" class="form-control"></textarea> --}}
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
                                    <select data-placeholder="Select Category" class=" form-control mb-3 chosen-select" id="category"
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
                                    <select data-placeholder="Select Place Type mt-3" multiple
                                        class="chosen-select form-control" id="placeType" name="placeType[]">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($Placetype as $value)
                                        <option>{{ $value->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('placeType')
                                    <div class="has-error mt-2">{{ $message }}</div>
                                    @enderror

                                    <label class="fieldlabels mt-4"> Business Register Number: </label>
                                    <select data-placeholder="Select Place option" id="dType" name="dType"
                                        class=" form-control" onchange="showTextBox()" class="mb-3">
                                        <option value="" selected disabled>Select an option (optional)</option>
                                        <option value="gst">GST (optional)</option>
                                        <option value="cin">CIN (optional)</option>
                                    </select>

                                    <div id="textBoxContainer" style="display: none;" class="mt-3">
                                        <label for="textBox">Enter the details:</label>
                                        <input type="text" id="dNumber" name="dNumber" placeholder="Enter GST or CIN">
                                    </div>

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

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
