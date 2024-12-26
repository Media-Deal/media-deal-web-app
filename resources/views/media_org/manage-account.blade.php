@include('media_org.header')
    
        
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Media Organization</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Manage Account</li>
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
                                    @if($mediaOrganization)
                                    <h4 class="mb-0 mt-2">{{ $mediaOrganization->fullname }}</h4>
                                    <p class="text-muted font-14">{{ $mediaOrganization->position }}</p>

                                    <div class="text-start mt-3">
                                       
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">
                                            {{ $mediaOrganization->fullname }}</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Phone Number :</strong><span class="ms-2">{{ $mediaOrganization->phone}}</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ $mediaOrganization->email }}</span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Position :</strong> <span class="ms-2">{{ $mediaOrganization->position }}</span></p>
                                    </div>
                                    @else
                                    <p>No media organization details available.</p>
                                @endif
                                    
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->

                           

                        </div> <!-- end col-->

                        <div class="col-xl-8 col-lg-7">
                            <div class="card">
                                

                                        </div> <!-- end tab-pane -->
                                        <!-- end about me section content -->

                                        <!-- end timeline content-->
                                       
                                        <div class="tab-pane" id="settings">
                                            @if(session('success') || session('error'))
<div id="alert-box" class="alert {{ session('success') ? 'success' : 'error' }}">
    {{ session('success') ?? session('error') }}
</div>
@endif

<style>
    /* General styles for the alert box */
    #alert-box {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999; /* Ensure it appears above other content */
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        opacity: 1;
        animation: fadeInOut 5s ease-in-out;
    }

    /* Success style */
    #alert-box.success {
        background-color: #4caf50; /* Green */
        color: white;
    }

    /* Error style */
    #alert-box.error {
        background-color: #f44336; /* Red */
        color: white;
    }

    /* Fade-in and fade-out animation */
    @keyframes fadeInOut {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }
        10%, 90% {
            opacity: 1;
            transform: translateY(0);
        }
        100% {
            opacity: 0;
            transform: translateY(-10px);
        }
    }
</style>

<script>
    // Automatically hide the alert box after 5 seconds
    setTimeout(() => {
        const alertBox = document.getElementById('alert-box');
        if (alertBox) {
            alertBox.style.opacity = '0';
            alertBox.style.transition = 'opacity 0.5s ease-out';
            setTimeout(() => alertBox.remove(), 500); // Remove from DOM
        }
    }, 5000);
</script>

                                            <form method="POST" action="{{ route('media_organizations.update') }}">
                                                @csrf
                                             
                                                
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Media Manager Details</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Full Name</label>
                                                            <input type="text" class="form-control" id="firstname" name="fullname" value="{{ $mediaOrganization->fullname }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Phone Number</label>
                                                            <input type="number" class="form-control" name="phone" id="phone" value="{{ $mediaOrganization->phone}}">
                                                        </div>
                                                    </div> <!-- end col -->

                                                   
                                                </div> <!-- end row -->


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="useremail" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email" name="email" value="{{ $mediaOrganization->email }}">
                                                            {{-- <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span> --}}
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
                                                            <label for="position" class="form-label">Position</label>
                                                            <select class="form-control" id="position" name="position">
                                                                <option value="">Select Position</option>
                                                                <option value="CEO">CEO</option>
                                                                <option value="Managing director">Managing Director</option>
                                                                <option value="General manager">General Manager</option>
                                                                <option value="Sales manager">Sales Manager</option>
                                                                <option value="Marketing manager">Marketing Manager</option>
                                                                <option value="Staff member">Staff Member</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div> <!-- end row -->
                                                <div class="text-left mt-6">
                                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                                        <i class="bi bi-save"></i> Update Details
                                                    </button>
                                                </div>
                                                

                                            </form>

                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Media Details</h5>
                                                <div class="row">
   


                                                    <form method="POST" action="{{ route('media_organizationstv.update') }}" enctype="multipart/form-data">
                                                        @csrf
    
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
<select class="form-control" id="target_audience" name="tv_target_audience">
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
    <label for="tv_youtube" class="form-label">YouTube</label>
    <input type="text" class="form-control" id="tv_youtube" name="tv_youtube" placeholder="YouTube URL">
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
<label for="tv_other" class="form-label">Other</label>
<input type="text" class="form-control" id="tv_other" name="tv_other" placeholder="Other Social Media URL">
</div>

