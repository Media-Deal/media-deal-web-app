@include('home.header')
 <!-- Header Start -->
 <div class="container-fluid header bg-dark p-0">
  <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6 p-5 mt-lg-5">
          <h1 class="display-5 animated fadeIn mb-4 text-primary">Privacy Policies</h1> 
              <nav aria-label="breadcrumb animated fadeIn">
              <ol class="breadcrumb text-uppercase">
                  <li class="breadcrumb-item"><a href="{{ url('/terms-of-service') }}">Terms of service</a></li>
                  <li class="breadcrumb-item text-body active" aria-current="page">Privacy policies</li>
              </ol>
          </nav>
      </div>
      <div class="col-md-6 animated fadeIn">
          <img class="img-fluid" src="img/mdterms.jpg" alt="">
      </div>
  </div>
</div>
<!-- Header End -->

<div>
  Work in progress
</div>

@include('home.footer')