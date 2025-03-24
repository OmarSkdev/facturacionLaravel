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
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Lista Parties Type</h3>
                      <a href="{{ url('admin/parties_type/add')}}" class="btn btn-primary float-right">
                        Agregar Nueva Parties Type</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th  style="width: 40px">Nombre Party</th>
                           
                            <th  style="width: 80px">Acción</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <a href="" class="btn btn-info"><i class="fas fa-pencil-alt">
                                </i></a>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash">
                                </i></a>
                            </td>                            
                          </tr>                          
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
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