@extends('layout.header')

@section('content')

<main class="m-auto container">
      <!-- Carousel -->
      <div class="carousel slide" id="carouselControls" data-bs-ride="carousel">
        <div class="carousel slide" id="myCarousel" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active position-relative" style="background-image: url(images/slide1.jpg)">
              <div class="card-img-overlay overlay-dark">
                <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                  <h1 class="w-100">
                    Collect art from leading galleries, fairs, and auctions.
                  </h1>
                  <p>Sign up to get updates about your favourite artists.</p>
                  <!-- TODO: Replace the link later -->
                  <a href="./register.php" class="mt-3 px-5 btn btn-lg btn-light">Sign Up</a>
                </div>
              </div>
            </div>

            <div class="carousel-item position-relative" style="background-image: url(images/slide2.jpg); background-position: center;">
              <div class="card-img-overlay overlay-dark">
                <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                  <h1 class="w-100">Browse by Artwork</h1>
                  <p>
                    Curated collections of works ready for purchase, from iconic
                    artist series to emerging trends.
                  </p>
                  <!-- TODO: Replace the link later -->
                  <a href="#" class="mt-3 px-5 btn btn-lg btn-light">Browse Now</a>
                </div>
              </div>
            </div>

            <div class="carousel-item position-relative" style="background-image: url(images/slide3.jpg); background-position: center;">
              <div class="card-img-overlay overlay-dark">
                <div class="carousel-caption d-none d-md-block position-absolute top-50 start-50 translate-middle">
                  <h1 class="w-100">Sell Works from Your Collection</h1>
                  <p>
                    Get competitive offers from the world's galleries to take
                    your works on consignment. It's simple and free to submit.
                  </p>
                  <!-- TODO: Replace the link later -->
                  <a href="./register.php" class="mt-3 px-5 btn btn-lg btn-light">Submit Now</a>
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
        <!-- TODO: Replace the links later -->
        <a href="./" class="btn btn-outline-dark py-3 px-5 mx-3">Paintings</a>
        <a href="./" class="btn btn-outline-dark py-3 px-5 mx-3">Photography</a>
        <a href="./" class="btn btn-outline-dark py-3 px-5 mx-3">Drawings</a>
        <a href="./" class="btn btn-outline-dark py-3 px-5 mx-3">Sculpture</a>
      </div>

      <!-- Featured Artworks -->
      <h2 class="text-center navbar-brand fs-1 mt-5 p-0 m-0">Featured Artworks</h2>
      <!-- TODO: Dynamically generate random artworks -->
      <table class="w-100 mb-5" cellspacing="0" style="border-collapse: collapse;">
        <tbody>
          <tr>
            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork1.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Red on Red Painting</h5>
                    </a>
                    <p class="card-text text-muted">
                      The artwork was painted during the lock down this year, the title RED ON RED is related to the situation.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 1120.00</span>
                  </div>
                </div>
              </div>
            </td>

            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork2.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Blue Vision Painting</h5>
                    </a>
                    <p class="card-text text-muted">
                      Painted on canvas, inspiration form architecture and Industrial design. Shades of blue is essential in this artwork.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 1120.00</span>
                  </div>
                </div>
              </div>
            </td>

            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork3.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Construction in Red, Blue & Yellow Drawing</h5>
                    </a>
                    <p class="card-text text-muted">
                      Drawing on quality acid-free paper, inspiration from modern architecture and Industrial design, use of ink marker, permanent colour, coloured paper glued on to the paper.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 1120.00</span>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork4.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Composition in Blue & Green Painting</h5>
                    </a>
                    <p class="card-text text-muted">
                      Composition in Blue & Green is one of my latest work this year, a painting with a mixed media style on panel board, use of painted paper and drawing into the paint.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 2740.00</span>
                  </div>
                </div>
              </div>
            </td>

            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork5.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Constructive Movement Painting</h5>
                    </a>
                    <p class="card-text text-muted">
                      A feeling of a place, constructive elements crossing, lines meets lines in different ways, an abstract view of an industrial design.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 1430.00</span>
                  </div>
                </div>
              </div>
            </td>

            <td>
              <div class="card mx-5 p-0 h-100 mt-5">
                <a href="./">
                  <img src="artworks/Artwork6.jpg" alt="" class="card-img-top">
                </a>
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <a href="./">
                      <h5 class="card-title">Day 362 Drawing</h5>
                    </a>
                    <p class="card-text text-muted">
                      Drawing on paper ( acid free) One drawing a day in 2017 based on architecture and observation.
                    </p>
                  </div>
                  <div class="mt-5 d-flex justify-content-between">
                    <span class="text-muted">Karin White</span>
                    <span class="fw-bold">$ 330.00</span>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </main>

@endsection