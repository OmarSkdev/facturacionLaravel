@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vista GST</h1>
          </div>          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">        
    <!-- Horizontal Form -->
          <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">GST Bills</h3>
          </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" >
          
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"># 
                <span style="color:red;">*</span>
              </label>
                <div class="col-sm-8">{{ $getRegistro->id}}                  
                </div>              
            </div>  
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre Parties Type
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                {{ !empty($getRegistro->get_parties_type_nombre->parties_type_nombre) ?
                 $getRegistro->get_parties_type_nombre->parties_type_nombre : ''}}
              </div>
            </div>   
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fecha Factura
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ date('d-m-Y', strtotime($getRegistro->fecha_factura))}}</td>
                </div>
            </div> 

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">N°Factura
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->nro_factura }}</td>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Item Descripción
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->item_descripcion }}</td>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Total
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_total }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->cgst_tasa }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">SGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->sgst_tasa }}</td>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">IGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->igst_tasa }}</td>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto CGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_igst }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto SGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_sgst }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto IGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_igst }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Impuesto
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_impuesto }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Neto
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->monto_neto }}</td>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Declaración
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <td>{{ $getRegistro->declaracion }}</td>
                </div>                
            </div>
            
            
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fecha Creación
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                <td>{{ date('d-m-Y H:s A', strtotime($getRegistro->created_at)) }}</td>
              </div>                
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fecha Actualización
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                <td>{{ date('d-m-Y H:s A', strtotime($getRegistro->updated_at)) }}</td>
              </div>                
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            
            <a href="{{ url('admin/gst_bills')}}" class="btn btn-default float-right">Regresar</button>
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