@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit-artist-account.css') }}" />
@endsection

@section('content')
<div class="mx-auto my-5" style="min-width: 500px;">
    <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
    <h3 class="text-center fw-light mb-4">Edit Account</h3>
    <form action="{{ route('edit-account') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="small-12 medium-2 large-2 columns">
                <div class="circle upload-button mx-auto mb-4">
                    <!--User Profile Image-->
                    <img id="Image1" class="profile-pic" src="{{ asset('upload/artists/'.$user->image_URL) }}">
                </div>
                <input type="file" id="FileUpload1" class="file-upload" accept="image/*" name="image_URL" />
                <!--<img src="{{ asset('upload/artists/'.$user->image_URL) }}">-->
            </div>
        </div>

        <div class="mb-4" style="text-align:center;">Upload Profile Picture</div>

        <div class="input-group justify-content-between">
            <div class="form-floating mb-4" style="min-width:230px;">
                <input type="text" id="txtFName" class="form-control @error('first_name') error-input @enderror" placeholder="John" value="{{ auth()->user()->first_name }}" name="first_name" />
                <label for="txtFName">First Name</label>
            </div>
            <div class="form-floating mb-4" style="min-width:230px;">
                <input type="text" id="txtLName" class="form-control @error('last_name') error-input @enderror" placeholder="Doe" value="{{ auth()->user()->last_name }}" name="last_name" />
                <label for="txtLName">Last Name</label>
            </div>
        </div>

        <div class="form-floating mb-4">
            <input type="email" id="txtEmail" class="form-control @error('email') error-input @enderror" placeholder="name@example.com" value="{{ auth()->user()->email }}" name="email" />
            <label for="txtEmail">Email address</label>
        </div>

        @error('email')
        <div class="form-floating mb-4">
            <p class="error-message">{{ $message }}</p>
        </div>
        @enderror

        <div class="form-floating mb-4">
            <textarea id="txtBio" cols="50" rows="5" class="form-control" placeholder="Enter your bio here....." name="bio">{{ auth()->user()->bio }}</textarea>
            <label for="txtBio">Profile Bio</label>
        </div>

        <div class="form-floating mb-4">
            <input type="password" id="txtCurrPassword" class="form-control @error('password') error-input @enderror" placeholder="Enter your current password" name="password" />
            <label for="txtCurrPassword">Current Password</label>
        </div>

        @error('password')
        <div class="form-floating mb-4">
            <p class="error-message">{{ $message }}</p>
        </div>
        @enderror

        <div class="form-floating mb-4">
            <input type="password" id="txtNewPassword" class="form-control @error('new_password') error-input @enderror" placeholder="Enter your new password" name="new_password" />
            <label for="txtNewPassword">New password</label>
        </div>

        <div class="form-floating mb-4">
            <input type="password" id="txtConfirmNewPass" class="form-control @error('new_password') error-input @enderror" placeholder="Enter new passowrd again" name="new_password_confirmation" />
            <label for="txtConfirmNewPass">Confirm new password</label>
        </div>

        @error('new_password')
        <div class="form-floating mb-4">
            <p class="error-message">{{ $message }}</p>
        </div>
        @enderror

        <div class="d-grid gap-2 d-md-block">
            <button type="button" class="btn btn-outline-danger py-3 mb-4 px-4" data-bs-toggle="modal" data-bs-target="#DeactivateAccount">Deactivate Account</button>
            <button type="submit" id="btnSave" class="btn btn-primary py-3 float-end px-5" onclick="btnSave_Click">Save</button>
        </div>
    </form>

    <div class="modal fade" id="DeactivateAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleDeactivate">Deactivate Account Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span>Are you sure want to deactivate your account?</span>
                </div>
                <form action="/account/delete" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-footer justify-content-between">
                        <button id="btnCancel" class="btn btn-outline-danger px-4">Cancel</button>
                        <button type="submit" id="btnConfirm" class="btn btn-primary px-4">Confirm</button>
                    </div>
                </form>
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