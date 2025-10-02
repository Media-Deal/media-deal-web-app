@include('advertiser.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Compliance Details</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Total Compliance Requested -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="card widget-flat small-card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-2">
                                <h2 class="fw-bold mb-0">{{ $totalComplianceRequested }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0" title="Total Ads">Total Compliance Requested</h5>
                        </div>
                    </div>
                </div>

                <!-- Total Compliance Received -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="card widget-flat small-card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-2">
                                <h2 class="fw-bold mb-0">{{ $totalComplianceReceived }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0" title="Total Compliance">Total Compliance Received</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($compliances as $compliance)
                @php
                $media = optional($compliance->media);
                $logo = '';
                $altText = 'Media Logoo';

                if($media) {
                switch($media->media_type) {
                case 'tv':
                $logo = $media->tv_logo ?? $media->tv_logo_url ?? '';
                $altText = $media->tv_name . ' Logo';
                break;
                case 'radio':
                $logo = $media->radio_logo ?? $media->radio_logo_url ?? '';
                $altText = $media->radio_name . ' Logo';
                break;
                case 'internet':
                $logo = $media->internet_logo ?? $media->internet_logo_url ?? '';
                $altText = $media->internet_name . ' Logo';
                break;
                }
                }
                @endphp
                <div class="col-md-4 col-lg-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Media Logo -->
                            @if($logo)
                            <div class="mb-2">
                                <img src="{{ $logo }}" alt="{{ $altText }}" class="img-fluid rounded"
                                    style="max-height: 80px;">
                            </div>
                            @else
                            <div class="mb-2 bg-light rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px;">
                                <i class="mdi mdi-account-circle mdi-36px text-muted"></i>
                            </div>
                            @endif

                            <!-- Media Organization Name -->
                            <h5 class="fw-normal mt-0" title="Media Organization Name">
                                {{ $media->fullname ?? 'Media Not Found' }}
                            </h5>

                            <!-- Compliance Status -->
                            <div class="mb-1">
                                <span
                                    class="badge bg-{{ $compliance->compliance_status === 'received' ? 'success' : 'warning' }}">
                                    {{ ucfirst($compliance->compliance_status) }}
                                </span>
                            </div>

                            <!-- Compliance Type -->
                            <p class="text-muted mb-1">
                                Type: {{ $compliance->compliance_type ?? 'N/A' }}
                            </p>

                            <!-- Media Contact -->
                            <p class="text-muted">
                                {{ $media->email ?? 'No Contact Info' }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <!-- container -->
    </div>
    <!-- content -->
</div>
<!-- content-page -->

@include('advertiser.footer')