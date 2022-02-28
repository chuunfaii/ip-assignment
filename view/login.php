<?php
include('../include/header.php');
include('../include/navbar.php');
?>

<main class="mx-auto position-relative d-flex flex-column h-100">
        <div class="m-auto" style="min-width: 500px;">

            <form action="#" method="post">
                <div>
                    <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
                    <h3 class="text-center fw-light mb-4">Login</h3>
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
                    <button ID="btnLoginSubmit" class="btn btn-primary d-block w-100 py-3 mb-4"
                        name="loginBtn">Login</button>
                </div>
            </form>

            <div class="d-flex justify-content-center">
                <span class="text-muted">Don't have an account yet?</span>
                <a class="nav-link text-primary border-bottom border-primary ms-2 p-0" href="register.php">Create an
                    account</a>
            </div>
        </div>
    </main>


<?php
include('../include/footer.php');
?>