@extends('layouts.app')

@section('content')

<div class="m-auto container">
  <!-- Carousel -->
  <div class="carousel slide" id="carouselControls" data-bs-ride="carousel">
    <div class="carousel slide" id="myCarousel" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active position-relative" style="background-image: url({{ asset('images/slide1.jpg') }})">
          <div class="card-img-overlay overlay-dark">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
              <h1 class="w-100">
                Collect art from leading galleries, fairs, and auctions.
              </h1>
              <p>Sign up to get updates about your favourite artists.</p>
              <a href="{{ route('register') }}" class="mt-3 px-5 btn btn-lg btn-light">Sign Up</a>
            </div>
          </div>
        </div>

        <div class="carousel-item position-relative" style="background-image: url({{ asset('images/slide2.jpg') }}); background-position: center;">
          <div class="card-img-overlay overlay-dark">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
              <h1 class="w-100">Browse by Artwork</h1>
              <p>
                Curated collections of works ready for purchase, from iconic
                artist series to emerging trends.
              </p>
              <a href="{{ route('artworks') }}" class="mt-3 px-5 btn btn-lg btn-light">Browse Now</a>
            </div>
          </div>
        </div>

        <div class="carousel-item position-relative" style="background-image: url({{ asset('images/slide3.jpg') }}); background-position: center;">
          <div class="card-img-overlay overlay-dark">
            <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
              <h1 class="w-100">Sell Works from Your Collection</h1>
              <p>
                Get competitive offers from the world's galleries to take
                your works on consignment. It's simple and free to submit.
              </p>
              <!-- TODO: Replace the link later -->
              <a href="{{ route('my-artwork') }}" class="mt-3 px-5 btn btn-lg btn-light">Submit Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Categories Buttons -->
  <div class="d-flex justify-content-center align-items-center my-5">
    <span>Shops by Category:</span>
    @foreach ($categories as $category)
    <a href="{{ route('artworks', ['category' => $category]) }}" class="btn btn-outline-dark py-3 px-5 mx-3">{{ $category->name }}</a>
    @endforeach
  </div>

  <!-- Featured Artworks -->
  <h2 class="text-center navbar-brand fs-1 my-5 p-0 m-0">Featured Artworks</h2>
  <!-- TODO: Dynamically generate random artworks -->

  <div class="row row-cols-3">
    @foreach ($artworks as $artwork)
    <div class="col mb-5">
      <div class="card mx-5" style="width: 20rem !important;">
        <a href='/artwork/{{ $artwork->id }}'>
          <img src="upload/artworks/{{ $artwork->image_url }}" class="card-img-top">
        </a>
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <a href='/artwork/{{ $artwork->id }}'>
              <h5 class="card-title">
                {{ $artwork->name }}
              </h5>
            </a>
            <p class="card-text text-muted">
              {{ $artwork->description }}
            </p>
          </div>
          <div class="mt-5 d-flex justify-content-between">
            <span class="text-muted">
              {{ $artwork->artist->presentFullName() }}
            </span>
            <span class="fw-bold">$ {{ $artwork->presentPrice() }}</span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection