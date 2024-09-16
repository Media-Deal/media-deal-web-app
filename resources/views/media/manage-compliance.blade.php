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
                        <!-- Total Ads Box -->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="card widget-flat small-card h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Number on Top -->
                                    <div class="mb-2">
                                        <h2 class="fw-bold mb-0">100</h2> <!-- Example number -->
                                    </div>
                                    <!-- Label -->
                                    <h5 class="fw-normal mt-0" title="Total Ads">Total Compliance Requested</h5>
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
                                    <h5 class="fw-normal mt-0" title="Current Ads">Total Compliance Received</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- First Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Radio FM</h5>
                                    <!-- Download link -->
                                    <a href="file/download/radio-fm-file.pdf" download class="text-decoration-none">Download File</a>
                                    <!-- Location -->
                                    <p class="text-muted">Location 1</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Second Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Creek FM</h5>
                                    <!-- Download link -->
                                    <a href="file/download/creek-fm-file.pdf" download class="text-decoration-none">Download File</a>
                                    <!-- Location -->
                                    <p class="text-muted">Location 2</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Third Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Royal FM</h5>
                                    <!-- Download link -->
                                    <a href="file/download/royal-fm-file.pdf" download class="text-decoration-none">Download File</a>
                                    <!-- Location -->
                                    <p class="text-muted">Location 3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .card {
                            min-height: 250px; /* Ensuring all cards have a minimum height */
                        }
                    
                        .card-body h5, .card-body p {
                            margin-bottom: 10px; /* Consistent spacing */
                        }
                    
                        .text-decoration-none {
                            margin-top: 10px; /* Spacing for the download link */
                        }
                    </style>
                    
                    
                   
                
                       


                                      
                                        
                               
                        
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

          
            <style>
                .small-card {
padding: 20px;     /* Add some padding for a clean look */
height: 150px;     /* Control the height of the card */
max-width: 100%;   /* Ensures the card fills the column */
}

             </style>
             
 @include('advertiser.footer')