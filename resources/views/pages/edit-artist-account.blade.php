@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit-artist-account.css') }}" />
@endsection

@section('content')
    <div class="mx-auto my-5" style="min-width: 500px;">
        <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistik</h2>
        <h3 class="text-center fw-light mb-4">Edit Account</h3>

        <div class="row">
            <div class="small-12 medium-2 large-2 columns">
                <div class="circle upload-button mx-auto mb-4">
                    <!--User Profile Image-->
                    <img id="Image1" class="profile-pic">
                </div>
                <input type="file" id="FileUpload1" class="file-upload" accept="image/*">
            </div>
        </div>

        <div class="mb-4" style="text-align:center;">Upload Profile Picture</div>

        <div class="input-group justify-content-between">
            <div class="form-floating mb-4" style="min-width:230px;">
                <input type="text" id="txtFName" class="form-control" placeholder="John" />
                <label for="txtFName">First Name</label>
            </div>
            <div class="form-floating mb-4" style="min-width:230px;">
                <input type="text" id="txtLName" class="form-control" placeholder="Doe" />
                <label for="txtLName">Last Name</label>
            </div>
        </div>
        <div class="form-floating mb-4">
            <input type="email" id="txtEmail" class="form-control" placeholder="name@example.com" />
            <label for="txtEmail">Email address</label>
        </div>
        <div class="form-floating mb-4">
            <textarea id="txtBio" cols="50" rows="5" class="form-control" placeholder="Enter your bio here....."></textarea>
            <label for="txtBio">Profile Bio</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" id="txtCurrPassword" class="form-control" placeholder="Enter your current password" />
            <label for="txtCurrPassword">Current Password</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" id="txtNewPassword" class="form-control" placeholder="Enter your new password" />
            <label for="txtNewPassword">New password</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" id="txtConfirmNewPass" class="form-control" placeholder="Enter new passowrd again" />
            <label for="txtConfirmNewPass">Confirm new password</label>
        </div>
        <div class="d-grid gap-2 d-md-block">
            <button type="button" class="btn btn-outline-danger py-3 mb-4 px-4" data-bs-toggle="modal"
                data-bs-target="#DeactivateAccount">Deactivate Account</button>
            <button type="button" id="btnSave" class="btn btn-primary py-3 float-end px-5"
                onclick="btnSave_Click">Save</button>
        </div>

        <div class="modal fade" id="DeactivateAccount" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDeactivate">Deactivate Account Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label id="lblDeactivate">Are you sure want to deactivate your account?</label>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button type="button" id="btnConfirm" class="btn btn-primary px-4"
                            onclick="btnConfirm_Click">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script>
            $(document).ready(function() {
                var readURL = function(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('.profile-pic').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }


                $(".file-upload").on('change', function() {
                    readURL(this);
                });

                $(".upload-button").on('click', function() {
                    $(".file-upload").click();
                });
            });
        </script>
    </div>
@endsection
