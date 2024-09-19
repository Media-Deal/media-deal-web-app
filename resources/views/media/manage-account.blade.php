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
                                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    <h4 class="mb-0 mt-2">John Doe</h4>
                                    <p class="text-muted font-14">Founder</p>

                                    <div class="text-start mt-3">
                                       
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva
                                                John Doe</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Phone Number :</strong><span class="ms-2">(123)
                                                123 1234</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
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
                                            <form>
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Sales Manager Details</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Full Name</label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="Enter Full Name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Phone Number</label>
                                                            <input type="number" class="form-control" id="lastname" placeholder="Enter Phone Number">
                                                        </div>
                                                    </div> <!-- end col -->

                                                   
                                                </div> <!-- end row -->


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                            <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="userpassword" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                                            <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                                        </div>
                                                    </div> <!-- end col -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nindetails" class="form-label">NIN Details</label>
                                                            <input type="text" class="form-control" id="nindetails" name="nindetails" placeholder="Enter NIN Details">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="staffid" class="form-label">Staff ID</label>
                                                            <input type="file" class="form-control" id="staffid" name="staffid" >
                                                        </div>
                                                    </div> <!-- end col -->

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="position" class="form-label">Position</label>
                                                            <select class="form-control" id="position" name="position">
                                                                <option value="">Select Position</option>
                                                                <option value="general_manager">General Manager</option>
                                                                <option value="sales_manager">Sales Manager</option>
                                                                <option value="marketing_manager">Marketing Manager</option>
                                                                <option value="staff_member">Staff Member</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> <!-- end row -->

                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Media Details</h5>
                                                <div class="row">
                                                    <!-- Media Type Radio Buttons -->
<div class="col-md-12">
    <div class="mb-3">
        <label for="media_type" class="form-label">Media Type</label><br>
        <input type="radio" name="media_type" id="media_type_tv" value="tv" onclick="toggleMediaType('tv')"> TV
        <input type="radio" name="media_type" id="media_type_radio" value="radio" onclick="toggleMediaType('radio')"> Radio
        <input type="radio" name="media_type" id="media_type_internet" value="internet" onclick="toggleMediaType('internet')"> Internet
    </div>
</div>

<!-- TV Section -->
<div id="tv_section" style="display: none;">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tv_type" class="form-label">TV Type</label>
            <select class="form-control" id="tv_type_select" name="tv_type">
                <option value="analogue">Analogue Terrestrial TV</option>
                <option value="satellite">Digital Satellite TV</option>
                <option value="cable">Cable TV</option>
                <option value="digital_terrestrial">Digital Terrestrial TV</option>
                <option value="web">Web TV</option>
                <option value="iptv">IPTV</option>
            </select>
        </div>
    </div>

    <!-- TV Name -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tv_name" class="form-label">TV Station Name</label>
            <input type="text" class="form-control" id="tv_name" name="tv_name" placeholder="Enter Station Name">
        </div>
    </div>

    <!-- TV Logo -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tv_logo" class="form-label">TV Logo</label>
            <input type="file" class="form-control" id="tv_logo" name="tv_logo">
        </div>
    </div>

    <!-- Main Studio Location -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="tv_main_studio_location" class="form-label">Main Studio Location</label>
            <select class="form-control" id="tv_main_studio_location" name="tv_main_studio_location">
                <!-- List of all states in Nigeria -->
                <option value="lagos">Lagos</option>
                <option value="abuja">Abuja</option>
                <!-- Add more states as needed -->
            </select>
        </div>
    </div>

   <!-- Channel Location -->
<div class="col-md-6">
<div class="mb-3">
<label for="tv_channel_location" class="form-label">Channel Location</label><br>

<!-- Checkbox for each channel location -->
<div class="form-check">
<input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="dstv" id="dstv">
<label class="form-check-label" for="dstv">DStv</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="startimes" id="startimes">
<label class="form-check-label" for="startimes">Startimes</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="gotv" id="gotv">
<label class="form-check-label" for="gotv">Gotv</label>
</div>

<div class="form-check">
<input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="youtube" id="youtube">
<label class="form-check-label" for="youtube">YouTube</label>
</div>

<!-- "Other" checkbox with a text input -->
<div class="form-check">
<input class="form-check-input" type="checkbox" id="other" value="other">
<label class="form-check-label" for="other">Other:</label>
</div>

<!-- Hidden text input for the "Other" option -->
<div class="form-group" id="other_input" style="display:none;">
<input type="text" class="form-control" name="tv_channel_location_other" placeholder="Specify other channel">
</div>
</div>
</div>




    <!-- Content Focus -->
