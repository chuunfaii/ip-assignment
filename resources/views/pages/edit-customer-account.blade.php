@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/edit-customer-account.css') }}" />

@endsection

@section('content')

<main class="m-auto" style="min-width: 500px;">
  <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0 mt-4">Artistique</h2>
  <h3 class="text-center fw-light mb-5">Edit Account</h3>
  <form action="{{ route('edit-account') }}" method="POST">
    @csrf

    <div class="input-group justify-content-between">
      <div class="form-floating mb-4" style="min-width: 230px;">
        <input type="text" id="firstName" class="form-control @error('first_name') error-input @enderror" placeholder="John" value="{{ old('first_name')? : $user->first_name }}" name="first_name" />
        <label for="firstName">First name</label>
      </div>

      <div class="form-floating mb-4" style="min-width: 230px;">
        <input type="text" id="lastName" class="form-control @error('last_name') error-input @enderror" placeholder="Doe" value="{{ old('last_name')? : $user->last_name }}" name="last_name" />
        <label for="lastName">Last name</label>
      </div>
    </div>

    <div class="form-floating mb-4">
      <input id="email" type="email" class="form-control @error('email') error-input @enderror" placeholder="name@example.com" value="{{ old('email')? : $user->email }}" name="email" />
      <label for="email">Email address</label>
    </div>

    @error('email')
    <div class="form-floating mb-4">
      <p class="error-message">{{ $message }}</p>
    </div>
    @enderror

    <div class="form-floating mb-4">
      <input id="password" class="form-control @error('password') error-input @enderror" type="password" placeholder="Enter your current password" name="password" />
      <label for="password">Current password</label>
    </div>

    @error('password')
    <div class="form-floating mb-4">
      <p class="error-message">{{ $message }}</p>
    </div>
    @enderror

    <div class="form-floating mb-4">
      <input id="newPassword" class="form-control @error('new_password') error-input @enderror" type="password" placeholder="Enter your new password" name="new_password" />
      <label for="newPassword">New password</label>
    </div>

    <div class="form-floating mb-4">
      <input id="newPasswordConfirmation" class="form-control @error('new_password') error-input @enderror" type="Password" placeholder="Enter your new password again" name="new_password_confirmation" />
      <label for="newPasswordConfirmation">Confirm new password</label>
    </div>

    <div class="form-floating mb-4">
      @foreach ($errors->get('new_password') as $message)
        <p class="error-message">{{ $message }}</p>
      @endforeach
    </div>

    <div class="d-grid gap-2 d-md-block mb-4">
      <button type="button" class="btn btn-outline-danger py-3 mb-4 px-4" data-bs-toggle="modal" data-bs-target="#deactivateModal">Deactivate Account</button>
      <button type="submit" class="btn btn-primary py-3 float-end px-5">Save</button>
    </div>
  </form>

  <div class="modal fade" id="deactivateModal" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deactivateModalLabel">Deactivate Account Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span>Are you sure want to deactivate your account?</span>
        </div>
        <form action="{{ route('delete-account') }}" method="POST">
          @csrf
          <div class="modal-footer justify-content-between">
            <button class="btn btn-outline-danger px-4">Cancel</button>
            <button type="submit" class="btn btn-primary px-4">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

@endsection