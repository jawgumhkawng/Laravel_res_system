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
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">Dishes Page</li>
                <li class="breadcrumb-item ">Dishes Create Page</li>
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
                <h3 class="card-title">Create Dish</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/dish" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dish Name</label>
                    @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    <input type="text" class="form-control{{ ($errors->first('name') ? " form-error" : "") }} " name="name" id="exampleInputEmail1" placeholder="Enter name">
                  </div>
                  
                 <div class="form-group">
                  <label for="exampleSelectRounded0">Category</label>
                   @error('category')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <select class="custom-select form-control rounded-1 {{ ($errors->first('name') ? " form-error" : "") }}" name="category" id="exampleSelectRounded0">
                  <option value="">Select Category</option>
                    @foreach ($categories as $cat )
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                   @endforeach

                  </select>
                 </div>

                   <div class=" form-group">
                    <label for="exampleInputFile">Image</label>
                     @error('dish_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    <div class="custom-file">
                      <input type="file" class="custom-file-input " name="dish_image" placeholder="choose image" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
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