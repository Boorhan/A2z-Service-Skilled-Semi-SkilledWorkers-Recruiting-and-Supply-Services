@extends('layouts.website')
@section('title', 'Service Page')
@section('web_content')
 	
	 <section id="service-banner" class="d-none d-sm-block">
            <div class="service-banner-text">
                {{$service_dlt->service_name}}
            </div>
        </section>


        <section id="service-subcategory" style="padding-top:20px;padding-bottom: 0px;">
          <div class="container">
              <div class="row">
                <div class="col-12">
                    <p class="d-block d-sm-none service-charge">{{$service_dlt->service_name}}</p>
                </div>
                <div class=" col-7  service-col service-details-img" >
                     <img src="{{asset('public/uploads/'.$service_dlt->service_image)}}" class="img-fluid img-thumbnail">
                  </div>
                  <div class=" col-5  service-col sd_rightContent">
                    <p class="service-charge">Service Rate: {{$service_dlt->service_charge}} BDT</p>
                    <p >Category: {{$service_dlt->category_name}}</p>
                    <p >Subcategory: {{$service_dlt->sub_category_name}}</p>
                    <p >Service Type: {{$service_dlt->service_type_name}}</p>
                     <button class="btn btn-primary btn-lg bookServiceBtnLg" onclick="window.location='{{ url('book-service/'.$service_dlt->service_slug.'/'.$service_dlt->service_no) }}'" style="margin-top: 5px;">Book Service</button>
                  </div>
                </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 service-col service-details-content">
                            <h5>Service Details</h5>
                            <p >{{$service_dlt->service_details}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-12 service-col service-details-content">
                            <h5>What's Included</h5>
                            <p >{{$service_dlt->what_included}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-12 service-col service-details-content">
                            <h5>What's Excluded</h5>
                            <p >{{$service_dlt->what_excluded}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-12 service-col service-details-content">
                            <h5>Payment Details</h5>
                            <p >{{$service_dlt->payment_details}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-lg-12 service-col service-details-content">
                            <h5>Terms & Conditions</h5>
                            <p >{{$service_dlt->terms_condition}}</p>
                        </div>
                    </div>
                    
          </div>
        </section>
@endsection