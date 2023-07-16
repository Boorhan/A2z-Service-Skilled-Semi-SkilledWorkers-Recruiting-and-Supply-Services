 @extends('layouts.admin')
 @section('title', 'Create Service Provider')
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
                <h3 class="card-title">Service Provider Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('register.sp')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Full Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" placeholder="Full Name">
                      @error('name')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" placeholder="Phone">
                      @error('phone')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Email (Optional)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">NID Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('user_nid') is-invalid @enderror" name="user_nid" value="{{old('user_nid')}}" placeholder="NID Number">
                      @error('user_nid')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Additional ID/Reg Type</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="id_type_no">
                          <option value="-1" disabled selected>--Select Type--</option>
                          @foreach($id_types as $data)
                            <option value="{{$data->id_type_no}}">{{$data->id_type_name}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Additional ID/Reg Num</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="additional_id_num" value="{{old('additional_id_num')}}" placeholder="Additional ID/Reg Num">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Educational Details</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="educational_qualification" placeholder="Educational Details">{{old('educational_qualification')}}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">SP Details</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="user_details" placeholder="Service Provider Details">{{old('user_details')}}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="user_address" placeholder="Address">{{old('user_address')}}</textarea>
                      @error('user_address')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="user_photo">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">NID Photo</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="user_nid_photo">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" placeholder="Type Password">
                      @error('password')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Create Service Provider</button>
                  <a class="btn btn-default" href="{{route('sp.all')}}">Cancel</a>
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