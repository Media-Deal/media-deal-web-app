@include('media.header')
    
        

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
                                <div class="page-title-right">
                                    <form class="d-flex">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                                            <span class="input-group-text bg-primary border-primary text-white">
                                                <i class="mdi mdi-calendar-range font-13"></i>
                                            </span>
                                        </div>
                                        <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                            <i class="mdi mdi-filter-variant"></i>
                                        </a>
                                    </form>
                                </div>
                                <h4 class="page-title">Media Organization Dashboard</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- First Radio Station -->
                        
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Logo -->
                                    <a href="{{url('station-details')}}" class="d-block text-decoration-none h-100">
                                    <div class="mb-3">
                                        <img src="img/radio fm.png" alt="Radio Station Logo" class="img-fluid" style="max-width: 100px;">
                                    </div>
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Radio FM</h5>
                                    <!-- Location -->
                                    <p class="text-muted">Location 1</p>
                                </div>
                            </div>
                        </a>
                        </div>
                        
                    
                        <!-- Second Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Logo -->
                                    <div class="mb-3">
                                        <img src="img/creek fm.png" alt="Radio Station Logo" class="img-fluid" style="max-width: 100px;">
                                    </div>
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Creek FM</h5>
                                    <!-- Location -->
                                    <p class="text-muted">Location 2</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Third Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Logo -->
                                    <div class="mb-3">
                                        <img src="img/royal fm.png" alt="Radio Station Logo" class="img-fluid" style="max-width: 100px;">
                                    </div>
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Royal FM</h5>
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
                    
                        .card-body img {
                            max-width: 80px; /* Consistent image size */
                            margin-bottom: 15px;
                        }
                    
                        .card-body h5, .card-body p {
                            margin-bottom: 10px; /* Consistent spacing */
                        }
                    </style>
                    

                    

                       


                                      
                                        
                               
                        
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

          

 @include('media.footer')