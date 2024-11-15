@include('home.header')
<!-- Header Start -->
<div class="container-fluid header bg-dark p-0">
  <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6 p-5 mt-lg-5">
          <h1 class="display-5 animated fadeIn mb-4 text-primary">Frequently Asked Questions</h1> 
              <nav aria-label="breadcrumb animated fadeIn">
              <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home Page</a></li>
                  <li class="breadcrumb-item text-body active" aria-current="page">FAQs</li>
              </ol>
          </nav>
      </div>
      <div class="col-md-6 animated fadeIn">
          <img class="img-fluid" src="img/mdterms.jpg" alt="">
      </div>
  </div>
</div>
<!-- Header End -->

<section class="faq position-relative bg-light">
  <div class="container position-relative">
    <div class="row d-flex justify-content-center py-5 my-3">
      <div class="col-12 text-center">
        <small class="fs-7 py-3">Frequently Asked Questions</small>
        <h2 class="text-primary fs-1">Worried about anything?</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="accordion" id="accordionExample">

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                What does Media Deal offer?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Media Deal offers a streamlined platform for buying and selling radio and TV advertisements, facilitating seamless connections between advertisers, media organizations, and marketers.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                How do I register on Media Deal?
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                You can register using your email or social media accounts. After registration, you will need to verify your email address to log in.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                How can advertisers use the platform?
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                	Advertisers can browse available media organizations, select ad slots, submit ad details, and process payments through the platform. They can also monitor compliance and request refunds if necessary.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                How do media organizations use the platform?
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Media organizations can list their available ad slots, view incoming ad requests, manage ad placements, upload proof of ad airing, and process refund requests.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                How does payment processing work?
              </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                The platform integrates with a secure payment gateway to handle all transactions. Advertisers can view and manage their invoices and receipts through their dashboard.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                How does Media Deal's payment process work?
              </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                <h5>Payment Collection</h5>
                <h6 class=""><i class="fa fa-check text-primary"></i>Advertiser Makes Payment:</h6>
                <p>When an advertiser books an ad slot through Media Deal, they make the full payment for the ad campaign upfront.
                </p>
                  <p>	Media Deal receives this payment and holds it in escrow, ensuring the advertiser's funds are secure and that the media organization will be paid after the ad campaign is successfully completed.
                  </p>

                  <h5>Campaign Execution:</h5>
                  <h6><i class="fa fa-check text-primary"></i>Media Organization Runs the Ad:</h6>
                  <p>The media organization airs the ad according to the agreed-upon schedule.</p>
                  <p>During this time, the payment remains in escrow with Media Deal.</p>

                  <h5>Compliance and Proof Submission</h5>
                  <h6><i class="fa fa-check text-primary"></i>Media Organization Provides Proof:</h6>
                  <p>After the campaign ends, the media organization must upload proof that the ad was aired as per the agreement (e.g., broadcast logs, screenshots, video clips).</p>

                  <h6><i class="fa fa-check text-primary"></i>Advertiser Review:</h6>
                  <p>The advertiser has a set period of 3 days to review the proof provided by the media organization.</p>
                  <p>If the advertiser is satisfied, they do nothing, and the process moves forward. If there are issues, the advertiser can raise a concern or request a refund.</p>

                  <h5>Payment Disbursement</h5>
                  <h6><i class="fa fa-check text-primary"></i>Media Deal Confirms Completion:</h6>
                  <p>If no refund request or dispute is raised by the advertiser within the review period, the media organization confirms that the campaign has been successfully completed and request payment from Media Deal.</p>
                  <h6><i class="fa fa-check text-primary"></i>Payment to Media Organization:</h6>
                  <p>Media Deal releases the payment to the media organization, minus any applicable fees (e.g., Media Deal's 5% platform fee, and/or commission).</p>
                  <h6><i class="fa fa-check text-primary"></i>Commission to Marketer:</h6>
                  <p>At the same time, the marketer who facilitated the deal receives their commission, as approved and indicated by the Media Organization.</p>

                  <h5>Refund Handling (If Applicable):</h5>
                  <h6><i class="fa fa-check text-primary"></i>Refund Requests:</h6>
                  <p>If the advertiser requests a refund due to non-compliance, incorrect airing, or other valid reasons, the media organization will review the request, and may decide to approve or decline the request.</p>
                  <p>If the refund is approved, Media Deal deducts the refund amount from the funds held in escrow.</p>
                  <h6><i class="fa fa-check text-primary"></i>o	Adjustment to Payments:</h6>
                  <p>The media organization and marketer will receive payments minus the refunded amount, if applicable.</p>
                  

              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                How do media companies get paid?
              </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Media Deal confirms payment from the advertiser and notifies the company of the payment made. The fund is sent to the company's account once ads have been confirmed to be successfully aired.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                What happens if my ad doesn’t air as planned?
              </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                If your ad doesn’t air, you can request a refund through the platform. Media organizations will review the request and process the refund accordingly.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                How can I ensure my ad aired?
              </button>
            </h2>
            <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Media organizations are required to upload proof of ad airing. You can request proof of compliance through your dashboard.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                What should I do if I encounter issues on the platform?
              </button>
            </h2>
            <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                If you encounter any issues, you can contact user support through the platform. The support team will assist you with any problems you may have.
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThiirteen" aria-expanded="false" aria-controls="collapseThiirteen">
                How will Media Deal evolve in the future?
              </button>
            </h2>
            <div id="collapseThiirteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                In the future, Media Deal plans to expand to other media types, such as social media, streaming platforms, podcasts, and vodcasts. The platform will also open its marketplace to creatives like scriptwriters, animators, and voice-over artists.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapsFourteen">
                Who can register as a media company?
              </button>
            </h2>
            <div id="collapseFourteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Media organizations that are duly registered with the CAC (Corporate Affairs Commission) and licensed by the NBC (National Broadcasting Commission) for TV and radio.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                Who can register as a marketer?
              </button>
            </h2>
            <div id="collapseFifteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Marketers working with a media organization and marketers with an APCON (Advertising Practitioners Council of Nigeria) certificate can register under the marketer category
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapSixteen" aria-expanded="false" aria-controls="collapSixteen">
                Who can register as an advertiser?
              </button>
            </h2>
            <div id="collapSixteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Anyone who has an interest in buying or placing advertisements with a media company can register as an advertiser.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                Who can earn commission on Media Deal?
              </button>
            </h2>
            <div id="collapseSeventeen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                Those who register as marketers can earn commissions.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen">
                How much commission can I earn as a marketer?
              </button>
            </h2>
            <div id="collapseEighteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                	Marketers can earn a commission of 10-15%, depending on the ad volume and approval from the Media Organization.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen">
                Are there hidden charges on Media Deal?
              </button>
            </h2>
            <div id="collapseNineteen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                	No hidden charges. However, Media Deal deducts 5% from any transaction made through its payment system to cover system maintenance and payment processing.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                Do I get a 100% refund?
              </button>
            </h2>
            <div id="collapseTwenty" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                No. All transactions on Media Deal incur a 5% deduction to cover system maintenance and payment processing.
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwentyOne" aria-expanded="false" aria-controls="collapseTwentyOne">
                How much discount can I negotiate with Media Deal?
              </button>
            </h2>
            <div id="collapseTwentyOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body bg-light">
                	You can negotiate a discount of up to 40%, depending on the volume, and how much your chosen media organization is willing to offer.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed fs-5 px-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwentyTwo" aria-expanded="false" aria-controls="collapseTwentyTwo">
              	How safe is my data?
            </button>
          </h2>
          <div id="collapseTwentyTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-light">
              	How safe is my data?
          </div>
        </div>
      </div>
      </div>


    </div>

    

    
  </div>
</section>




@include('home.footer')