@include('advertiser.header')
    
<style>
    /* Container */
    .content-page .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 15px;
    }

    /* Media Card Container */
    .media-card-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }

    /* Media Card */
    .media-card {
        text-align: center;
        padding: 20px;
        background-color: #fff; /* Added background color for clarity */
        width: 100%;
        max-width: 300px;
        border: none; /* Remove border */
        border-radius: 0; /* Remove border radius */
        box-shadow: none; /* Remove box shadow */
        transition: transform 0.3s ease;
    }

    .media-card:hover {
        transform: scale(1.05);
    }

    /* Media Logo */
    .media-logo {
        max-width: 80px;
        margin-bottom: 10px;
    }

    /* Modal Content */
    .modal-content {
        padding: 20px;
    }

    /* Contact Media Section */
    .contact-media {
        text-align: center;
        margin-top: 30px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 0; /* Remove border radius */
        border: none; /* Remove border */
        box-shadow: none; /* Remove box shadow */
        width: 100%;
        max-width: 300px;
        margin: 0 auto;
    }

    .contact-media h5 {
        margin-bottom: 15px;
    }

    .contact-media p {
        margin-bottom: 5px;
    }

    /* Button Custom Styles */
    .btn-custom {
        margin: 5px;
    }
</style>
</head>
<body>

<div class="content-page">
<div class="container">
    <!-- Page Title -->
    <div class="page-title-box">
        <h4 class="page-title">Media Organization Details</h4>
    </div>

    <!-- Media Cards -->
    <div class="media-card-container">
        <div class="media-card">
            <img src="img/radio fm.png" alt="Media Logo" class="media-logo">
            <h4 class="mt-2">Media Name</h4>
            <p class="text-muted">A brief description of the media platform and its advertising opportunities.</p>
           <a href="rates.pdf"><p class="fw-bold">Advert Rate</p></a> 
            <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#adPlacementModal">
                Ads Placement
            </button>
        </div>
        <!-- Repeat Media Cards as needed -->
    </div>

    <!-- Modals -->
    <div class="modal fade" id="adPlacementModal" tabindex="-1" aria-labelledby="adPlacementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adPlacementModalLabel">Ad Placement Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="contentType" class="form-label">Content Type</label>
                            <select class="form-select" id="contentType" name="contentType">
                                <option value="audio">Audio</option>
                                <option value="video">Video</option>
                                <option value="image">Image</option>
                                <option value="docs">Docs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="uploadFile" class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="uploadFile" name="uploadFile">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="3 days">
                        </div>
                        <div class="mb-3">
                            <label for="TargetAudience" class="form-label">Target Audience</label>
                            <select class="form-select" id="TargetAudience" name="TargetAudience">
                                <option value="Children (0-12)">Children (0-12)</option>
                                <option value="Teens (13-17)">Teens (13-17)</option>
                                <option value="Youths (18-34)">Youths (18-34)</option>
                                <option value="Older (35-54)">Older (35-54)</option>
                                <option value="Senior (55+)">Senior (55+)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Media Section -->
    <div class="contact-media">
        <h5>Contact Media</h5>
        <p class="mb-1"><i class="fas fa-envelope"></i> email@example.com</p>
        <p class="mb-1"><i class="fas fa-phone"></i> +123 456 7890</p>
        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#makePaymentModal">
            Make Payment
        </button>
        <button type="button" class="btn btn-secondary btn-custom" data-bs-toggle="modal" data-bs-target="#requestComplianceModal">
            Request Compliance
        </button>

        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal" data-bs-target="#requestRefundModal">
            Request Refund
        </button>
        <button type="button" class="btn btn-info btn-custom" data-bs-toggle="modal" data-bs-target="#giveFeedbackModal">
            Give Feedback
        </button>
        <a href="/dashboard" class="btn btn-outline-primary btn-custom">Return Home</a>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="makePaymentModal" tabindex="-1" aria-labelledby="makePaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="makePaymentModalLabel">Make Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">Select Payment Method</label>
                            <select class="form-select" id="paymentMethod" name="paymentMethod">
                                <option value="paystack">Paystack</option>
                                <option value="flutterwave">Flutterwave</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Request Compliance Modal -->
    <div class="modal fade" id="requestComplianceModal" tabindex="-1" aria-labelledby="requestComplianceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestComplianceModalLabel">Request Compliance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="complianceType" class="form-label">Select Compliance Type</label>
                            <select class="form-select" id="complianceType" name="complianceType">
                                <option value="Certificate of broadcast">Certificate of broadcast</option>
                                <option value="Off air dub">Off air dub</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Request Compliance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

     <!-- Request Refund Modal -->
     <div class="modal fade" id="requestRefundModal" tabindex="-1" aria-labelledby="requestRefundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestRefundModalLabel">Request Refund</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <label for="contentType" class="form-label">Select Reason for Refund</label>
                            <select class="form-select" id="contentType" name="contentType">
                                <option value="audio">Audio</option>
                                <option value="video">Video</option>
                                <option value="image">Image</option>
                                <option value="docs">Docs</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="feedback" class="form-label">State Reason for Refund</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Reason for refund..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Give Feedback Modal -->
    <div class="modal fade" id="giveFeedbackModal" tabindex="-1" aria-labelledby="giveFeedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="giveFeedbackModalLabel">Give Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="feedback" class="form-label">Your Feedback</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="4" placeholder="Your feedback here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 @include('advertiser.footer')