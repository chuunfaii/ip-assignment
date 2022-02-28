<?php
include('../include/header.php');
include('../include/navbar.php');
?>
<link rel="stylesheet" href="css/artist.css">

    <main class="container">
        <h1 class="navbar-brand fw-bold text-center my-4">View All Artists</h1>
        <div class="mb-5 d-flex position-relative">
            <div class="input-group w-50 mx-auto">
                <input id="txtSearch" class="form-control py-2" placeholder="Enter your search query here..." />
                <button id="btnSearch" class="btn btn-secondary text-muted">Search</button>
            </div>

        </div>

        <div class="row">

            <div class="col-3">
                <div class="card m-5" style="width: 15rem;min-height:18rem !important;">
                    <a href=#'>
                        <img src="https://i.pinimg.com/736x/6a/1b/73/6a1b7352740dfcaf1d8999e347d5b053.jpg" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <div class="card-title">
                            <a href='profile.php'>
                                <label class="fw-bold">Artist Name</label>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

<?php
include('../include/footer.php');
?>