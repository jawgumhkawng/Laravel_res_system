<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Waiter Pnnel</title>
      <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />">
   
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
              <strong>Success!</strong>{{session('message')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

         @endif
          @if (session('serve'))

               <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong>{{session('serve')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

         @endif
      <div class="row">
          <div class="col-lg-12 ">
            <div class="card card-primary card-tabs">
              <div class="card-header p-3  bg-dark">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active position-relative" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dishes
                     <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                     9+
                  </span>
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link position-relative" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Serve
                     <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                   
                  </span>
                  </button>
                </li>
                 <li class="nav-item" role="presentation">
                  <a href="/" class="nav-link">Home</a>
                </li>
                              
              </ul>

              <div class="col ">
                            <form action="{{ route('order.search') }}" method="get">
                              @csrf
                                <div class="input-group">
                                <input type="search" name="key" class="form-control rounded bg-dark text-white shadow-lg  " style="border:1px solid gray" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                              </div>
                            </form>
                        </div>
               <div class="card-body bg-dark p-5"> 
              <div class="tab-content" id="pills-tabContent">
             <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                  
                  <p>---Dish List---</p>
                       
                   <hr>
                   <form action="{{ route('order.submit') }}" method="post">
                    @csrf

                   
                      <div class="row">
                       
                    @forelse ($dishes as $dish )
                      
                       <div class="col-lg-4 mb-5">
                          <div class="card bg-dark shadow-lg" style="width: 18rem;">
                          <img src="{{ url('./images/'.$dish->image) }}" class="card-img-top "  height="230px" style="border: 1.5px solid gray; border-radius:8px">
                          <div class="card-body d-flex">
                            <h5 class="mt-0 mb-0  me-5 text-white">{{ $dish->name }}</h5>
                            <input type="number" value="0" name="{{ $dish->id }}" class="bg-dark text-white " style="width: 40px;  ">
                          </div>
                        </div>
                       </div> 

                     @empty

                       <h3 class="text-white">Result Not Found!</h3>

                     @endforelse

                     {{ $dishes->links() }}
                     {{-- {{ $paginator->links('dishes') }} --}}
                    </div>
                   
                  

                    
                    <hr><br>

                    <div class="d-flex">
                    <div class="col-sm-3 mr-3">
                      <!-- select -->
                      <div class="form-group d-flex">
                        <label class="mr-3 d-inline text-white">Table Number</label>
                        <select class="form-control bg-dark text-white " name="table"  >
                          @foreach ($tables as $table)
                             <option class="text-white" value="{{ $table->id }}">{{ $table->number }}</option>
                          @endforeach
                         
                        </select>
                      </div>
                    </div>

                    <div class="">
                      <input type="submit" name="" value="submit" id="" class="col-lg-12 px-5 py-2 ms-3 btn btn-success">
                    </div>
                    </div>

                  </form>        
                  </div>

                </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                  
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
            </div>
          </div>
      </div>
      </div>  
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>