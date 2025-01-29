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
                                        <h2 class="fw-bold mb-0">100</h2>
                                    </div>
                                    <!-- Label -->
                                    <h5 class="fw-normal mt-0" title="Total Requests">Total Requests</h5>
                                    <!-- Description -->
                                 
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Approved -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Total Approved Figure -->
                                    <div class="mb-3">
                                        <h2 class="fw-bold mb-0">80</h2>
                                    </div>
                                    <!-- Label -->
                                    <h5 class="fw-normal mt-0" title="Total Approved">Total Approved</h5>
                                    <!-- Description -->
                                  
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Denied -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Total Denied Figure -->
                                    <div class="mb-3">
                                        <h2 class="fw-bold mb-0">20</h2>
                                    </div>
                                    <!-- Label -->
                                    <h5 class="fw-normal mt-0" title="Total Denied">Total Denied</h5>
                                    <!-- Description -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    
                    
                    
                    <div class="container mt-4">
                        <h5 class="mb-3">Refund Table</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Ad Type</th>
                                        <th scope="col">Reason for Refund</th>
                                        <th scope="col">Amount of Refund</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Refunded</th>
                                        <th scope="col">Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>Entertainment</td>
                                        <td>I no do again i no de do the advert again</td>
                                        <td><input type="number" class="form-control" placeholder="Enter Amount"></td>
                                        <td>
                                            <select class="form-select">
                                                <option selected>Select action</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Denied">Denied</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-select">
                                                <option selected>Select action</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </td>
                                        <td>johndoe@gmail.com<br>839393939393</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <style>
                        .container {
                            margin-top: 20px;
                        }
                    
                        .table-responsive {
                            overflow-x: auto;
                            -webkit-overflow-scrolling: touch;
                        }
                    
                        table {
                            width: 100%;
                            table-layout: auto;
                        }
                    
                        input[type="number"], select {
                            width: 100%;
                            padding: 8px;
                            font-size: 1rem;
                        }
                    
                        th, td {
                            text-align: center;
                            padding: 12px;
                            vertical-align: middle;
                        }
                    
                        /* Make everything more readable on small devices */
                        @media (max-width: 576px) {
                            th, td {
                                font-size: 0.9rem;
                                padding: 8px;
                            }
                    
                            input[type="number"], select {
                                font-size: 0.9rem;
                            }
                    
                            .table thead th {
                                white-space: nowrap;
                            }
                    
                            .table-responsive {
                                margin-bottom: 1rem;
                            }
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
               
               <style>
                .card {
                    min-height: 250px; /* Ensuring all cards have a minimum height */
                }
            
                .card-body h2 {
                    font-size: 36px;
                    margin-bottom: 15px;
                }
            
                .card-body h5, .card-body p {
                    margin-bottom: 10px; /* Consistent spacing */
                }
            </style>
             
             @include('media_org.footer')