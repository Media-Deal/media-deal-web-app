@include('home.header')
 
<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <!-- Main product image -->
        <img src="{{asset($house->houseImages[0]->image)}}" alt="Product Main Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <div class="p-4 pb-0">
        <h5 class="text-primary mb-3"><i class="fas fa-check text-success"></i>{{$house->status}}</h5>
            <h5 class="text-primary mb-3">${{number_format($house->selling_price, 2, '.', ',')}}</h5>
            <a class="d-block h5 mb-2" href="">{{$house->name}}</a>
            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$house->address}}, {{$house->state}}</p>
       </div>
        <div class="d-flex border-top">
            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{$house->square}} Sqft</small>
            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$house->bed}} Bed</small>
            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$house->bath}} Bath</small>
         </div>
         <br>
         <h5 class="mb-3">More Pictures</h5>
        <!-- Product image gallery -->
        <div id="productImageGallery" class="carousel slide" data-bs-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">

             @foreach($house->houseImages as $index => $image)
            <li data-bs-target="#productImageGallery" data-bs-slide-to="{{ $index + 0 }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
          </ol>
          

         
                            
                          
          <!-- Slides -->

        
          <div class="carousel-inner">
    @foreach($house->houseImages as $index => $image)
        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <img src="{{ asset($image->image) }}" alt="Product Image {{ $index + 1 }}" class="img-fluid">
        </div>
    @endforeach
   </div>

     
          <!-- Controls -->
          <a class="carousel-control-prev" href="#productImageGallery" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#productImageGallery" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
        <br>
       
       

        <!-- Product details -->
        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Contact Agent</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Share this home</a>
                            </li>
                    </ul>


      </div>
    </div>
    <div class="p-4 pb-0">
            <h5 class="mb-3">Description</h5>
            <p>{{$house->description}}</p>
       </div>
  </div>

@include('home.footer')