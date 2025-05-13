@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mi Cuenta</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('_mensaje')
            <div class="row">
            <div class="col-md-12">        
    <!-- Horizontal Form -->
          <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Mi Cuenta</h3>
          </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('admin/mi_cuenta/update')}}" 
        method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre 
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                <input type="text" name="nombre" class="form-control" 
                placeholder="Nombre" required value="{{ $obtRegistro->name}}">
              </div>
            </div>   
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="email" class="form-control" 
                  placeholder="Email" required value="{{ $obtRegistro->email}}">

                  <span style="color:red;">{{ $errors->first('email')}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Imagen Perfil 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="file" name="imagen_perfil" class="form-control">
                  
                  @if (!empty($obtRegistro->imagen_perfil))
                    @if (file_exists('upload/'.$obtRegistro->imagen_perfil))
                      <img src="{{ url('upload/'.$obtRegistro->imagen_perfil)}}" 
                       style="height: 100px; width: 100px;">
                    @endif               
                    
                  @endif
                </div>
              </div>     
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="password" class="form-control" 
                  placeholder="Password">
                  (Dejar en Blanco si no quieres modificar la contraseña)
                </div>
              </div>  
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Enviar</button>
            <a href="{{ url('admin/mi_cuenta')}}" class="btn btn-default float-right">Cancel</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
    </div>
   </div>
  </div>
 {{-- </section> --}}

</div>

@endsection