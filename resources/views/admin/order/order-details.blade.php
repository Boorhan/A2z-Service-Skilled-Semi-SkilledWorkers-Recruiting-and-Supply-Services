 @extends('layouts.admin')
 @section('title', 'All Categories')
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
                  <div class="col text-left" style="max-width: 100px;">
                      <a href="{{ URL::previous() }}"><i class="fas fa-chevron-left"></i> Back</a>
                  </div>
                  <div class="col">
                    <h3 class="card-title">Order Details</h3>
                  </div>
                  
                </div>
              </div>
              <div class="card-body">
                <div style="width: 80%;margin:auto;">
                <table class="table table-bordered table-striped">
                  <tbody>
                  <tr>
                    <th>Order ID</th>
                    <td style="font-weight: bold;">{{$order_dlt->order_number}}</td>
                  </tr>
                  <tr>
                    <th>Assigned SP</th>
                    <td>{{$order_dlt->name}} , {{$order_dlt->phone}}</td>
                  </tr>
                  <tr>
                    <th>Order Status</th>
                    <td style="font-weight: bold;">
                      @if($order_dlt->canceled_by_customer ==1)
                        <span style="color: #f00">Canceled by customer</span>
                      @elseif($order_dlt->canceled_by_customer ==0 && $order_dlt->order_status_no <=3)
                        {{$order_dlt->order_status}}
                      @else
                        <span style="color: #f00">Canceled by Admin</span>
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Title</th>
                    <td>{{$order_dlt->service_name}}</td>
                  </tr>
                  <tr>
                    <th>Image</th>
                    <td><img src="{{asset('public/uploads/'.$order_dlt->service_image)}}" style="height: 100px;width: 150px;"></td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td>{{$order_dlt->category_name}}</td>
                  </tr>
                  <tr>
                    <th>Subcategory</th>
                    <td>{{$order_dlt->sub_category_name}}</td>
                  </tr>

                  <tr>
                    <th>Customer Name</th>
                    <td>{{$order_dlt->customer_name}}</td>
                  </tr>
                  <tr>
                    <th>Customer Phone</th>
                    <td>{{$order_dlt->customer_phone}}</td>
                  </tr>
                  <tr>
                    <th>Service Type</th>
                    <td>{{$order_dlt->service_type_name}}</td>
                  </tr>
                  <tr>
                    <th>Service Date</th>
                    <td>{{$order_dlt->order_date}}</td>
                  </tr>
                  <tr>
                    <th>Service Time</th>
                    <td>{{$order_dlt->order_time}}</td>
                  </tr>
                  <tr>
                    <th>Order Placed At</th>
                    <td>{{$order_dlt->created_at}}</td>
                  </tr>
                  
                  <tr>
                    <th>Service Hours</th>
                    <td>{{$order_dlt->service_hours}}</td>
                  </tr>
                  <tr>
                    <th>Service Rate</th>
                    <td>{{$order_dlt->service_charge}}</td>
                  </tr>
                  <tr>
                    <th>Total Cost</th>
                    <td>{{$order_dlt->total_service_cost}}</td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td>{{$order_dlt->order_address}}</td>
                  </tr>
                  <tr>
                    <th>Customer's Note</th>
                    <td>{{$order_dlt->customer_note}}</td>
                  </tr>
                  <tr>
                    <th>Admin's Note</th>
                    <td>{{$order_dlt->admin_note}}</td>
                  </tr>
                  <tr>
                    <th>SP's Note</th>
                    <td>{{$order_dlt->service_provider_note}}</td>
                  </tr>
                    
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