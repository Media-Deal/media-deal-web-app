@include('media_org.header')

<!-- Start Page Content here -->
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
                    <div class="card text-center shadow-sm border-0"
                        style="background: white; color: black; padding: 0.5rem; height: auto;">
                        <div class="card-body p-4">
                            <div class="profile-image-wrapper mb-3">
                                @if($mediaOrganization && $mediaOrganization->profile_picture_url)
                                <img src="{{ $mediaOrganization->profile_picture_url }}"
                                    class="rounded-circle avatar-lg img-thumbnail border border-2 border-primary shadow-sm"
                                    alt="profile-image">
                                @else
                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                    class="rounded-circle avatar-lg img-thumbnail border border-2 border-primary shadow-sm"
                                    alt="profile-image">
                                @endif
                            </div>

                            @if($mediaOrganization)
                            <h4 class="mb-1" style="font-weight: bold; color: #0d6efd;">{{ $mediaOrganization->fullname
                                }}</h4>
                            <p class="font-italic font-14 text-muted">{{ $mediaOrganization->position }}</p>

                            <div class="text-start mt-4 border-top pt-3" style="border-color: #e3e3e3;">
                                <p class="mb-2">
                                    <strong style="color: #0d6efd;">Full Name:</strong>
                                    <span class="ms-2 text-dark">{{ $mediaOrganization->fullname }}</span>
                                </p>
                                <p class="mb-2">
                                    <strong style="color: #0d6efd;">Phone Number:</strong>
                                    <span class="ms-2 text-dark">{{ $mediaOrganization->phone }}</span>
                                </p>
                                <p class="mb-2">
                                    <strong style="color: #0d6efd;">Email:</strong>
                                    <span class="ms-2 text-dark">{{ $mediaOrganization->email }}</span>
                                </p>
                                <p class="mb-0">
                                    <strong style="color: #0d6efd;">Position:</strong>
                                    <span class="ms-2 text-dark">{{ $mediaOrganization->position }}</span>
                                </p>
                            </div>
                            @else
                            <div class="mt-4">
                                <p style="color: #0d6efd;">No media organization details available.</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="tab-pane" id="settings">
                            <!-- Error Container -->
                            <div class="error-container" style="display: none;">
                                <div class="card error-card border-danger">
                                    <div
                                        class="card-header bg-danger text-white d-flex justify-content-between align-items-center py-2">
                                        <span>Error Details</span>
                                        <button type="button" class="btn-close btn-close-white"
                                            onclick="$('.error-container').hide()"></button>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="error-message mb-2"></div>
                                        <div class="error-details"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Manager Details Form -->
                            <form id="managerDetailsForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Media
                                    Manager Details</h5>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="profile_picture" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" id="profile_picture"
                                            name="profile_picture">
                                        <div class="invalid-feedback profile_picture-error"></div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"
                                                value="{{ $mediaOrganization->fullname ?? '' }}">
                                            <div class="invalid-feedback fullname-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                value="{{ $mediaOrganization->phone ?? '' }}">
                                            <div class="invalid-feedback phone-error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $mediaOrganization->email ?? '' }}">
                                            <div class="invalid-feedback email-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position</label>
                                            <select class="form-control" id="position" name="position">
                                                <option value="">Select Position</option>
                                                <option value="CEO" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'CEO') selected @endif>CEO</option>
                                                <option value="Managing director" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'Managing director') selected
                                                    @endif>Managing Director</option>
                                                <option value="General manager" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'General manager') selected
                                                    @endif>General Manager</option>
                                                <option value="Sales manager" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'Sales manager') selected
                                                    @endif>Sales Manager</option>
                                                <option value="Marketing manager" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'Marketing manager') selected
                                                    @endif>Marketing Manager</option>
                                                <option value="Staff member" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->position == 'Staff member') selected
                                                    @endif>Staff Member</option>
                                            </select>
                                            <div class="invalid-feedback position-error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left mt-6">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                        <span id="managerButtonText">Update Details</span>
                                        <span id="managerLoadingSpinner" style="display: none;">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </span>
                                    </button>
                                </div>
                            </form>

                            <!-- Media Type Forms -->
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                                Media Details</h5>

                            <!-- Media Type Selection -->
                            <div class="col-md-12 mb-4">
                                <div class="mb-3">
                                    <label for="media_type" class="form-label">Media Type</label><br>
                                    <div class="btn-group" role="group">
                                        <input type="radio" class="btn-check" name="media_type" id="media_type_tv"
                                            value="tv" autocomplete="off" onclick="toggleMediaType('tv')"
                                            @if(isset($mediaOrganization) && $mediaOrganization->media_type == 'tv')
                                        checked @endif>
                                        <label class="btn btn-outline-primary" for="media_type_tv">TV</label>

                                        <input type="radio" class="btn-check" name="media_type" id="media_type_radio"
                                            value="radio" autocomplete="off" onclick="toggleMediaType('radio')"
                                            @if(isset($mediaOrganization) && $mediaOrganization->media_type == 'radio')
                                        checked @endif>
                                        <label class="btn btn-outline-primary" for="media_type_radio">Radio</label>

                                        <input type="radio" class="btn-check" name="media_type" id="media_type_internet"
                                            value="internet" autocomplete="off" onclick="toggleMediaType('internet')"
                                            @if(isset($mediaOrganization) && $mediaOrganization->media_type ==
                                        'internet') checked @endif>
                                        <label class="btn btn-outline-primary"
                                            for="media_type_internet">Internet</label>
                                    </div>
                                </div>
                            </div>

                            <!-- TV Form -->
                            <!-- TV Form -->
                            <form id="tvForm" method="POST" enctype="multipart/form-data"
                                style="display: {{ isset($mediaOrganization) && $mediaOrganization->media_type == 'tv' ? 'block' : 'none' }};">
                                @csrf
                                <input type="hidden" name="media_type" value="tv">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_type" class="form-label">TV Type</label>
                                            <select class="form-control" id="tv_type" name="tv_type" required>
                                                <option value="analogue" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'analogue') selected @endif>Analogue
                                                    Terrestrial TV</option>
                                                <option value="satellite" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'satellite') selected @endif>Digital
                                                    Satellite TV</option>
                                                <option value="cable" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'cable') selected @endif>Cable TV
                                                </option>
                                                <option value="digital_terrestrial" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'digital_terrestrial') selected
                                                    @endif>Digital Terrestrial TV</option>
                                                <option value="web" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'web') selected @endif>Web TV
                                                </option>
                                                <option value="iptv" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_type == 'iptv') selected @endif>IPTV</option>
                                            </select>
                                            <div class="invalid-feedback tv_type-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_name" class="form-label">TV Station Name</label>
                                            <input type="text" class="form-control" id="tv_name" name="tv_name"
                                                value="{{ $mediaOrganization->tv_name ?? '' }}" required>
                                            <div class="invalid-feedback tv_name-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_logo" class="form-label">TV Logo</label>
                                            <input type="file" class="form-control" id="tv_logo" name="tv_logo">
                                            @if(isset($mediaOrganization) && $mediaOrganization->tv_logo_url)
                                            <div class="mt-2">
                                                <img src="{{ $mediaOrganization->tv_logo_url }}" alt="TV Logo"
                                                    style="max-height: 100px;">
                                            </div>
                                            @endif
                                            <div class="invalid-feedback tv_logo-error"></div>
                                        </div>
                                    </div>

                                    <!-- TV Main Studio Location -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_main_studio_location" class="form-label">Main Studio
                                                Location</label>
                                            <select class="form-control" id="tv_main_studio_location"
                                                name="tv_main_studio_location" required>
                                                <option value="">Select State</option>
                                                <option value="abia" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'abia') selected
                                                    @endif>Abia</option>
                                                <option value="adamawa" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'adamawa') selected
                                                    @endif>Adamawa</option>
                                                <option value="akwa-ibom" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'akwa-ibom') selected
                                                    @endif>Akwa Ibom</option>
                                                <option value="anambra" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'anambra') selected
                                                    @endif>Anambra</option>
                                                <option value="bauchi" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'bauchi') selected
                                                    @endif>Bauchi</option>
                                                <option value="bayelsa" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'bayelsa') selected
                                                    @endif>Bayelsa</option>
                                                <option value="benue" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'benue') selected
                                                    @endif>Benue</option>
                                                <option value="borno" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'borno') selected
                                                    @endif>Borno</option>
                                                <option value="cross-river" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'cross-river')
                                                    selected @endif>Cross River</option>
                                                <option value="delta" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'delta') selected
                                                    @endif>Delta</option>
                                                <option value="ebonyi" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'ebonyi') selected
                                                    @endif>Ebonyi</option>
                                                <option value="edo" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'edo') selected
                                                    @endif>Edo</option>
                                                <option value="ekiti" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'ekiti') selected
                                                    @endif>Ekiti</option>
                                                <option value="enugu" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'enugu') selected
                                                    @endif>Enugu</option>
                                                <option value="gombe" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'gombe') selected
                                                    @endif>Gombe</option>
                                                <option value="imo" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'imo') selected
                                                    @endif>Imo</option>
                                                <option value="jigawa" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'jigawa') selected
                                                    @endif>Jigawa</option>
                                                <option value="kaduna" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'kaduna') selected
                                                    @endif>Kaduna</option>
                                                <option value="kano" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'kano') selected
                                                    @endif>Kano</option>
                                                <option value="katsina" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'katsina') selected
                                                    @endif>Katsina</option>
                                                <option value="kebbi" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'kebbi') selected
                                                    @endif>Kebbi</option>
                                                <option value="kogi" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'kogi') selected
                                                    @endif>Kogi</option>
                                                <option value="kwara" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'kwara') selected
                                                    @endif>Kwara</option>
                                                <option value="lagos" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'lagos') selected
                                                    @endif>Lagos</option>
                                                <option value="nasarawa" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'nasarawa') selected
                                                    @endif>Nasarawa</option>
                                                <option value="niger" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'niger') selected
                                                    @endif>Niger</option>
                                                <option value="ogun" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'ogun') selected
                                                    @endif>Ogun</option>
                                                <option value="ondo" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'ondo') selected
                                                    @endif>Ondo</option>
                                                <option value="osun" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'osun') selected
                                                    @endif>Osun</option>
                                                <option value="oyo" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'oyo') selected
                                                    @endif>Oyo</option>
                                                <option value="plateau" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'plateau') selected
                                                    @endif>Plateau</option>
                                                <option value="rivers" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'rivers') selected
                                                    @endif>Rivers</option>
                                                <option value="sokoto" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'sokoto') selected
                                                    @endif>Sokoto</option>
                                                <option value="taraba" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'taraba') selected
                                                    @endif>Taraba</option>
                                                <option value="yobe" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'yobe') selected
                                                    @endif>Yobe</option>
                                                <option value="zamfara" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'zamfara') selected
                                                    @endif>Zamfara</option>
                                                <option value="fct" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_main_studio_location == 'fct') selected
                                                    @endif>Federal Capital Territory (Abuja)</option>
                                            </select>
                                            <div class="invalid-feedback tv_main_studio_location-error"></div>
                                        </div>
                                    </div>

                                    <!-- TV Content Focus -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_content_focus" class="form-label">Content Focus</label>
                                            <select class="form-control" id="tv_content_focus" name="tv_content_focus"
                                                required onchange="toggleOtherContentFocus()">
                                                <option value="">Select Content Focus</option>
                                                <option value="news" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'news') selected @endif>News
                                                </option>
                                                <option value="sports" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'sports') selected
                                                    @endif>Sports</option>
                                                <option value="entertainment" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'entertainment') selected
                                                    @endif>Entertainment</option>
                                                <option value="movies" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'movies') selected
                                                    @endif>Movies</option>
                                                <option value="education" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'education') selected
                                                    @endif>Education</option>
                                                <option value="music" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'music') selected
                                                    @endif>Music</option>
                                                <option value="lifestyle" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'lifestyle') selected
                                                    @endif>Lifestyle</option>
                                                <option value="other" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_content_focus == 'other') selected
                                                    @endif>Other</option>
                                            </select>
                                            <div class="invalid-feedback tv_content_focus-error"></div>
                                        </div>
                                    </div>

                                    <!-- Hidden text input for "Other" content focus -->
                                    <div class="col-md-6" id="content_focus_other_input"
                                        style="display:{{ (isset($mediaOrganization) && $mediaOrganization->tv_content_focus == 'other') ? 'block' : 'none' }};">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="content_focus_other"
                                                name="tv_content_focus_other" placeholder="Specify other content focus"
                                                value="{{ $mediaOrganization->tv_content_focus_other ?? '' }}">
                                        </div>
                                    </div>

                                    <!-- TV Target Audience -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_target_audience" class="form-label">Target Audience</label>
                                            <select class="form-control" id="tv_target_audience"
                                                name="tv_target_audience" required>
                                                <option value="">Select Target Audience</option>
                                                <option value="children" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_target_audience == 'children') selected
                                                    @endif>Children (0-12)</option>
                                                <option value="teens" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_target_audience == 'teens') selected
                                                    @endif>Teens (13-17)</option>
                                                <option value="adults_18_34" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_target_audience == 'adults_18_34') selected
                                                    @endif>Adults (18-34)</option>
                                                <option value="adults_35_54" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_target_audience == 'adults_35_54') selected
                                                    @endif>Adults (35-54)</option>
                                                <option value="seniors" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->tv_target_audience == 'seniors') selected
                                                    @endif>Seniors (55+)</option>
                                            </select>
                                            <div class="invalid-feedback tv_target_audience-error"></div>
                                        </div>
                                    </div>

                                    <!-- More TV fields -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_youtube" class="form-label">YouTube</label>
                                            <input type="text" class="form-control" id="tv_youtube" name="tv_youtube"
                                                value="{{ $mediaOrganization->tv_youtube ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tv_streaming_url" class="form-label">Streaming URL</label>
                                            <input type="text" class="form-control" id="tv_streaming_url"
                                                name="tv_streaming_url"
                                                value="{{ $mediaOrganization->tv_streaming_url ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tv_advert_rate" class="form-label">Advert Rate</label>
                                            <input type="file" class="form-control" id="tv_advert_rate"
                                                name="tv_advert_rate">
                                            @if(isset($mediaOrganization) && $mediaOrganization->tv_advert_rate_url)
                                            <a href="{{ $mediaOrganization->tv_advert_rate_url }}" target="_blank"
                                                class="mt-2 d-block">View Current Rate Card</a>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Social Media -->
                                    <div class="col-md-12">
                                        <h4>Social Media</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="tv_facebook" class="form-label">Facebook</label>
                                            <input type="text" class="form-control" id="tv_facebook" name="tv_facebook"
                                                value="{{ $mediaOrganization->tv_facebook ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tv_twitter" class="form-label">X(Twitter)</label>
                                            <input type="text" class="form-control" id="tv_twitter" name="tv_twitter"
                                                value="{{ $mediaOrganization->tv_twitter ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tv_instagram" class="form-label">Instagram</label>
                                            <input type="text" class="form-control" id="tv_instagram"
                                                name="tv_instagram"
                                                value="{{ $mediaOrganization->tv_instagram ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="tv_other" class="form-label">Other</label>
                                            <input type="text" class="form-control" id="tv_other" name="tv_other"
                                                value="{{ $mediaOrganization->tv_other ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-left mt-6">
                                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                                <span id="tvButtonText">Save TV Details</span>
                                                <span id="tvLoadingSpinner" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Radio Form -->
                            <form id="radioForm" method="POST" enctype="multipart/form-data"
                                style="display: {{ isset($mediaOrganization) && $mediaOrganization->media_type == 'radio' ? 'block' : 'none' }};">
                                @csrf
                                <input type="hidden" name="media_type" value="radio">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_type" class="form-label">Radio Type</label>
                                            <select class="form-control" id="radio_type" name="radio_type" required>
                                                <option value="">Select Radio Type</option>
                                                <option value="private" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_type == 'private')>Private</option>
                                                <option value="government" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_type == 'government')>Government</option>
                                                <option value="community" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_type == 'community')>Community</option>
                                                <option value="campus" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_type == 'campus')>Campus</option>
                                            </select>
                                            <div class="invalid-feedback radio_type-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_name" class="form-label">Radio Station Name</label>
                                            <input type="text" class="form-control" id="radio_name" name="radio_name"
                                                value="{{ $mediaOrganization->radio_name ?? '' }}" required>
                                            <div class="invalid-feedback radio_name-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_logo" class="form-label">Radio Logo</label>
                                            <input type="file" class="form-control" id="radio_logo" name="radio_logo">
                                            @if(isset($mediaOrganization) && $mediaOrganization->radio_logo_url)
                                            <div class="mt-2">
                                                <img src="{{ $mediaOrganization->radio_logo_url }}" alt="Radio Logo"
                                                    style="max-height: 100px;">
                                            </div>
                                            @endif
                                            <div class="invalid-feedback radio_logo-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_frequency" class="form-label">Frequency (FM/AM)</label>
                                            <input type="text" class="form-control" id="radio_frequency"
                                                name="radio_frequency"
                                                value="{{ $mediaOrganization->radio_frequency ?? '' }}" required>
                                            <div class="invalid-feedback radio_frequency-error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_station_location" class="form-label">Radio Station
                                                Location</label>
                                            <select class="form-control" id="radio_station_location"
                                                name="radio_station_location" required>
                                                <option value="">Select State</option>
                                                <option value="abia" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_station_location == 'abia')>Abia</option>
                                                <option value="adamawa" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_station_location == 'adamawa')>Adamawa
                                                </option>
                                                <option value="akwa-ibom" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_station_location == 'akwa-ibom')>Akwa Ibom
                                                </option>

                                                {{-- <option value="fct" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_station_location == 'fct')>Federal Capital
                                                    Territory (Abuja)</option> --}}
                                            </select>
                                            <div class="invalid-feedback radio_station_location-error"></div>
                                        </div>
                                    </div>

                                    <!-- Content Focus -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="content_focus" class="form-label">Content Focus</label><br>
                                            @php
                                            $contentFocus = isset($mediaOrganization) &&
                                            $mediaOrganization->radio_content_focus
                                            ? (array)json_decode($mediaOrganization->radio_content_focus, true)
                                            : [];
                                            @endphp

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="news" id="news"
                                                    @checked(in_array('news', $contentFocus))>
                                                <label class="form-check-label" for="news">News</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="music" id="music"
                                                    @checked(in_array('music', $contentFocus))>
                                                <label class="form-check-label" for="music">Music</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="talk_shows" id="talk_shows"
                                                    @checked(in_array('talk_shows', $contentFocus))>
                                                <label class="form-check-label" for="talk_shows">Talk Shows</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="sports" id="sports"
                                                    @checked(in_array('sports', $contentFocus))>
                                                <label class="form-check-label" for="sports">Sports</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="entertainment"
                                                    id="entertainment" @checked(in_array('entertainment',
                                                    $contentFocus))>
                                                <label class="form-check-label"
                                                    for="entertainment">Entertainment</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="educational_programs"
                                                    id="educational_programs" @checked(in_array('educational_programs',
                                                    $contentFocus))>
                                                <label class="form-check-label" for="educational_programs">Educational
                                                    Programs</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="religious_programs"
                                                    id="religious_programs" @checked(in_array('religious_programs',
                                                    $contentFocus))>
                                                <label class="form-check-label" for="religious_programs">Religious
                                                    Programs</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="radio_content_focus[]" value="other" id="other_content"
                                                    @checked(in_array('other', $contentFocus))>
                                                <label class="form-check-label" for="other_content">Other:</label>
                                            </div>

                                            <div class="form-group mt-2" id="other_content_input"
                                                style="display: {{ in_array('other', $contentFocus) ? 'block' : 'none' }};">
                                                <input type="text" class="form-control" name="radio_content_focus_other"
                                                    placeholder="Specify other content"
                                                    value="{{ $mediaOrganization->radio_content_focus_other ?? '' }}">
                                            </div>
                                            <div class="invalid-feedback radio_content_focus-error"></div>
                                        </div>
                                    </div>

                                    <!-- Target Audience -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_target_audience" class="form-label">Target
                                                Audience</label>
                                            <select class="form-control" id="radio_target_audience"
                                                name="radio_target_audience" required>
                                                <option value="">Select Target Audience</option>
                                                <option value="children" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_target_audience == 'children')>Children
                                                    (0-12)</option>
                                                <option value="teens" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_target_audience == 'teens')>Teens (13-17)
                                                </option>
                                                <option value="adults_18_34" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_target_audience == 'adults_18_34')>Adults
                                                    (18-34)</option>
                                                <option value="adults_35_54" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_target_audience == 'adults_35_54')>Adults
                                                    (35-54)</option>
                                                <option value="seniors" @selected(isset($mediaOrganization) &&
                                                    $mediaOrganization->radio_target_audience == 'seniors')>Seniors
                                                    (55+)</option>
                                            </select>
                                            <div class="invalid-feedback radio_target_audience-error"></div>
                                        </div>
                                    </div>

                                    <!-- Additional Radio Fields -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_streaming_url" class="form-label">Streaming URL</label>
                                            <input type="text" class="form-control" id="radio_streaming_url"
                                                name="radio_streaming_url"
                                                value="{{ $mediaOrganization->radio_streaming_url ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="radio_advert_rate" class="form-label">Advert Rate</label>
                                            <input type="file" class="form-control" id="radio_advert_rate"
                                                name="radio_advert_rate">
                                            @if(isset($mediaOrganization) && $mediaOrganization->radio_advert_rate_url)
                                            <a href="{{ $mediaOrganization->radio_advert_rate_url }}" target="_blank"
                                                class="mt-2 d-block">View Current Rate Card</a>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Social Media -->
                                    <div class="col-md-12">
                                        <h4>Social Media</h4>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="radio_facebook" class="form-label">Facebook</label>
                                            <input type="text" class="form-control" id="radio_facebook"
                                                name="radio_facebook"
                                                value="{{ $mediaOrganization->radio_facebook ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="radio_twitter" class="form-label">X(Twitter)</label>
                                            <input type="text" class="form-control" id="radio_twitter"
                                                name="radio_twitter"
                                                value="{{ $mediaOrganization->radio_twitter ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="radio_instagram" class="form-label">Instagram</label>
                                            <input type="text" class="form-control" id="radio_instagram"
                                                name="radio_instagram"
                                                value="{{ $mediaOrganization->radio_instagram ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="radio_other" class="form-label">Other</label>
                                            <input type="text" class="form-control" id="radio_other" name="radio_other"
                                                value="{{ $mediaOrganization->radio_other ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="text-left mt-6">
                                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                                <span id="radioButtonText">Save Radio Details</span>
                                                <span id="radioLoadingSpinner" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <script>
                                // Show/hide other content input based on checkbox
    document.getElementById('other_content').addEventListener('change', function() {
        document.getElementById('other_content_input').style.display = this.checked ? 'block' : 'none';
    });
                            </script>

                            <!-- Internet Form -->
                            <form id="internetForm" method="POST" enctype="multipart/form-data"
                                style="display: {{ isset($mediaOrganization) && $mediaOrganization->media_type == 'internet' ? 'block' : 'none' }};">
                                @csrf
                                <input type="hidden" name="media_type" value="internet">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="internet_type" class="form-label">Internet Media Type</label>
                                            <select class="form-control" id="internet_type" name="internet_type">
                                                <option value="live streaming" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'live streaming') selected
                                                    @endif>Live Streaming</option>
                                                <option value="on demand" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'on demand') selected
                                                    @endif>On-Demand Content</option>
                                                <option value="podcasting" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'podcasting') selected
                                                    @endif>Podcasting</option>
                                                <option value="web radio" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'web radio') selected
                                                    @endif>Web Radio</option>
                                                <option value="Youtubing" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'Youtubing') selected
                                                    @endif>Youtubing</option>
                                                <option value="skit making" @if(isset($mediaOrganization) &&
                                                    $mediaOrganization->internet_type == 'skit making') selected
                                                    @endif>Skit Making</option>
                                            </select>
                                            <div class="invalid-feedback internet_type-error"></div>
                                        </div>
                                    </div>

                                    <!-- More Internet fields... -->

                                    <div class="col-12">
                                        <div class="text-left mt-6">
                                            <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                                                <span id="internetButtonText">Save Internet Details</span>
                                                <span id="internetLoadingSpinner" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        z-index: 9999;
    }

    .error-card {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .error-details {
        max-height: 200px;
        overflow-y: auto;
        font-size: 13px;
    }

    .btn-group .btn {
        padding: 0.375rem 0.75rem;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script>
    $(document).ready(function() {
        // Initialize media type based on existing data
        @if(isset($mediaOrganization) && $mediaOrganization->media_type)
            toggleMediaType('{{ $mediaOrganization->media_type }}');
        @endif

        // Manager Details Form Submission
        $('#managerDetailsForm').on('submit', function(e) {
            e.preventDefault();
            submitForm($(this), '{{ route("media_organizations.update") }}', 
                '#managerButtonText', '#managerLoadingSpinner', true);
        });

        // TV Form Submission
        $('#tvForm').on('submit', function(e) {
            e.preventDefault();
            submitForm($(this), '{{ route("media_organizationstv.update") }}', 
                '#tvButtonText', '#tvLoadingSpinner', true);
        });

        // Radio Form Submission
        $('#radioForm').on('submit', function(e) {
            e.preventDefault();
            submitForm($(this), '{{ route("media_organizationsradio.update") }}', 
                '#radioButtonText', '#radioLoadingSpinner', true);
        });

        // Internet Form Submission
        $('#internetForm').on('submit', function(e) {
            e.preventDefault();
            submitForm($(this), '{{ route("media_organizationsinternet.update") }}', 
                '#internetButtonText', '#internetLoadingSpinner', true);
        });
    });

    function toggleMediaType(type) {
        $('#tvForm, #radioForm, #internetForm').hide();
        $('#' + type + 'Form').show();
    }

    function submitForm(formElement, url, buttonTextSelector, spinnerSelector, isFileUpload = false) {
        // Show loading spinner and disable button
        $(buttonTextSelector).hide();
        $(spinnerSelector).show();
        formElement.find('button[type="submit"]').prop('disabled', true);
        
        // Clear previous error messages
        formElement.find('.invalid-feedback').text('');
        formElement.find('.is-invalid').removeClass('is-invalid');
        $('.error-container').hide();
        $('.error-message').empty();
        $('.error-details').empty();

        // Prepare form data
        let formData;
        if (isFileUpload) {
            formData = new FormData(formElement[0]);
        } else {
            formData = formElement.serialize();
        }

        // AJAX request
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            dataType: 'json',
            contentType: isFileUpload ? false : 'application/x-www-form-urlencoded',
            processData: isFileUpload ? false : true,
            success: function(response) {
                // Hide loading spinner and enable button
                $(buttonTextSelector).show();
                $(spinnerSelector).hide();
                formElement.find('button[type="submit"]').prop('disabled', false);
                
                if (response.success) {
                    toastr.success(response.message);
                    // Optionally update the UI with new data
                    if (response.data) {
                        // Update profile picture if exists
                        if (response.data.profile_picture_url) {
                            $('.profile-image-wrapper img').attr('src', response.data.profile_picture_url);
                        }
                    }
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                // Hide loading spinner and enable button
                $(buttonTextSelector).show();
                $(spinnerSelector).hide();
                formElement.find('button[type="submit"]').prop('disabled', false);
                
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorMessages = [];
                    
                    $.each(errors, function(field, messages) {
                        var errorMessage = messages.join(', ');
                        errorMessages.push(errorMessage);
                        
                        // Find the field and show error
                        var $field = formElement.find('[name="' + field + '"]');
                        $field.addClass('is-invalid');
                        
                        // Handle different field types
                        if ($field.is(':checkbox') || $field.is('select')) {
                            $field.closest('.form-group').find('.invalid-feedback').text(errorMessage);
                        } else {
                            $field.next('.invalid-feedback').text(errorMessage);
                        }
                    });
                    
                    // Show all errors in toastr and error container
                    var fullErrorMessage = 'Please correct the following errors:<br>' + errorMessages.join('<br>');
                    toastr.error(fullErrorMessage);
                    
                    $('.error-message').html(fullErrorMessage.replace(/<br>/g, '<br>• '));
                    $('.error-details').html('<pre>' + JSON.stringify(errors, null, 2) + '</pre>');
                    $('.error-container').show();
                } else {
                    var errorMessage = xhr.responseJSON.message || 'An error occurred. Please try again.';
                    var errorDetails = xhr.responseJSON.error || xhr.statusText || 'No additional details available';
                    
                    toastr.error(errorMessage);
                    $('.error-message').text(errorMessage);
                    $('.error-details').html('<pre>' + errorDetails + '</pre>');
                    $('.error-container').show();
                }
            }
        });
    }

        function toggleOtherContentFocus() {
        var selectElement = document.getElementById('tv_content_focus');
        var otherInputDiv = document.getElementById('content_focus_other_input');
        if (selectElement.value === 'other') {
            otherInputDiv.style.display = 'block';
        } else {
            otherInputDiv.style.display = 'none';
        }

        document.getElementById('other_content').addEventListener('change', function() {
        const otherInput = document.getElementById('other_content_input');
        otherInput.style.display = this.checked ? 'block' : 'none';
        
        // Update checkbox value
        if (this.checked) {
            this.value = 'other';
        } else {
            this.value = '';
        }
    });
    }
</script>

@include('media_org.footer')