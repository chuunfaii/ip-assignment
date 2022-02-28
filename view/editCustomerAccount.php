<?php
include('../include/header.php');
include('../include/navbar.php');
?>

<main class="m-auto" style="min-width: 500px;">
        <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0 mt-4">Artistique</h2>
        <h3 class="text-center fw-light mb-4">Edit Account</h3>
        <div class="input-group justify-content-between">

            <div class="form-floating mb-4" style="min-width: 230px;">

                <input type="text" id="txtFName" class="form-control" placeholder="John">
                <label for="txtEmail">First name</label><br>
            </div>

            <div class="form-floating mb-4" style="min-width: 230px;">


                <input type="text" id="txtLName" class="form-control" placeholder="Doe" />
                <label for="txtEmail">Last name</label> <br>

            </div>

            </div>


            <div class="form-floating mb-4">
                <input id="txtEmail" type="email" class="form-control" placeholder="name@example.com" />
                <label for="txtEmail">Email address</label><br>

            </div>

            <div class="form-floating mb-4">
               <input id="txtCurrPassword"  class="form-control" type="password" placeholder="Enter your current password" />
                <label for="txtPassword">Current password</label><br>

            </div>

            <div class="form-floating mb-4">
                <input id="txtNewPassword" class="form-control" type="password" placeholder="Enter your new password" />
                <label for="txtPassword">New password</label>

            </div>

            <div class="form-floating mb-4">
                <input id="txtConfirmNewPass"  class="form-control" type="Password" placeholder="Enter your new password again" />
                <label for="txtPassword">Confirm new password</label>


            </div>

            <div class="d-grid gap-2 d-md-block mb-4">
                  <button type="button" class="btn btn-outline-danger py-3 mb-4 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Deactivate Account</button>
                  <button type="button" id="btnSave" class="btn btn-primary py-3 float-end px-5" onclick="btnSave_Click">Save</button>
                </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Deactivate Account Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="Label1"  Text="Are you sure want to deactivate your account?"></label>
                </div>
                <div class="modal-footer justify-content-between">
                  <button id="btnCancel"   class="btn btn-outline-danger px-4">Cancel</button>
                  <button id="btnConfirm"   class="btn btn-primary px-4" OnClick="btnConfirm_Click">Confirm</button>
                </div>
              </div>
          </div>
       </div>
    </main>

<?php
include('../include/footer.php');
?>