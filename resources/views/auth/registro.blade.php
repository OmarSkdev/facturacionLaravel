@extends('layouts.app')
@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @include('_mensaje')

      <form action="{{url('registro_post')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <input type="text"  name="nombre" class="form-control"
             placeholder="Nombre" required value="{{ old('nombre') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <span style="color: red;">{{ $errors->first('email')}}</span>

        
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{ old('email')}}"
           class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span style="color: red;">{{ $errors->first('password') }}</span>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Registro</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <p class="mb-1">
        <a href="{{url('olvidar_pw')}}">Olvidé mi password</a>
      </p>
      <p class="mb-0">
        <a href="{{ url('/') }}" class="text-center">Login</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
@endsection
