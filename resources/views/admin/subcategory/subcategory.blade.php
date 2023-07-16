 @extends('layouts.admin')
 @section('title', 'Create Subcategory')
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
                <h3 class="card-title">Add Subcategory</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('subcategory.submit')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="category_no">
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
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Subcategory Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('sub_category_name') is-invalid @enderror" name="sub_category_name" value="{{old('sub_category_name')}}" placeholder="Subcategory Name">
                      @error('sub_category_name')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Subcategory Slug</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('sub_category_slug') is-invalid @enderror" name="sub_category_slug" value="{{old('sub_category_slug')}}" placeholder="Subcategory Slug">
                      @error('sub_category_slug')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Min Service Charge</label>
                    <div class="col-sm-9">
                      <input type="number" min="0" class="form-control  @error('min_price') is-invalid @enderror" name="min_price" value="{{old('min_price')}}" placeholder="Min Service Charge">
                      @error('min_price')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Max Service Charge</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control  @error('max_price') is-invalid @enderror" name="max_price" value="{{old('max_price')}}" placeholder="Max Service Charge">
                      @error('max_price')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div> -->

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Subcategory Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="sub_category_image" >
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Add Subategory</button>
                  <a class="btn btn-default" href="{{route('subcategory.all')}}">Cancel</a>
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