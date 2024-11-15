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
                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Media Organization Name -->
                            <h5 class="fw-normal mt-0" title="Media Organization Name">{{ $compliance->media->fullname
                                }}
                            </h5>

                            <!-- Compliance Download Link (if file exists) -->
                            @if($compliance->compliance_file)
                            <a href="{{ asset($compliance->compliance_file) }}" download
                                class="text-decoration-none">Download File</a>
                            @else
                            <p class="text-muted">File Not Available</p>
                            @endif

                            <!-- Location (if available in media organization) -->
                            <p class="text-muted">{{ $compliance->media->email ?? 'No Location Info' }}</p>
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