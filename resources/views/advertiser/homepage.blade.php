@include('advertiser.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Media Organizations -->
            <div class="row">
                @forelse($mediaOrganizations as $media)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Media Logo -->
                            <div class="mb-3">
                                @if(strtolower($media->media_type) === 'tv' && $media->tv_logo)
                                <img src="{{ asset('storage/' . $media->tv_logo) }}" alt="{{ $media->tv_name }} Logo"
                                    class="img-fluid" style="max-width: 100px;">
                                @elseif(strtolower($media->media_type) === 'radio' && $media->radio_logo)
                                <img src="{{ asset('storage/' . $media->radio_logo) }}"
                                    alt="{{ $media->radio_name }} Logo" class="img-fluid" style="max-width: 100px;">
                                @elseif(strtolower($media->media_type) === 'internet' && $media->internet_logo)
                                <img src="{{ asset('storage/' . $media->internet_logo) }}"
                                    alt="{{ $media->internet_name }} Logo" class="img-fluid" style="max-width: 100px;">
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

        </div>
        <!-- end row -->

    </div>
    <!-- container -->

</div>
<!-- content -->

@include('advertiser.footer')