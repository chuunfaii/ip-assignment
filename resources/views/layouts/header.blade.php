<nav class="navbar navbar-light navbar-expand-lg py-3 bg-white">
  <div class="container position-relative">
    <a href="{{ route('home') }}" class="navbar-brand fw-bold fs-3">Artistique</a>

    <ul class="navbar-nav position-absolute top-50 start-50 translate-middle">
      <li class="nav-item px-4">
        <a href="{{ route('artists') }}" class="nav-link">Artists</a>
      </li>
      <li class="nav-item px-4">
        <a href="{{ route('artworks') }}" class="nav-link">Artworks</a>
      </li>
    </ul>

    @if (auth()->check())
      @if (auth()->user()->isCustomer())
        <!--Customer Navbar-->
        <ul class="navbar-nav">
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle" id="customerDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->presentFullName() }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="customerDropdown">
              <li>
                <a class="dropdown-item text-muted" href="{{ route('edit-account') }}">Edit Account</a>
              </li>
              <li>
                <!-- TODO: Replace the link later -->
                <a class="dropdown-item text-muted" href="{{ route('order-history') }}">Order History</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                  </a>
                </form>
              </li>
            </ul>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="{{ route('wishlist')}}">
              <i class="bi bi-suit-heart"></i>
            </a>
          </li>

          <li class="nav-item px-2">
            <a class="nav-link" href="{{ route('cart') }}">
              <i class="bi bi-cart"></i>
            </a>
          </li>
        </ul>
      @else
        <!--Artist Navbar-->
        <ul class="navbar-nav">
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle" id="artistDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->presentFullName() }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="artistDropdown">
              <li>
                <a href="{{ route('edit-account') }}" class="dropdown-item text-muted">Edit Account</a>
              </li>
              <li>
                <a href="/artist/{{ auth()->user()->id }}" class="dropdown-item text-muted">Profile Page</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <a href="{{ route('logout') }}" class="dropdown-item text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                    Log Out
                  </a>
                </form>
              </li>
            </ul>
          </li>
          <li class="nav-item px-2">
            <a href="{{ route('my-artworks') }}" class="nav-link">My Artworks</a>
          </li>
          <li class="nav-item px-2">
            <a href="{{ route('my-sales') }}" class="nav-link">My Sales</a>
          </li>
        </ul>
      @endif
    @else
    <!--Navbar without login-->
    <ul class="navbar-nav">
      <li class="nav-item dropdown px-2">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item px-2">
        <a class="nav-link" href="{{ route('wishlist') }}">
          <i class="bi bi-suit-heart"></i>
        </a>
      </li>

      <li class="nav-item px-2">
        <a class="nav-link" href="{{ route('cart') }}">
          <i class="bi bi-cart"></i>
        </a>
      </li>
    </ul>
    @endif
  </div>
</nav>