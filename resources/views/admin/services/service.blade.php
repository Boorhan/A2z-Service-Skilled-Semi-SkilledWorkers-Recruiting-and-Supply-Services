 @extends('layouts.admin')
 @section('title', 'Create Service')
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
                <h3 class="card-title">Create Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{route('service.submit')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('service_name') is-invalid @enderror" name="service_name" value="{{old('service_name')}}" placeholder="Title">
                      @error('service_name')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Slug</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('service_slug') is-invalid @enderror" name="service_slug" value="{{old('service_slug')}}" placeholder="Service Slug">
                      @error('service_slug')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

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
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Charge (BDT)</label>
                    <div class="col-sm-9">
                      <input type="number" min="0" class="form-control  @error('service_charge') is-invalid @enderror" id="service_charge" name="service_charge" value="{{old('service_charge')}}" placeholder="Service Charge">
                      <div class="text-danger sCost"></div>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label"> Percentage Amount(BDT)</label>
                    <div class="col-sm-9">
                      <input type="hidden" id="service_percentage" name="" value="{{$servicePercent->service_percentage}}">
                      <input type="number" min="0" class="form-control  @error('service_percent_amount') is-invalid @enderror" id="service_percent_amount" name="service_percent_amount" value="{{old('service_percent_amount')}}" placeholder="Service Charge">
                      <div class="text-danger sCost"></div>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Type</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="service_type_no" name="service_type_no">
                          <option value="-1" disabled selected>--Service Type--</option>
                          @foreach($get_sType as $data)
                            <option value="{{$data->service_type_no}}">{{$data->service_type_name}}</option>
                          @endforeach
                        </select>
                      @error('service_type_no')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Payment Details</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="payment_details" placeholder="Payment Details">{{old('payment_details')}}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Details</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="service_details" placeholder="Service Provider Details">{{old('service_details')}}</textarea>
                      @error('service_details')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">What Includes</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="what_included">{{old('what_included')}}</textarea>
                      @error('what_included')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">What Excludes</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="what_excluded">{{old('what_excluded')}}</textarea>
                      @error('what_excluded')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Terms & Conditions</label>
                    <div class="col-sm-9">
                      <textarea class="textarea form-control" name="terms_condition">{{old('terms_condition')}}</textarea>
                      @error('terms_condition')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Upload Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control" name="service_image">
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info" id="createService">Create Service</button>
                  <a class="btn btn-default" href="{{route('service.all')}}">Cancel</a>
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