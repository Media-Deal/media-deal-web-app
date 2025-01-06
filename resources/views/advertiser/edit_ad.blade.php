{{-- resources/views/advertiser/edit_ad.blade.php --}}

@include('advertiser.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            {{-- Success and Error Messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Ad</h4>
                    </div>
                </div>
            </div>

            {{-- Edit Ad Form --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Update Ad Information</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('advertiser.ads.update', $ad->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Media Selection --}}
                                <div class="mb-3">
                                    <label for="media_id" class="form-label">Media Organization</label>
                                    <select class="form-select" id="media_id" name="media_id" required>
                                        <option value="">Select Media</option>
                                        @foreach($mediaOrganizations as $media)
                                        <option value="{{ $media->id }}" {{ $ad->media_id == $media->id ? 'selected' :
                                            '' }}>
                                            {{ $media->fullname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Title --}}
                                <div class="mb-3">
                                    <label for="title" class="form-label">Ad Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title', $ad->title) }}" required>
                                </div>

                                {{-- Category --}}
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                        value="{{ old('category', $ad->category) }}" required>
                                </div>

                                {{-- Ad Type --}}
                                <div class="mb-3">
                                    <label for="type" class="form-label">Ad Type</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        value="{{ old('type', $ad->type) }}" required>
                                </div>

                                {{-- Content Provided --}}
                                <div class="mb-3">
                                    <label for="content_type" class="form-label">Content Provided</label>
                                    <select class="form-select" id="content_type" name="content_type" required>
                                        <option value="">Select Option</option>
                                        <option value="Yes" {{ $ad->content_type == 'Yes' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="No" {{ $ad->content_type == 'No' ? 'selected' : '' }}>No</option>
                                        <option value="Not Required" {{ $ad->content_type == 'Not Required' ? 'selected'
                                            : '' }}>Not Required</option>
                                    </select>
                                </div>

                                {{-- Upload File --}}
                                <div class="mb-3">
                                    <label for="upload_file" class="form-label">Upload File</label>
                                    @if($ad->upload_file)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $ad->upload_file) }}" target="_blank"
                                            class="btn btn-sm btn-outline-primary">
                                            View Current File
                                        </a>
                                    </div>
                                    @endif
                                    <input type="file" class="form-control" id="upload_file" name="upload_file">
                                    <small class="form-text text-muted">Supported formats: jpg, jpeg, png, pdf, mp4,
                                        mp3. Max size: 20MB.</small>
                                </div>

                                {{-- Target Audience --}}
                                <div class="mb-3">
                                    <label for="target_audience" class="form-label">Target Audience</label>
                                    <input type="text" class="form-control" id="target_audience" name="target_audience"
                                        value="{{ old('target_audience', $ad->target_audience) }}" required>
                                </div>

                                {{-- Target Location --}}
                                <div class="mb-3">
                                    <label for="target_location" class="form-label">Target Location</label>
                                    <input type="text" class="form-control" id="target_location" name="target_location"
                                        value="{{ old('target_location', $ad->target_location) }}" required>
                                </div>

                                {{-- Duration --}}
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration</label>
                                    <input type="text" class="form-control" id="duration" name="duration"
                                        value="{{ old('duration', $ad->duration) }}" required>
                                </div>

                                {{-- Specify Dates --}}
                                <div class="mb-3">
                                    <label for="specify" class="form-label">Specify Start and End Dates</label>
                                    <input type="text" class="form-control" id="specify" name="specify"
                                        value="{{ old('specify', $ad->specify) }}"
                                        placeholder="E.g., 10th March - 14th March">
                                </div>

                                {{-- Cost --}}
                                <div class="mb-3">
                                    <label for="cost" class="form-label">Cost ($)</label>
                                    <input type="number" step="0.01" class="form-control" id="cost" name="cost"
                                        value="{{ old('cost', $ad->cost) }}" required>
                                </div>

                                {{-- Status --}}
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="Active" {{ $ad->status == 'Active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="Pending" {{ $ad->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Expired" {{ $ad->status == 'Expired' ? 'selected' : '' }}>Expired
                                        </option>
                                        <option value="Scheduled" {{ $ad->status == 'Scheduled' ? 'selected' : ''
                                            }}>Scheduled</option>
                                    </select>
                                </div>

                                {{-- Submit Button --}}
                                <button type="submit" class="btn btn-primary">Update Ad</button>
                                <a href="{{ route('advertiser.manage.ads') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->

</div>
<!-- content-page -->

<style>
    /* Custom styles can be added here */
</style>

@include('advertiser.footer')

{{-- Optional: Auto-Dismiss Alerts --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Automatically dismiss alerts after 5 seconds
        setTimeout(function () {
            var alert = document.querySelector('.alert');
            if (alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>