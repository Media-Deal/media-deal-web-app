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
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Media</th>
                    <th>Category</th>
                    <th>Reason</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Refunded</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($refunds as $refund)
                <tr>
                    <td>{{ $refund->user->name ?? 'N/A' }}</td>
                    <td>{{ $refund->media }}</td>
                    <td>{{ $refund->category }}</td>
                    <td>{{ $refund->reason }}</td>

                    <!-- Amount -->
                    <td>
                        <label class="form-label fw-semibold small text-muted">Amount</label>
                        <input type="number" name="amount"
                               class="form-control form-control-lg @error('amount.'.$refund->id) is-invalid @enderror"
                               value="{{ old('amount.'.$refund->id, $refund->amount ?? 0) }}"
                               form="updateForm{{ $refund->id }}">
                        @error('amount.'.$refund->id)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>

                    <!-- Status -->
                    <td>
                        <label class="form-label fw-semibold small text-muted">Status</label>
                        <select class="form-select form-select-lg @error('status.'.$refund->id) is-invalid @enderror"
                                name="status" form="updateForm{{ $refund->id }}">
                            <option value="pending" {{ old('status.'.$refund->id, $refund->status) == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="approved" {{ old('status.'.$refund->id, $refund->status) == 'approved' ? 'selected' : '' }}>
                                Approved
                            </option>
                            <option value="denied" {{ old('status.'.$refund->id, $refund->status) == 'denied' ? 'selected' : '' }}>
                                Denied
                            </option>
                        </select>
                        @error('status.'.$refund->id)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>

                    <!-- Refunded -->
                    <td>
                        <label class="form-label fw-semibold small text-muted">Refunded</label>
                        <select class="form-select form-select-lg @error('refunded.'.$refund->id) is-invalid @enderror"
                                name="refunded" form="updateForm{{ $refund->id }}">
                            <option value="1" {{ old('refunded.'.$refund->id, $refund->refunded) ? 'selected' : '' }}>
                                Yes
                            </option>
                            <option value="0" {{ !old('refunded.'.$refund->id, $refund->refunded) ? 'selected' : '' }}>
                                No
                            </option>
                        </select>
                        @error('refunded.'.$refund->id)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>

                    <!-- Contact -->
                    <td>
                        <span class="d-block">{{ $refund->user->email ?? 'N/A' }}</span>
                        <span class="d-block">{{ $refund->user->phone ?? 'N/A' }}</span>
                    </td>

                    <!-- Actions -->
                    <td>
                        <form id="updateForm{{ $refund->id }}" method="POST"
                              action="{{ route('refund.update', $refund->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                <i class="mdi mdi-update"></i> Update
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-4">
                        <strong>No refund yet.</strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .form-select-lg, .form-control-lg {
        font-size: 1rem;
        padding: 10px 14px;
        border-radius: 8px;
        min-width: 140px;
    }
    td label.form-label {
        margin-bottom: 4px;
        font-size: 0.85rem;
        color: #6c757d;
    }
</style>


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






.form-select-lg {
    font-size: 1rem;
    padding: 10px 14px;
    border-radius: 8px;
    min-width: 150px;
}

td .form-label {
    margin-bottom: 4px;
    display: block;
}

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