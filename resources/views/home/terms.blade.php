@include('home.header')
 <!-- Header Start -->
 <div class="container-fluid header bg-dark p-0">
  <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6 p-5 mt-lg-5">
          <h1 class="display-5 animated fadeIn mb-4 text-primary">Terms of Service</h1> 
              <nav aria-label="breadcrumb animated fadeIn">
              <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home Page</a></li>
                  <li class="breadcrumb-item text-body active" aria-current="page">TERMS OF SERVICE</li>
              </ol>
          </nav>
      </div>
      <div class="col-md-6 animated fadeIn">
          <img class="img-fluid" src="img/mdterms.jpg" alt="">
      </div>
  </div>
</div>
<!-- Header End -->

<div class="container bg-white my-5">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <section>
        <p>Welcome to Media Deal! By accessing or using this platform, you agree to comply with and be bound by the following Terms and Conditions. Please read carefully.</p>
      </section>

      <section>
        <h5>1. Acceptance of Terms</h5>
        <p>By creating an account and using Media Deal, you agree to these Terms and Conditions, our Privacy Policy, and any other policies or guidelines provided by Media Deal.</p>
      </section>

      <section>
        <h5>2. User Registration and Accounts</h5>
        <h6>2.1. Eligibility:</h6> 

        <p>To use Media Deal, you must be:
          <ul>
            <li>At least 18 years old.</li>
            <li>A duly registered media organization with CAC and licensed by NBC (for TV and Radio)</li>
            <li>A marketer with a valid APCON certificate or employed by a media organization.</li>
            <li>An individual or entity interested in buying or placing advertisements.</li>
          </ul>
          </p>

          <h6>2.2 Account Responsibilities:</h6>
          <p>	You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.</p>
      </section>

      <section>
        <h5>3. Use of the Platform</h5>
        <h6>3.1 Advertiser Features:</h6>
        <p>Access to media organization listings, ad placement, payment processing, and compliance monitoring.</p> 
        <h6>3.2 Media Organization Features:</h6>
        <p>	Listing of available ad slots, viewing incoming requests, compliance monitoring, and handling refund requests.</p>
        <h6>3.3 Marketer Features:</h6>
        <p>Managing ad placements and earning commissions for successful deals.</p>
      </section>

      <section>
        <h5>4. Payment and Refunds</h5>
        <p>Media Deal's payment process is designed to ensure that both advertisers and media organizations are protected throughout the transaction.</p>

        <h6>4.1 Payment Collection:</h6>
        <p>Advertiser Makes Payment:</p>
        <ul>
          <li>When an advertiser books an ad slot through Media Deal, they make the full payment for the ad campaign upfront.</li>
         <li> Media Deal receives this payment and holds it in escrow to ensure that the advertiser's funds are secure and that the media organization will be paid after the ad campaign is successfully completed.</li>
        </ul>
        <h6>4.2 Campaign Execution:</h6>
        <p>Media Organization Runs the Ad:</p>
        <ul>
          <li>The media organization airs the ad according to the agreed-upon schedule.</li>
          <li>During this time, the payment remains in escrow with Media Deal.</li>
        </ul>
        <h6>4.3 Compliance and Proof Submission:</h6>
        <p>Media Organization Provides Proof:</p>
        <ul>
          <li>After the campaign ends, the media organization must upload proof that the ad was aired as per the agreement (e.g., broadcast logs, screenshots, video clips).</li>
        </ul>
        <p>Advertiser Review:</p>
        <ul>
          <li>The advertiser has a set period (e.g., 7 days) to review the proof provided by the media organization.</li>
          <li>If the advertiser is satisfied, they do nothing, and the process moves forward. If there are issues, the advertiser can </li>
          <li>raise a concern or request a refund.</li>
        </ul>
        <h6>4.4 Payment Disbursement:</h6>
        <p> Deal Confirms Completion:</p>
        <ul>
          <li>If no refund request or dispute is raised by the advertiser within the review period, Media Deal confirms that the campaign has been successfully completed.</li>
        </ul>
        <p>Payment to Media Organization:</p>
        <ul>
          <li>Media Deal releases the payment to the media organization, minus any applicable fees (e.g., Media Deal's 5% platform fee).</li>
        </ul>
        <p>Commission to Marketer:</p>
        <ul>
          <li>At the same time, the marketer who facilitated the deal receives their commission, as approved and indicated by the Media Organization.</li>
        </ul>
        <h6>4.5 Refund Handling (If Applicable):</h6>
          <p>Refund Requests:</p>
          <ul>
            <li>If the advertiser requests a refund due to non-compliance, incorrect airing, or other valid reasons, Media Deal will review the request.</li>
            <li>If the refund is approved, Media Deal deducts the refund amount from the funds held in escrow.</li>
          </ul>
          <p>Adjustment to Payments:</p>
          <ul>
            <li>The media organization and marketer will receive payments minus the refunded amount, if applicable.</li>
           <p>Read more about our <a href="{{ url("/refund-policy") }}">refund policies</a></p> 
          </ul>
      </section>

      <section>
        <h5>5. Compliance and Monitoring</h5>
        <p>Media organizations are required to provide proof of ad airing and comply with all applicable laws and regulations. Advertisers may request compliance documentation, and Media Deal may intervene if necessary.</p>
      </section>

      <section>
        <h5>6. Commissions</h5>
        <p>Media organizations are required to provide proof of ad airing and comply with all applicable laws and regulations. Advertisers may request compliance documentation, and Media Deal may intervene if necessary.</p>
        <h6> 6.1 Earning Commissions:</h6>
        <p>	Marketers registered on Media Deal can earn a commission of 10-15%, depending on the ad volume, for successfully completed media deals.</p>
        <h6>6.2 Payment of Commissions:</h6>
        <p>Commissions are paid after the 7-day confirmation period and after verifying successful ad airing and resolving any refund requests.</p>
      </section>

      <section>
        <h5>7. User Conduct</h5>
        <ul>
          <li>Users agree not to use Media Deal for any unlawful or prohibited activities. Users must adhere to all applicable laws and regulations while using the platform.</li>
        </ul>
      </section>

      <section>
        <h5> 8. Data Privacy and Security</h5>
        <ul>
          <li>Media Deal values your privacy and follows industry-standard security measures to protect your data. Please refer to our <a href="{{ url("/privacy-policy") }}">privacy policy</a>  for more information.</li>
        </ul>
      </section>

      <section>
        <h5>9. Intellectual Property</h5>
        <ul>
          <li>All content, trademarks, and other intellectual property on Media Deal are owned by Media Deal or its licensors. Users may not use any intellectual property without prior written consent.</li>
        </ul>
      </section>

      <section>
        <h5>10. Limitation of Liability</h5>
        <ul>
          <li>Media Deal is not liable for any indirect, incidental, or consequential damages arising from the use of the platform. Our total liability is limited to the amount you have paid to Media Deal in the past 12 months.</li>
        </ul>
      </section>

      <section>
        <h5>11. Changes to Terms and Conditions</h5>
        <ul>
          <li>Media Deal reserves the right to update these Terms and Conditions at any time. Changes will be posted on our website and communicated to users. Continued use of the platform constitutes acceptance of the revised Terms and Conditions</li>
        </ul>
      </section>

      <section>
        <h5>12. Governing Law</h5>
        <ul>
          <li>These Terms and Conditions are governed by the laws of Nigeria. Any disputes will be resolved in the courts of Nigeria.</li>
        </ul>
      </section>

      <section>
        <h5> 13. Contact Us</h5>
        <ul>
          <li>For any questions or concerns about these Terms and Conditions, please contact us at support@mediadeal.ng.
            By using Media Deal, you acknowledge that you have read, understood, and agree to these Terms and Conditions. Thank you for using Media Deal.</li>
        </ul>
      </section>
      <section>
        <p>By using Media Deal, you acknowledge that you have read, understood, and agree to these Terms and Conditions. Thank you for using Media Deal. Check our <a href="{{ url("/proprietary-rights") }}">proprietary rights</a> 
        </p>
      </section>
      
      

    </div>
  </div>
</div>

@include('home.footer')