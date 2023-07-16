 @extends('layouts.admin')
 @section('title', 'Update Order Status')
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
                <h3 class="card-title">Update Order Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{url('change-order-status/update/'.$get_order->service_request_no)}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                   <input type="hidden" name="assigned_sp_no" value="{{$get_order->assigned_sp_no}}">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Order Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="order_status_no">
                        <option value="-1" disabled selected>--Select Status--</option>
                        @foreach($order_status as $data)
                          <option value="{{$data->order_status_no}}" <?php if ($get_order->order_status_no==$data->order_status_no) echo "selected";?>>{{$data->order_status}}</option>
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
                  <button type="submit" class="btn btn-info">Update Status</button>
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