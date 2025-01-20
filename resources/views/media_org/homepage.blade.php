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



                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right"></div>
                            <h4 class="page-title">Media Organization Dashboard</h4>
                        </div>
                    </div>
                    
                    <!-- Media Organizations -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card text-center shadow-sm border-0" style="background: white; color: black; padding: 0.5rem; height: auto;">
                                <div class="card-body p-4">
                                    <div class="profile-image-wrapper mb-3">
                                        <img src="assets/images/users/avatar-1.jpg" 
                                             class="rounded-circle avatar-lg img-thumbnail border border-2 border-primary shadow-sm" 
                                             alt="profile-image">
                                    </div>
                    
                                    @if($mediaOrganization)
                                    <h4 class="mb-1" style="font-weight: bold; color: #0d6efd;">{{ $mediaOrganization->fullname }}</h4>
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
                        </div>
                    
                        <div class="col-xl-8 col-lg-7">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3 text-uppercase bg-light p-2">
                                        <i class="mdi mdi-office-building me-1"></i> Media Details
                                    </h5>
                                    @if(isset($mediaOrganization->media_type))
                                        @if($mediaOrganization->media_type == 'tv')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong style="color: #0d6efd;">TV Logo:</strong> 
                                                        <img src="{{ $mediaOrganization->tv_logo ?? '#' }}" alt="TV Logo" class="ms-2" style="height: 50px;">
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">TV Name:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->tv_name ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">TV Type:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->tv_type ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Content Focus:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->tv_content_focus ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Main Studio Location:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->tv_main_studio_location ?? 'N/A' }}</span>
                                                    </p>


                                                    
                                                </div>
                                            </div>
                                        @elseif($mediaOrganization->media_type == 'radio')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong style="color: #0d6efd;">Radio Logo:</strong> 
                                                        <img src="{{ $mediaOrganization->radio_logo ?? '#' }}" alt="Radio Logo" class="ms-2" style="height: 50px;">
                                                    </p>
                                                    <p><strong style="color: #0d6efd;">Radio Station Name:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_name ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Radio Frequency:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_frequency ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Radio Type:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_type ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Radio Station Location:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_station_location ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Content Focus:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_content_focus ?? 'N/A' }}</span>
                                                    </p>

                                                    {{-- <p><strong style="color: #0d6efd;">Advert Rate:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->radio_advert_rate ?? 'N/A' }}</span>
                                                    </p> --}}

                                                    <p><strong style="color: #0d6efd;">social media:</strong></p>
                                                    <p>
                                                      
                                                            <a href="{{ $mediaOrganization->radio_youtube ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-youtube text-danger ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                     
                                                       
                                                            <a href="{{ $mediaOrganization->radio_facebook ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-facebook text-primary ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                        
                                                       
                                                            <a href="{{ $mediaOrganization->radio_instagram ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-instagram text-danger ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                       
                                                       
                                                            <a href="{{ $mediaOrganization->radio_twitter ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-twitter text-info ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                      
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        @elseif($mediaOrganization->media_type == 'internet')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong style="color: #0d6efd;">Internet Logo:</strong> 
                                                        <img src="{{ $mediaOrganization->internet_logo ?? '#' }}" alt="Internet Logo" class="ms-2" style="height: 50px;">
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Brand Name:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->internet_name ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">Location:</strong> 
                                                        <span class="ms-2 text-dark">{{ $mediaOrganization->internet_channel_location ?? 'N/A' }}</span>
                                                    </p>

                                                    <p><strong style="color: #0d6efd;">social media:</strong></p>
                                                    <p>
                                                      
                                                            <a href="{{ $mediaOrganization->internet_youtube ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-youtube text-danger ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                     
                                                       
                                                            <a href="{{ $mediaOrganization->internet_facebook ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-facebook text-primary ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                        
                                                       
                                                            <a href="{{ $mediaOrganization->internet_instagram ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-instagram text-danger ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                       
                                                       
                                                            <a href="{{ $mediaOrganization->internet_twitter ?? 'N/A' }}" target="_blank">
                                                                <i class="fab fa-twitter text-info ms-2" style="font-size: 24px;"></i>
                                                            </a>
                                                      
                                                    </p>
                                                    
                                                   
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <p class="text-center text-muted">No media details yet.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <style>
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
                    </style>
                    

                        <style>
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
                        </style>
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

                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            @include('media_org.footer')