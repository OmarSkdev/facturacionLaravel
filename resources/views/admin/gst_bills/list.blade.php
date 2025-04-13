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

                          @foreach($getRegistro as $valor )   
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
                            {{-- <td>
                                <a href="{{ url('admin/parties_type/edit/'.$valor->id)}}" class="btn btn-info"><i class="fas fa-pencil-alt">
                                </i></a>
                                <a href="{{ url('admin/parties_type/delete/'.$valor->id)}}" 
                                  class="btn btn-danger" 
                                  onclick="return confirm('Estás seguro que deseas eliminar?')">
                                  <i class="fas fa-trash">
                                </i></a>
                            </td>     --}}                        
                          </tr>                         
                          @endforeach
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