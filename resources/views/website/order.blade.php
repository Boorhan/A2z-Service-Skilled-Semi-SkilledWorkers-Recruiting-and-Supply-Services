@extends('layouts.website')
@section('title', 'Book Service')
@section('web_content')

    <section id="service-subcategory" class="order-section">
      <div class="container">
          <div class="row">
            <div class="col">
                <div class="col-sm-12 col-lg-10 offset-lg-1 section-heading ">
                  <h4>Book Service</h4>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-lg-10 offset-lg-1 service-col">
                      <div class="order-content orderContent" style="padding:50px 100px">
                        <p style="border-bottom:1px dashed #444;padding-bottom: 3px;">Service Name: {{$service_dlt->service_name}}</p>
                        <span>Category: {{$service_dlt->category_name}}</span> | <span>Subcategory: {{$service_dlt->sub_category_name}}</span> | <span>Rate: {{$service_dlt->service_charge}} BDT</span> | <span>Service Type: {{$service_dlt->service_type_name}}</span>
                        
                      </div>
                      <div class="order-content orderContent2" style="padding: 100px 200px">
                        <form action="{{route('order.submit')}}" method="Post">
                          @csrf
                          <input type="hidden" name="category_no" value="{{$service_dlt->category_no}}">
                          <input type="hidden" name="subcategory_no" value="{{$service_dlt->subcategory_no}}">
                          <input type="hidden" name="service_no" value="{{$service_dlt->service_no}}">
                          <input type="hidden" id="serviceRate" name="serviceRate" value="{{$service_dlt->service_charge}}">
                          <div class="row">
                              <div class="col-3">
                                <label class="label">Date</label>
                              </div>
                              <div class="col-9">
                                <input class="myInput" type="date" name="order_date" placeholder="Phone Number">
                                @error('order_date')
                                  <div class="text-danger ">{{ $message }}</div>
                                @enderror
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-3">
                                <label class="label">Time</label>
                              </div>
                              <div class="col-9">
                                <input class="myInput" type="time" name="order_time" placeholder="Phone Number">
                                @error('order_time')
                                  <div class="text-danger ">{{ $message }}</div>
                                @enderror
                              </div>
                          </div>
                          @if($service_dlt->service_type_no ==1)
                            <div class="row">
                                <div class="col-3">
                                  <label class="label">Hours</label>
                                </div>
                                <div class="col-9">
                                  <input class="myInput serviceHour" type="number" name="service_hours" placeholder="Service Hour (ex:3)">
                                  @error('order_time')
                                    <div class="text-danger ">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-3">
                                
                              </div>
                              <div class="col-9" style="margin-bottom: 20px;margin-top: -19px;#display: none">
                                <span class="serviceCost" style="font-size: 16px;font-weight: bold"> </span>
                              </div>
                            </div>
                          @endif
                          <div class="row">
                              <div class="col-3">
                                <label class="label">Address</label>
                              </div>
                              <div class="col-9">
                                <textarea class="myInput" name="order_address" style="resize: none;margin-bottom: 0px;">{{Auth::guard('web')->user()->user_address}}</textarea>
                                @error('order_address')
                                  <div class="text-danger " style="margin-top: 0px;">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="col-3">
                                <label class="label"></label>
                              </div>
                              <div class="col-9" style="margin-bottom: 20px;">
                                <span style="font-size: 12px;color: #ccc">Ex: Flat No, House No, Road No, Area</span>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-3">
                                <label class="label">Note (If any)</label>
                              </div>
                              <div class="col-9">
                                <textarea class="myInput" name="customer_note" style="resize: none;" placeholder=""></textarea>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-3">
                                <label></label>
                              </div>
                              <div class="col-9">
                                <input type="submit" name="" value="Book Service" class="loginBtn">
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
      </div>
    </section>
@endsection