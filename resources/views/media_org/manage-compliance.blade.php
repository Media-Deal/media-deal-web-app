@include('media_org.header')

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
                                    <h5 class="fw-normal mt-0" title="Current Ads">Total Compliance Sent</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Ad Type</th>
                                    <th scope="col">Compliance</th>
                                    <th scope="col"> Choose Actions</th>
                                    <th scope="col">Contact</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>john doe</td>
                                    <td>Entertainment</td>
                                    <td>Off Air Dub</td>
                                   
                                    <td>
                                        <input type="file">
                                    </td>

                                    <td>johndoe@gmail.com
                                        594984848484</td>
                                    
                                </tr>
                            </tbody>
                        </table>
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

@include('media_org.footer')