@include('admin.header');

      <!-- Users Content -->
      <div class="container-fluid p-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
          <h1 class="mb-3 mb-md-0">Users</h1>
          <div class="search-container">
            <div class="input-group">
              <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search"></i>
              </span>
              <input type="text" class="form-control border-start-0" placeholder="Search" aria-label="Search" id="searchInput">
            </div>
          </div>
        </div>
        
        <!-- User Tabs -->
        <ul class="nav nav-tabs user-tabs mb-4" id="userTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="advertisers-tab" data-bs-toggle="tab" data-bs-target="#advertisers" type="button" role="tab" aria-controls="advertisers" aria-selected="false">Advertisers ({{ $advertisers->total() }})</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button" role="tab" aria-controls="media" aria-selected="true">Media ({{ $media->total() }})</button>
    </li>
</ul>

<!-- Tab Content -->
<div class="tab-content" id="userTabsContent">
    <!-- Advertisers Tab -->
    <div class="tab-pane fade" id="advertisers" role="tabpanel" aria-labelledby="advertisers-tab">
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="fw-semibold fs-5">Name</th>
                            <th scope="col" class="fw-semibold fs-5">Email</th>
                            <th scope="col" class="fw-semibold fs-5">Status</th>
                            <th scope="col" class="fw-semibold fs-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($advertisers as $advertiser)
                        <tr class="user-row">
                            <td class="align-middle py-3">{{ $advertiser->name }}</td>
                            <td class="align-middle py-3">{{ $advertiser->email }}</td>
                            <td class="align-middle py-3">
                                <span class="badge rounded-pill {{ $advertiser->is_active ? 'badge-verified' : 'badge-activate' }} px-3 py-2">
                                    {{ $advertiser->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="align-middle py-3">
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-primary btn-sm">View</button>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        {{ $advertiser->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $advertisers->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- Media Tab -->
    <div class="tab-pane fade show active" id="media" role="tabpanel" aria-labelledby="media-tab">
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="fw-semibold fs-5">Name</th>
                            <th scope="col" class="fw-semibold fs-5">Email</th>
                            <th scope="col" class="fw-semibold fs-5">Type</th>
                            <th scope="col" class="fw-semibold fs-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($media as $mediaOrg)
                        <tr class="user-row">
                            <td class="align-middle py-3">{{ $mediaOrg->name }}</td>
                            <td class="align-middle py-3">{{ $mediaOrg->email }}</td>
                            <td class="align-middle py-3">
                                <span class="badge rounded-pill {{ $mediaOrg->type === 'radio' ? 'badge-radio' : 'badge-newspaper' }} px-3 py-2">
                                    {{ ucfirst($mediaOrg->type) }} {{ $mediaOrg->type === 'radio' ? 'Station' : 'TV Station' }}
                                </span>
                            </td>
                            <td class="align-middle py-3">
                                <div class="d-flex flex-wrap gap-2">
                                    <button class="btn btn-primary btn-sm">View</button>
                                    <button class="btn btn-outline-secondary btn-sm">
                                        {{ $mediaOrg->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $media->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('admin.footer')
