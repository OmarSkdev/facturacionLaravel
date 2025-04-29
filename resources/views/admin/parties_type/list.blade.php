@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parties Type</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
              @include('_mensaje')
              <div class="row">

                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h1 class="card-title">Buscar Parties Type</h1>
                    </div>
                  </div>

                  <form method="get" action="">
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-2">
                          <label>ID</label>
                          <input type="text" name="id" value="{{Request()->id}}"                          
                           class="form-control" placeholder="ID">
                        </div>

                        <div class="form-group col-md-2">
                          <label>Parties Type Nombre</label>
                          <input type="text" name="parties_type_nombre" value="{{ Request()->parties_type_nombre}}"
                           class="form-control" placeholder="Parties Type Nombre">
                        </div>

                        <div class="form-group col-md-2">
                          <label>Creado</label>
                          <input type="date" name="created_at" value="{{ Request()->created_at}}"
                           class="form-control">
                        </div>

                        <div class="form-group col-md-2">
                          <label>Actualizado</label>
                          <input type="date" name="updated_at" value="{{ Request()->updated_at}}"
                           class="form-control">
                        </div>

                        <div style="clear: both;"></div>
                        <br>

                        <div class="col-md-12">
                          <button class="btn btn-primary" type="submit">Buscar</button>
                          <a href="{{ url('admin/parties_type')}}" class="btn btn-success">
                            Resetear
                          </a>
                        </div>
                      </div>
                    </div>
                  </form>

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Lista Parties Type</h3>
                      <a href="{{ url('admin/parties_type/add')}}" class="btn btn-primary float-right">
                        Agregar Nueva Parties Type</a>

                        <a href="{{ url('admin/parties_type/pdf_generator')}}" 
                        class="btn btn-secondary float-right mr-2">
                          Generar PDF</a>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 40px">Nombre Party</th>
                            <th style="width: 40px">Creado</th>
                            <th style="width: 40px">Actualizado</th>
                            <th style="width: 80px">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($getRegistro as $valor )                            
                          <tr>
                            <td>{{ $valor->id}}</td>
                            <td>{{ $valor->parties_type_nombre}}</td>
                            <td>{{ date('d-m-Y', strtotime($valor->created_at))}}</td>
                            <td>{{ date('d-m-Y', strtotime($valor->updated_at))}}</td>
                            <td>
                                <a href="{{ url('admin/parties_type/edit/'.$valor->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt">
                                </i></a>
                                <a href="{{ url('admin/parties_type/delete/'.$valor->id)}}" 
                                  class="btn btn-danger" 
                                  onclick="return confirm('Estás seguro que deseas eliminar?')">
                                  <i class="fas fa-trash">
                                </i></a>
                            </td>                            
                          </tr>
                          @empty 
                          <tr>
                            <td colspan="100%"> No hay registros</td>
                          </tr>
                          @endforelse                       
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        {!! $getRegistro->appends(Illuminate\Support\Facades\Request::
                        except('page'))->links()!!}
                      </ul>
                    </div>
                  </div>
                  <!-- /.card -->
      
                 
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              
            </div><!-- /.container-fluid -->
          </section>
    </div>
@endsection