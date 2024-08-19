<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Media Deal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>


<body>
    {{-- <script src="https://kit.fontawesome.com/2b537d8d05.js" crossorigin="anonymous"></script>
    <div class="container-xxl bg-white p-0"> --}}



        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{asset('img/favicon.png')}}" alt="Icon"
                            style="width: 30px; height: 30px;">
                    </div>
                    <img class="img-fluid" src="{{asset('img/favicon.png')}}" alt="Icon"
                        style="width: 200px; height: 100px;">
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <div class="navbar-nav ms-auto">


                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" active data-bs-toggle="dropdown">Media</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <div class="row">



                                    <a href="#" class="dropdown-item">Radio</a>
                                    <a href="#" class="dropdown-item">TV</a>
                                    <a href="#" class="dropdown-item">Online</a>

                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Resources</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <div class="row">
                                    <h6 class="dropdown-item">Dashboard</h6>
                                       <a href="" class="dropdown-item">Dashbaord</a>
                                        <a href="" class="dropdown-item">Dashboard</a>
                                        <a href="" class="dropdown-item">Feedback</a>
                                        <a href="" class="dropdown-item">Testimonial</a>
                                        <a href="" class="dropdown-item">Deal Support</a>



                                        <hr>
                                </div>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Company</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <div class="row">

                                    
                                     <a href="{{url('about')}}">
                                        <h6 class="dropdown-item">About Us</h6>
                                    </a>
                                        <h6 class="dropdown-item">Faq</h6>
                                        <h6 class="dropdown-item">Policies</h6>



                                        <a href="{{url('about')}}">
                                            <h6 class="dropdown-item">About Us</h6>
                                        </a>
                                        <a href="#">
                                            <h6 class="dropdown-item">Faq</h6>
                                        </a>
                                        <a href="#">
                                            <h6 class="dropdown-item">Policies</h6>
                                        </a>

                                        <hr>
                                </div>
                            </div>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="" class="nav-item nav-link">Contact Us</a>
                        </div>

                        <div class="nav-item dropdown">
                            <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                        </div>


                    </div>



                </div>
        </div>
        </nav>
    </div>