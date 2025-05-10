@include('home.header')
<!-- 404 Error Content Start -->
<div class="container-fluid header bg-light p-0" style="height: 100vh;">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row h-100">
        <div class="col-md-6 p-5 px-3 text-center">
            <!-- Error Content -->
            <h1 class="display-5 animated fadeIn mb-3 fw-bold mt-4">
                <span class="text-danger fs-1">404 Error</span><br>
                <span class="text-primary fs-1">Page Not Found</span>
            </h1>
            <p class="lead mb-4">The page you're looking for doesn't exist or has been moved.</p>

            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url()->previous() }}" class="btn btn-dark py-3 px-4 me-3 animated fadeIn">
                    <i class="fas fa-arrow-left me-2"></i>Go Back
                </a>
                <a href="{{ route('home') }}" class="btn btn-primary py-3 px-4 animated fadeIn">
                    <i class="fas fa-home me-2"></i>Return Home
                </a>
            </div>
        </div>

        <div class="col-md-6 animated fadeIn h-100">
            <!-- Error Image Carousel -->
            <div class="owl-carousel header-carousel h-100">
                <div class="owl-carousel-item h-100">
                    <img class="img-fluid h-100 w-100 object-fit-cover" src="img/carousel-1.jpg" alt="Error 404">
                </div>
                <div class="owl-carousel-item h-100">
                    <img class="img-fluid h-100 w-100 object-fit-cover" src="img/chosen.jpg" alt="Error 404">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 Error Content End -->

<style>
    /* Custom styles for the 404 page */
    .fs-1 {
        font-size: 4rem !important;
    }

    .lead {
        font-size: 1.25rem;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .fs-1 {
            font-size: 2.5rem !important;
        }

        .btn {
            padding: 0.5rem 1rem !important;
        }
    }
</style>

<!-- Footer Start -->
@include('home.footer')

<script>
    // Initialize carousel if needed
  $(document).ready(function(){
    $('.header-carousel').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      nav: false,
      dots: false
    });
  });
</script>