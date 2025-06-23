@include('media_org.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- Flash Messages -->
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

            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Refund Details</h4>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalRequests }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0">Total Requests</h5>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalApproved }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0">Total Approved</h5>
                        </div>
                    </div>
                </div>

                <div class="col-4 mb-3">
                    <div class="card widget-flat h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <h2 class="fw-bold mb-0">{{ $totalDenied }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0">Total Denied</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Refund Table -->
            <div class="container mt-4">
                <h5 class="mb-3">Refund Table</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Media</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Refunded</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refunds as $refund)
                            <tr>
                                <td>{{ $refund->user->name ?? 'N/A' }}</td>
                                <td>{{ $refund->media }}</td>
                                <td>{{ $refund->category }}</td>
                                <td>
                                    <input type="number" name="amount"
                                        class="form-control @error('amount.'.$refund->id) is-invalid @enderror"
                                        value="{{ old('amount.'.$refund->id, $refund->amount ?? 0) }}"
                                        form="updateForm{{ $refund->id }}">
                                    @error('amount.'.$refund->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <select class="form-select @error('status.'.$refund->id) is-invalid @enderror"
                                        name="status" form="updateForm{{ $refund->id }}">
                                        <option value="pending" {{ old('status.'.$refund->id, $refund->status) ==
                                            'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ old('status.'.$refund->id, $refund->status) ==
                                            'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="denied" {{ old('status.'.$refund->id, $refund->status) ==
                                            'denied' ? 'selected' : '' }}>Denied</option>
                                    </select>
                                    @error('status.'.$refund->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    <select class="form-select @error('refunded.'.$refund->id) is-invalid @enderror"
                                        name="refunded" form="updateForm{{ $refund->id }}">
                                        <option value="1" {{ old('refunded.'.$refund->id, $refund->refunded) ?
                                            'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !old('refunded.'.$refund->id, $refund->refunded) ?
                                            'selected' : '' }}>No</option>
                                    </select>
                                    @error('refunded.'.$refund->id)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>
                                    {{ $refund->user->email ?? 'N/A' }}<br>
                                    {{ $refund->user->phone ?? 'N/A' }}
                                </td>
                                <td>
                                    <form id="updateForm{{ $refund->id }}" method="POST"
                                        action="{{ route('refund.update', $refund->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="mdi mdi-update"></i> Update
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $refunds->links() }}
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- content -->
</div>

<style>
    /* Add custom styles for error states */
    .is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 0.875em;
        color: #dc3545;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.9rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
        }
    }
</style>

@include('media_org.footer')