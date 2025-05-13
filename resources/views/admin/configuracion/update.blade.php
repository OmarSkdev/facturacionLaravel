@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración</h1>
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
                  <form class="form-horizontal" action="{{ url('admin/configuracion/update')}}" 
                   method="post" enctype="multipart/form-data">
                   {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sitio Web 
                                <span style="color:red;">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="nombre_web" class="form-control" 
                                placeholder="Nombre" required value="{{$obtRegistro->nombre_web}}"">
                            </div>
                        </div>   

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Icono
                                <span style="color:red;">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="file" name="logo" class="form-control" 
                                placeholder="Nombre" value="">

                                @if (!empty($obtRegistro->logo))
                                    @if (file_exists('upload/'.$obtRegistro->logo))
                                        <img src="{{ url('upload/'.$obtRegistro->logo)}}" 
                                        style="height: 100px; width: 100px;">
                                    @endif                           
                                @endif
                            </div>
                        </div>   

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Favicon
                                <span style="color:red;">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="file" name="favicono" class="form-control" 
                                placeholder="Nombre" value="">
                            </div>
                            @if (!empty($obtRegistro->favicono))
                                    @if (file_exists('upload/'.$obtRegistro->favicono))
                                        <img src="{{ url('upload/'.$obtRegistro->favicono)}}" 
                                        style="height: 100px; width: 100px;">
                                    @endif                           
                            @endif
                        </div>   
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Enviar</button>
                        <a href="{{ url('admin/configuracion')}}" 
                            class="btn btn-default float-right">Cancel</a>
                    </div>
                <!-- /.card-footer -->
                </form>
                </div>
             </div>
            </div>
        </div>
      </section>
</div>
      
@endsection