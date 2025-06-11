<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Media Deal - Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <h3>MEDIA DEAL</h3>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('admin.users.index') }}">Users</a>
        </li>
        <li>
          <a href="{{ route('admin.campaign.index') }}">Campaigns</a>
        </li>
        <li>
          <a href="{{ route('admin.refund.index') }}">Refund Requests</a>
        </li>
        <li>
          <a href="messages.html">Messages</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content -->
    <div id="content" class="content">
      <!-- Top Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-link text-dark">
            <i class="bi bi-list fs-4"></i>
          </button>
          <span class="navbar-brand d-lg-none ms-2">MEDIA DEAL</span>
          <div class="d-flex ms-auto">
            <div class="dropdown">
              <button class="btn btn-link text-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