<div class="col-md-6">
<div class="mb-3">
<label for="tv_content_focus" class="form-label">Content Focus</label>
<select class="form-control" id="tv_content_focus" name="tv_content_focus" onchange="toggleOtherContentFocus()">
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

<!-- Hidden text input for "Other" content focus -->
<div class="col-md-6" id="content_focus_other_input" style="display:none;">
<div class="mb-3">
<input type="text" class="form-control" id="content_focus_other" name="tv_content_focus_other" placeholder="Specify other content focus">
</div>
</div>

<!-- Target Audience -->
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


<!-- Peak Viewing Times -->
<div class="col-md-6">
    <div class="mb-3">
    <label for="tv_peak_viewing_times" class="form-label">Peak Viewing Times</label><br>
    
    <!-- Checkbox for each Peak Viewing Times -->
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Morning" value="Morning" id="Morning">
    <label class="form-check-label" for="Morning">Morning (6AM – 12PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Afternoon" value="Afternoon" id="Afternoon">
    <label class="form-check-label" for="Afternoon">Afternoon (12PM – 5PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Evening" value="Evening " id="gotv">
    <label class="form-check-label" for="gotv">Evening (5PM – 10PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Late Night" value="Late Night" id="Late Night">
    <label class="form-check-label" for="Late Night">Late Night (10PM – 6AM)</label>
    </div>    
    </div>




<div class="mb-3">
    <label for="tv_youtube" class="form-label">YouTube</label>
    <input type="text" class="form-control" id="tv_youtube" name="tv_youtube" placeholder="YouTube URL">
    </div>
    <div class="mb-3">
    <label for="tv_website" class="form-label">Website</label>
    <input type="text" class="form-control" id="tv_website" name="tv_website" placeholder="Website URL">
    </div>
    <div class="mb-3">
    <label for="tv_streaming_url" class="form-label">Streaming URL</label>
    <input type="text" class="form-control" id="tv_streaming_url" name="tv_streaming_url" placeholder="Streaming URL">
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

<!-- Social Media Fields (Facebook, Twitter, etc.) -->
<div class="col-md-6">
<div class="mb-3">
<label for="tv_facebook" class="form-label">Facebook</label>
<input type="text" class="form-control" id="tv_facebook" name="tv_facebook" placeholder="Facebook URL">
</div>
<div class="mb-3">
<label for="tv_twitter" class="form-label">X(Twitter)</label>
<input type="text" class="form-control" id="tv_twitter" name="tv_twitter" placeholder="X(Twitter) URL">
</div>
<div class="mb-3">
<label for="tv_instagram" class="form-label">Instagram</label>
<input type="text" class="form-control" id="tv_instagram" name="tv_instagram" placeholder="Instagram URL">
</div>
<div class="mb-3">
<label for="tv_linkedin" class="form-label">LinkedIn</label>
<input type="text" class="form-control" id="tv_linkedin" name="tv_linkedin" placeholder="LinkedIn URL">
</div>
<div class="mb-3">
<label for="tv_tiktok" class="form-label">TikTok</label>
<input type="text" class="form-control" id="tv_tiktok" name="tv_tiktok" placeholder="TikTok URL">
</div>
<div class="mb-3">
<label for="tv_other" class="form-label">Other</label>
<input type="text" class="form-control" id="tv_other" name="tv_other" placeholder="Other Social Media URL">
</div>

</div>

<!-- Contact Fields -->
<h4>Media Contact Details</h4>
<div class="col-md-6">
<div class="mb-3">
<label for="tv_email" class="form-label">Email Address</label>
<input type="email" class="form-control" id="tv_email" name="tv_email" placeholder="Email Address">
</div>
<div class="mb-3">
<label for="tv_phone" class="form-label">Phone Number</label>
<input type="tel" class="form-control" id="tv_phone" name="tv_phone" placeholder="Phone Number">
</div>
<div class="mb-3">
<label for="tv_contact_person" class="form-label">Contact Person</label>
<input type="text" class="form-control" id="tv_contact_person" name="tv_contact_person" placeholder="Contact Person">
</div>
</div>
<input type="submit" name="tv_submit">
    <!-- Additional fields for TV Section... -->
</div>

<!-- Radio Section -->
<div id="radio_section" style="display: none;">
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
    
                                                        <!-- Radio Station Name -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="radio_name" class="form-label">Radio Station Name</label>
                                                                <input type="text" class="form-control" id="radio_name" name="radio_name" placeholder="Enter Station Name">
                                                            </div>
                                                        </div>
                                                        <!-- Radio Station Logo -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="radio_name" class="form-label">Radio Station Logo</label>
                                                                <input type="file" class="form-control" id="radio_logo" name="radio_logo">
                                                            </div>
                                                        </div>
                                                
                                                        <!-- Radio Frequency -->
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="radio_frequency" class="form-label">Frequency (FM/AM)</label>
                                                                <input type="text" class="form-control" id="radio_frequency" name="radio_frequency" placeholder="Enter Frequency">
                                                            </div>
                                                        </div>


                                                             <!-- Main Studio Location -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="radio_station_location" class="form-label">Radio Station Location</label>
            <select class="form-control" id="radio_station_location" name="radio_station_location">
                <!-- List of all states in Nigeria -->
                <option value="lagos">Lagos</option>
                <option value="abuja">Abuja</option>
                <!-- Add more states as needed -->
            </select>
        </div>
    </div>

    <!-- Content Focus -->
<div class="col-md-6">
    <div class="mb-3">
      <label for="content_focus" class="form-label">Content Focus</label><br>
  
      <!-- Checkbox for each content focus -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="news" id="news">
        <label class="form-check-label" for="news">News</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="music" id="music">
        <label class="form-check-label" for="music">Music</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="talk_shows" id="talk_shows">
        <label class="form-check-label" for="talk_shows">Talk Shows</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="sports" id="sports">
        <label class="form-check-label" for="sports">Sports</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="entertainment" id="entertainment">
        <label class="form-check-label" for="entertainment">Entertainment</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="educational_programs" id="educational_programs">
        <label class="form-check-label" for="educational_programs">Educational Programs</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="content_focus[]" value="religious_programs" id="religious_programs">
        <label class="form-check-label" for="religious_programs">Religious Programs</label>
      </div>
  
      <!-- "Other" checkbox with a text input -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other_content" value="other">
        <label class="form-check-label" for="other_content">Other:</label>
      </div>
  
      <!-- Hidden text input for the "Other" option -->
      <div class="form-group" id="other_content_input" style="display:none;">
        <input type="text" class="form-control" name="content_focus_other" placeholder="Specify other content">
      </div>
    </div>
  </div>
  <!-- Target Audience -->
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

    <!-- Peak Viewing Times -->
<div class="col-md-6">
    <div class="mb-3">
    <label for="tv_peak_viewing_times" class="form-label">Peak Viewing Times</label><br>
    
    <!-- Checkbox for each Peak Viewing Times -->
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Morning" value="Morning" id="Morning">
    <label class="form-check-label" for="Morning">Morning (6AM – 12PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Afternoon" value="Afternoon" id="Afternoon">
    <label class="form-check-label" for="Afternoon">Afternoon (12PM – 5PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Evening" value="Evening " id="gotv">
    <label class="form-check-label" for="gotv">Evening (5PM – 10PM)</label>
    </div>
    
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="Late Night" value="Late Night" id="Late Night">
    <label class="form-check-label" for="Late Night">Late Night (10PM – 6AM)</label>
    </div>    
    </div>

    <div class="mb-3">
    <label for="radio_youtube" class="form-label">YouTube</label>
    <input type="text" class="form-control" id="radio_youtube" name="radio_youtube" placeholder="YouTube URL">
    </div>
    <div class="mb-3">
    <label for="radio_website" class="form-label">Website</label>
    <input type="text" class="form-control" id="radio_website" name="radio_website" placeholder="Website URL">
    </div>
    <div class="mb-3">
    <label for="radio_streaming_url" class="form-label">Streaming URL</label>
    <input type="text" class="form-control" id="radio_streaming_url" name="radio_streaming_url" placeholder="Streaming URL">
    </div>
    <div class="mb-3">
    <label for="radio_advert_rate" class="form-label">Advert Rate</label>
    <input type="file" class="form-control" id="radio_advert_rate" name="tv_advert_rate">
    </div>
    </div>
    
        <!-- Social Media and Contact -->
    <div class="col-md-12">
    <h4>Social Media</h4>
    </div>
    
    <!-- Social Media Fields (Facebook, Twitter, etc.) -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="radio_facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="radio_facebook" name="radio_facebook" placeholder="Facebook URL">
    </div>
   <div class="mb-3">
<label for="tv_twitter" class="form-label">X(Twitter)</label>
<input type="text" class="form-control" id="tv_twitter" name="tv_twitter" placeholder="X(Twitter) URL">
</div>
    <div class="mb-3">
    <label for="radio_instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="radio_instagram" name="radio_instagram" placeholder="Instagram URL">
    </div>
    <div class="mb-3">
    <label for="radio_linkedin" class="form-label">LinkedIn</label>
    <input type="text" class="form-control" id="radio_linkedin" name="radio_linkedin" placeholder="LinkedIn URL">
    </div>
    <div class="mb-3">
    <label for="radio_tiktok" class="form-label">TikTok</label>
    <input type="text" class="form-control" id="radio_tiktok" name="radio_tiktok" placeholder="TikTok URL">
    </div>
    <div class="mb-3">
    <label for="radio_other" class="form-label">Other</label>
    <input type="text" class="form-control" id="radio_other" name="radio_other" placeholder="Other Social Media URL">
    </div>
    
    </div>
    <h4>Media Contact Details</h4>
    <!-- Contact Fields -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="radio_email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="radio_email" name="radio_email" placeholder="Email Address">
    </div>
    <div class="mb-3">
    <label for="radio_phone" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" id="radio_phone" name="radio_phone" placeholder="Phone Number">
    </div>
    <div class="mb-3">
    <label for="tv_contact_person" class="form-label">Contact Person</label>
    <input type="text" class="form-control" id="radio_contact_person" name="radio_contact_person" placeholder="Contact Person">
    </div>
    </div>
    <input type="submit" name="internet_submit">
  

    <!-- Additional fields for Radio Section... -->
</div>

<!-- Internet Section -->
<div id="internet_section" style="display: none;">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="internet_type_select" class="form-label">Internet Media Type</label>
            <select class="form-control" id="internet_type_select" name="internet_type">
                <option value="live_streaming">Live Streaming</option>
                <option value="on_demand">On-Demand Content</option>
                <option value="podcasting">Podcasting</option>
                <option value="web_radio">Web Radio</option>
                <option value="Youtubing">Youtubing</option>
                <option value="skit_making">Skit Making</option>
            </select>
        </div>
    </div>


           <!-- Internet Media Type -->
<div class="col-md-6">
    <div class="mb-3">
      <label for="Internet Media Type" class="form-label">Internet Media Type</label><br>
  
      <!-- Checkbox for each Internet Media Type -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="live_Streaming" value="Live Streaming" id="live_streaming">
        <label class="form-check-label" for="live_streaming">Live Streaming</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="on_demand" value="on_demand" id="on_demand">
        <label class="form-check-label" for="on_demand">On-Demand Content</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="podcasting" value="podcasting" id="podcasting">
        <label class="form-check-label" for="podcasting">Podcasting</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="web_radio" value="Web Radio" id="web_radio">
        <label class="form-check-label" for="web_radio">Web Radio</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="youtubing" value="Youtubing" id="youtubing">
        <label class="form-check-label" for="youtubing">Youtubing</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="skit_making" value="Skit Making" id="skit_making">
        <label class="form-check-label" for="skit_making">Skit Making</label>
      </div>
    </div>
  </div>



        <!-- TV Name -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tv_name" class="form-label"> Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
        </div>
    
        <!-- TV Logo -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="logo" class="form-label"> Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
        </div>
    
        
    
       <!-- Channel Location -->
<div class="col-md-6">
    <div class="mb-3">
      <label for="tv_channel_location" class="form-label">Platform</label><br>
  
      <!-- Checkbox for each channel location -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="youtube" id="youtube">
        <label class="form-check-label" for="youtube">YouTube</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="twitter" value="X(Twitter)" id="twitter">
        <label class="form-check-label" for="twitter">X(Twitter)</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="facebook_live" id="facebook_live">
        <label class="form-check-label" for="facebook_live">Facebook Live</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="twitch" id="twitch">
        <label class="form-check-label" for="twitch">Twitch</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="instagram_live" id="instagram_live">
        <label class="form-check-label" for="instagram_live">Instagram Live</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="tiktok" id="tiktok">
        <label class="form-check-label" for="tiktok">TikTok</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="spotify" id="spotify">
        <label class="form-check-label" for="spotify">Spotify</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="apple_podcasts" id="apple_podcasts">
        <label class="form-check-label" for="apple_podcasts">Apple Podcasts</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tv_channel_location[]" value="soundcloud" id="soundcloud">
        <label class="form-check-label" for="soundcloud">SoundCloud</label>
      </div>
  
      <!-- "Other" checkbox with a text input -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other_internet" value="other_internet">
        <label class="form-check-label" for="other">Other:</label>
      </div>
  
      <!-- Hidden text input for the "Other" option -->
      <div class="form-group" id="other_internet_input" style="display:none;">
        <input type="text" class="form-control" name="tv_channel_location_other" placeholder="Specify other platform">
      </div>
    </div>
  </div>
  

  
    
    
    
        <!-- Content Focus -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="tv_content_focus" class="form-label">Content Focus</label>
    <select class="form-control" id="tv_content_focus" name="tv_content_focus" onchange="toggleOtherContentFocus()">
    <option value="news">News</option>
    <option value="sports">Sports</option>
    <option value="entertainment">Entertainment</option>
    <option value="comedy">Comedy</option>
    <option value="politics">Politics</option>
    <option value="movies">Movies</option>
    <option value="education">Education</option>
    <option value="music">Music</option>
    <option value="lifestyle">Lifestyle</option>
    <option value="other">Other</option>
    </select>
    </div>
    </div>
    
    <!-- Hidden text input for "Other" content focus -->
    <div class="col-md-6" id="content_focus_other_input" style="display:none;">
    <div class="mb-3">
    <input type="text" class="form-control" id="content_focus_other" name="tv_content_focus_other" placeholder="Specify other content focus">
    </div>
    </div>
    
    <!-- Target Audience -->
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
    
    
    
    
    
        <!-- Broadcast Duration -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="broadcast_duration" class="form-label">Broadcast Duration</label>
    <select class="form-control" id="broadcast_duration" name="broadcast_duration">
    <option value="Less_than_30_minutes">Less than 30 minutes</option>
    <option value="30 minutes – 1 hour">30 minutes – 1 hour</option>
    <option value="1 – 2 hours">1 – 2 hours</option>
    <option value="Over 2 hours"> Over 2 hours</option>
    </select>
    </div>
    </div>

           <!-- How frequently do you post on social media? -->
           <div class="col-md-6">
            <div class="mb-3">
            <label for="often_post" class="form-label">How frequently do you post on social media?</label>
            <select class="form-control" id="often_post" name="often_post">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="occasionally">Occasionally</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="internet_youtube" class="form-label">YouTube</label>
                <input type="text" class="form-control" id="internet_youtube" name="tv_youtube" placeholder="YouTube URL">
                </div>
                <div class="mb-3">
                <label for="internet_website" class="form-label">Website</label>
                <input type="text" class="form-control" id="internet_website" name="internet_website" placeholder="Website URL">
                </div>
                <div class="mb-3">
                <label for="internet_streaming_url" class="form-label">Streaming URL</label>
                <input type="text" class="form-control" id="internet_streaming_url" name="tv_streaming_url" placeholder="Streaming URL">
                </div>
                <div class="mb-3">
                <label for="internet_advert_rate" class="form-label">Advert Rate</label>
                <input type="file" class="form-control" id="internet_advert_rate" name="internet_advert_rate">
                </div>
            </div>
            
    
        <!-- Social Media and Contact -->
    <div class="col-md-12">
    <h4>Social Media</h4>
    </div>
    
    <!-- Social Media Fields (Facebook, Twitter, etc.) -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="tv_facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="internet_facebook" name="internet_facebook" placeholder="Facebook URL">
    </div>
    <div class="mb-3">
    <label for="internet_twitter" class="form-label">X(Twitter)</label>
    <input type="text" class="form-control" id="internet_twitter" name="internet_twitter" placeholder="X(Twitter URL)">
    </div>
    <div class="mb-3">
    <label for="internet_instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="internet_instagram" name="internet_instagram" placeholder="Instagram URL">
    </div>
    <div class="mb-3">
    <label for="internet_linkedin" class="form-label">LinkedIn</label>
    <input type="text" class="form-control" id="internet_linkedin" name="internet_linkedin" placeholder="LinkedIn URL">
    </div>
    <div class="mb-3">
    <label for="internet_tiktok" class="form-label">TikTok</label>
    <input type="text" class="form-control" id="internet_tiktok" name="internet_tiktok" placeholder="TikTok URL">
    </div>
    <div class="mb-3">
    <label for="internet_other" class="form-label">Other</label>
    <input type="text" class="form-control" id="internet_other" name="internet_other" placeholder="Other Social Media URL">
    </div>
    
    </div>
    
    <!-- Contact Fields -->
    <h4>Contact Details</h4>
    <div class="col-md-6">
    <div class="mb-3">
    <label for="internet_email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="internet_email" name="internet_email" placeholder="Email Address">
    </div>
    <div class="mb-3">
    <label for="internet_phone" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" id="internet_phone" name="internet_phone" placeholder="Phone Number">
    </div>
    <div class="mb-3">
    <label for="internet_contact_person" class="form-label">Contact Person</label>
    <input type="text" class="form-control" id="internet_contact_person" name="internet_contact_person" placeholder="Contact Person">
    </div>
    </div>
    <input type="submit" name="internet_submit">
    
    <!-- Additional fields for Internet Section... -->
</div>

                                        </div>
                                        <!-- end settings content-->

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