<!-- Author:    Chiam Yee Hang, Lee Chun Fai, Lee Jun Xian & Quah Khai Gene -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!--Toast Notifications-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
</head>

<body class="d-flex flex-column">

    <main class="position-relative d-flex flex-column flex-grow-1">
        <div style="flex-grow: 1;">
            <div class="d-flex justify-content-center align-items-center">
                <h1 class="navbar-brand fw-bold p-0 m-0 mt-5 fs-1">Artistique: Insert XML Files</h1>
            </div>
            <div class="position-absolute top-50 start-50 translate-middle d-flex flex-column justify-content-center align-items-center mb-5">
                <form action="{{ url('/xml/add-artwork') }}" method="POST" enctype="multipart/form-data" class="m-4 d-flex flex-column">
                    @csrf
                    <input class="file-upload" type="file" name="xmlFile" accept="text/xml" required />
                    <button class="btn btn-primary py-3 mt-3" name="action">Add Artwork(s)</button>
                </form>
                <form action="{{ url('/xml/add-artist') }}" method="POST" enctype="multipart/form-data" class="m-4 d-flex flex-column">
                    @csrf
                    <input class="file-upload" type="file" name="xmlFile" accept="text/xml" required />
                    <button class="btn btn-primary py-3 mt-3" name="action">Add Artist(s)</button>
                </form>
                <form action="{{ url('/xml/add-customer') }}" method="POST" enctype="multipart/form-data" class="m-4 d-flex flex-column">
                    @csrf
                    <input class="file-upload" type="file" name="xmlFile" accept="text/xml" required />
                    <button class="btn btn-primary py-3 mt-3" name="action">Add Customer(s)</button>
                </form>
                <form action="{{ url('/xml/add-wishlist') }}" method="POST" enctype="multipart/form-data" class="m-4 d-flex flex-column">
                    @csrf
                    <input class="file-upload" type="file" name="xmlFile" accept="text/xml" required />
                    <button class="btn btn-primary py-3 mt-3" name="action">Add Wishlist Item(s)</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        //Toast notifications
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
        }
        toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
</body>

</html>