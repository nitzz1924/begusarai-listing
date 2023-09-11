@extends('frontend.layouts.master')
@section('title', 'Add Place')
@section('content')

    <main id="main" class="site-main listing-main">
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
            <form action="#" class="upload-form">
                <div class="listing-box" id="genaral">
                    <h3>Genaral</h3>
                    <div class="field-inline">
                        <div class="field-group field-input">
                            <label for="place_name">Place Name</label>
                            <input type="text" id="place_name" placeholder="What the name of place" name="place_name">
                        </div>
                        <div class="field-group field-select">
                            <label for="price_range">Price Range</label>
                            <select name="price_range" id="price_range">
                                <option value="0">None</option>
                                <option value="1">$</option>
                                <option value="2">$$</option>
                                <option value="3">$$$</option>
                                <option value="4">$$$$</option>
                            </select>
                            <i class="la la-angle-down"></i>
                        </div>
                    </div>
                    <div class="field-group">
                        <h4 class="label">Description</h4>
                        <div id="editor"></div>
                    </div>
                    <div class="field-group field-select">
                        <label for="lis_category">Category</label>
                        <select data-placeholder="Select Category" multiple class="chosen-select" name="lis_category"
                            id="lis_category">
                            <option value="1">See & Do</option>
                            <option value="2">Food & Drink</option>
                            <option value="3">Stay</option>
                            <option value="4">Shop</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                    <div class="field-group field-select">
                        <label for="lis_place_type">Place Type</label>
                        <select data-placeholder="Select Place Type" multiple class="chosen-select" name="lis_place_type"
                            id="lis_place_type">
                            <option value="1">Bar</option>
                            <option value="2">Sea Food</option>
                        </select>
                        <i class="la la-angle-down"></i>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="hightlight">
                    <h3>HighLights</h3>
                    <div class="field-group field-check">
                        <label for="free_wifi">
                            <input type="checkbox" name="lis_highlight" id="free_wifi" value="Free wifi">Free wifi
                            <span class="checkmark">
                                <i class="la la-check"></i>
                            </span>
                        </label>
                        <label for="credit_card">
                            <input type="checkbox" name="lis_highlight" id="credit_card" value="Credit card">Credit card
                            <span class="checkmark">
                                <i class="la la-check"></i>
                            </span>
                        </label>

                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="location">
                    <h3>Location</h3>
                    <div class="field-group">
                        <label for="place_address">Place Address</label>
                        <input type="text" id="place_address" placeholder="Full Address" name="place_address">
                    </div>
                    <div class="field-group field-maps">
                        <div class="field-inline">
                            <label for="pac-input">Place Location at Google Map</label>
                            <div class="field-button field-pin">
                                <a href="#" id="drop" onclick="drop()">
                                    <i class="la la-lock"></i>
                                    Unlock Pin Location
                                </a>
                                <a href="#" id="clear" onclick="clearMarkers()">
                                    <?xml version="1.0" encoding="UTF-8"?>
                                    <i class="la la-lock-open"></i>
                                    Lock Pin Location
                                </a>
                            </div>
                        </div>
                        <div class="field-map">
                            <input id="pac-input" class="address-input" type="text" placeholder="Search Box">
                            <div id="location-map"></div>
                        </div>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="contact">
                    <h3>Contact Info</h3>
                    <div class="field-group">
                        <label for="place_email">Email</label>
                        <input type="email" id="place_email" placeholder="Your email address" name="place_email">
                    </div>
                    <div class="field-group">
                        <label for="place_number">Phone number (optional)</label>
                        <input type="tel" id="place_number" placeholder="Your phone number" name="place_number">
                    </div>
                    <div class="field-group">
                        <label for="place_website">Website (optional)</label>
                        <input type="url" id="place_website" placeholder="Your website url" name="place_website">
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="social">
                    <h3>Social Networks</h3>
                    <div class="field-group">
                        <label for="place_socials">Social Networks (optional)</label>
                        <div class="field-clone">
                            <div class="field-inline field-3col">
                                <div class="field-group field-select">
                                    <select name="place_socials" id="place_socials">
                                        <option value="0">Select network</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>

                                    </select>
                                    <i class="la la-angle-down"></i>
                                </div>
                                <div class="field-group field-input">
                                    <input type="url" placeholder="Enter Url" value="">
                                </div>
                                <a href="#" class="remove-social">
                                    <i class="la la-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="socials-list"></div>
                        <a href="#social" class="add-social btn">
                            <i class="la la-plus"></i>
                            <span>Add more</span>
                        </a>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="open">
                    <h3>Opening Hours</h3>
                    <div class="field-group">
                        <label for="place_email">Select days to add hours</label>
                        <div class="field-accordion">
                            <div class="accordion-item">
                                <div class="accordion-top field-check">
                                    <label for="monday">
                                        <input type="checkbox" name="open_hours" id="monday" value="Monday">Monday
                                        <span class="checkmark">
                                            <i class="la la-check"></i>
                                        </span>
                                    </label>
                                    <span>Closed</span>
                                </div>
                                <div class="accordion-bot">
                                    <div class="field-inline">
                                        <div class="field-group field-select">
                                            <select name="open_time">
                                                <option value="00AM">00:00 AM</option>
                                                <option value="01AM">01:00 AM</option>
                                                <option value="02AM">02:00 AM</option>
                                                <option value="03AM">03:00 AM</option>
                                                <option value="04AM">04:00 AM</option>
                                                <option value="05AM">05:00 AM</option>
                                                <option value="06AM">06:00 AM</option>
                                                <option value="07AM">07:00 AM</option>
                                                <option value="08AM">08:00 AM</option>
                                                <option value="09AM">09:00 AM</option>
                                                <option value="10AM">10:00 AM</option>
                                                <option value="11AM">11:00 AM</option>
                                                <option value="12PM">12:00 PM</option>
                                                <option value="01PM">01:00 PM</option>
                                                <option value="02PM">02:00 PM</option>
                                                <option value="03PM">03:00 PM</option>
                                                <option value="04PM">04:00 PM</option>
                                                <option value="05PM">05:00 PM</option>
                                                <option value="06PM">06:00 PM</option>
                                                <option value="07PM">07:00 PM</option>
                                                <option value="08PM">08:00 PM</option>
                                                <option value="09PM">09:00 PM</option>
                                                <option value="10PM">10:00 PM</option>
                                                <option value="11PM">11:00 PM</option>
                                            </select>
                                            <i class="la la-angle-down"></i>
                                        </div>
                                        <div class="field-group field-select">
                                            <select name="close_time">
                                                <option value="00AM">00:00 AM</option>
                                                <option value="01AM">01:00 AM</option>
                                                <option value="02AM">02:00 AM</option>
                                                <option value="03AM">03:00 AM</option>
                                                <option value="04AM">04:00 AM</option>
                                                <option value="05AM">05:00 AM</option>
                                                <option value="06AM">06:00 AM</option>
                                                <option value="07AM">07:00 AM</option>
                                                <option value="08AM">08:00 AM</option>
                                                <option value="09AM">09:00 AM</option>
                                                <option value="10AM">10:00 AM</option>
                                                <option value="11AM">11:00 AM</option>
                                                <option value="12PM">12:00 PM</option>
                                                <option value="01PM">01:00 PM</option>
                                                <option value="02PM">02:00 PM</option>
                                                <option value="03PM">03:00 PM</option>
                                                <option value="04PM">04:00 PM</option>
                                                <option value="05PM">05:00 PM</option>
                                                <option value="06PM">06:00 PM</option>
                                                <option value="07PM">07:00 PM</option>
                                                <option value="08PM">08:00 PM</option>
                                                <option value="09PM">09:00 PM</option>
                                                <option value="10PM">10:00 PM</option>
                                                <option value="11PM">11:00 PM</option>
                                            </select>
                                            <i class="la la-angle-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- .listing-box -->
                <div class="listing-box" id="media">
                    <h3>Media</h3>
                    <div class="field-group field-file">
                        <label for="cover_img">Cover image</label>
                        <label for="cover_img" class="preview">
                            <input type="file" id="cover_img" name="cover_img" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <div class="field-group field-file">
                        <label for="gallery_img">Gallery Images (optional)</label>
                        <label for="gallery_img" class="preview">
                            <input type="file" id="gallery_img" name="gallery_img" class="upload-file"
                                data-max-size="1024">
                            <img class="img_preview" src="images/no-image.png" alt="" />
                            <i class="la la-cloud-upload-alt"></i>
                        </label>
                        <div class="field-note">Maximum file size: 1 MB.</div>
                    </div>
                    <div class="field-group">
                        <label for="place_video">Video (optional)</label>
                        <input type="url" id="place_video" placeholder="Youtube video url" name="place_video">
                    </div>
                </div><!-- .listing-box -->
                <div class="field-group field-submit">
                    <input type="submit" name="submit" value="Submit" class="btn">
                </div>
            </form>
        </div><!-- .listing-content -->
    </main><!-- .site-main -->


@endsection
