@include('media.header')


<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Profile 2</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Manage Account</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                                alt="profile-image">

                            <h4 class="mb-0 mt-2">John Doe</h4>
                            <p class="text-muted font-14">Founder</p>

                            <div class="text-start mt-3">

                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                        class="ms-2">Geneva
                                        John Doe</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Phone Number :</strong><span
                                        class="ms-2">(123)
                                        123 1234</span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                        class="ms-2 ">user@email.domain</span></p>

                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span
                                        class="ms-2">USA</span></p>
                            </div>


                        </div> <!-- end card-body -->
                    </div> <!-- end card -->



                </div> <!-- end col-->

                <div class="col-xl-8 col-lg-7">
                    <div class="card">


                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <form action="{{ route('sales_manager.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Sales Manager
                                Details</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            placeholder="Enter Full Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Phone Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email" required>
                                        <span class="form-text text-muted">
                                            <small>If you want to change email, please <a href="#">click
                                                    here</a>.</small>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nindetails" class="form-label">NIN Details</label>
                                        <input type="text" class="form-control" id="nindetails" name="nindetails"
                                            placeholder="Enter NIN Details" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="staffid" class="form-label">Staff ID</label>
                                        <input type="file" class="form-control" id="staffid" name="staffid" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="position" class="form-label">Position</label>
                                        <select class="form-control" id="position" name="position" required>
                                            <option value="">Select Position</option>
                                            <option value="general_manager">General Manager</option>
                                            <option value="sales_manager">Sales Manager</option>
                                            <option value="marketing_manager">Marketing Manager</option>
                                            <option value="staff_member">Staff Member</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                                Media Details</h5>

                            <!-- Media Type Radio Buttons -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="media_type" class="form-label">Media Type</label><br>
                                        <input type="radio" name="media_type" id="media_type_tv" value="tv"
                                            onclick="toggleMediaType('tv')"> TV
                                        <input type="radio" name="media_type" id="media_type_radio" value="radio"
                                            onclick="toggleMediaType('radio')"> Radio
                                        <input type="radio" name="media_type" id="media_type_internet" value="internet"
                                            onclick="toggleMediaType('internet')"> Internet
                                    </div>
                                </div>
                            </div>

                            <!-- TV Section (shown if media type is TV) -->
                            <div id="tv_section" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_type" class="form-label">TV Type</label>
                                            <select class="form-control" id="tv_type" name="tv_type">
                                                <option value="analogue">Analogue Terrestrial TV</option>
                                                <option value="satellite">Digital Satellite TV</option>
                                                <option value="cable">Cable TV</option>
                                                <option value="digital_terrestrial">Digital Terrestrial TV</option>
                                                <option value="web">Web TV</option>
                                                <option value="iptv">IPTV</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_name" class="form-label">TV Station Name</label>
                                            <input type="text" class="form-control" id="tv_name" name="tv_name"
                                                placeholder="Enter Station Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_logo" class="form-label">TV Logo</label>
                                            <input type="file" class="form-control" id="tv_logo" name="tv_logo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_main_studio_location" class="form-label">Main Studio
                                                Location</label>
                                            <select class="form-control" id="tv_main_studio_location"
                                                name="tv_main_studio_location">
                                                <option value="lagos">Lagos</option>
                                                <option value="abuja">Abuja</option>
                                                <!-- Add more states as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_channel_location" class="form-label">Channel
                                                Location</label><br>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="tv_channel_location[]" value="dstv" id="dstv">
                                                <label class="form-check-label" for="dstv">DStv</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="tv_channel_location[]" value="startimes" id="startimes">
                                                <label class="form-check-label" for="startimes">Startimes</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="tv_channel_location[]" value="gotv" id="gotv">
                                                <label class="form-check-label" for="gotv">Gotv</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="tv_channel_location[]" value="youtube" id="youtube">
                                                <label class="form-check-label" for="youtube">YouTube</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="other"
                                                    value="other">
                                                <label class="form-check-label" for="other">Other:</label>
                                            </div>
                                            <div class="form-group" id="other_input" style="display:none;">
                                                <input type="text" class="form-control" name="tv_channel_location_other"
                                                    placeholder="Specify other channel">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_content_focus" class="form-label">Content Focus</label>
                                            <select class="form-control" id="tv_content_focus" name="tv_content_focus">
                                                <option value="news">News</option>
                                                <option value="sports">Sports</option>
                                                <option value="entertainment">Entertainment</option>
                                                <option value="movies">Movies</option>
                                                <option value="education">Education</option>
                                                <option value="music">Music</option>
                                                <option value="lifestyle">Lifestyle</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="content_focus_other_input" style="display:none;">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="content_focus_other"
                                                name="tv_content_focus_other" placeholder="Specify other content focus">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="target_audience" class="form-label">Target Audience</label>
                                            <select class="form-control" id="target_audience" name="target_audience">
                                                <option value="children">Children (0-12)</option>
                                                <option value="teens">Teens (13-17)</option>
                                                <option value="adults_18_34">Adults (18-34)</option>
                                                <option value="adults_35_54">Adults (35-54)</option>
                                                <option value="seniors">Seniors (55+)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Peak Viewing Times -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tv_peak_viewing_times" class="form-label">Peak Viewing Times</label><br>

                                    <!-- Checkbox for each Peak Viewing Times -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_peak_viewing_times[]"
                                            value="Morning" id="Morning">
                                        <label class="form-check-label" for="Morning">Morning (6AM – 12PM)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_peak_viewing_times[]"
                                            value="Afternoon" id="Afternoon">
                                        <label class="form-check-label" for="Afternoon">Afternoon (12PM – 5PM)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_peak_viewing_times[]"
                                            value="Evening" id="Evening">
                                        <label class="form-check-label" for="Evening">Evening (5PM – 10PM)</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_peak_viewing_times[]"
                                            value="Late Night" id="LateNight">
                                        <label class="form-check-label" for="LateNight">Late Night (10PM – 6AM)</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tv_youtube" class="form-label">YouTube</label>
                                    <input type="text" class="form-control" id="tv_youtube" name="tv_youtube"
                                        placeholder="YouTube URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_website" class="form-label">Website</label>
                                    <input type="text" class="form-control" id="tv_website" name="tv_website"
                                        placeholder="Website URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_streaming_url" class="form-label">Streaming URL</label>
                                    <input type="text" class="form-control" id="tv_streaming_url"
                                        name="tv_streaming_url" placeholder="Streaming URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_advert_rate" class="form-label">Advert Rate</label>
                                    <input type="file" class="form-control" id="tv_advert_rate" name="tv_advert_rate">
                                </div>
                            </div>

                            <!-- Social Media and Contact -->
                            <div class="col-md-12">
                                <h4>Social Media</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tv_facebook" class="form-label">Facebook</label>
                                    <input type="text" class="form-control" id="tv_facebook" name="tv_facebook"
                                        placeholder="Facebook URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_twitter" class="form-label">X (Twitter)</label>
                                    <input type="text" class="form-control" id="tv_twitter" name="tv_twitter"
                                        placeholder="X (Twitter) URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_instagram" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" id="tv_instagram" name="tv_instagram"
                                        placeholder="Instagram URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_linkedin" class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" id="tv_linkedin" name="tv_linkedin"
                                        placeholder="LinkedIn URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_tiktok" class="form-label">TikTok</label>
                                    <input type="text" class="form-control" id="tv_tiktok" name="tv_tiktok"
                                        placeholder="TikTok URL">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_other" class="form-label">Other</label>
                                    <input type="text" class="form-control" id="tv_other" name="tv_other"
                                        placeholder="Other Social Media URL">
                                </div>
                            </div>

                            <!-- Contact Fields -->
                            <h4>Media Contact Details</h4>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tv_email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="tv_email" name="tv_email"
                                        placeholder="Email Address">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="tv_phone" name="tv_phone"
                                        placeholder="Phone Number">
                                </div>
                                <div class="mb-3">
                                    <label for="tv_contact_person" class="form-label">Contact Person</label>
                                    <input type="text" class="form-control" id="tv_contact_person"
                                        name="tv_contact_person" placeholder="Contact Person">
                                </div>
                            </div>

                            <!-- Radio Section -->
                            <div id="radio_section" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_type_select" class="form-label">Radio Type</label>
                                            <select class="form-control" id="radio_type_select" name="radio_type">
                                                <option value="private">Private</option>
                                                <option value="government">Government</option>
                                                <option value="community">Community</option>
                                                <option value="campus">Campus</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_name" class="form-label">Radio Station Name</label>
                                            <input type="text" class="form-control" id="radio_name" name="radio_name"
                                                placeholder="Enter Station Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_logo" class="form-label">Radio Station Logo</label>
                                            <input type="file" class="form-control" id="radio_logo" name="radio_logo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_frequency" class="form-label">Frequency (FM/AM)</label>
                                            <input type="text" class="form-control" id="radio_frequency"
                                                name="radio_frequency" placeholder="Enter Frequency">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_station_location" class="form-label">Radio Station
                                                Location</label>
                                            <select class="form-control" id="radio_station_location"
                                                name="radio_station_location">
                                                <option value="lagos">Lagos</option>
                                                <option value="abuja">Abuja</option>
                                                <!-- Add more states as needed -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="content_focus" class="form-label">Content Focus</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="content_focus[]"
                                                    value="news" id="news">
                                                <label class="form-check-label" for="news">News</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="content_focus[]"
                                                    value="music" id="music">
                                                <label class="form-check-label" for="music">Music</label>
                                            </div>
                                            <!-- Add more checkboxes for content focus -->
                                        </div>
                                    </div>

                                    <!-- Add more fields like target audience, peak viewing times, etc. -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_youtube" class="form-label">YouTube</label>
                                            <input type="text" class="form-control" id="radio_youtube"
                                                name="radio_youtube" placeholder="YouTube URL">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_facebook" class="form-label">Facebook</label>
                                            <input type="text" class="form-control" id="radio_facebook"
                                                name="radio_facebook" placeholder="Facebook URL">
                                        </div>
                                    </div>
                                    <!-- Add more social media fields as needed -->
                                </div>
                            </div>
                            <h4>Media Contact Details</h4>
                            <div class="row">
                                <!-- Contact Fields -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="radio_email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="radio_email" name="radio_email"
                                            placeholder="Email Address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="radio_phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="radio_phone" name="radio_phone"
                                            placeholder="Phone Number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="radio_contact_person" class="form-label">Contact Person</label>
                                        <input type="text" class="form-control" id="radio_contact_person"
                                            name="radio_contact_person" placeholder="Contact Person" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Internet Section -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="internet_type_select" class="form-label">Internet Media Type</label>
                                        <select class="form-control" id="internet_type_select" name="internet_type">
                                            <option value="live_streaming">Live Streaming</option>
                                            <option value="on_demand">On-Demand Content</option>
                                            <option value="podcasting">Podcasting</option>
                                            <option value="web_radio">Web Radio</option>
                                            <option value="youtubing">Youtubing</option>
                                            <option value="skit_making">Skit Making</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- TV Brand Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name" required>
                                    </div>

                                    <!-- TV Logo -->
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>
                                </div>
                            </div>

                            <!-- Channel Location -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tv_channel_location" class="form-label">Platform</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_channel_location[]"
                                            value="youtube" id="youtube">
                                        <label class="form-check-label" for="youtube">YouTube</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tv_channel_location[]"
                                            value="twitter" id="twitter">
                                        <label class="form-check-label" for="twitter">X(Twitter)</label>
                                    </div>
                                    <!-- More checkboxes... -->
                                </div>
                            </div>

                            <!-- Content Focus -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tv_content_focus" class="form-label">Content Focus</label>
                                    <select class="form-control" id="tv_content_focus" name="tv_content_focus">
                                        <option value="news">News</option>
                                        <option value="sports">Sports</option>
                                        <!-- More options... -->
                                    </select>
                                </div>
                            </div>

                            <!-- Target Audience -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="target_audience" class="form-label">Target Audience</label>
                                    <select class="form-control" id="target_audience" name="target_audience">
                                        <option value="children">Children (0-12)</option>
                                        <option value="teens">Teens (13-17)</option>
                                        <!-- More options... -->
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <!-- Broadcast Duration -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="broadcast_duration" class="form-label">Broadcast Duration</label>
                                        <select class="form-control" id="broadcast_duration" name="broadcast_duration">
                                            <option value="Less_than_30_minutes">Less than 30 minutes</option>
                                            <option value="30_minutes_1_hour">30 minutes – 1 hour</option>
                                            <option value="1_2_hours">1 – 2 hours</option>
                                            <option value="Over_2_hours">Over 2 hours</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Social Media Posting Frequency -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="often_post" class="form-label">How frequently do you post on social
                                            media?</label>
                                        <select class="form-control" id="often_post" name="often_post">
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="occasionally">Occasionally</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Internet Media Details -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="internet_youtube" class="form-label">YouTube</label>
                                        <input type="text" class="form-control" id="internet_youtube"
                                            name="internet_youtube" placeholder="YouTube URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_website" class="form-label">Website</label>
                                        <input type="text" class="form-control" id="internet_website"
                                            name="internet_website" placeholder="Website URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_streaming_url" class="form-label">Streaming URL</label>
                                        <input type="text" class="form-control" id="internet_streaming_url"
                                            name="internet_streaming_url" placeholder="Streaming URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_advert_rate" class="form-label">Advert Rate</label>
                                        <input type="file" class="form-control" id="internet_advert_rate"
                                            name="internet_advert_rate">
                                    </div>
                                </div>

                                <!-- Social Media and Contact -->
                                <div class="col-md-12">
                                    <h4>Social Media</h4>
                                </div>

                                <!-- Social Media Fields -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="internet_facebook" class="form-label">Facebook</label>
                                        <input type="text" class="form-control" id="internet_facebook"
                                            name="internet_facebook" placeholder="Facebook URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_twitter" class="form-label">X (Twitter)</label>
                                        <input type="text" class="form-control" id="internet_twitter"
                                            name="internet_twitter" placeholder="X (Twitter URL)">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_instagram" class="form-label">Instagram</label>
                                        <input type="text" class="form-control" id="internet_instagram"
                                            name="internet_instagram" placeholder="Instagram URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_linkedin" class="form-label">LinkedIn</label>
                                        <input type="text" class="form-control" id="internet_linkedin"
                                            name="internet_linkedin" placeholder="LinkedIn URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_tiktok" class="form-label">TikTok</label>
                                        <input type="text" class="form-control" id="internet_tiktok"
                                            name="internet_tiktok" placeholder="TikTok URL">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_other" class="form-label">Other</label>
                                        <input type="text" class="form-control" id="internet_other"
                                            name="internet_other" placeholder="Other Social Media URL">
                                    </div>
                                </div>

                                <!-- Contact Details -->
                                <div class="col-md-12">
                                    <h4>Contact Details</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="internet_email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="internet_email"
                                            name="internet_email" placeholder="Email Address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="internet_phone" name="internet_phone"
                                            placeholder="Phone Number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="internet_contact_person" class="form-label">Contact Person</label>
                                        <input type="text" class="form-control" id="internet_contact_person"
                                            name="internet_contact_person" placeholder="Contact Person">
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row-->

