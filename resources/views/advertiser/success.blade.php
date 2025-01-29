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
                                <li class="breadcrumb-item active">Payment Success</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Payment Successful</h4>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your payment of {{ $payment->amount }} {{ $payment->currency }} was successful.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <!-- Payment Details -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Payment Details</h4>
                    <ul class="list-group">
                        <li class="list-group-item">Transaction ID: {{ $payment->transaction_id }}</li>
                        <li class="list-group-item">Transaction Reference: {{ $payment->transaction_ref }}</li>
                        <li class="list-group-item">Amount: {{ $payment->amount }} {{ $payment->currency }}</li>
                        <li class="list-group-item">Payment Method: {{ $payment->payment_method }}</li>
                        <li class="list-group-item">Status: <span class="badge bg-success">{{ $payment->status }}</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

@include('advertiser.footer')
