@include('admin.header')

      <!-- Dashboard Content -->
<div class="container-fluid p-4">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <!-- Registered Advertisers Card -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-subtitle text-muted">Registered Advertisers</h6>
                        <i class="bi bi-people-fill text-primary"></i>
                    </div>
                    <h2 class="card-title mb-0">{{ $registeredAdvertisersCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Media Organizations Card -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-subtitle text-muted">Media Organizations</h6>
                        <i class="bi bi-mic-fill text-primary"></i>
                    </div>
                    <h2 class="card-title mb-0">{{ $registeredMediaCount }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Submitted Campaigns Card -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-subtitle text-muted">Submitted Campaigns</h6>
                        <i class="bi bi-megaphone-fill text-primary"></i>
                    </div>
                    <h2 class="card-title mb-0">{{ $submittedCampaigns }}</h2>
                </div>
            </div>
        </div>

        <!-- Refund Requests Card -->
        <div class="col-12 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="card-subtitle text-muted">Refund Requests</h6>
                        <i class="bi bi-arrow-left-right text-primary"></i>
                    </div>
                    <h2 class="card-title mb-0">{{ $refundCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

  @include('admin.footer');
