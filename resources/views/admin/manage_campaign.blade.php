@include('admin.header');



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

      <!-- Campaigns Content -->
      <div class="container-fluid p-4">
        <h1 class="mb-4">Campaigns</h1>
        <div class="card border-0 shadow-sm">
          <div class="card-body d-flex flex-column align-items-center justify-content-center py-5">
            <i class="bi bi-megaphone fs-1 text-muted mb-3"></i>
            <h5 class="text-muted">Campaigns content will be displayed here</h5>
            <p class="text-muted">This section is under development</p>
          </div>
        </div>
      </div>
    </div>
  </div>

 
@include('admin.footer')
