@include('advertiser.header')

<style>
  /* Your existing CSS styles */
  /* ... (omitted for brevity) ... */
</style>
</head>

<body>

  <div class="content-page">
    <div class="container">
      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif


      <!-- Page Title -->
      <div class="page-title-box">
        <h4 class="page-title">Media Organization Details</h4>
      </div>

      <!-- Media Cards -->
      <div class="media-card-container">
        <div class="media-card">
          @if($media->media_type === 'TV' && $media->tv_logo)
          <img src="{{ asset('storage/' . $media->tv_logo) }}" alt="{{ $media->tv_name }} Logo"
            class="img-fluid media-logo">
          @elseif($media->media_type === 'Radio' && $media->radio_logo)
          <img src="{{ asset('storage/' . $media->radio_logo) }}" alt="{{ $media->radio_name }} Logo"
            class="img-fluid media-logo">
          @elseif($media->media_type === 'Internet' && $media->internet_logo)
          <img src="{{ asset('storage/' . $media->internet_logo) }}" alt="{{ $media->internet_name }} Logo"
            class="img-fluid media-logo">
          @else
          <img src="{{ asset('img/default-logo.png') }}" alt="Default Logo" class="img-fluid media-logo">
          @endif
          <h4 class="mt-2">{{ $media->name }}</h4>
          <p class="text-muted">{{ $media->description }}</p>
          <a href="{{ $media->rateCard }}">
            <p class="fw-bold">Advert Rate</p>
          </a>
          <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal"
            data-bs-target="#adPlacementModal">
            Ads Placement
          </button>
        </div>
        <!-- Repeat Media Cards as needed -->
      </div>

      <!-- Ad Placement Modal -->
      <!-- Ad Placement Modal -->
      <div class="modal fade" id="adPlacementModal" tabindex="-1" aria-labelledby="adPlacementModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="adPlacementModalLabel">Ad Placement Form - {{ $media->name }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertiser.media.ad.placement', $media->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- Hidden Media ID -->
                <input type="hidden" name="media_id" value="{{ $media->id }}">

                <!-- Title -->
                <div class="mb-3">
                  <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="E.g., Advert for my Business" value="{{ old('title') }}" required>
                  @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Category -->
                <div class="mb-3">
                  <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                  <select class="form-select @error('category') is-invalid @enderror" id="category" name="category"
                    required>
                    <option value="">Select Category</option>
                    <option value="Political" {{ old('category')=='Political' ? 'selected' : '' }}>Political</option>
                    <option value="Commercial" {{ old('category')=='Commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="Public Service" {{ old('category')=='Public Service' ? 'selected' : '' }}>Public
                      Service</option>
                    <option value="Infomercial" {{ old('category')=='Infomercial' ? 'selected' : '' }}>Infomercial
                    </option>
                    <option value="Religious" {{ old('category')=='Religious' ? 'selected' : '' }}>Religious</option>
                  </select>
                  @error('category')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Type -->
                <div class="mb-3">
                  <label for="type" class="form-label">Type<span class="text-danger">*</span></label>
                  <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                    <option value="">Select Type</option>
                    <option value="Campaign" {{ old('type')=='Campaign' ? 'selected' : '' }}>Campaign</option>
                    <option value="Event Sponsorship" {{ old('type')=='Event Sponsorship' ? 'selected' : '' }}>Event
                      Sponsorship</option>
                    <option value="Hype" {{ old('type')=='Hype' ? 'selected' : '' }}>Hype</option>
                    <option value="Interview" {{ old('type')=='Interview' ? 'selected' : '' }}>Interview</option>
                    <option value="Jingle" {{ old('type')=='Jingle' ? 'selected' : '' }}>Jingle</option>
                    <option value="Promotion" {{ old('type')=='Promotion' ? 'selected' : '' }}>Promotion</option>
                    <option value="Sponsored Program" {{ old('type')=='Sponsored Program' ? 'selected' : '' }}>Sponsored
                      Program</option>
                    <option value="Sponsored Message" {{ old('type')=='Sponsored Message' ? 'selected' : '' }}>Sponsored
                      Message</option>
                  </select>
                  @error('type')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Content Type -->
                <div class="mb-3">
                  <label for="contentType" class="form-label">Content Provided<span class="text-danger">*</span></label>
                  <select class="form-select @error('content_type') is-invalid @enderror" id="contentType"
                    name="content_type" required>
                    <option value="">Select Option</option>
                    <option value="Yes" {{ old('content_type')=='Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ old('content_type')=='No' ? 'selected' : '' }}>No</option>
                    <option value="Not Required" {{ old('content_type')=='Not Required' ? 'selected' : '' }}>Not
                      Required</option>
                  </select>
                  @error('content_type')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Upload File -->
                <div class="mb-3" id="uploadFileSection" style="display: none;">
                  <label for="uploadFile" class="form-label">Upload File</label>
                  <input type="file" class="form-control @error('upload_file') is-invalid @enderror" id="uploadFile"
                    name="upload_file" accept=".jpg,.jpeg,.png,.pdf,.mp4,.mp3">
                  <small class="form-text text-muted">Supported formats: jpg, jpeg, png, pdf, mp4, mp3.</small>
                  @error('upload_file')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Support Link -->
                <div class="mb-3" id="supportLinkSection" style="display: none;">
                  <label class="form-label">Need Assistance?</label>
                  <p>If you don't have content, click <a href="">here</a> for
                    assistance.</p>
                </div>

                <!-- Target Audience -->
                <div class="mb-3">
                  <label for="targetAudience" class="form-label">Target Audience<span
                      class="text-danger">*</span></label>
                  <select class="form-select @error('target_audience') is-invalid @enderror" id="targetAudience"
                    name="target_audience" required>
                    <option value="">Select Audience</option>
                    <option value="Children (0-12)" {{ old('target_audience')=='Children (0-12)' ? 'selected' : '' }}>
                      Children (0-12)</option>
                    <option value="Teens (13-17)" {{ old('target_audience')=='Teens (13-17)' ? 'selected' : '' }}>Teens
                      (13-17)</option>
                    <option value="Youths (18-34)" {{ old('target_audience')=='Youths (18-34)' ? 'selected' : '' }}>
                      Youths (18-34)</option>
                    <option value="Older (35-54)" {{ old('target_audience')=='Older (35-54)' ? 'selected' : '' }}>Older
                      (35-54)</option>
                    <option value="Senior (55+)" {{ old('target_audience')=='Senior (55+)' ? 'selected' : '' }}>Senior
                      (55+)</option>
                  </select>
                  @error('target_audience')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Target Location -->
                <div class="mb-3">
                  <label for="targetLocation" class="form-label">Target Location<span
                      class="text-danger">*</span></label>
                  <select class="form-select @error('target_location') is-invalid @enderror" id="targetLocation"
                    name="target_location" required>
                    <option value="">Select Location</option>
                    <option value="State" {{ old('target_location')=='State' ? 'selected' : '' }}>State (Select from a
                      list of states)</option>
                    <option value="National" {{ old('target_location')=='National' ? 'selected' : '' }}>National
                    </option>
                    <option value="International" {{ old('target_location')=='International' ? 'selected' : '' }}>
                      International</option>
                  </select>
                  @error('target_location')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Duration -->
                <div class="mb-3">
                  <label for="duration" class="form-label">Duration<span class="text-danger">*</span></label>
                  <select class="form-select @error('duration') is-invalid @enderror" id="duration" name="duration"
                    required>
                    <option value="">Select Duration</option>
                    <option value="Daily" {{ old('duration')=='Daily' ? 'selected' : '' }}>Daily</option>
                    <option value="Weekly" {{ old('duration')=='Weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="Monthly" {{ old('duration')=='Monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="Quarterly" {{ old('duration')=='Quarterly' ? 'selected' : '' }}>Quarterly</option>
                    <option value="Yearly" {{ old('duration')=='Yearly' ? 'selected' : '' }}>Yearly</option>
                  </select>
                  @error('duration')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Specify Dates -->
                <div class="mb-3">
                  <label for="specify_dates" class="form-label">Specify Start and End Dates</label>
                  <input type="text" class="form-control @error('specify_dates') is-invalid @enderror"
                    id="specify_dates" name="specify_dates" placeholder="E.g., 10th March - 14th March"
                    value="{{ old('specify_dates') }}">
                  @error('specify_dates')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Optional JavaScript for Dynamic Form Sections -->
      @push('scripts')
      <script>
        document.addEventListener('DOMContentLoaded', function () {
    const contentTypeSelect = document.getElementById('contentType');
    const uploadFileSection = document.getElementById('uploadFileSection');
    const supportLinkSection = document.getElementById('supportLinkSection');

    function toggleContentSections() {
      const selected = contentTypeSelect.value;
      if (selected === 'Yes') {
        uploadFileSection.style.display = 'block';
        supportLinkSection.style.display = 'none';
      } else if (selected === 'No') {
        uploadFileSection.style.display = 'none';
        supportLinkSection.style.display = 'block';
      } else {
        uploadFileSection.style.display = 'none';
        supportLinkSection.style.display = 'none';
      }
    }

    // Initialize on page load
    toggleContentSections();

    // Add event listener
    contentTypeSelect.addEventListener('change', toggleContentSections);
  });
      </script>
      @endpush





      <!-- Contact Media Section -->
      <div class="contact-media">
        <h5>Contact Media</h5>
        <p class="mb-1"><i class="fas fa-envelope"></i> {{ $media->email }}</p>
        <p class="mb-1"><i class="fas fa-phone"></i> {{ $media->phone }}</p>
        <button type="button" class="btn btn-success btn-custom" data-bs-toggle="modal"
          data-bs-target="#sendMessageModal">
          Send Message
        </button>
        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal"
          data-bs-target="#makePaymentModal">
          Make Payment
        </button>
        <button type="button" class="btn btn-secondary btn-custom" data-bs-toggle="modal"
          data-bs-target="#requestComplianceModal">
          Request Compliance
        </button>

        <button type="button" class="btn btn-primary btn-custom" data-bs-toggle="modal"
          data-bs-target="#requestRefundModal">
          Request Refund
        </button>
        <button type="button" class="btn btn-info btn-custom" data-bs-toggle="modal"
          data-bs-target="#giveFeedbackModal">
          Give Feedback
        </button>
        <a href="{{ route('advertiser.dashboard') }}" class="btn btn-outline-primary btn-custom">Return Home</a>
      </div>

      <!-- Make Payment Modal -->
      <div class="modal fade" id="makePaymentModal" tabindex="-1" aria-labelledby="makePaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="makePaymentModalLabel">Make Payment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertiser.payments.submit', $media->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="paymentMethod" class="form-label">Select Payment Method</label>
                  <select class="form-select" id="paymentMethod" name="payment_method" required>
                    <option value="">Select Method</option>
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

      <!-- Send Message Modal -->
      <div class="modal fade" id="sendMessageModal" tabindex="-1" aria-labelledby="sendMessageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="sendMessageModalLabel">Send Message</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('messages.send') }}" method="POST">
                @csrf
                <input type="hidden" name="sender_type" value="advertiser">
                <input type="hidden" name="recipient_id" value="{{$media->id}}">
                <div class="mb-3">
                  <label for="messageContent" class="form-label">Message</label>
                  <textarea class="form-control" id="messageContent" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Request Compliance Modal -->
      <div class="modal fade" id="requestComplianceModal" tabindex="-1" aria-labelledby="requestComplianceModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="requestComplianceModalLabel">Request Compliance</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertiser.compliance.submit', $media->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="complianceType" class="form-label">Select Compliance Type</label>
                  <select class="form-select" id="complianceType" name="compliance_type" required>
                    <option value="">Select Type</option>
                    <option value="Certificate of broadcast">Certificate of Broadcast</option>
                    <option value="Off air dub">Off Air Dub</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Request Compliance</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Request Refund Modal -->
      <div class="modal fade" id="requestRefundModal" tabindex="-1" aria-labelledby="requestRefundModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="requestRefundModalLabel">Request Refund</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertiser.refunds.submit', $media->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="refundReasonType" class="form-label">Select Reason for Refund</label>
                  <select class="form-select" id="refundReasonType" name="refund_reason_type" required>
                    <option value="">Select Reason</option>
                    <option value="Advert Not Aired or Published">Advert Not Aired or Published</option>
                    <option value="Incorrect Ad Placement">Incorrect Ad Placement</option>
                    <option value="Non-compliance with Campaign Requirements">Non-compliance with Campaign Requirements
                    </option>
                    <option value="Cancellation of Campaign">Cancellation of Campaign</option>
                    <option value="Late Ad Execution">Late Ad Execution</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="refundFeedback" class="form-label">State Reason for Refund</label>
                  <textarea class="form-control" id="refundFeedback" name="refund_feedback" rows="4"
                    placeholder="Reason for refund..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Give Feedback Modal -->
      <div class="modal fade" id="giveFeedbackModal" tabindex="-1" aria-labelledby="giveFeedbackModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="giveFeedbackModalLabel">Give Feedback</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('advertiser.feedback.submit', $media->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="feedbackContent" class="form-label">Your Feedback</label>
                  <textarea class="form-control" id="feedbackContent" name="feedback_content" rows="4"
                    placeholder="Your feedback here..." required></textarea>
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

  <!-- JavaScript to handle conditional display in Ad Placement Form -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const contentTypeSelect = document.getElementById('contentType');
        const uploadFileSection = document.getElementById('uploadFileSection');
        const supportLinkSection = document.getElementById('supportLinkSection');

        function toggleSections() {
            const selected = contentTypeSelect.value;
            if (selected === 'Yes') {
                uploadFileSection.style.display = 'block';
                supportLinkSection.style.display = 'none';
            } else if (selected === 'No') {
                uploadFileSection.style.display = 'none';
                supportLinkSection.style.display = 'block';
            } else {
                uploadFileSection.style.display = 'none';
                supportLinkSection.style.display = 'none';
            }
        }

        contentTypeSelect.addEventListener('change', toggleSections);
        toggleSections(); // Initialize on page load
    });
  </script>