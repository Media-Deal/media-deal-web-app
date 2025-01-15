{{-- resources/views/advertiser/view_ad.blade.php --}}

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
                        <h4 class="page-title">View Ad Details</h4>
                    </div>
                </div>
            </div>

            {{-- Ad Details --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Ad Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Media Type:</strong>
                                </div>
                                <div class="col-md-8">

                                    {{ $ad->media->media_type ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Media Name:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->media->fullname ?? 'N/A' }}

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Category:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->category }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Ad Type:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->type }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Content Provided:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->content_type }}
                                </div>
                            </div>
                            @if($ad->upload_file)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Uploaded File:</strong>
                                </div>
                                <div class="col-md-8">
                                    <a href="{{ asset('storage/' . $ad->upload_file) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        View File
                                    </a>
                                    {{-- Optional: Provide a download link --}}
                                    <a href="{{ asset('storage/' . $ad->upload_file) }}" download
                                        class="btn btn-sm btn-outline-secondary">
                                        Download
                                    </a>
                                </div>
                            </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Target Audience:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->target_audience }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Target Location:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->target_location }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Duration:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->duration }}
                                </div>
                            </div>
                            @if($ad->specify)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Specify Dates:</strong>
                                </div>
                                <div class="col-md-8">
                                    {{ $ad->specify }}
                                </div>
                            </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Cost:</strong>
                                </div>
                                <div class="col-md-8">
                                    ${{ number_format($ad->cost, 2) }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-md-8">
                                    @if($ad->status === '1')
                                    <span class="badge bg-success">Active</span>
                                    @elseif($ad->status === '0')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($ad->status === '2')
                                    <span class="badge bg-danger">Expired</span>
                                    @elseif($ad->status === '3')
                                    <span class="badge bg-info text-dark">Scheduled</span>
                                    @else
                                    <span class="badge bg-secondary">{{ $ad->status }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="row mt-4">
                <div class="col-md-12 text-end">
                    <a href="{{ route('advertiser.manage.ads') }}" class="btn btn-secondary me-2">Back to Manage Ads</a>
                    <a href="{{ route('advertiser.ads.edit', $ad->id) }}" class="btn btn-warning me-2">Edit Ad</a>
                    <form action="{{ route('advertiser.ads.delete', $ad->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this ad?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Ad</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->

</div>
<!-- content-page -->

<style>
    /* Custom styles can be added here */
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