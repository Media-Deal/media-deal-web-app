<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Register | Mediadeal - User Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mediadeal - User Registration Page." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/hyper-config.js"></script>

    <!-- App css -->
    <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body class="authentication-bg">

    <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
        <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
            <g fill-opacity='0.22'>
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
            </g>
        </svg>
    </div>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="/">
                                <span><img src="img/logo.png" alt="logo" height="50"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less
                                    than a minute</p>
                            </div>

                            <form id="registerForm" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" id="fullname" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Enter your name" required>
                                    <div class="invalid-feedback name-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input type="email" id="emailaddress" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required placeholder="Enter your email">
                                    <div class="invalid-feedback email-error"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="roleselection" class="form-label">Role Selection</label>
                                    <select class="form-control" id="roleselection" name="role" required>
                                        <option value="">Select your role</option>
                                        <option value="advertiser">Advertiser</option>
                                        <option value="media_org">Media Organization</option>
                                        <option value="marketer">Marketer</option>
                                    </select>
                                    <div class="invalid-feedback role-error"></div>
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
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="Confirm your password" required>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms"
                                            required>
                                        <label class="form-check-label" for="terms">I accept <a href="#"
                                                class="text-muted">Terms and Conditions</a></label>
                                        <div class="invalid-feedback terms-error"></div>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button id="submitButton" class="btn btn-primary" type="submit">
                                        <span id="buttonText">Sign Up</span>
                                        <span id="loadingSpinner" style="display: none;">
                                            <span class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Loading...
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="{{route('login')}}"
                                    class="text-muted ms-1"><b>Log In</b></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-alt">
        2024 - <script>
            document.write(new Date().getFullYear())
        </script> © Mediadeal - eddiebluedigital.com
    </footer>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

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
            $('#registerForm').on('submit', function (e) {
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
                    url: '{{ route("register") }}',
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