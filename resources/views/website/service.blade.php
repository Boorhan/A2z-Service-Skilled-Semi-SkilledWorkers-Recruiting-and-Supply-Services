@extends('layouts.website')
@section('title', 'Service Page')
@section('web_content')
 	
	<section id="service-banner" class="d-none d-sm-block">
            <div class="service-banner-text">
                Service
            </div>
        </section>


        <section id="service-subcategory" style="padding-bottom: 0px;">
          <div class="container">
              <div class="row">
                <div class="col">
                   <!--  <div class="section-heading ">
                      <h4></h4>
                    </div> -->

                    <div class="row">
                        @if($count_service <1)
                           <div class="col-12 service-content service-content-sm" style="padding: 20px 30px;">
                                No availble service for this criteria.
                            </div>
                        @else
                        	@foreach($get_service as $service)
    	                        <div class="col-sm-12 col-lg-10 offset-lg-1 service-col" style="padding: 0px;margin-bottom:15px;">
    	                            <a href="{{url('service-details/'.$service->service_slug.'/'.$service->service_no)}}" class="service-content service-content-sm">
    	                              <div class="row" style="padding: 0px 15px">
    	                                  <div class="col-3 service-left">
    	                                      <img src="{{asset('public/uploads/'.$service->service_image)}}" class="img-fluid">
    	                                  </div>
    	                                  <div class="col-9 service-right">
    	                                    <p>{{$service->service_name}}</p>
    	                                    <p>{{$service->category_name}} | {{$service->sub_category_name}}</p>
    	                                    <p><span class="service-charge">{{$service->service_charge}} BDT</span> , Service Type: <span class="badge badge-info">{{$service->service_type_name}}</span> </p>
    	                                    <p class="s_details_height">{{$service->service_details}}</p>
    	                                    <button class="btn btn-success bookServiceBtn" onclick="window.location='{{ url('service-details/'.$service->service_slug.'/'.$service->service_no) }}'" style="margin-top: 5px;">View Details</button>
    	                                  </div>
    	                              </div>
    	                            </a>
    	                            
    	                            <button class="btn btn-primary bookServiceBtn" id="bookServiceBtn1" onclick="window.location='{{ url('book-service/'.$service->service_slug.'/'.$service->service_no) }}'" style="margin-top: 5px;">Book Service</button>
    	                        </div>
    	                    @endforeach
    	                @endif
                    </div>
                    
                </div>
            </div>
          </div>
        </section>

        <style type="text/css">
        	
        	#bookServiceBtn,#bookServiceBtn1{opacity: 0;bottom: 0;position: absolute;}
        	.service-col:hover{background-color: #eee;opacity:.9}
        	.service-col:hover #bookServiceBtn,.service-col:hover #bookServiceBtn1{opacity: 1;bottom: 50%;margin-left: 10px;}
        </style>
@endsection