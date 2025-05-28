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
        .error-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 350px;
            z-index: 9999;
        }

        .error-card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .error-details {
            max-height: 200px;
            overflow-y: auto;
            font-size: 13px;
        }

        .password-strength-meter {
            height: 5px;
            margin-top: 5px;
            background: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }

        .strength-weak {
            background-color: #dc3545;
            width: 30%;
        }

        .strength-medium {
            background-color: #ffc107;
            width: 60%;
        }

        .strength-strong {
            background-color: #28a745;
            width: 100%;
        }

        .strength-text {
            font-size: 12px;
            margin-top: 3px;
        }
    </style>
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

    <!-- Error Container -->
    <div class="error-container" style="display: none;">
        <div class="card error-card border-danger">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center py-2">
                <span>Error Details</span>
                <button type="button" class="btn-close btn-close-white" onclick="$('.error-container').hide()"></button>
            </div>
            <div class="card-body p-3">
                <div class="error-message mb-2"></div>
                <div class="error-details"></div>
            </div>
        </div>
    </div>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header py-4 text-center bg-primary">
                            <a href="/">
                                <span><img src="{{ asset('img/logo.png') }}" alt="logo" height="50"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">
                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                                <p class="text-muted mb-4">Don't have an account? Create your account, it takes less
                                    than a minute</p>
                            </div>

                            <form id="registerForm" method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Honeypot Field -->
                                <div style="display: none;">
                                    <input type="text" name="honeypot" id="honeypot">
                                </div>

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
                                        <option value="advertiser" {{ old('role')=='advertiser' ? 'selected' : '' }}>
                                            Advertiser</option>
                                        <option value="media_org" {{ old('role')=='media_org' ? 'selected' : '' }}>Media
                                            Organization</option>
                                        <option value="marketer" {{ old('role')=='marketer' ? 'selected' : '' }}>
                                            Marketer</option>
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
                                    <div class="password-strength-meter mt-2">
                                        <div class="strength-bar"></div>
                                    </div>
                                    <div class="strength-text"></div>
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
                                        <input type="checkbox" class="form-check-input" id="terms" name="terms" required
                                            {{ old('terms') ? 'checked' : '' }}>
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
            
            // Password strength indicator
            $('#password').on('keyup', function() {
                var password = $(this).val();
                var strength = 0;
                var strengthText = '';
                var strengthClass = '';
                
                // Check for length
                if (password.length >= 8) strength++;
                
                // Check for uppercase
                if (password.match(/[A-Z]/)) strength++;
                
                // Check for numbers
                if (password.match(/[0-9]/)) strength++;
                
                // Check for special chars
                if (password.match(/[@$!%*#?&]/)) strength++;
                
                // Determine strength level
                var $meter = $('.password-strength-meter .strength-bar');
                var $text = $('.strength-text');
                
                if (password.length === 0) {
                    $meter.removeClass('strength-weak strength-medium strength-strong');
                    $meter.css('width', '0');
                    $text.text('');
                } else if (strength <= 1) {
                    $meter.removeClass('strength-medium strength-strong').addClass('strength-weak');
                    $text.text('Weak').css('color', '#dc3545');
                } else if (strength <= 3) {
                    $meter.removeClass('strength-weak strength-strong').addClass('strength-medium');
                    $text.text('Medium').css('color', '#ffc107');
                } else {
                    $meter.removeClass('strength-weak strength-medium').addClass('strength-strong');
                    $text.text('Strong').css('color', '#28a745');
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
                $('.error-container').hide();
                $('.error-message').empty();
                $('.error-details').empty();
                
                // Send AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);
                        
                        if (response.success) {
                            toastr.success(response.message);
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 1500);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function (xhr) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);
                        
                        if (xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessages = [];
                            
                            $.each(errors, function(field, messages) {
                                var errorMessage = messages.join(', ');
                                errorMessages.push(errorMessage);
                                
                                // Find the field and show error
                                var $field = $('[name="' + field + '"]');
                                $field.addClass('is-invalid');
                                
                                // Handle different field types
                                if ($field.is(':checkbox')) {
                                    $field.closest('.form-check').find('.invalid-feedback').text(errorMessage);
                                } else if ($field.is('select')) {
                                    $field.next('.invalid-feedback').text(errorMessage);
                                } else {
                                    $field.next('.invalid-feedback').text(errorMessage);
                                }
                            });
                            
                            // Show all errors in toastr and error container
                            var fullErrorMessage = 'Please correct the following errors:<br>' + errorMessages.join('<br>');
                            toastr.error(fullErrorMessage);
                            
                            $('.error-message').html(fullErrorMessage.replace(/<br>/g, '<br>• '));
                            $('.error-details').html('<pre>' + JSON.stringify(errors, null, 2) + '</pre>');
                            $('.error-container').show();
                            
                        } else {
                            var errorMessage = xhr.responseJSON.message || 'An error occurred. Please try again.';
                            var errorDetails = xhr.responseJSON.error || xhr.statusText || 'No additional details available';
                            
                            toastr.error(errorMessage);
                            $('.error-message').text(errorMessage);
                            $('.error-details').html('<pre>' + errorDetails + '</pre>');
                            $('.error-container').show();
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>