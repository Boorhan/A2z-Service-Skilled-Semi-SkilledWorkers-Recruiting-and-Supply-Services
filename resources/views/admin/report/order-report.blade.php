 @extends('layouts.admin')
 @section('title', 'Order Report')
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
                    <h3 class="card-title">Order Report</h3>
                  </div>
                  <div class="col text-right">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div style="overflow: auto;">
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Order No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Serving Time</th>
                    <th>Customer Info</th>
                    <th>Assigned SP</th>
                    <th>Service Cost</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    @php($i=1)
                    @foreach($orders as $row)

                      <tr>
                        <td>{{$i++}}</td>
                        <td style="min-width: 100px;">{{$row->order_number}}</td>
                        <td style="min-width: 100px;">{{$row->service_name}}</td>
                        <td><a href="{{asset('public/uploads/'.$row->service_image)}}" target="_blank"><img src="{{asset('public/uploads/'.$row->service_image)}}" style="height: 100px;width: 150px;"></a></td>
                        <td style="min-width: 80px;">Date: {{$row->order_date}}, Time: {{$row->order_time}}</td>
                        <td style="min-width: 150px;">name: {{$row->customer_name}}, Phone: {{$row->customer_phone}}, Address: {{$row->order_address}}</td>
                        <td>{{$row->name}}, {{$row->phone}}</td>
                        <td style="min-width: 100px;">Hours: {{$row->service_hours}} | Rate: {{$row->service_charge}} | Total Cost: {{$row->total_service_cost}}</td>
                        <td style="text-align: center;">
                          @if($row->canceled_by_customer ==1)
                              <span style="color: #f00">Canceled by Customer</span>
                            @elseif($row->canceled_by_customer ==0 && $row->order_status_no <=3)
                              {{$row->order_status}}
                            @else
                              <span style="color: #f00">Canceled by Admin</span>
                            @endif
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