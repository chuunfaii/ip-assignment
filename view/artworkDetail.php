<?php
include('../include/header.php');
include('../include/navbar.php');
?>
<link rel="stylesheet" href="css/artworkDetail.css">

<main class="m-auto position-relative d-flex flex-column justify-content-center h-100">
        <div class="container d-flex" style="min-height: 500px;">
            <div class="d-flex justify-content-center" style="flex: 1;">
                <img style="max-width: 80%;" src="artworks/Artwork2.jpg" />
            </div>
            <div class="h-100" style="flex: 1;">
                <div class="h-75">
                    <div class="mb-5">
                        <h2 class="display-5 mb-4">
                            Artwork Name
                        </h2>
                        <p class="text-muted">
                            ArtWork Description
                        </p>
                    </div>

                    <div class="d-flex justify-content-between mb-5">
                        <span class="text-muted">
                            Art
                        </span>
                        <span class="text-muted fw-bold">
                            Artist Name
                        </span>
                    </div>

                    <div>
                        <p class="fw-bold">
                            10 more available
                        </p>

                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <span class="me-3">Quantity:</span>
                                <input id='txtQuantity' type='number' min=1 value=1 />

                            </div>

                            <span class="display-6">$ 1000 </span>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-end h-25">
                    <a class="fs-5 text-muted text-decoration-none" href="artworks.html">
                        <i class="bi bi-caret-left-fill"></i> Back to Artworks
                    </a>

                    <div>
                        <button id="btnWishlist" class="btn btn-outline-secondary px-4 py-3 me-3"
                            onclick="btnWishlist_Click">
                            <i class="bi bi-heart-fill"></i>
                        </button>
                        <button id="btnCart" class="btn btn-primary px-5 py-3" onclick="btnCart_Click">Add to
                            Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
include('../include/footer.php');
?>