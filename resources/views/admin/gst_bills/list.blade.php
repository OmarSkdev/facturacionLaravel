@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>GST Bills</h1>
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
                      <h1 class="card-title">Buscar GST Factura</h1>
                    </div>

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
                            <label>Fecha </label>
                            <input type="text" name="fecha_factura" value="{{ Request()->fecha_factura}}"
                             class="form-control" placeholder="Fecha">
                          </div>
  
                          <div class="form-group col-md-3">
                            <label>N°Factura</label>
                            <input type="text" name="nro_factura" value="{{ Request()->nro_factura}}"
                             class="form-control" placeholder="N°Factura">
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
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Lista Parties Type</h3>
                      <a href="{{ url('admin/gst_bills/add')}}" class="btn btn-primary float-right">
                        Agregar Nuevo GST</a>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nombre parties_type</th>
                            <th>Fecha Factura</th>
                            <th>Nro Factura</th> 
                            <th>Monto Total</th>   
                            <th>Monto Impuesto</th>
                            <th>Monto Neto</th>                         
                            <th>Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $montoTotal = 0;
                          @endphp                           

                          @forelse($getRegistro as $valor )   
                          @php
                            $montoTotal = $montoTotal + $valor->monto_total
                          @endphp                         
                          <tr>
                            <td>{{ $valor->id}}</td>
                            <td>{{ $valor->parties_type_nombre}}</td>
                            <td>{{ date('d-m-Y', strtotime($valor->fecha_factura))}}</td>
                            <td>{{ $valor->nro_factura}}</td>
                            <td>{{ $valor->monto_total}}</td>
                            <td>{{ $valor->monto_impuesto}}</td>
                            <td>{{ $valor->monto_neto}}</td>
                            <td>
                              <a href="{{ url('admin/gst_bills/view/'.$valor->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i>
                              </a>
                                <a href="{{ url('admin/gst_bills/edit/'.$valor->id)}}" class="btn btn-info">
                                  <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ url('admin/gst_bills/delete/'.$valor->id)}}" 
                                  class="btn btn-danger" 
                                  onclick="return confirm('Estás seguro que deseas eliminar?')">
                                  <i class="fas fa-trash">
                                </i></a>
                            </td>                        
                          </tr>
                          @empty   
                            <tr>
                              <td colspan="100%">Registro no Encontrado.</td>
                            </tr>                    
                          @endforelse
                          @if(!empty($montoTotal))
                            <tr>
                              <th colspan="4">Total $</th>
                              <td>$ {{ number_format($montoTotal, 2) }}</td>
                            </tr>
                          @endif                                       
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                       {{--  {!! $getRegistro->appends(Illuminate\Support\Facades\Request::
                        except('page'))->links()!!} --}}
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