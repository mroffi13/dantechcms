@extends('layouts.auth', ['title' => 'Dantech | Login'])

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="{{ route('form.login') }}"><b>Admin</b>LTE</a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
  
        <form action="{{ route('form.register') }}" method="post">
            @csrf
          <div class="input-group">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('name')
            <small class="text-danger mb--3">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
              <small class="text-danger">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
              <small class="text-danger">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mt-3">
            <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Address">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>
          @error('address')
            <small class="text-danger">{{ $message }}</small>
          @enderror
          <div class="row mt-3">
            <!-- /.col -->
            <div class="col">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <a href="{{ route('form.login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection