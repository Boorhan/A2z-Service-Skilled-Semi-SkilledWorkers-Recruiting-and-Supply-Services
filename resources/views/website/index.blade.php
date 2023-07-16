@extends('layouts.website')
@section('title', 'Home')
@section('web_content')
    <section id="top-banner">
        <div class="top-banner-text">
            We are here to make your life easy
        </div>
    </section>

    <section id="cateogry-slider-section">
      <div class="container" >
        <div class="row">
            <div class="col">
                <div id="cateogry-slider">
                    <div class="slider responsive">
                        @foreach($get_cat as $cat)
                          <a href="{{url('service/'.$cat->category_slug.'/'.$cat->category_no)}}">
                            <img src="{{asset('public/uploads/'.$cat->category_image)}}">
                            <p>{{$cat->category_name}}</p>
                          </a>
                        @endforeach
                    </div>
                </div> 
                
            </div>
        </div>
      </div>
    </section>

    <section id="service-subcategory">
      <div class="container">
          <div class="row">
            <div class="col">
                <div class="section-heading">
                  <h4>Choose Our Services</h4>
                </div>

                <div class="row">
                    @foreach($get_subCat as $subcat)
                        <div class="col-md-4 col-lg-3 col-sm-6 subcat-col">
                            <a href="{{url('service/'.$subcat->sub_category_slug.'/'.$subcat->subcategory_no)}}" class="subcat-content subcat-content-sm">
                                <img src="{{asset('public/uploads/'.$subcat->sub_category_image)}}" class="img-fluid" style="height: 205px;width: 255px;">
                                <p>{{$subcat->sub_category_name}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
      </div>
    </section>

    <section id="why-choose-us" >
        <div class="container">
          <div class="row">
            <div class="col">
                <div class="section-heading">
                  <h4>Why Choose Us</h4>
                </div>

                <div class="row">
                    <div class="col-md-8 col-lg-6 col-sm-12 why-choose-us-col-left">
                      <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <div class="why-choose-us-left">
                                <img src="{{asset('public/contents/website')}}/img/usp-1.svg" class="img-fluid">
                                <p>Enhanced Security</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-choose-us-left">
                                <img src="{{asset('public/contents/website')}}/img/usp-2.svg" class="img-fluid">
                                <p>24/7 Support</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-choose-us-left">
                                <img src="{{asset('public/contents/website')}}/img/usp-3.svg" class="img-fluid">
                                <p>Expert Professional</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="why-choose-us-left">
                                <img src="{{asset('public/contents/website')}}/img/usp-4.svg" class="img-fluid">
                                <p>Rework Assurance</p>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-lg-6 col-sm-12 why-choose-us-col">
                        <img src="{{asset('public/contents/website')}}/img/order.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>

    <section id="contact-us" >
        <div class="container">
          <div class="row">
            <div class="col col-md-3 d-none d-md-block">
                <div class="contact-image">
                    <img src="{{asset('public/contents/website')}}/img/cc.png">
                </div>
            </div>
            <div class="col">
                <div class="">
                  <h4 class="contactus-h4">Doesn't match with your desired service? Let us know of your customized service. We are 24/7 on your service.</h4>
                  <button id="contactBtn1">Request New Service</button>
                  <a href="tel:+8801680651228" id="contactBtn2">Call 16200</a>
                </div>
            </div>
        </div>
      </div>
    </section>
@endsection