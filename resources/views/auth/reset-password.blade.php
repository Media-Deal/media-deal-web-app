<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Set New Password | Mediadeal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mediadeal - Password Reset" name="description" />
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
    <style>
        .alert-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 350px;
        }
        .system-alert {
            display: none;
        }
    </style>
</head>

<body class="authentication-bg position-relative">
    <!-- System Alert Container -->
    <div class="alert-container">
        <div id="systemAlert" class="alert alert-danger system-alert">
            <strong>System Error!</strong> <span id="alertMessage"></span>
        </div>
    </div>

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

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Set New Password</h4>
                                <p class="text-muted mb-4">Create a new password for your account.</p>
                                
                                <!-- Success Message -->
                                <div id="successMessage" class="alert alert-success" style="display: none;"></div>
                                
                                <!-- Error Message -->
                                <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
                            </div>

                            <form id="resetPasswordForm" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $email ?? old('email') }}" 
                                        placeholder="Enter your email" readonly>
                                    <div class="invalid-feedback email-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter new password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback password-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password-confirm" name="password_confirmation"
                                            class="form-control" placeholder="Confirm new password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback password-confirm-error"></div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button id="submitButton" class="btn btn-primary" type="submit">
                                        <span id="buttonText">Reset Password</span>
                                        <span id="loadingSpinner" style="display: none;">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Updating...
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to login?
                                <a href="{{ route('login') }}" class="text-muted ms-1"><b>Sign In</b></a>
                            </p>
                        </div>
                    </div>

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

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function () {
            // Toggle password visibility
            $("[data-password]").on('click', function() {
                var input = $(this).siblings('input');
                var icon = $(this).find('.password-eye');
                
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.addClass('show-password');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('show-password');
                }
            });
            
            // Handle form submission
            $('#resetPasswordForm').on('submit', function (e) {
                e.preventDefault();
                
                // Reset messages
                $('#successMessage, #errorMessage').hide().empty();
                $('.invalid-feedback').text('');
                $('.is-invalid').removeClass('is-invalid');
                $('#systemAlert').hide();
                
                // Show loading spinner and disable button
                $('#buttonText').hide();
                $('#loadingSpinner').show();
                $('#submitButton').prop('disabled', true);
                
                // Send AJAX request
                $.ajax({
                    url: '{{ route("password.update") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);
                        
                        if (response.success) {
                            $('#successMessage').text(response.message).show();
                            
                            // Redirect to login after delay
                            setTimeout(function() {
                                window.location.href = "{{ route('login') }}";
                            }, 3000);
                        } else {
                            if (response.errors) {
                                // Handle validation errors
                                $.each(response.errors, function(key, errors) {
                                    $('.' + key + '-error').text(errors[0]);
                                    $('[name="' + key + '"]').addClass('is-invalid');
                                });
                            } else {
                                $('#errorMessage').text(response.message).show();
                            }
                        }
                    },
                    error: function (xhr) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);
                        
                        if (xhr.status === 422) {
                            // Validation errors
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, errorArray) {
                                $('.' + key + '-error').text(errorArray[0]);
                                $('[name="' + key + '"]').addClass('is-invalid');
                            });
                        } else if (xhr.status === 500) {
                            // System error
                            $('#alertMessage').text('A system error occurred. Please try again later.');
                            $('#systemAlert').show();
                        } else {
                            // Other errors
                            $('#errorMessage').text(xhr.responseJSON.message || 'An unexpected error occurred. Please try again.').show();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>