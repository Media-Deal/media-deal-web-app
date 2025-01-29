@include('advertiser.header')

<div class="content-page">
    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Payment Error</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payment Failed</h4>
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> There was an issue processing your payment. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Retry Button -->
            <div class="text-center mt-4">
                <a href="{{ route('advertiser.manage.ads') }}" class="btn btn-primary">Retry Payment</a>
            </div>

        </div>
    </div>
</div>

@include('advertiser.footer')