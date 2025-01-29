@include('media_org.header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@php
use Carbon\Carbon;

$currentHour = Carbon::now()->format('H');
$greeting = '';

if ($currentHour >= 12 && $currentHour < 16) { $greeting='Good afternoon' ; } elseif ($currentHour>= 16 && $currentHour
    < 24) { $greeting='Good evening' ; } else { $greeting='Good morning' ; } @endphp
        <!--==============================================================-->
        <!-- Advertisers Dashboard Header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">




                    <div class="card widget-flat mt-4 py-4 mb-4"
                        style="background: linear-gradient(135deg, #0d6efd, #2B2D92, black); color: white; padding: 0.5rem; height: auto;">
                        <div class="marquee">
                            <h2 class="mt-2 mb-2 display-6 display-md-5 display-lg-4"
                                style="font-weight: 700; font-size: 1.8rem;">
                                {{ $greeting }}, {{ Auth::user()->name }}! Welcome to Your Media
                                Dashboard.
                            </h2>
                        </div>
                    </div>



                    <div class="container-fluid">
                        <!-- Page Title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title text-primary">Media Organization Dashboard</h4>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Main Content -->
                        <div class="row g-4">
                            <!-- Profile Section -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body text-center p-4">
                                        <div class="profile-image-wrapper mb-3">
                                            <img src="assets/images/users/avatar-1.jpg" 
                                                 class="rounded-circle avatar-lg img-thumbnail border border-primary shadow-sm" 
                                                 alt="profile-image">
                                        </div>
                    
                                        @if($mediaOrganization)
                                        <h4 class="mb-1 text-primary fw-bold">{{ $mediaOrganization->fullname }}</h4>
                                        <p class="text-muted font-14 fst-italic">{{ $mediaOrganization->position }}</p>
                    
                                        <div class="text-start mt-4 border-top pt-3">
                                            <table class="table table-bordered align-middle">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-primary">Full Name</th>
                                                        <td>{{ $mediaOrganization->fullname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-primary">Phone Number</th>
                                                        <td>{{ $mediaOrganization->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-primary">Email</th>
                                                        <td>{{ $mediaOrganization->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-primary">Position</th>
                                                        <td>{{ $mediaOrganization->position }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        <p class="mt-4 text-primary">No media organization details available.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Media Details Section -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <h5 class="bg-light p-3 text-uppercase fw-bold">
                                            <i class="mdi mdi-office-building me-1"></i> Media Details
                                        </h5>
                    
                                        @if(isset($mediaOrganization->media_type))
                                        <table class="table table-bordered align-middle">
                                            <tbody>
                                                @if($mediaOrganization->media_type == 'tv')
                                                <!-- TV Media Details -->
                                                <tr>
                                                    <th class="text-primary">TV Logo</th>
                                                    <td>
                                                        <img src="{{ $mediaOrganization->tv_logo ?? '#' }}" alt="TV Logo" style="height: 50px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">TV Name</th>
                                                    <td>{{ $mediaOrganization->tv_name ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">TV Type</th>
                                                    <td>{{ $mediaOrganization->tv_type ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Content Focus</th>
                                                    <td>{{ $mediaOrganization->tv_content_focus ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Main Studio Location</th>
                                                    <td>{{ $mediaOrganization->tv_main_studio_location ?? 'N/A' }}</td>
                                                </tr>
                                                @elseif($mediaOrganization->media_type == 'radio')
                                                <!-- Radio Media Details -->
                                                <tr>
                                                    <th class="text-primary">Radio Logo</th>
                                                    <td>
                                                       
                                                        <img src="{{ asset('storage/' . $mediaOrganization->radio_logo) }}" alt="Radio Logo" style="height: 50px;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Station Name</th>
                                                    <td>{{ $mediaOrganization->radio_name ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Frequency</th>
                                                    <td>{{ $mediaOrganization->radio_frequency ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Station Type</th>
                                                    <td>{{ $mediaOrganization->radio_type ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Location</th>
                                                    <td>{{ $mediaOrganization->radio_station_location ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Content Focus</th>
                                                    <td>{{ $mediaOrganization->radio_content_focus ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Social Media</th>
                                                    <td>
                                                        <a href="{{ $mediaOrganization->radio_youtube ?? '#' }}" target="_blank">
                                                            <i class="fab fa-youtube text-danger me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->radio_facebook ?? '#' }}" target="_blank">
                                                            <i class="fab fa-facebook text-primary me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->radio_instagram ?? '#' }}" target="_blank">
                                                            <i class="fab fa-instagram text-danger me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->radio_twitter ?? '#' }}" target="_blank">
                                                            <i class="fab fa-twitter text-info me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @elseif($mediaOrganization->media_type == 'internet')
                                                <!-- Internet Media Details -->
                                                <tr>
                                                    <th class="text-primary">Internet Logo</th>
                                                    <td>
                                                        <img src="{{ $mediaOrganization->internet_logo ?? '#' }}" alt="Internet Logo" style="height: 50px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Brand Name</th>
                                                    <td>{{ $mediaOrganization->internet_name ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Location</th>
                                                    <td>{{ $mediaOrganization->internet_channel_location ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-primary">Social Media</th>
                                                    <td>
                                                        <a href="{{ $mediaOrganization->internet_youtube ?? '#' }}" target="_blank">
                                                            <i class="fab fa-youtube text-danger me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->internet_facebook ?? '#' }}" target="_blank">
                                                            <i class="fab fa-facebook text-primary me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->internet_instagram ?? '#' }}" target="_blank">
                                                            <i class="fab fa-instagram text-danger me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                        <a href="{{ $mediaOrganization->internet_twitter ?? '#' }}" target="_blank">
                                                            <i class="fab fa-twitter text-info me-2" style="font-size: 24px;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        @else
                                        <p class="text-center text-muted">No media details yet.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
                    


                        <style>
                            /* Marquee styling */
                            .marquee h2 {
                                white-space: nowrap;
                                overflow: hidden;
                                display: inline-block;
                                animation: scroll-text 15s linear infinite;
                            }

                            /* Marquee Animation */
                            @keyframes scroll-text {
                                from {
                                    transform: translateX(100%);
                                }

                                to {
                                    transform: translateX(-100%);
                                }
                            }

                            /* Responsive styling for fonts and layout */
                            @media (max-width: 768px) {
                                .marquee h2 {
                                    font-size: 1.5rem;
                                }

                                .container-fluid p {
                                    font-size: 1rem;
                                }
                            }

                            @media (min-width: 768px) {
                                .marquee h2 {
                                    font-size: 2rem;
                                }

                                .container-fluid p {
                                    font-size: 1.2rem;
                                }
                            }

                            @media (min-width: 1200px) {
                                .marquee h2 {
                                    font-size: 2.5rem;
                                }

                                .container-fluid p {
                                    font-size: 1.3rem;
                                }
                            }
                        </style>

{{-- <style>
    .card {
  min-height: 100px;
}
.card-body img {
  max-width: 80px;
  margin-bottom: 15px;
}
.card-body h5,
.card-body p {
  margin-bottom: 10px;
}
  .card {
      min-height: 100px;
      /* Ensuring all cards have a minimum height */
  }

  .card-body img {
      max-width: 80px;
      /* Consistent image size */
      margin-bottom: 15px;
  }

  .card-body h5,
  .card-body p {
      margin-bottom: 10px;
      /* Consistent spacing */
  }
</style> --}}

                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            @include('media_org.footer')