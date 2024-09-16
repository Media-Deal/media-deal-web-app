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

                        <h4 class="page-title">Manage Ads</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Total Ads Box -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="card widget-flat small-card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Number on Top -->
                            <div class="mb-2">
                                <h2 class="fw-bold mb-0">100</h2> <!-- Example number -->
                            </div>
                            <!-- Label -->
                            <h5 class="fw-normal mt-0" title="Total Ads">Total Ads</h5>
                        </div>
                    </div>
                </div>

                <!-- Current Ads Box -->
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                    <div class="card widget-flat small-card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <!-- Number on Top -->
                            <div class="mb-2">
                                <h2 class="fw-bold mb-0">25</h2> <!-- Example number -->
                            </div>
                            <!-- Label -->
                            <h5 class="fw-normal mt-0" title="Current Ads">Current Ads</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-title-box">

                <h4 class="page-title">Active Ads</h4>
            </div>

            <div class="container mt-4">
                <h5 class="mb-3">Ads Table</h5>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Media</th>
                            <th scope="col">Category</th>
                            <th scope="col">Ad Type</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td>Radio</td>
                            <td>Entertainment</td>
                            <td>30-second Spot</td>
                            <td>$200</td>
                            <td>1 Week</td>
                            <td>Active</td>
                        </tr>
                        <!-- Row 2 -->
                        <tr>
                            <td>Television</td>
                            <td>Commercial</td>
                            <td>60-second Commercial</td>
                            <td>$1500</td>
                            <td>2 Weeks</td>
                            <td>Pending</td>
                        </tr>
                        <!-- Row 3 -->
                        <tr>
                            <td>Online</td>
                            <td>Digital</td>
                            <td>Banner Ad</td>
                            <td>$300</td>
                            <td>1 Month</td>
                            <td>Expired</td>
                        </tr>
                        <!-- Row 4 -->
                        <tr>
                            <td>Print</td>
                            <td>Magazine</td>
                            <td>Full Page Ad</td>
                            <td>$500</td>
                            <td>2 Days</td>
                            <td>Active</td>
                        </tr>
                        <!-- Row 5 -->
                        <tr>
                            <td>Social Media</td>
                            <td>Platform</td>
                            <td>Sponsored Post</td>
                            <td>$250</td>
                            <td>1 Day</td>
                            <td>Scheduled</td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <div class="container mt-4 text-center">
                <!-- Link Button -->
                <a href="{{url('advertiser')}}" class="btn btn-primary btn-lg px-4 py-2">
                    Click to Place Ads
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
</style>

@include('advertiser.footer')