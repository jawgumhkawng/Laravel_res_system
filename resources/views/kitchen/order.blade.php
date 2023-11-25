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
          </div>
                    
             @if (session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif

             @if (session('ready'))

                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('ready') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif

             @if (session('cancel'))

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('cancel') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif
            <!-- /.row -->
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
                    <th class="text-center">Dish Name</th>
                    <th class="text-center">Table Number</th>
                    <th class="text-center">Status</th>
                    <th class="text-center"># Action</th>
                    
                </tr>
                </thead>

                <tbody>
               @foreach ($orders as $order)
                  <tr>
                    <td class="text-center">{{ $order->dish->name}}</td>
                    <td class="text-center">Table No - {{ $order->table_id }}</td>
                    <td class="text-center"><span class="btn btn-sm {{ $status[$order->status] == 'new' ? 'btn-success' : 'btn-info' }}">{{ $status[$order->status] }}</span></td>
                    <td class="text-center"> 
                      <a href="/order/{{ $order->id }}/cancel" class="btn btn-sm btn-danger">Cancel</a>
                      <a href="/order/{{ $order->id }}/approve" class="btn btn-sm btn-info">Approve</a>                      
                      <a href="/order/{{ $order->id }}/ready" class="btn btn-sm btn-success">ready</a>
                    </td>
                </tr>
               @endforeach
                </tbody>
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