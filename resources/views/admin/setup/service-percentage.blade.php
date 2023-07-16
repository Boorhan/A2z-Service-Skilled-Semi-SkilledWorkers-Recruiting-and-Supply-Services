 @extends('layouts.admin')
 @section('title', 'Service Percentage Setup')
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
                <h3 class="card-title">Service Percentage Setup</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{url('update-service-percentage/'.$servicePercent->id)}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Percentage</label>
                    <div class="col-sm-9" style="display: flex">
                      <input type="text" class="form-control  @error('service_percentage') is-invalid @enderror" name="service_percentage" value="{{$servicePercent->service_percentage}}" style="width: 95%"> <span style="padding-left: 5px;padding-top: 5px;">%</span>
                      @error('service_percentage')
                        <div class="text-danger ">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Update</button>
                  <a class="btn btn-default" href="{{route('dashboard')}}">Cancel</a>
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