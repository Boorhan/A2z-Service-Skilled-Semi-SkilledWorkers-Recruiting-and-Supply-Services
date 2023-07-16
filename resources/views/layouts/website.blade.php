<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>A2Z SERVICE | @yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    

    <link rel="stylesheet" type="text/css" href="{{asset('public/contents/website')}}/css/fonts/slick.woff">
    <link rel="stylesheet" type="text/css" href="{{asset('public/contents/website')}}/css/fonts/slick.ttf">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!--    slick css-->
    <link rel="stylesheet" href="{{asset('public/contents/website')}}/css/slick.css"/>
    <link rel="stylesheet" href="{{asset('public/contents/website')}}/css/slick-theme.css"/>

    <!--theme custom css -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/contents/website')}}/css/style.css">
    <!-- toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <title>A2Z Services</title>
  </head>
  <body>
      
      <div class="loader">
        <span class="loader-inner-1"></span>
        <span class="loader-inner-2"></span>
        <span class="loader-inner-3"></span>
        <span class="loader-inner-4"></span>
      </div>

      <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- header section -->
                    <section id="header">
                        <nav class="navbar navbar-expand-lg navbar-light fixed-top"> 
                          <div class="container">
                              <a class="navbar-brand" href="{{route('home')}}">A2Z SERVICES</a>
                              <div class="col-8 d-none d-lg-block">
                                  <form class="search" method="post" action="" >
                                   <input type="text" name="q" placeholder="Search for services" id="myInput" onkeyup="myFunction()"/>
                                   <ul class="results" id="myUL">
                                      @php
                                        $get_subCats = DB::table('subcategories')
                                                     ->where('subcategories.is_deleted',0)
                                                     ->get();
                                      @endphp
                                      @foreach($get_subCats as $subcat)
                                        <li><a href="{{url('service/'.$subcat->sub_category_slug.'/'.$subcat->subcategory_no)}}"><span>{{$subcat->sub_category_name}}</span> <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                      @endforeach
                                      
                                   </ul>
                                 </form>
                              </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav ml-auto">
                                
                                <li class="nav-item">
                                  <a class="nav-link" href="{{url('all-service')}}">All Services</a>
                                </li>
                                <!-- <li class="nav-item">
                                  <a class="nav-link" href="{{route('login')}}">Login</a>
                                </li> -->
                                  @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" >
                                                <a class="dropdown-item" href="{{ route('user.dashboard') }}" style="font-size: 14px;">
                                                    Dashboard
                                                </a>
                                                <a class="dropdown-item" href="{{ route('user.logout') }}" style="border-top: 1px solid #eee;font-size: 14px;">
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    @endguest
                                
                              </ul>
                            </div>
                          </div>
                          
                        </nav>
                    </section>
                </div>
            </div>
        </div>

          @yield('web_content')

        <section id="project-counter">
          <div class="container">
              <div class="row">
                <div class="col">
                    <div class="counter-heading section-heading">
                      <h4>Our Achievements</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-6 counter-col">
                          <div class="counter-content">
                            <p class="counter-number">30</p>
                            <p class="counter-p">Service Categories</p>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6 counter-col">
                          <div class="counter-content">
                            <p class="counter-number">1200+</p>
                            <p class="counter-p">Service Provided</p>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6 counter-col">
                          <div class="counter-content">
                            <p class="counter-number">90+</p>
                            <p class="counter-p">Service Providers</p>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-6 counter-col">
                          <div class="counter-content">
                            <p class="counter-number">230+</p>
                            <p class="counter-p">Happy Customers</p>
                          </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
          </div>
        </section>

        <footer id="footer-section" >
            <div class="container">
              <div class="row">
                <div class="col col-md-4 offset-md-1">
                    <div class="footer-left">
                      <div class="row">
                        <div class="col footer-left-contact">
                            <h4>Contact</h4>
                            <p>16200</p>
                            <p>info@a2z.com</p>
                            <p>House #63 (1st Floor)
                              Road #04, Block-C
                              Banani, Dhaka 1213</p>
                        </div>
                        <div class="col footer-left-menu">
                            <h4>Company</h4>
                            <ul>
                              <li><a href="">All Services</a></li>
                              <li><a href="">Registration</a></li>
                              <li><a href="">My Account</a></li>
                              <li><a href="">Contact</a></li>
                              <li><a href="">Support</a></li>
                              <li><a href="">Career</a></li>
                              <li><a href="">Privacy Policy</a></li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="footer-right">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <div class="footer-right-social-icon">
                          <ul>
                              <li><a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                              <li><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                              <li><i class="fa fa-linkedin-square" aria-hidden="true"></i></li>
                              <li><i class="fa fa-youtube-play" aria-hidden="true"></i></li>
                          </ul>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <p class="footer-copyright">&copy; 2020. A2Z SERVICES | All Rights Reserved.</p>
              </div>
              
            </div>
          </div>
        </footer>

      </div>  

        

        

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

      <!--    slick slider js start-->
      <script src="{{asset('public/contents/website')}}/js/slick.js"></script>
      <!--    slick slider js ends-->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
      <!-- toaster start -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <script>
          @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
              case 'info':
                     toastr.info("{{ Session::get('messege') }}");
              break;
              case 'success':
                     toastr.success("{{ Session::get('messege') }}");
              break;
              case 'warning':
                      toastr.warning("{{ Session::get('messege') }}");
              break;
              case 'error':
                      toastr.error("{{ Session::get('messege') }}");
              break;
            }
          @endif
      </script>
    <!-- toaster end -->

      <script type="text/javascript">
        

        $(document).ready(function() {
          //slick slider js
            $('.responsive').slick({
                // dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 5,
                slidesToScroll: 1,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1,
                        // centerMode: true,

                    }

                }, {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2,
                        dots: true,
                        infinite: true,

                    }


                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        infinite: true,
                        
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        infinite: true,
                        autoplay: true,
                        autoplaySpeed: 2000,
                    }
                }]
            });



            //calculate service cost in service  order page

            $(".serviceHour").keyup(function(){
                var hour = $(this).val();
                var rate = $("#serviceRate").val();
                if (hour != "") {
                  var serviceCost = hour * rate;
                  $('.serviceCost').text("Total Cost: "+ serviceCost + ' BDT');
                }else{
                  $('.serviceCost').text(" ");
                }
                
               
                
            })
        });

        // loader js
        $(window).on('load', function () {
            
            $(".loader").hide("slow");
            $(".body-content").show("slow");
       });

        //counter js
      </script>

      <!-- html custom search table -->
      <script>
        function myFunction() {
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          ul = document.getElementById("myUL");
          li = ul.getElementsByTagName("li");
          for (i = 0; i < li.length; i++) {
              a = li[i].getElementsByTagName("a")[0];
              txtValue = a.textContent || a.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
              } else {
                  li[i].style.display = "none";
              }
          }
      }
        </script>
  </body>
</html>