</div>


<div class="text-left mt-6">
    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
        <i class="bi bi-save"></i>Submit
    </button>
</div>

</form>
    <!-- Additional fields for TV Section... -->
</div>

<form method="POST" action="{{route('media_organizationsradio.update')}}" enctype="multipart/form-data">
  @csrf

     
<input type="hidden" name="media_type" value="radio">
     

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
                                                                <label for="radio_logo" class="form-label">Radio Station Logo</label>
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
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="news" id="news">
        <label class="form-check-label" for="news">News</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="music" id="music">
        <label class="form-check-label" for="music">Music</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="talk_shows" id="talk_shows">
        <label class="form-check-label" for="talk_shows">Talk Shows</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="sports" id="sports">
        <label class="form-check-label" for="sports">Sports</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="entertainment" id="entertainment">
        <label class="form-check-label" for="entertainment">Entertainment</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="educational_programs" id="educational_programs">
        <label class="form-check-label" for="educational_programs">Educational Programs</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="radio_content_focus" value="religious_programs" id="religious_programs">
        <label class="form-check-label" for="religious_programs">Religious Programs</label>
      </div>
  
      <!-- "Other" checkbox with a text input -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other_content" value="other">
        <label class="form-check-label" for="other_content">Other:</label>
      </div>
  
      <!-- Hidden text input for the "Other" option -->
      <div class="form-group" id="other_content_input" style="display:none;">
        <input type="text" class="form-control" name="radio_content_focus_other" placeholder="Specify other content">
      </div>
    </div>
  </div>

  <!-- Target Audience -->
<div class="col-md-6">
    <div class="mb-3">
    <label for="radio_target_audience" class="form-label">Target Audience</label>
    <select class="form-control" id="target_audience" name="radio_target_audience">
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
    <label for="radio_streaming_url" class="form-label">Streaming URL</label>
    <input type="text" class="form-control" id="radio_streaming_url" name="radio_streaming_url" placeholder="Streaming URL">
    </div>
    <div class="mb-3">
    <label for="radio_advert_rate" class="form-label">Advert Rate</label>
    <input type="file" class="form-control" id="radio_advert_rate" name="radio_advert_rate">
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
<input type="text" class="form-control" id="radio_twitter" name="radio_twitter" placeholder="X(Twitter) URL">
</div>
    <div class="mb-3">
    <label for="radio_instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="radio_instagram" name="radio_instagram" placeholder="Instagram URL">
    </div>


    <div class="mb-3">
    <label for="radio_other" class="form-label">Other</label>
    <input type="text" class="form-control" id="radio_other" name="radio_other" placeholder="Other Social Media URL">
    </div>
    
    </div>
    
    <div class="text-left mt-6">
        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-save"></i>Submit
        </button>
    </div>
</form>

    <!-- Additional fields for Radio Section... -->
</div>


<form method="POST" action="{{ route('media_organizationsinternet.update') }}" enctype="multipart/form-data">
    @csrf

     
<input type="hidden" name="media_type" value="internet">

<!-- Internet Section -->
<div id="internet_section" style="display: none;">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="internet_type_select" class="form-label">Internet Media Type</label>
            <select class="form-control" id="internet_type_select" name="internet_type">
                <option value="live streaming">Live Streaming</option>
                <option value="on demand">On-Demand Content</option>
                <option value="podcasting">Podcasting</option>
                <option value="web radio">Web Radio</option>
                <option value="Youtubing">Youtubing</option>
                <option value="skit making">Skit Making</option>
            </select>
        </div>
    </div>


           <!-- Internet Media Type -->
