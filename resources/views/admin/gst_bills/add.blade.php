@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar GST</h1>
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
        <form class="form-horizontal" action="{{ url('admin/gst_bills/add')}}" 
        method="POST">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre Parties Type
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                <select class="form-control" name="parties_type_id">
                  @foreach ( $obtenerPartiesType as $valor )
                    <option value="{{ $valor->id }}">{{ $valor->parties_type_nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>   
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fecha Factura
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="date" name="fecha_factura" class="form-control" 
                  placeholder="Fecha" required>
                </div>
            </div> 

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">N°Factura
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="nro_factura" class="form-control" 
                  placeholder="número" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Item Descripción
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <textarea name="item_descripcion" class="form-control" 
                  placeholder="descripción" required></textarea>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Total
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_total" class="form-control" 
                  placeholder="Monto Total" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="cgst_tasa" class="form-control" 
                  placeholder="Tasa CGST" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">SGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="sgst_tasa" class="form-control" 
                  placeholder="Tasa SGST" required></input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">IGST Tasa
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="igst_tasa" class="form-control" 
                  placeholder="Tasa IGST" required></input>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto CGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_cgst" class="form-control" 
                  placeholder="Monto CGST" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto SGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_sgst" class="form-control" 
                  placeholder="Monto SGST" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto IGST 
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_igst" class="form-control" 
                  placeholder="Monto IGST" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Impuesto
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_impuesto" class="form-control" 
                  placeholder="Monto Impuesto" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Monto Neto
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="number" name="monto_neto" class="form-control" 
                  placeholder="Monto Neto" required></input>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Declaración
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                    <textarea name="declaracion" class="form-control" 
                    placeholder="declaración" required></textarea>
                </div>                
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Agregar</button>
            <a href="{{ url('admin/gst_bills')}}" class="btn btn-default float-right">Cancel</button>
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