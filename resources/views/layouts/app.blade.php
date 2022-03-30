<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artistique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  <!--DataTable-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="{{asset('css/index.css')}}" />
  @yield('css')
</head>

<body class="d-flex flex-column">
  <header>
    @include('layouts.header')
  </header>

  <main class="position-relative d-flex flex-column flex-grow-1">
    @yield('content')
  </main>

  <footer class="footer py-3">
    @include('layouts.footer')
  </footer>


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
  @yield('extra-js')
</body>

</html>