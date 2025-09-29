@include('media_org.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Feedbacks</h4>
                    </div>
                </div>
            </div>

            <!-- Feedback Stats -->
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card widget-flat small-card h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-2">
                                <h2 class="fw-bold mb-0">{{ $totalFeedbacks }}</h2>
                            </div>
                            <h5 class="fw-normal mt-0">Total Feedback Received</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feedback Table -->
           <div class="table-responsive mt-4">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Feedback</th>
                <th>Date</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $feedback)
                <tr>
                    <td>{{ $feedback->user->name ?? 'Anonymous' }}</td>
                    <td>{{ $feedback->content }}</td>
                    <td>{{ $feedback->created_at->format('M d, Y') }}</td>
                    <td>{{ $feedback->user->email ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No feedbacks found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


        </div> <!-- container -->

    </div> <!-- content -->
</div> <!-- content-page -->

@include('media_org.footer')

<!-- Page Styling -->
<style>
    .small-card {
        padding: 20px;
        height: 150px;
        max-width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .card-body h5,
    .card-body h2 {
        margin-bottom: 10px;
    }

    table th,
    table td {
        vertical-align: middle !important;
    }

    table thead {
        background-color: #343a40;
        color: white;
    }

    @media (max-width: 576px) {
        .small-card {
            height: auto;
            padding: 15px;
        }

        .table-responsive {
            font-size: 14px;
        }
    }
</style>
