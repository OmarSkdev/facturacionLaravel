@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parties</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
              @include('_mensaje')
              <div class="row">
                <div class="col-md-12">
                  <form method="get" action="">
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-1">
                          <label>ID</label>
                          <input type="text" name="id" value="{{Request()->id}}"                          
                           class="form-control" placeholder="ID">
                        </div>

                        <div class="form-group col-md-3">
                          <label>Parties Type Nombre</label>
                          <input type="text" name="parties_type_nombre" value="{{ Request()->parties_type_nombre}}"
                           class="form-control" placeholder="Parties Type Nombre">
                        </div>

                        <div class="form-group col-md-3">
                          <label>Nombre Completo</label>
                          <input type="text" name="full_name" value="{{ Request()->full_name}}"
                           class="form-control" placeholder="Nombre Completo">
                        </div>

                        <div class="form-group col-md-3">
                          <label>Teléfono</label>
                          <input type="text" name="phone_no" value="{{ Request()->phone_no}}"
                           class="form-control" placeholder="Teléfono">
                        </div>

                        <div class="form-group col-md-2">
                          <label>Creado</label>
                          <input type="date" name="created_at" value="{{ Request()->created_at}}"
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
                      <h3 class="card-title">Lista Parties</h3>
                      <a href="{{ url('admin/parties/add')}}" class="btn btn-primary float-right">
                        Agregar Nueva Parties</a>
                      <a href="{{ url('admin/parties/pdf')}}" 
                        class="btn btn-success float-right mr-2">
                        Generar PDF
                      </a>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Cargo</th>
                            <th>Nombre</th>
                            <th>N°Fono</th>
                            <th>N°Titular Cuenta</th>
                            <th>Dirección</th>
                            <th>Nombre Banco</th>
                            <th>N° Cuenta</th>                            
                            <th>IFSC</th>
                            <th>Dirección Sucursal</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($getRegistro as $valor )                            
                          <tr>
                            <td>{{ $valor->id}}</td>
                            <td>{{ $valor->parties_type_nombre}}</td>
                            <td>{{ $valor->full_name}}</td>
                            <td>{{ $valor->phone_no}}</td>
                            <td>{{ $valor->account_holder_name}}</td>
                            <td>{{ $valor->address}}</td>
                            
                            <td>{{ $valor->bank_name}}</td>
                            <td>{{ $valor->account_no}}</td>
                            
                                                        
                            <td>{{ $valor->ifsc_code}}</td>
                            <td>{{ $valor->branch_address}}</td>
                            <td>{{ date('d-m-Y', strtotime($valor->created_at)) }}</td>
                            <td>
                                <a href="{{ url('admin/parties/pdf_single/'.$valor->id)}}"
                                  class="btn btn-success">
                                  <i class="fas fa-file-pdf"></i>
                                </a>
                                <a href="{{ url('admin/parties/edit/'.$valor->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt">
                                </i></a>
                                <a href="{{ url('admin/parties/delete/'.$valor->id)}}" 
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