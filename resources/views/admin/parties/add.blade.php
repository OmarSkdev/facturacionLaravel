@extends('admin.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar Parties</h1>
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
            <h3 class="card-title">Horizontal Form</h3>
          </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('admin/parties/add')}}" 
        method="POST">
          {{ csrf_field() }}
          <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre Type Parties
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <select name="parties_type_id" class="form-control" required>
                    <option value="">Seleccionar Nombre Tipo Parties </option>
                    @foreach ($getPartiesType as $valor )
                        <option value="{{ $valor->id}}">{{ $valor->parties_type_nombre}}</option>
                    @endforeach
                  </select>
                </div>
            </div>  

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nombre Parties
                <span style="color:red;">*</span>
              </label>
              <div class="col-sm-8">
                <input type="text" name="full_name" class="form-control" 
                placeholder="Ingrese Nombre" required>
              </div>
            </div>  
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">N° Fono
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="phone_no" class="form-control" 
                  placeholder="Ingrese N° telefono" required>
                </div>
            </div>   
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dirección
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="address" class="form-control" 
                  placeholder="Dirección" required>
                </div>
            </div>        

            <div class="form-group row">
                <label class="col-sm-2.5 col-form-label">Nombre del titular cuenta
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="account_holder_name" class="form-control" 
                  placeholder="Titular de la Cuenta" required>
                </div>
            </div>  
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">N° cuenta
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="account_no" class="form-control" 
                  placeholder="Numero Cuenta" required>
                </div>
            </div>        

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre Banco
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="bank_name" class="form-control" 
                  placeholder="Nombre Banco" required>
                </div>
            </div> 
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Código IFSC
                  <span style="color:red;">*</span>
                </label>
                <div class="col-sm-8">
                  <input type="text" name="ifsc_code" class="form-control" 
                  placeholder="IFSC" required>
                </div>
            </div>       


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Sign in</button>
            <a href="{{ url('admin/parties')}}" class="btn btn-default float-right">Cancel</button>
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