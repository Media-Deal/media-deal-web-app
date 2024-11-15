@include('advertiser.header')
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

                    <div class="card widget-flat" style="height: auto;">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center"
                            style="padding: 1rem;">

                            <div class="card"
                                style="background: linear-gradient(135deg, #0d6efd, #2B2D92, black); color: white; padding: 0.5rem;">
                                <div class="marquee">
                                    <h2 class="mt-2 mb-2 display-6 display-md-5 display-lg-4"
                                        style="font-weight: 700; font-size: 1.8rem;">
                                        {{ $greeting }}, {{ Auth::user()->name }}! Welcome to Your Marketing
                                        Dashboard.
                                    </h2>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Media Organizations -->
                    <div class="row">
                        @forelse($mediaOrganizations as $media)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card widget-flat h-100">
                                <div
                                    class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Media Logo -->
                                    <div class="mb-3">
                                        @if(strtolower($media->media_type) === 'tv' && $media->tv_logo)
                                        <img src="{{ asset('storage/' . $media->tv_logo) }}"
                                            alt="{{ $media->tv_name }} Logo" class="img-fluid"
                                            style="max-width: 100px;">
                                        @elseif(strtolower($media->media_type) === 'radio' && $media->radio_logo)
                                        <img src="{{ asset('storage/' . $media->radio_logo) }}"
                                            alt="{{ $media->radio_name }} Logo" class="img-fluid"
                                            style="max-width: 100px;">
                                        @elseif(strtolower($media->media_type) === 'internet' &&
                                        $media->internet_logo)
                                        <img src="{{ asset('storage/' . $media->internet_logo) }}"
                                            alt="{{ $media->internet_name }} Logo" class="img-fluid"
                                            style="max-width: 100px;">
                                        @else
                                        <img src="{{ asset('img/images.png') }}" alt="Default Logo" class="img-fluid"
                                            style="max-width: 100px;">
                                        @endif
                                    </div>

                                    <!-- Media Name -->
                                    <h5 class="fw-normal mt-0">
                                        @if(strtolower($media->media_type) === 'tv')
                                        {{ $media->tv_name }}
                                        @elseif(strtolower($media->media_type) === 'radio')
                                        {{ $media->radio_name }}
                                        @elseif(strtolower($media->media_type) === 'internet')
                                        {{ $media->internet_name }}
                                        @endif
                                    </h5>

                                    <!-- Location -->
                                    <p class="text-muted">
                                        @if(strtolower($media->media_type) === 'tv')
                                        {{ $media->tv_main_studio_location ?? 'N/A' }}
                                        @elseif(strtolower($media->media_type) === 'radio')
                                        {{ $media->radio_station_location ?? 'N/A' }}
                                        @elseif(strtolower($media->media_type) === 'internet')
                                        {{ $media->internet_channel_location ?? 'N/A' }}
                                        @endif
                                    </p>

                                    <!-- Additional Info or Actions -->
                                    <a href="{{ route('advertiser.media.show', $media->id) }}"
                                        class="btn btn-sm btn-primary mt-auto">View Details</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                No media organizations found. Please add a new one.
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <style>
                        .card {
                            min-height: 250px;
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

        @include('advertiser.footer')