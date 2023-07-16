@extends('website.dashboard.index')
@section('title', 'Order Details')
@section('user_dashboard')

    <section id="service-subcategory" class="top">
      <div class="container">
          <div class="row">
            <div class="col p_0" >
                <div class="section-heading">
                  <h4>Order Details</h4>
                </div>
                  <div class="service-details-content" style="padding:10px 20px;margin-top: 0px;">
                      <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                          <th>Order ID</th>
                          <td style="font-weight: bold;">{{$order_dlt->order_number}}</td>
                        </tr>
                         <tr>
                          <th>Assigned SP</th>
                          @if($order_dlt->assigned_sp_no =="")
                            <td>No Service Provider assigned yet</td>
                          @elseif(Auth::guard('web')->user()->user_no == $order_dlt->assigned_sp_no)
                            <td style="color: #0100ff;font-weight:bold;">Me</td>
                          @else
                            <td>{{$order_dlt->name}} , {{$order_dlt->phone}}</td>
                          @endif
                        </tr>
                        @if(Auth::guard('web')->user()->user_type ==1)
                            <tr>
                              <th>Customer Name</th>
                              <td>{{$order_dlt->customer_name}}</td>
                            </tr>
                            <tr>
                              <th>Customer Phone</th>
                              <td>{{$order_dlt->customer_phone}}</td>
                            </tr>
                            <tr>
                              <th>Order Address</th>
                              <td style="font-weight:bold;">{{$order_dlt->order_address}} </td>
                            </tr>
                        @endif
                        <tr>
                          <th>Order Status</th>
                            @if($sp_allCancled_order_count ==0)
                              <td style="font-weight: bold;">
                                @if($order_dlt->canceled_by_customer ==1)
                                  <span style="color: #f00">Canceled by Me</span>
                                @elseif($order_dlt->canceled_by_customer ==0 && $order_dlt->order_status_no <=3)
                                  {{$order_dlt->order_status}}
                                @else
                                  <span style="color: #f00">Canceled by Admin</span>
                                @endif
                              </td>
                            @else
                              <td style="font-weight: bold;"><span style="color: #f00">Canceled by Me</span></td>
                            @endif
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
                          <th>Title</th>
                          <td>{{$order_dlt->sub_category_name}}</td>
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
                        @if(Auth::guard('web')->user()->user_type==1)
                          <tr>
                            <th>My Percentage</th>
                            <td>{{$order_dlt->total_percentage_amt}}</td>
                          </tr>
                        @endif
                        <tr>
                          <th>Address</th>
                          <td>{{$order_dlt->order_address}}</td>
                        </tr>
                        <tr>
                          <th>Service Details</th>
                          <td>{{$order_dlt->service_details}}</td>
                        </tr>
                        <tr>
                          <th>What's Included</th>
                          <td>{{$order_dlt->what_included}}</td>
                        </tr>
                        <tr>
                          <th>What's Excluded</th>
                          <td>{{$order_dlt->what_excluded}}</td>
                        </tr>
                        <tr>
                          <th>Terms & Conditions</th>
                          <td>{{$order_dlt->terms_condition}}</td>
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
        </div>
      </div>
    </section>
    <style type="text/css">tr th{width: 30%;}</style>
  @endsection