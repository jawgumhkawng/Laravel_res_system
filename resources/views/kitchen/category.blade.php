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
                <li class="breadcrumb-item ">Dishes Page</li>
              </ol>
            </div><!-- /.col -->
          </div>
          
             @if (session('Created'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Created!</strong> {{ session('Created') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif
            
             @if (session('Updated'))

                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Updated!</strong> {{ session('Updated') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif

             @if (session('Deleted'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Deleted!</strong> {{ session('Deleted') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            @endif
            <!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
    
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card bg-dark">
                <div class="card-header">
                <a href="/dish/create" class="card-title btn btn-info">
               <i class="fas fa-plus"></i>
                  &nbsp;Create New Categories
                </a>
                </div>
            <div class="card-body ">
            <table id="example2" class="table table-bordered table-striped table-dark">
                <thead>
                <tr>
                    <th>Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Created</th>
                    <th class="text-center">#Action</th>
                    
                </tr>
                </thead>

                <tbody>
                @foreach ($categories as $category )
                    <tr>
                    <td>{{$category->name}}</td>
                    <td class="text-center ">{{$category->description}}</td>
                    <td class="text-center">{{ $category->created_at }}</td>
                    <td class="text-center">                
                      <form action="dish/{{ $category->id }} " method="post">
                        @csrf
                        @method('DELETE')
                          <a href="category/{{ $category->id }}/edit" class="btn btn-sm btn-warning  "><i class="fas fa-cog"></i></a>
                          <button type="submit" onclick="return confirm('Are you sure, you want to DELETE this {{ $category->name }}?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                      </form>
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
      <!-- Main content -->
           <!-- /.content -->
</div>
    @endsection