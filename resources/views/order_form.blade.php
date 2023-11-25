<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Waiter Pnnel</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
   
</head>
<body class="bg-dark">
  <div class="card bg-dark">
    <div class="card-title">
      <div class="text-center mt-3 mb-0"><h3>Waiter Pannel</h3></div>
    </div>
    <div class="card-body">
      <div class="container-fluit ">
         @if (session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Created!</strong> {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

         @endif
          @if (session('serve'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Created!</strong> {{ session('serve') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

         @endif
      <div class="row">
          <div class="col-lg-12 ">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1 bg-dark">
                <ul class="nav nav-tabs p-3" id="custom-tabs-one-tab" role="tablist">
                  
                  <li class="nav-item">
                    <a class="nav-link active btn btn-warning" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Home</a>
                  </li>&nbsp;&nbsp; 
                  <li class="nav-item">
                    <a class="nav-link btn btn-success" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Profile</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body bg-dark p-5">                
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                   <p>---Dish List---</p><hr>
                   <form action="{{ route('order.submit') }}" method="post">
                    @csrf
                   <div class="row">
                    @foreach ($dishes as $dish )
                      
                       <div class="col-lg-4 mb-3">
                          <div class="card bg-dark shadow-lg" style="width: 18rem;">
                          <img src="{{ url('./images/'.$dish->image) }}" class="card-img-top "  height="230px" style="border: 1.5px solid gray; border-radius:8px">
                          <div class="card-body d-flex">
                            <h3 class="mt-0 mb-0  mr-5">{{ $dish->name }}</h3>
                            <input type="number" value="0" name="{{ $dish->id }}" class="bg-dark" style="width: 40px;  ">
                          </div>
                        </div>
                       </div> 

                     @endforeach
                    </div>
                    <hr><br>

                    <div class="d-flex">
                    <div class="col-sm-3 mr-3">
                      <!-- select -->
                      <div class="form-group d-flex">
                        <label class="mr-3 d-inline">Table Number</label>
                        <select class="form-control bg-dark" name="table">
                          @foreach ($tables as $table)
                             <option value="{{ $table->id }}">{{ $table->number }}</option>
                          @endforeach
                         
                        </select>
                      </div>
                    </div>

                    <div class="">
                      <input type="submit" name="" value="submit" id="" class="col-lg-12 px-5 btn btn-success">
                    </div>
                    </div>

                  </form>        
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     
                     <section class="content">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-12">
                                <div class="card bg-dark">
                                    <div class="card-header">
                                    <h3 class="card-title">Order Serve Lists</h3>
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
                                          <a href="/order/{{ $order->id }}/serve" class="btn btn-sm btn-success">serve</a>
                                          
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
                  </div>
                 
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div>
  </div>
    </div>
  </div>

    <!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>