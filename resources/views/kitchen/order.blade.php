 @extends('layouts.master')
 
 @section('content')
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-dark">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Kitchen Pannel</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Order Page</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card bg-dark">
                <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
                </div>
            <div class="card-body ">
            <table id="example2" class="table table-bordered table-striped table-dark">
                <thead>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td>-</td>
                    <td>U</td>
                </tr>
                </tbody>

                <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>
     </div>
    </div>
    </div>
</section>
      <!-- Main content -->
     
      <!-- /.content -->
    </div>
    @endsection