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

            <!-- Search Box -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search refunds...">
                        <button class="btn btn-primary" type="button" id="searchButton">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
                <h5 class="mb-3">Refund Table</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="refundsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Media</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Refunded</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refunds as $refund)
                            @php
                            // Get media organization details
                            $mediaOrg = \App\Models\MediaOrganization::where('fullname', $refund->media)->first();

                            $logo = '';
                            $altText = 'Media Logo';

                            if($mediaOrg) {
                            switch($mediaOrg->media_type) {
                            case 'tv':
                            $logo = $mediaOrg->tv_logo ?? $mediaOrg->tv_logo_url ?? '';
                            $altText = $mediaOrg->tv_name . ' Logo';
                            break;
                            case 'radio':
                            $logo = $mediaOrg->radio_logo ?? $mediaOrg->radio_logo_url ?? '';
                            $altText = $mediaOrg->radio_name . ' Logo';
                            break;
                            case 'internet':
                            $logo = $mediaOrg->internet_logo ?? $mediaOrg->internet_logo_url ?? '';
                            $altText = $mediaOrg->internet_name . ' Logo';
                            break;
                            }
                            }
                            @endphp
                            <tr>
                                <td>{{ $refund->media }}</td>
                                <td>
                                    @if($logo)
                                    <img src="{{ $logo }}" alt="{{ $altText }}" class="img-fluid rounded"
                                        style="max-height: 40px;">
                                    @else
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 40px;">
                                        <i class="mdi mdi-account-circle mdi-24px text-muted"></i>
                                    </div>
                                    @endif
                                </td>
                                <td>{{ $refund->category }}</td>
                                <td>
                                    
                                        {{ $refund->status == 'approved' ? 'bg-success' : '' }}
                                        {{ $refund->status == 'denied' ? 'bg-danger' : '' }}
                                        {{ $refund->status == 'pending' ? 'bg-warning' : '' }}
                                        {{ ucfirst($refund->status) }}
                                    
                                </td>
                                <td>{{ $refund->refunded ? 'Yes' : 'No' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $refunds->links() }}
                </div>
            </div>

            <div class="container mt-4 text-center">
                <!-- Link Button -->
                <a href="{{ route('advertiser.dashboard') }}" class="btn btn-primary btn-lg px-4 py-2">
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
        height: 150px;
        max-width: 100%;
    }

    .card {
        min-height: 250px;
    }

    .card-body h2 {
        font-size: 36px;
        margin-bottom: 15px;
    }

    .card-body h5,
    .card-body p {
        margin-bottom: 10px;
    }

    .table img {
        max-width: 60px;
        max-height: 40px;
        object-fit: contain;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const table = document.getElementById('refundsTable');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        function searchRefunds() {
            const searchText = searchInput.value.toLowerCase();
            
            for (let row of rows) {
                const cells = row.getElementsByTagName('td');
                let found = false;
                
                for (let cell of cells) {
                    if (cell.textContent.toLowerCase().includes(searchText)) {
                        found = true;
                        break;
                    }
                }
                
                row.style.display = found ? '' : 'none';
            }
        }
        
        searchButton.addEventListener('click', searchRefunds);
        searchInput.addEventListener('keyup', function(event) {
            if (event.key === 'Enter') {
                searchRefunds();
            }
        });
    });
</script>

@include('advertiser.footer')