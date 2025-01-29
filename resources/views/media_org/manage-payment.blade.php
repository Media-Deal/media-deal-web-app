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
                                
                                <h4 class="page-title">Manage Payment</h4>
                            </div>
                        </div>
                    </div>

                   
                    <div class="row">
                        <!-- First Radio Station -->
                        
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                  
                                    
                                        <div class="mb-3">
                                            <p class="text-muted">300</p>
                                        </div>
                                    
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Transaction</h5>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                    
                        <!-- Second Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Logo -->
                                    <div class="mb-3">
                                        <p class="text-muted">300</p>
                                    </div>
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Received</h5>
                                    <!-- Location -->
                                   
                                </div>
                            </div>
                        </div>
                    
                        <!-- Third Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                  
                                    <div class="mb-3">
                                        <p class="text-muted">300</p>
                                    </div>
                                  
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Pending</h5>
                                  
                                    
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
                    

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Ad Type</th>
                                    <th scope="col">Amount Paid</th>
                                    <th scope="col"> Payment Request</th>
                                    <th scope="col">Contact</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>john doe</td>
                                    <td>Entertainment</td>
                                    <td>Off Air Dub</td>
                                   
                                    <td>
                                        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#requestPaymentModal">
                                            Payment Request
                                        </button>
                                    </td>

                                    <td>johndoe@gmail.com
                                        594984848484</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        
                        

                    
                    <!-- Request Refund Modal -->
     <div class="modal fade" id="requestPaymentModal" tabindex="-1" aria-labelledby="requestPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestRefundModalLabel">Payment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        

                        <div class="mb-3">
                            <label for="uploadcompliance" class="form-label">Upload Compliance</label>
                            <input type="file" class="form-control" id="uploadcompliance" name="uploadcompliance" >
                        </div>

                        <div class="mb-3">
                            <label for="anyRefund" class="form-label">Any Refund?</label>
                            <select class="form-select" id="anyRefund" name="any_refund" onchange="toggleRefundAmount()">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        
                        <!-- Refund Amount Field (Hidden by default) -->
                        <div class="mb-3" id="refundAmountField" style="display: none;">
                            <label for="refundAmount" class="form-label">Refund Amount</label>
                            <input type="number" class="form-control" id="refundAmount" name="refund_amount" placeholder="Enter refund amount">
                        </div>
                        
                       
                        

                        <div class="mb-3">
                            <label for="bankname" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bankname" name="title" placeholder="Enter Bank Name">
                        </div>

                        <div class="mb-3">
                            <label for="accountname" class="form-label">Account Name</label>
                            <input type="text" class="form-control" id="accountname" name="title" placeholder="Enter Account Name">
                        </div>
                        <div class="mb-3">
                            <label for="accountnumber" class="form-label">Account Number</label>
                            <input type="number" class="form-control" id="accountnumber" name="title" placeholder="Enter Account Number">
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                       


                                      
                                        
                               
                        
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->
            <script>
                function toggleRefundAmount() {
                    var refundSelect = document.getElementById("anyRefund");
                    var refundAmountField = document.getElementById("refundAmountField");
                    if (refundSelect.value === "Yes") {
                        refundAmountField.style.display = "block";
                    } else {
                        refundAmountField.style.display = "none";
                    }
                }
            </script>
          
            <style>
                .table-responsive {
    width: 100%;
    overflow-x: auto;
}

.form-select {
    width: 100%;
    padding: 5px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f8f9fa;
    color: #495057;
}

@media (max-width: 768px) {
    .form-select {
        font-size: 12px;
    }
}

                .small-card {
padding: 20px;     /* Add some padding for a clean look */
height: 150px;     /* Control the height of the card */
max-width: 100%;   /* Ensures the card fills the column */
}

             </style>

@include('media_org.footer')