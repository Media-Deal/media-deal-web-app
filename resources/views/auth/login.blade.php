<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Log In | Mediadeal - User Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mediadeal - User Login Page." name="description" />
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

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access the
                                    dashboard.</p>
                            </div>

                            <form id="loginForm" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input type="email" id="emailaddress" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="Enter your email" required>
                                    <div class="invalid-feedback email-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback password-error"></div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-muted float-end">
                                        <small>Forgot your password?</small>
                                    </a>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin"
                                            name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button id="submitButton" class="btn btn-primary" type="submit">
                                        <span id="buttonText">Log In</span>
                                        <span id="loadingSpinner" style="display: none;">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account?
                                <a href="{{ route('register') }}" class="text-muted ms-1"><b>Sign Up</b></a>
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
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                
                // Show loading spinner and disable button
                $('#buttonText').hide();
                $('#loadingSpinner').show();
                $('#submitButton').prop('disabled', true);
                
                // Clear previous error messages
                $('.invalid-feedback').text('');
                $('.is-invalid').removeClass('is-invalid');
                
                // Send AJAX request
                $.ajax({
                    url: '{{ route("login") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);
                        
                        if (response.success) {
                            // Show success message
                            toastr.success(response.message);
                            
                            // Redirect after delay
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1500);
                        } else {
                            // Show error message
                            toastr.error(response.message);
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
                            $.each(errors, function(key, value) {
                                $('.' + key + '-error').text(value[0]);
                                $('[name="' + key + '"]').addClass('is-invalid');
                            });
                            toastr.error('Please fix the errors in the form.');
                        } else if (xhr.status === 401) {
                            // Authentication failed
                            toastr.error(xhr.responseJSON.message || 'Invalid credentials. Please try again.');
                        } else {
                            // Other errors
                            toastr.error(xhr.responseJSON.message || 'An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>