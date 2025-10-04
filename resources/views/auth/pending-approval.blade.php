<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Pending Approval | Mediadeal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Your account is pending approval" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body class="authentication-bg position-relative">
    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 800 800">
            <g fill-opacity="0.22">
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx="400" cy="400" r="600"></circle>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx="400" cy="400" r="500"></circle>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx="400" cy="400" r="300"></circle>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx="400" cy="400" r="200"></circle>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx="400" cy="400" r="100"></circle>
            </g>
        </svg>
    </div>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/logo.png') }}" alt="logo" height="50">
                            </a>
                        </div>

                        <div class="card-body p-4 text-center">
                            <div class="mb-4">
                                <i class="ri-time-line display-4 text-warning"></i>
                            </div>

                            <h3 class="text-center text-warning mb-3">Account Pending Approval</h3>

                            <p class="text-muted mb-4">
                                Thank you for registering! Your account is currently pending approval by our
                                administration team.
                            </p>

                            <p class="text-muted mb-4">
                                You will be able to access your dashboard once your account has been approved. This
                                process usually takes 24-48 hours.
                            </p>

                            <p class="text-muted mb-4">
                                If you have any questions, please contact our support team.
                            </p>

                            <div class="mb-3 mt-4">
                                <a href="{{ route('logout') }}" class="btn btn-primary me-2">
                                    <i class="ri-logout-box-line me-1"></i> Logout
                                </a>
                                <a href="mailto:support@mediadeal.com" class="btn btn-outline-primary">
                                    <i class="ri-customer-service-line me-1"></i> Contact Support
                                </a>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container -->
    </div>

    <footer class="footer footer-alt">
        © 2018 - <script>
            document.write(new Date().getFullYear())
        </script> Mediadeal - <a href="https://eddiebluedigital.com">eddiebluedigital.com</a>
    </footer>

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            // Auto check for approval status every 30 seconds
            setInterval(function() {
                $.ajax({
                    url: '{{ route("check.approval.status") }}',
                    method: 'GET',
                    success: function(response) {
                        if (response.approved) {
                            toastr.success('Your account has been approved! Redirecting...');
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 2000);
                        }
                    },
                    error: function() {
                        // Silently fail - user can stay on the page
                    }
                });
            }, 30000); // Check every 30 seconds
        });
    </script>
</body>

</html>