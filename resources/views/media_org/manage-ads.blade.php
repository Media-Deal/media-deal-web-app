{{-- resources/views/advertiser/manage_ads.blade.php --}}

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
                                
                                <h4 class="page-title">Manage Ads</h4>
                            </div>
                        </div>
                    </div>

                   
                    <div class="row">
                        <!-- First Radio Station -->
                        
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                  
                                    
                                        <div class="mb-3">
                                            <p class="text-muted">{{ $totalAds }}</p>
                                        </div>
                                    
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Request</h5>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                    
                        <!-- Second Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                    <!-- Radio Station Logo -->
                                    <div class="mb-3">
                                        <p class="text-muted">{{ $currentAds }}</p>
                                    </div>
                                    <!-- Radio Station Name -->
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Completed</h5>
                                    <!-- Location -->
                                   
                                </div>
                            </div>
                        </div>
                    
                        <!-- Third Radio Station -->
                        <div class="col-4 mb-3">
                            <div class="card widget-flat h-100">
                                <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                                  
                                    <div class="mb-3">
                                        <p class="text-muted">0</p>
                                    </div>
                                  
                                    <h5 class="fw-normal mt-0" title="Radio Station Name">Total Refunded</h5>
                                  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    

                    <div class="page-title-box">
                        <h4 class="page-title">Ads Table</h4>
                    </div>
                    
                    @forelse($adPlacements as $adPlacement)
                        <div class="container mt-4 p-3 border rounded">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h5><strong>Name:</strong> {{ $adPlacement->user->name }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><strong>Location:</strong> {{ $adPlacement->user->address }}</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <h5><strong>Email:</strong> <a href="mailto:{{ $adPlacement->user->email }}">{{ $adPlacement->user->email }}</a></h5>
                                </div>
                                <div class="col-md-6">
                                    <h5><strong>Phone Number:</strong> <a href="tel:{{ $adPlacement->user->phone }}">{{ $adPlacement->user->phone }}</a></h5>
                                </div>
                            </div>
                        </div>
                    
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Ad Type</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Target Audience</th>
                                        <th scope="col">Target Location</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Choose Actions</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $adPlacement->title }}</td>
                                        <td>{{ $adPlacement->category }}</td>
                                        <td>{{ ucfirst($adPlacement->ad_type) }}</td>
                                        <td>{{ $adPlacement->content }}</td>
                                        <td>{{ $adPlacement->target_audience }}</td>
                                        <td>{{ $adPlacement->target_location }}</td>
                                        <td>{{ $adPlacement->duration }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('updateAdStatus', $adPlacement->id) }}">
                                                @csrf
                                                @method('PUT') <!-- For updating data -->
                                                <select name="status" class="form-select action-select" aria-label="Action Select">
                                                    <option value="" disabled selected>Select action</option>
                                                    <option value="0" {{ $adPlacement->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="1" {{ $adPlacement->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                                    <option value="2" {{ $adPlacement->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="3" {{ $adPlacement->status == 'aborted' ? 'selected' : '' }}>Aborted</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                            </form>
                                            
                                        </td>
                                        <td>
                                            @if($adPlacement->status == 0)
                                                Processing
                                            @else
                                                {{ ucfirst($adPlacement->status) }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <div class="text-center mt-5">
                            <h5>No ads placed yet</h5>
                        </div>
                    @endforelse
                    
                    
                   
                       


                                      
                                        
                               
                        
                    </div>
                    <!-- end row -->

                </div>
                <!-- container -->

            </div>
            <!-- content -->

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
                                    
            @include('media_org.footer')
          
           