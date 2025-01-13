@include('advertiser.header')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- Page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Update Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Update Personal Profile</h4>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Profile Update -->
            <div class="row">
                <!-- Profile Image Section -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="profile-picture-wrapper rounded-circle avatar-lg img-thumbnail d-flex align-items-center justify-content-center"
                                style="width: 120px; height: 120px; background-color: #007bff; color: #fff; font-size: 24px; font-weight: bold;">
                                @if ($advertiser->profile_picture)
                                <img src="{{ asset(Auth::user()->profile_picture) }}" alt="profile-image"
                                    class="rounded-circle w-100 h-100">
                                @else
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                @endif
                            </div>
                            <h4 class="mb-0 mt-2">{{ $advertiser->full_name }}</h4>
                            <p class="text-muted font-14">{{ $advertiser->title }}</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Form -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('advertiser.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal
                                    Info</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="full_name" class="form-label">Full Name</label>
                                            <input type="text" name="full_name" id="full_name" class="form-control"
                                                value="{{ old('full_name', Auth::user()->name) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" id="phone_number"
                                                class="form-control"
                                                value="{{ old('phone_number', $advertiser->phone_number) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ old('address', $advertiser->address) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth"
                                                class="form-control"
                                                value="{{ old('date_of_birth', $advertiser->date_of_birth) }}">
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                        class="mdi mdi-office-building me-1"></i> Business Details</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Company Name</label>
                                            <input type="text" name="company_name" id="company_name"
                                                class="form-control"
                                                value="{{ old('company_name', $advertiser->company_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="store_address" class="form-label">Store Address</label>
                                            <input type="text" name="store_address" id="store_address"
                                                class="form-control"
                                                value="{{ old('store_address', $advertiser->store_address) }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" id="description" class="form-control"
                                                rows="4">{{ old('description', $advertiser->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="profile_picture" class="form-label">Profile Picture</label>
                                            <input type="file" name="profile_picture" id="profile_picture"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i
                                            class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('advertiser.footer')