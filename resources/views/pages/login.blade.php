@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="{{ asset('css/login.css') }}" />

@endsection

@section('content')

<div class="m-auto" style="min-width: 500px;">
  <form action="{{ route('login') }}" method="POST">
    @csrf

    <div>
      <h2 class="text-center navbar-brand fw-bold fs-1 mb-4 p-0 m-0">Artistique</h2>
      <h3 class="text-center fw-light mb-4">Login</h3>

      <div class="form-floating mb-4">
        <input id="email" class="form-control" type="email" name="email" placeholder="name@example.com" required />
        <label for="email">Email address</label>
      </div>

      <div class="form-floating mb-4">
        <input id="password" class="form-control" type="Password" name="password" placeholder="Enter your password" required />
        <label for="password">Password</label>
      </div>

      @error('email')
      <div class="form-floating mb-4">
        <p class="error-message">Incorrect email address or password. Please try again.</p>
      </div>
      @enderror

      <button ID="btnLoginSubmit" class="btn btn-primary d-block w-100 py-3 mb-4" name="loginBtn">Login</button>
    </div>
  </form>

  <div class="d-flex justify-content-center">
    <span class="text-muted">Don't have an account yet?</span>
    <a class="nav-link text-primary border-bottom border-primary ms-2 p-0" href="{{ route('register') }}">Create an account</a>
  </div>
</div>

@endsection