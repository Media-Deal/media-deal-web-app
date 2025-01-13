{{-- resources/views/advertiser/manage_ads.blade.php --}}

@include('advertiser.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

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
                                <h2 class="fw-bold mb-0">{{ $totalAds }}</h2>
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
                                <h2 class="fw-bold mb-0">{{ $currentAds }}</h2>
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
                            <th scope="col">Actions</th> {{-- Optional: For actions like Edit/Delete --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ads as $ad)
                        <tr>
                            <td>{{ $ad->media->media_type ?? 'N/A' }}</td>
                            <td>{{ $ad->category }}</td>
                            <td>{{ $ad->type }}</td>
                            <td>${{ number_format($ad->cost, 2) }}</td>
                            <td>{{ $ad->duration }}</td>
                            <td>
                                @if($ad->status === '1')
                                <span class="badge bg-success">Active</span>
                                @elseif($ad->status === '0')
                                <span class="badge bg-warning text-dark">Pending'</span>
                                @elseif($ad->status === '2')
                                <span class="badge bg-danger">Expired</span>
                                @else
                                <span class="badge bg-secondary">{{ $ad->status }}</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td>
                                <a href="{{ route('advertiser.ads.view', $ad->id) }}"
                                    class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('advertiser.ads.edit', $ad->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('advertiser.ads.delete', $ad->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this ad?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No ads placed yet.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

                {{-- Optional: Pagination Links --}}
                {{--
                @if($ads->hasPages())
                <div class="d-flex justify-content-center">
                    {{ $ads->links() }}
                </div>
                @endif
                --}}
            </div>

            <div class="container mt-4 text-center">
                <!-- Link Button -->
                <a href="" class="btn btn-primary btn-lg px-4 py-2">
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

{{-- Optional: Auto-Dismiss Alerts --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Automatically dismiss alerts after 5 seconds
        setTimeout(function () {
            var alert = document.querySelector('.alert');
            if (alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>