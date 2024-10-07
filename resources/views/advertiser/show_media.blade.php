@include('advertiser.header')

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- Media Details -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!-- Media Logo and Name -->
              <div class="text-center mb-4">
                @if($media->media_type === 'TV' && $media->tv_logo)
                <img src="{{ asset('storage/' . $media->tv_logo) }}" alt="{{ $media->tv_name }} Logo" class="img-fluid"
                  style="max-width: 150px;">
                @elseif($media->media_type === 'Radio' && $media->radio_logo)
                <img src="{{ asset('storage/' . $media->radio_logo) }}" alt="{{ $media->radio_name }} Logo"
                  class="img-fluid" style="max-width: 150px;">
                @elseif($media->media_type === 'Internet' && $media->internet_logo)
                <img src="{{ asset('storage/' . $media->internet_logo) }}" alt="{{ $media->internet_name }} Logo"
                  class="img-fluid" style="max-width: 150px;">
                @else
                <img src="{{ asset('img/default-logo.png') }}" alt="Default Logo" class="img-fluid"
                  style="max-width: 150px;">
                @endif

                <h3 class="mt-3">
                  @if($media->media_type === 'TV')
                  {{ $media->tv_name }}
                  @elseif($media->media_type === 'Radio')
                  {{ $media->radio_name }}
                  @elseif($media->media_type === 'Internet')
                  {{ $media->internet_name }}
                  @endif
                </h3>
              </div>

              <!-- Media Information -->
              <div class="row">
                <div class="col-md-6">
                  <h5>Contact Information</h5>
                  <ul class="list-unstyled">
                    <li><strong>Email:</strong> {{ $media->tv_email ?? $media->radio_email ?? $media->internet_email }}
                    </li>
                    <li><strong>Phone:</strong> {{ $media->tv_phone ?? $media->radio_phone ?? $media->internet_phone }}
                    </li>
                    <li><strong>Contact Person:</strong> {{ $media->tv_contact_person ?? $media->radio_contact_person ??
                      $media->internet_contact_person }}</li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h5>Social Media</h5>
                  <ul class="list-unstyled">
                    @if($media->tv_facebook || $media->radio_facebook || $media->internet_facebook)
                    <li><strong>Facebook:</strong> <a
                        href="{{ $media->tv_facebook ?? $media->radio_facebook ?? $media->internet_facebook }}"
                        target="_blank">Visit</a></li>
                    @endif
                    @if($media->tv_twitter || $media->radio_twitter || $media->internet_twitter)
                    <li><strong>Twitter:</strong> <a
                        href="{{ $media->tv_twitter ?? $media->radio_twitter ?? $media->internet_twitter }}"
                        target="_blank">Visit</a></li>
                    @endif
                    @if($media->tv_instagram || $media->radio_instagram || $media->internet_instagram)
                    <li><strong>Instagram:</strong> <a
                        href="{{ $media->tv_instagram ?? $media->radio_instagram ?? $media->internet_instagram }}"
                        target="_blank">Visit</a></li>
                    @endif
                    @if($media->tv_linkedin || $media->radio_linkedin || $media->internet_linkedin)
                    <li><strong>LinkedIn:</strong> <a
                        href="{{ $media->tv_linkedin ?? $media->radio_linkedin ?? $media->internet_linkedin }}"
                        target="_blank">Visit</a></li>
                    @endif
                    @if($media->tv_tiktok || $media->radio_tiktok || $media->internet_tiktok)
                    <li><strong>TikTok:</strong> <a
                        href="{{ $media->tv_tiktok ?? $media->radio_tiktok ?? $media->internet_tiktok }}"
                        target="_blank">Visit</a></li>
                    @endif
                  </ul>
                </div>
              </div>

              <!-- Additional Details Based on Media Type -->
              @if($media->media_type === 'TV')
              <div class="mt-4">
                <h5>TV Specific Details</h5>
                <ul class="list-unstyled">
                  <li><strong>TV Type:</strong> {{ $media->tv_type }}</li>
                  <li><strong>Main Studio Location:</strong> {{ $media->tv_main_studio_location }}</li>
                  <li><strong>Channel Locations:</strong> {{ implode(', ', $media->tv_channel_location ?? []) }}</li>
                  <li><strong>Content Focus:</strong> {{ $media->tv_content_focus }}</li>
                  @if($media->tv_content_focus === 'Other')
                  <li><strong>Other Content Focus:</strong> {{ $media->tv_content_focus_other }}</li>
                  @endif
                  <li><strong>Peak Viewing Times:</strong> {{ implode(', ', $media->tv_peak_viewing_times ?? []) }}</li>
                  <li><strong>Advert Rate:</strong> ${{ number_format($media->tv_advert_rate, 2) }}</li>
                  <!-- Add more TV-specific fields as needed -->
                </ul>
              </div>
              @elseif($media->media_type === 'Radio')
              <div class="mt-4">
                <h5>Radio Specific Details</h5>
                <ul class="list-unstyled">
                  <li><strong>Radio Type:</strong> {{ $media->radio_type }}</li>
                  <li><strong>Frequency:</strong> {{ $media->radio_frequency }}</li>
                  <li><strong>Station Location:</strong> {{ $media->radio_station_location }}</li>
                  <li><strong>Content Focus:</strong> {{ implode(', ', $media->radio_content_focus ?? []) }}</li>
                  <!-- Add more Radio-specific fields as needed -->
                </ul>
              </div>
              @elseif($media->media_type === 'Internet')
              <div class="mt-4">
                <h5>Internet Specific Details</h5>
                <ul class="list-unstyled">
                  <li><strong>Internet Type:</strong> {{ $media->internet_type }}</li>
                  <li><strong>Channel Location:</strong> {{ $media->internet_channel_location }}</li>
                  <li><strong>Content Focus:</strong> {{ $media->internet_content_focus }}</li>
                  <li><strong>Target Audience:</strong> {{ $media->internet_target_audience }}</li>
                  <li><strong>Broadcast Duration:</strong> {{ $media->internet_broadcast_duration }}</li>
                  <li><strong>Often Post:</strong> {{ $media->internet_often_post }}</li>
                  <li><strong>Advert Rate:</strong> ${{ number_format($media->internet_advert_rate, 2) }}</li>
                  <!-- Add more Internet-specific fields as needed -->
                </ul>
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>




      <style>
        .card {
          min-height: 250px;
          /* Ensuring all cards have a minimum height */
        }

        .card-body img {
          max-width: 80px;
          /* Consistent image size */
          margin-bottom: 15px;
        }

        .card-body h5,
        .card-body p {
          margin-bottom: 10px;
          /* Consistent spacing */
        }
      </style>











    </div>
    <!-- end row -->

  </div>
  <!-- container -->

</div>
<!-- content -->



@include('advertiser.footer')