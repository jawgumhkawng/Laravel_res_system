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
                <li class="breadcrumb-item active">Category Page</li>
                <li class="breadcrumb-item ">Category Edit Page</li>

              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
        <div class="card bg-dark">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/category/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    <input type="text" class="form-control{{ ($errors->first('name') ? " form-error" : "") }} " name="name" value="{{ old('name',$category->name) }}" id="exampleInputEmail1" placeholder="Enter email">
                  </div>            
                </div>
                 <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Description</label>
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    <input type="text" class="form-control{{ ($errors->first('description') ? " form-error" : "") }} " name="description" value="{{ old('description',$category->description) }}" id="exampleInputEmail1" placeholder="Enter email">
                  </div>            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary ">Submit</button>
                  <a href="/dish" class="btn btn-warning">Back</a>
                </div>
              </form>
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