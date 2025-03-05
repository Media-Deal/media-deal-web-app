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
                        <h4 class="page-title">Refund Details</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Total Requests -->
                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Total Requests Figure -->
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalRequests }}</h2>
                            </div>
                            <!-- Label -->
                            <h5 class="fw-normal mt-0" title="Total Requests">Total Requests</h5>
                        </div>
                    </div>
                </div>

                <!-- Total Approved -->
                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Total Approved Figure -->
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalApproved }}</h2>
                            </div>
                            <!-- Label -->
                            <h5 class="fw-normal mt-0" title="Total Approved">Total Approved</h5>
                        </div>
                    </div>
                </div>

                <!-- Total Denied -->
                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Total Denied Figure -->
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalDenied }}</h2>
                            </div>
                            <!-- Label -->
                            <h5 class="fw-normal mt-0" title="Total Denied">Total Denied</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <h5 class="mb-3">Refund Table</h5>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Media</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Refunded</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through refunds and display data -->
                        @foreach($refunds as $refund)
                        <tr>
                            <td>{{ $refund->media }}</td>
                            <td>{{ $refund->category }}</td>
                            <td>{{ $refund->status }}</td>
                            <td>{{ $refund->refunded ? 'Yes' : 'No' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="container mt-4 text-center">
                <!-- Link Button -->
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 py-2">
                    Home
                </a>
            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container -->

</div>
<!-- content -->

<style>
    .small-card {
        padding: 20px;
        /* Add some padding for a clean look */
        height: 150px;
        /* Control the height of the card */
        max-width: 100%;
        /* Ensures the card fills the column */
    }

    .card {
        min-height: 250px;
        /* Ensuring all cards have a minimum height */
    }

    .card-body h2 {
        font-size: 36px;
        margin-bottom: 15px;
    }

    .card-body h5,
    .card-body p {
        margin-bottom: 10px;
        /* Consistent spacing */
    }
</style>

@include('advertiser.footer')