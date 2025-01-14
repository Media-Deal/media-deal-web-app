<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-menu-color="light" data-sidenav-user="true">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Advertiser Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Daterangepicker css -->
    <link href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css">

    <!-- Vector Map css -->
    <link href="{{asset('assets/vendor/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="{{asset('assets/js/hyper-config.js')}}"></script>

    <!-- App css -->
    <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-lg-2 gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{route('advertiser.dashboard')}}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{asset('img/favicon.png')}}" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset('img/favicon.png')}}" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{route('advertiser.dashboard')}}" class="logo-dark">
                            <span class="logo-lg">
                                <img src="{{asset('img/favicon.png')}}" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="{{asset('img/favicon.png')}}" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <!-- Topbar Search Form -->
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control dropdown-toggle" placeholder="Search..."
                                    id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>


                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-search-line font-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>



                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ri-notification-3-line font-22"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                            <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 font-16 fw-semibold"> Notifications</h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('notifications.clear') }}"
                                            class="text-dark text-decoration-underline">
                                            <small>Clear All</small>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="px-2" style="max-height: 300px;" data-simplebar>
                                @php
                                $notifications = \App\Models\Message::where('sender_type', '!=', 'advertiser')
                                ->latest()
                                ->take(10)
                                ->get();
                                @endphp


                                @forelse ($notifications as $notification)
                                <a href="{{ route('advertiser.messages.show', $notification->id) }}"
                                    class="dropdown-item p-0 notify-item card {{ $notification->reply ? 'read-noti' : 'unread-noti' }} shadow-none mb-2">
                                    <div class="card-body">
                                        <span class="float-end noti-close-btn text-muted">
                                            <i class="mdi mdi-close"></i>
                                        </span>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="notify-icon bg-{{ $notification->isAdvertiserSender() ? 'primary' : 'info' }}">
                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-truncate ms-2">
                                                <h5 class="noti-item-title fw-semibold font-14">
                                                    {{ $notification->isAdvertiserSender() ?
                                                    $notification->advertiser->name :
                                                    $notification->mediaOrganization->name }}
                                                    <small class="fw-normal text-muted ms-1">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </small>
                                                </h5>
                                                <small class="noti-item-subtitle text-muted">
                                                    {{ $notification->message }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @empty
                                <p class="text-muted text-center mt-3">No notifications available.</p>
                                @endforelse
                            </div>

                            <!-- All-->
                            <a href="{{ route('advertiser.messages.index') }}"
                                class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                View All
                            </a>
                        </div>
                    </li>




                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Theme Mode">
                            <i class="ri-moon-line font-22"></i>
                        </div>
                    </li>


                    <li class="d-none d-md-inline-block">
                        <a class="nav-link" href="#" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line font-22"></i>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                @if (Auth::user()->profile_picture)
                                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="user-image" width="32"
                                    style="border-radius: 50%;">
                                @else
                                <span style="
                                        width: 32px; 
                                        height: 32px; 
                                        background: linear-gradient(135deg, blue, black); 
                                        color: white; 
                                        font-weight: bold; 
                                        display: inline-flex; 
                                        justify-content: center; 
                                        align-items: center; 
                                        font-size: 14px; 
                                        border-radius: 50%; 
                                        text-transform: uppercase; 
                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </span>
                                @endif
                            </span>


                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0">{{Auth::user()->name}}</h5>
                                <h6 class="my-0 fw-normal">Founder</h6>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-lifebuoy me-1"></i>
                                <span>Support</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-lock-outline me-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="{{route('advertiser.dashboard')}}" class="logo logo-light">
                <span class="logo-lg">
                    <img src="{{asset('img/favicon.png')}}" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="{{asset('img/favicon.png')}}" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="{{route('advertiser.dashboard')}}" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="{{asset('img/favicon.png')}}" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="{{asset('img/favicon.png')}}" alt="small logo">
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
                <i class="ri-checkbox-blank-circle-line align-middle"></i>
            </div>

            <!-- Full Sidebar Menu Close Button -->
            <div class="button-close-fullsidebar">
                <i class="ri-close-fill align-middle"></i>
            </div>

            <!-- Sidebar -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!-- Leftbar User -->
                <div class="leftbar-user">
                    <div class="profile-picture-wrapper rounded-circle avatar-lg img-thumbnail d-flex align-items-center justify-content-center"
                        style="width: 80px; height: 80px; background-color: #007bff; color: #fff; font-size: 24px; font-weight: bold;">
                        <a href="pages-profile.html">

                            @if (Auth::user()->profile_picture)
                            <img src="{{ asset(Auth::user()->profile_picture) }}" alt="user-image" height="42"
                                class="rounded-circle shadow-sm">
                            @else
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            @endif

                        </a>
                    </div>
                </div>

                <!--- Sidemenu -->
                <ul class="side-nav">
                    <li class="side-nav-title">Navigation</li>

                    <li class="side-nav-item">
                        <a href="{{route('advertiser.dashboard')}}" class="side-nav-link">
                            <i class="uil-dashboard"></i>
                            <span> Dashboard</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('advertiser.manage.ads')}}" class="side-nav-link">
                            <i class="uil-presentation"></i>
                            <!-- Ads/Announcements icon -->
                            <span> Manage Ads</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('advertiser.manage.compliance')}}" class="side-nav-link">
                            <i class="uil-shield-check"></i> <!-- Compliance icon -->
                            <span> Manage Compliance</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{url('manage-refund')}}" class="side-nav-link">
                            <i class="uil-money-withdraw"></i> <!-- Refunds icon -->
                            <span> Manage Refund</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('advertiser.profile')}}" class="side-nav-link">
                            <i class="uil-user-circle"></i> <!-- Profile icon -->
                            <span> Manage Profile</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('advertiser.messages.index')}}" class="side-nav-link">
                            <i class="uil-bell"></i> <!-- Notification icon -->
                            <span> Notification</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('user.logout')}}" class="side-nav-link">
                            <i class="uil-sign-out-alt"></i> <!-- Logout icon -->
                            <span> Logout</span>
                        </a>
                    </li>

                    <div class="leftbar-user">
                        <div class="profile-picture-wrapper rounded-circle avatar-lg img-thumbnail d-flex align-items-center justify-content-center"
                            style="width: 80px; height: 80px; background-color: #007bff; color: #fff; font-size: 24px; font-weight: bold;">
                            <a href="{{route('advertiser.profile')}}">
                                @if (Auth::user()->profile_picture)
                                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="user-image" height="42"
                                    class="rounded-circle shadow-sm">
                                @else
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                @endif
                            </a>
                        </div>
                    </div>
                </ul>

                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <style>

        </style>