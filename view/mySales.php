<?php
include('../include/header.php');
include('../include/navbar.php');
?>
<link rel="stylesheet" href="css/mySales.css">

<div class="container mb-3 h-100">
        <div class="mx-auto mt-5">
            <div class="d-flex justify-content-center align-items-center mb-5">
                <h1 class="navbar-brand fw-bold p-0 m-0">My Sales</h1>
            </div>

            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Artwork Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal Price</th>
                            <th>Ordered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Artwork 1</td>
                            <td>1</td>
                            <td>$ 999.00</td>
                            <td>$ 999.00</td>
                            <td>6/2/2022 10:35:06 PM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Artwork 1</td>
                            <td>1</td>
                            <td>$ 999.00</td>
                            <td>$ 999.00</td>
                            <td>6/2/2022 10:35:06 PM</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Artwork 1</td>
                            <td>1</td>
                            <td>$ 999.00</td>
                            <td>$ 999.00</td>
                            <td>6/2/2022 10:35:06 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
include('../include/footer.php');
?>