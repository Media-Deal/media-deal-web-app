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

                       {{-- Success and Error Messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

                    <div class="row">
                        <!-- Total Ads Box -->
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <div class="card widget-flat small-card h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Number on Top -->
                                    <div class="mb-2">
                                        <h2 class="fw-bold mb-0">{{$totalCompliancerequested}}</h2> <!-- Example number -->
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
                                        <h2 class="fw-bold mb-0">{{$totalCompliancesent}}</h2> <!-- Example number -->
                                    </div>
                                    <!-- Label -->
                                    <h5 class="fw-normal mt-0" title="Current Ads">Total Compliance Sent</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @forelse($adscompliances as $adscompliance)
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
                                    <td>{{ $adscompliance->user->name }}</td>
                                    <td>{{ $adscompliance->user->name }}</td>
                                    <td>{{ $adscompliance->compliance_type }}</td>
                                   
                                    <td>
                                        <!-- Status message -->
                                         @if (session('status'))
                                         <div class="alert alert-info">
                                             {{ session('status') }}
                                         </div>
                                         @endif
                                       <form method="POST" action="{{ route('updateCompliancefile', $adscompliance->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Show existing file if available --}}
    @if (!empty($adscompliance->compliance_file))
        <div class="mb-3">
            <label class="form-label fw-semibold">Current Compliance File</label><br>
            <a href="{{ $adscompliance->compliance_file }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-file-earmark-arrow-down"></i> View / Download
            </a>
        </div>
    @endif

    <div class="mb-3">
        <label for="compliance_file" class="form-label fw-semibold">Upload New Compliance File</label>
        <input type="file" 
               name="compliance_file" 
               id="compliance_file" 
               class="form-control @error('compliance_file') is-invalid @enderror" 
               required>
        @error('compliance_file')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <input type="hidden" name="compliance_status" value="1">

    <button type="submit" class="btn btn-primary">
        <i class="bi bi-upload"></i> Upload File
    </button>
</form>

                                        
                                    </td>

                                    <td>{{ $adscompliance->user->email }} <br>
                                        {{ $adscompliance->user->phone }}</td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Compliance yet</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    </div>
                    
                    <style>
                          .small-card {
padding: 20px;     /* Add some padding for a clean look */
height: 150px;     /* Control the height of the card */
max-width: 100%;   /* Ensures the card fills the column */
}
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

          
        

@include('media_org.footer')