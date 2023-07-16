 @extends('layouts.admin')
 @section('title', 'Users Canceled Orders')
 @section('content')
  <!-- Main content -->
    <section class="content" style="padding-top: 20px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm"></div>
          <div class="col-md-12">

            <div class="card card-info">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h3 class="card-title">User's Canceled Orders</h3>
                  </div>
                  <div class="col text-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Order No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Serving Time</th>
                    <th>Customer Info</th>
                    <th>Service Cost</th>
                    <th>Manage</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($pending_order as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td style="min-width: 100px;">{{$row->order_number}}</td>
                        <td style="min-width: 100px;">{{$row->service_name}}</td>
                        <td><a href="{{asset('public/uploads/'.$row->service_image)}}" target="_blank"><img src="{{asset('public/uploads/'.$row->service_image)}}" style="height: 100px;width: 150px;"></a></td>
                        <td style="min-width: 80px;">Date: {{$row->order_date}}, Time: {{$row->order_time}}</td>
                        <td style="min-width: 150px;">Name: {{$row->customer_name}}, Phone: {{$row->customer_phone}}, Address: {{$row->order_address}}</td>
                        <td style="min-width: 100px;">Hours: {{$row->service_hours}} | Rate: {{$row->service_charge}} | Total Cost: {{$row->total_service_cost}}</td>
                        <td class="text-center">
                          <a href="{{url('order-details/'.$row->service_request_no)}}" class="btn btn-success" id="update" title="delete" style="margin-bottom: 5px;width: 80px;"><i class="fas fa-eye"></i> View</a>
                          <!-- <a href="{{url('assign-sp/'.$row->service_request_no)}}" class="btn btn-primary" id="update" title="delete" style="width: 140px;margin-bottom: 5px;"><i class="fas fa-user-plus"></i> Assign SP</a>
                          <a href="{{url('change-order-status/'.$row->service_request_no)}}" class="btn btn-info" id="update" title="delete" style="width: 142px;margin-bottom: 5px;"><i class="fas fa-cog"></i> Change Status</a>
                            <a href="{{url('cancel-order/'.$row->service_request_no)}}" class="btn btn-danger" id="delete" title="delete"><i class="fas fa-trash"></i> Cancel</a> -->
                          
                         </td>
                      </tr>
                    @endforeach
                  </tbody>                
                </table>
              </div>
            </div>
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