</div>
<!-- container -->

</div>
<!-- content -->





<script>
    document.getElementById('other_internet').addEventListener('change', function () {
                  var otherInput = document.getElementById('other_internet_input');
                  if (this.checked) {
                    otherInput.style.display = 'block';
                  } else {
                    otherInput.style.display = 'none';
                  }
                });
</script>




<!-- JavaScript to toggle the "Other" input field -->
<script>
    document.getElementById('other_content').addEventListener('change', function () {
      var otherInput = document.getElementById('other_content_input');
      if (this.checked) {
        otherInput.style.display = 'block';
      } else {
        otherInput.style.display = 'none';
      }
    });
</script>



<!-- JavaScript to Toggle Sections -->


<script>
    function toggleMediaType(type) {
        document.getElementById('tv_section').style.display = 'none';
        document.getElementById('radio_section').style.display = 'none';
        document.getElementById('internet_section').style.display = 'none';
    
        if (type === 'tv') {
            document.getElementById('tv_section').style.display = 'block';
        } else if (type === 'radio') {
            document.getElementById('radio_section').style.display = 'block';
        } else if (type === 'internet') {
            document.getElementById('internet_section').style.display = 'block';
        }
    }
</script>

<!-- JavaScript to Toggle Other Inputs -->
<script>
    document.getElementById('other').addEventListener('change', function () {
        var otherInput = document.getElementById('other_input');
        if (this.checked) {
            otherInput.style.display = 'block';
        } else {
            otherInput.style.display = 'none';
        }
    });
    
    function toggleOtherContentFocus() {
        var selectElement = document.getElementById('tv_content_focus');
        var otherInputDiv = document.getElementById('content_focus_other_input');
        var otherValue = selectElement.value;
    
        if (otherValue === 'other') {
            otherInputDiv.style.display = 'block';
        } else {
            otherInputDiv.style.display = 'none';
        }
    }
</script>
@include('media.footer')