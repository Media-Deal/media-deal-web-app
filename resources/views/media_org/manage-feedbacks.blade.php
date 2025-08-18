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
                                <h2 class="fw-bold mb-0">128</h2>
                            </div>
                            <h5 class="fw-normal mt-0">Total Feedback Received</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Feedback Table -->
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Feedback</th>
                            <th>Date</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Doe</td>
                            <td>Loved the platform! Just hope there's more customization soon.</td>
                            <td>Aug 2, 2025</td>
                            <td>jane@example.com</td>
                        </tr>
                        <tr>
                            <td>Michael Smith</td>
                            <td>Found a bug on the ad submission page. Please fix!</td>
                            <td>Aug 1, 2025</td>
                            <td>mike@example.com</td>
                        </tr>
                        <tr>
                            <td>Aisha Bello</td>
                            <td>App is great. Can we get dark mode?</td>
                            <td>July 30, 2025</td>
                            <td>aisha@example.com</td>
                        </tr>
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
