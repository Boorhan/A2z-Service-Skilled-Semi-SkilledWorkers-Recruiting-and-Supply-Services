 @extends('layouts.admin')
 @section('title', 'Assign Service Provider')
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
                <h3 class="card-title">Assign Service Provider</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{url('assign-sp/submit/'.$get_order->service_request_no)}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Service Provider</label>
                    <div class="col-sm-9">
                      <select class="form-control search" name="assigned_sp_no">
                        @foreach($get_sp as $data)
                          <option value="{{$data->user_no}}" >{{$data->name}} ---  {{$data->phone}}</option>
                        @endforeach
                      </select>
                     
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Admin Note</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="admin_note">{{$get_order->admin_note}}</textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                  <button type="submit" class="btn btn-info">Assign Service Provider</button>
                  <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                  
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