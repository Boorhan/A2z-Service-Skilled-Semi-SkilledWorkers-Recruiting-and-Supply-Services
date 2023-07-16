@extends('layouts.website')
@section('title', 'Booked Service')
@section('web_content')

    <section id="service-subcategory" class="order-section">
      <div class="container">
          <div class="row">
            <div class="col" style="padding: 0px;">
                <div class="col-sm-12 service-col" style="padding: 0px;margin-top: 20px;">
                    <div class="order-content " style="padding:10px 20px;font-size: 20px;color: #156e15;font-weight: bold;">
                      Service Booked Successfully
                    </div>
                  </div>
                

                <div class="row">
                    <div class="col-sm-12 service-col">
                      <div class="order-content orderContent" style="padding:20px;">
                        <h5>Service Details</h5>
                        <p style="padding-top: 5px;margin:0px;font-weight: bold;">Service ID: {{$service_dlt->order_number}}</p>
                        <p style="border-bottom:1px dashed #444;padding-bottom: 3px;">Service Name: {{$service_dlt->service_name}}</p>
                        <span>Category: {{$service_dlt->category_name}}</span> | <span>Subcategory: {{$service_dlt->sub_category_name}}</span> |<span>Service Type: {{$service_dlt->service_type_name}}</span> <br>
                        <span>Service Details: {{$service_dlt->service_details}}</span>
                      </div>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-sm-12 service-col" style="padding-bottom: 0px;">
                      <div class="order-content orderContent" style="padding:20px;">
                        <h5>Order Details</h5>
                        <span>Order Date: {{$service_dlt->order_date}}</span> | <span>Order Time: {{$service_dlt->order_time}}</span> | <span>Order Placed At: {{$service_dlt->created_at}}</span><br>
                        <span>Address: {{$service_dlt->order_address}}</span><br>
                        <span>Service Rate: {{$service_dlt->service_charge}} BDT</span> | @if($service_dlt->service_hours != "") <span>Service Hours: {{$service_dlt->service_hours}}</span> | @endif <span>Total Cost: {{$service_dlt->total_service_cost}} BDT</span>
                        <div style="display: flex;justify-content: center;padding: 20px 0px;">
                          <button class="btn btn-primary btn-lg bookServiceBtnLg" onclick="window.location='{{ url('all-service') }}'" style="margin-top: 5px;">Book Another Service</button>
                          <button class="btn btn-info btn-lg bookServiceBtnLg" onclick="window.location='{{ url('user/dashboard') }}'" style="margin-top: 5px;margin-left: 5px">Dashboard</button>
                        </div>
                      </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
      </div>
    </section>
@endsection