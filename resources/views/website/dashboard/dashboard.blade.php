@extends('website.dashboard.index')
@section('title', 'User Dashboard')
@section('user_dashboard')

    <section id="service-subcategory" class="top">
      <div class="container">
          <div class="row">
            <div class="col p_0" >
                <div class="col-12" style="padding: 0px;">
                    <div class="row">
                        @if(Auth::guard('web')->user()->user_type==1)
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">New Requests : {{$sp_Cnew_request}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Completed Orders : {{$sp_C_comp_order}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Canceled Orders : {{$sp_C_canc_order}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Earnings : {{$sp_total_earning}} BDT</h5>
                                </div>
                            </div>
                        @elseif(Auth::guard('web')->user()->user_type==2)
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Pending Orders: {{$user_c_pend_order}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Ongoing : {{$user_c_proc_order}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Completed Orders : {{$user_c_comp_order}}</h5>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-3 ">
                                <div class="service-details-content ">
                                  <h5 style="font-weight: 600;text-align:center">Canceled : {{$user_c_canc_order}}</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                  </div>
                

                <div class="row">
                    <div class="col-12 service-col">
                      @if(Auth::guard('web')->user()->user_type==1)

                        @if($sp_Cnew_request <1)
                          <div class="service-details-content" style="padding:10px 20px;">
                              You don't have any service request.
                            
                          @elseif($sp_Cnew_request >=1)
                            <h5 style="margin-top: 35px;" class="myOrderH4">New Requests For Me</h5>
                            @foreach($sp_new_request_list as $my_order)
                              <div class="service-details-content" style="padding:0px 20px;">
                                <div class="row">
                                    <div class="col-9 col-sm-10">
                                        <div class="row" style="#padding: 0px 15px">
                                          <div class="col-4 service-left">
                                              <img src="{{asset('public/uploads/'.$my_order->service_image)}}" style="height: 100px;width: 100px;padding:5px;">
                                          </div>
                                          <div class="col-8 service-right">
                                            <p>{{$my_order->service_name}}</p>
                                            <p>{{$my_order->category_name}} | {{$my_order->sub_category_name}} |  Status: 
                                            @if($my_order->canceled_by_customer ==1)
                                          <span class="badge badge-danger">Canceled by Me</span>
                                            @elseif($my_order->canceled_by_customer ==0 && $my_order->order_status_no <=3)
                                              <span class="badge badge-success">{{$my_order->order_status}}</span>
                                            @else
                                              <span class="badge badge-danger">{{$my_order->order_status}}</span>
                                            @endif
                                            </p>
                                            <p><span >@if($my_order->service_hours >0)Hours:@endif {{$my_order->service_hours}} @if($my_order->service_hours >0)|@endif Rate: {{$my_order->service_charge}} BDT, </span><span class="service-charge">Total Cost: {{$my_order->total_service_cost}}</span> , Service Type: <span class="badge badge-info">{{$my_order->service_type_name}}</span> </p>
                                            <p>Customer Name: {{$my_order->customer_name}} | Phone: {{$my_order->customer_phone}} |  Address: {{$my_order->order_address}}</p>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-3 col-sm-2" style="display: flex;justify-content: center;align-items: center;">
                                        <a href="{{ url('my-order-details/'.$my_order->service_slug.'/'.$my_order->service_request_no)}}" data-toggle="tooltip" data-placement="bottom" title="View Details"><i class="fa fa-eye text-info" aria-hidden="true"></i> </a>
                                        <a href="{{ url('approve-sp-order/'.$my_order->service_slug.'/'.$my_order->service_request_no)}}" style="margin-left:10px" data-toggle="tooltip" data-placement="bottom" title="Approve Request"><i class="fa fa-check text-success" aria-hidden="true"></i></a>
                                        <a href="{{ url('cancel-sp-order/'.$my_order->service_slug.'/'.$my_order->service_request_no)}}" style="margin-left:10px;margin-top:5px;" data-toggle="tooltip" data-placement="bottom" title="Cancel Request"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                          @endif
                        

                      @elseif(Auth::guard('web')->user()->user_type==2)

                        @if($user_total_order >0)<h5 style="margin-top: 35px;" class="myOrderH4">My Orders</h5>@endif
                            
                        @if($user_total_order <1)
                          <div class="service-details-content" style="padding:10px 20px;">
                              You haven't place any order yet! To place oder <a href="{{route('webservice.all')}}" style="color: #007bff !important;text-decoration: underline;">click here</a>
                            
                          @elseif($user_total_order >=1)
                            @foreach($user_order_list as $my_order)
                              <div class="service-details-content" style="padding:0px 20px;">
                                <div class="row">
                                    <div class="col-9 col-sm-10">
                                        <div class="row" style="#padding: 0px 15px">
                                          <div class="col-4 service-left">
                                              <img src="{{asset('public/uploads/'.$my_order->service_image)}}" style="height: 100px;width: 100px;padding:5px;">
                                          </div>
                                          <div class="col-8 service-right">
                                            <p>{{$my_order->service_name}}</p>
                                            <p>{{$my_order->category_name}} | {{$my_order->sub_category_name}} |  Status: 
                                            @if($my_order->canceled_by_customer ==1)
                                          <span class="badge badge-danger">Canceled by Me</span>
                                            @elseif($my_order->canceled_by_customer ==0 && $my_order->order_status_no <=3)
                                              <span class="badge badge-success">{{$my_order->order_status}}</span>
                                            @else
                                              <span class="badge badge-danger">{{$my_order->order_status}}</span>
                                            @endif
                                            </p>
                                            <p><span >@if($my_order->service_hours >0)Hours:@endif {{$my_order->service_hours}} @if($my_order->service_hours >0)|@endif Rate: {{$my_order->service_charge}} BDT, </span><span class="service-charge">Total Cost: {{$my_order->total_service_cost}}</span> , Service Type: <span class="badge badge-info">{{$my_order->service_type_name}}</span> </p>
                                            <p class="s_details_height" style="padding-top: 5px;">{{$my_order->service_details}}</p>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-3 col-sm-2" style="display: flex;justify-content: center;align-items: center;">
                                        <a href="{{ url('my-order-details/'.$my_order->service_slug.'/'.$my_order->service_request_no)}}" data-toggle="tooltip" data-placement="bottom" title="View Details"><i class="fa fa-eye text-info" aria-hidden="true"></i></a>
                                        @if($my_order->canceled_by_customer ==0 && $my_order->is_assigned ==0)
                                            <a href="{{ url('cancel-user-order/'.$my_order->service_slug.'/'.$my_order->service_request_no)}}" style="margin-left:10px" data-toggle="tooltip" data-placement="bottom" title="Cancel Order"><i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                                        @endif
                                    </div>
                                </div>
                              </div>
                            @endforeach
                          @endif
                        </div>
                      @endif
                    </div>
                    
                </div>
                
            </div>
        </div>
      </div>
    </section>
  @endsection