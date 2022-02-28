<?php
include('../include/header.php');
include('../include/navbar.php');
?>
<link rel="stylesheet" href="css/register.css">

<main class="mx-auto position-relative d-flex flex-column h-100">
        <div class="m-auto" style="min-width: 500px;">

            <form action="#" method="post">
                <div>
                    <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
                    <h3 class="text-center fw-light mb-4">Register</h3>
                    <div class="input-group justify-content-between">
                        <div class="form-floating mb-4" style="min-width: 230px;">
                            <input id="txtFName" class="form-control" placeholder="John" required/>
                            <label for="txtEmail">First name</label>
                        </div>
                        <div class="form-floating mb-4" style="min-width: 230px;">
                            <input id="txtLName" class="form-control" placeholder="Doe" required/>
                            <label for="txtEmail">Last name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-4">
                        <input id="txtEmail" class="form-control" type="email" placeholder="name@example.com"
                            required />
                        <label for="txtEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input id="txtPassword" class="form-control" type="Password" placeholder="Enter your password"
                            required />
                        <label for="txtPassword">Password</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input id="txtConfirmPass" class="form-control" type="password"
                            placeholder="Enter your password again" required/>
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
                    <button id="btnRegSubmit" class="btn btn-primary d-block w-100 py-3 mb-4"
                        name="registerBtn">Register</button>
                </div>
            </form>

            <div class="d-flex justify-content-center mb-4">
                <span class="text-muted">Already have an account?</span>
                <a class="nav-link text-primary border-bottom border-primary ms-2 p-0" href="login.php">Login
                    account</a>
            </div>
        </div>
    </main>


<?php
include('../include/footer.php');
?>