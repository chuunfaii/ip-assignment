@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/register.css') }}" />

@endsection

@section('content')

<div class="m-auto py-5" style="min-width: 500px;">
  <form action="{{ route('register') }}" method="POST">
    @csrf

    <div>
      <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
      <h3 class="text-center fw-light mb-4">Register</h3>

      <div class="input-group justify-content-between">
        <div class="form-floating mb-4" style="min-width: 230px;">
          <input id="firstName" name="first_name" class="form-control" placeholder="John" required value="{{ old('first_name') }}" />
          <label for="firstName">First name</label>
        </div>

        <div class="form-floating mb-4" style="min-width: 230px;">
          <input id="lastName" name="last_name" class="form-control" placeholder="Doe" required value="{{ old('last_name') }}" />
          <label for="lastName">Last name</label>
        </div>
      </div>

      <div class="form-floating mb-4">
        <input id="email" name="email" class="form-control @error('email') error-input @enderror" type="email" placeholder="name@example.com" required value="{{ old('email') }}" />
        <label for="email">Email address</label>
      </div>

      @error('email')
        <div class="form-floating mb-4">
          <p class="error-message">{{ $message }}</p>
        </div>
      @enderror

      <div class="form-floating mb-4">
        <input id="password" name="password" class="form-control @error('password') error-input @enderror" type="Password" placeholder="Enter your password" required />
        <label for="password">Password</label>
      </div>

      <div class="form-floating mb-4">
        <input id="passwordConfirmation" name="password_confirmation" class="form-control @error('password') error-input @enderror" type="password" placeholder="Enter your password again" required />
        <label for="passwordConfirmation">Confirm password</label>
      </div>

      <div class="form-floating mb-4">
      @foreach ($errors->get('password') as $message)
        <p class="error-message">{{ $message }}</p>
      @endforeach
      </div>

      <div class="d-flex justify-content-between mb-4">
        <span class="w-100 align-self-center">Would you like to register as:</span>
        <div class="form-radio d-flex justify-content-between w-100">
          <input type="radio" name="type" id="customer" checked value="customer" />
          <label for="customer" class="option">Customer</label>

          <input type="radio" name="type" id="artist" value="artist" />
          <label for="artist" class="option">Artist</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary d-block w-100 py-3 mb-4">Register</button>
    </div>
  </form>

  <div class="d-flex justify-content-center mb-4">
    <span class="text-muted">Already have an account?</span>
    <a class="nav-link text-primary border-bottom border-primary ms-2 p-0" href="{{ route('login') }}">Login account</a>
  </div>
</div>

@endsection