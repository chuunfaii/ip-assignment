<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artistique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <link rel="stylesheet" href="css/register.css" />
</head>

<body class="d-flex flex-column">
  <header>
    <nav class="navbar navbar-light navbar-expand-lg py-3 bg-white">
      <div class="container position-relative">
        <a href="./" class="navbar-brand fw-bold fs-3">Artistique</a>
        <ul class="navbar-nav position-absolute top-50 start-50 translate-middle">
          <li class="nav-item px-4">
            <a href="artist.php" class="nav-link">Artist</a>
          </li>
          <li class="nav-item px-4">
            <a href="artwork.php" class="nav-link">Artwork</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown px-2">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="wishlist.php">
              <i class="bi bi-suit-heart"></i>
            </a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link" href="cart.php">
              <i class="bi bi-cart"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="mx-auto position-relative d-flex flex-column h-100">
    <div class="m-auto" style="min-width: 500px;">

      <form action="#" method="post">
        <div>
          <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
          <h3 class="text-center fw-light mb-4">Register</h3>
          <div class="input-group justify-content-between">
            <div class="form-floating mb-4" style="min-width: 230px;">
              <input id="txtFName" class="form-control" placeholder="John" required />
              <label for="txtEmail">First name</label>
            </div>
            <div class="form-floating mb-4" style="min-width: 230px;">
              <input id="txtLName" class="form-control" placeholder="Doe" required />
              <label for="txtEmail">Last name</label>
            </div>
          </div>
          <div class="form-floating mb-4">
            <input id="txtEmail" class="form-control" type="email" placeholder="name@example.com" required />
            <label for="txtEmail">Email address</label>
          </div>
          <div class="form-floating mb-4">
            <input id="txtPassword" class="form-control" type="Password" placeholder="Enter your password" required />
            <label for="txtPassword">Password</label>
          </div>
          <div class="form-floating mb-4">
            <input id="txtConfirmPass" class="form-control" type="password" placeholder="Enter your password again" required />
            <label for="txtPassword">Confirm password</label>
          </div>
          <div class="d-flex justify-content-between mb-4">
            <span class="w-100 align-self-center">Would you like to register as:</span>
            <div class="form-radio d-flex justify-content-between w-100">
              <input type="radio" name="select" id="customer" checked="true" />
              <label for="customer" class="option customer">
                <span>Customer</span>
              </label>
              <input type="radio" name="select" id="artist" />
              <label for="artist" class="option artist">
                <span>Artist</span>
              </label>
            </div>
          </div>
          <button id="btnRegSubmit" class="btn btn-primary d-block w-100 py-3 mb-4" name="registerBtn">Register</button>
        </div>
      </form>

      <div class="d-flex justify-content-center mb-4">
        <span class="text-muted">Already have an account?</span>
        <a class="nav-link text-primary border-bottom border-primary ms-2 p-0" href="login.php">Login
          account</a>
      </div>
    </div>
  </main>

  <footer class="footer py-3">
    <div class="container d-flex justify-content-between">
      <p class="fs-6 m-0 text-muted">&copy; <?php echo date('Y') ?> Artistique</p>
      <div class="d-flex">
        <p class="fs-6 m-0 text-muted">
          Built with <i class="bi bi-suit-heart px-1"></i>
          by Chun Fai, Yee Hang, Jun Xian & Khai Gene
        </p>
      </div>
      <div>
        <a href="https://www.twitter.com" class="mx-2 text-muted text-decoration-none" target="_blank">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="https://www.facebook.com" class="mx-2 text-muted text-decoration-none" target="_blank">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://www.instagram.com" class="mx-2 text-muted text-decoration-none" target="_blank">
          <i class="bi bi-instagram"></i>
        </a>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
    //Prevent Content Move while Modal Pop Up
    $(document).ready(function() {
      $('.modal').on('show.bs.modal', function() {
        if ($(document).height() > $(window).height()) {
          // no-scroll
          $('body').addClass("modal-open-noscroll");
        } else {
          $('body').removeClass("modal-open-noscroll");
        }
      });
      $('.modal').on('hide.bs.modal', function() {
        $('body').removeClass("modal-open-noscroll");
      });
    });
  </script>

</body>

</html>