<div class="col-md-6">
    
        <!-- TV Name -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tv_name" class="form-label"> Brand Name</label>
                <input type="text" class="form-control" id="name" name="internet_name" placeholder="Enter Name">
            </div>
        </div>
    
        <!-- TV Logo -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="logo" class="form-label"> Logo</label>
                <input type="file" class="form-control" id="logo" name="internet_logo">
            </div>
        </div>
        <input type="submit">
    </form>
    
       <!-- Channel Location -->
<div class="col-md-6">
    <div class="mb-3">
      <label for="tv_channel_location" class="form-label">Platform</label><br>
  
      <!-- Checkbox for each channel location -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="all_internet_youtube" value="youtube" id="youtube">
        <label class="form-check-label" for="youtube">YouTube</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="X(Twitter)" id="twitter">
        <label class="form-check-label" for="twitter">X(Twitter)</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="facebook_live" id="facebook_live">
        <label class="form-check-label" for="facebook_live">Facebook Live</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="twitch" id="twitch">
        <label class="form-check-label" for="twitch">Twitch</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="instagram_live" id="instagram_live">
        <label class="form-check-label" for="instagram_live">Instagram Live</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="tiktok" id="tiktok">
        <label class="form-check-label" for="tiktok">TikTok</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="spotify" id="spotify">
        <label class="form-check-label" for="spotify">Spotify</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="apple_podcasts" id="apple_podcasts">
        <label class="form-check-label" for="apple_podcasts">Apple Podcasts</label>
      </div>
  
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="internet_channel_location" value="soundcloud" id="soundcloud">
        <label class="form-check-label" for="soundcloud">SoundCloud</label>
      </div>
  
      <!-- "Other" checkbox with a text input -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="other_internet" value="other_internet">
        <label class="form-check-label" for="other">Other:</label>
      </div>
  
      <!-- Hidden text input for the "Other" option -->
      <div class="form-group" id="other_internet_input" style="display:none;">
        <input type="text" class="form-control" name="internet_channel_location_other" placeholder="Specify other platform">
      </div>
    </div>
  </div>
  

  
    
    
    
        <!-- Content Focus -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="tv_content_focus" class="form-label">Content Focus</label>
    <select class="form-control" id="tv_content_focus" name="internet_content_focus" onchange="toggleOtherContentFocus()">
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
    <input type="text" class="form-control" id="content_focus_other" name="internet_content_focus_other" placeholder="Specify other content focus">
    </div>
    </div>
    
    <!-- Target Audience -->
    <div class="col-md-6">
    <div class="mb-3">
    <label for="target_audience" class="form-label">Target Audience</label>
    <select class="form-control" id="target_audience" name="internet_target_audience">
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
    <select class="form-control" id="broadcast_duration" name="internet_broadcast_duration">
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
            <select class="form-control" id="often_post" name="internet_often_post">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="occasionally">Occasionally</option>
            </select>
            </div>

            <div class="mb-3">
                <label for="internet_youtube" class="form-label">YouTube</label>
                <input type="text" class="form-control" id="internet_youtube" name="internet_youtube" placeholder="YouTube URL">
                </div>
                <div class="mb-3">
                <label for="internet_streaming_url" class="form-label">Streaming URL</label>
                <input type="text" class="form-control" id="internet_streaming_url" name="internet_streaming_url" placeholder="Streaming URL">
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
    <label for="internet_tiktok" class="form-label">TikTok</label>
    <input type="text" class="form-control" id="internet_tiktok" name="internet_tiktok" placeholder="TikTok URL">
    </div>
    <div class="mb-3">
    <label for="internet_other" class="form-label">Other</label>
    <input type="text" class="form-control" id="internet_other" name="internet_other" placeholder="Other Social Media URL">
    </div>
    
    </div>
    
   
    <div class="text-left mt-6">
        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-save"></i>Submit
        </button>
    </div>
    
    <!-- Additional fields for Internet Section... -->
</div>
</form>
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
 @include('media_org.footer')