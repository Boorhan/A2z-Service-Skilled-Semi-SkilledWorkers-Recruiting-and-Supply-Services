 @extends('layouts.admin')
 @section('title', 'Create Category Wise Service Provider')
 @section('content')
  <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-sm"></div>
          <div class="col-md-9">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Category Wise Service Provider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('cat-wise-sp.submit')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="category_no" name="category_no">
                        <option value="-1" disabled selected>--Select Category--</option>
                        @foreach($get_Cat as $data)
                          <option value="{{$data->category_no}}">{{$data->category_name}}</option>
                        @endforeach
                      </select>
                      @error('category_no')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Subcategory</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="subcategory_no" name="subcategory_no">
                        <option value="-1" disabled selected>--Select Subcategory--</option>
                        
                      </select>
                      @error('subcategory_no')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Provider</label>
                    <div class="col-sm-9">
                      <select class="form-control search" name="user_no">
                        <option value="-1" disabled selected>--Select Service Provider--</option>
                        @foreach($get_sp as $data)
                          <option value="{{$data->user_no}}">{{$data->name}}</option>
                        @endforeach
                      </select>
                      @error('user_no')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Add</button>
                  <a class="btn btn-default" href="{{route('AllCatWiseSPs.all')}}">Cancel</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <div class="col-sm"></div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection