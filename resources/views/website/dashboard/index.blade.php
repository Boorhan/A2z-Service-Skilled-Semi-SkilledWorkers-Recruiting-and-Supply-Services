<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    

    <title>A2Z Services | @yield('title')</title>
  </head>
  <body>
      
      <div class="loader">
        <span class="loader-inner-1"></span>
        <span class="loader-inner-2"></span>
        <span class="loader-inner-3"></span>
        <span class="loader-inner-4"></span>
      </div>

      <div id="body-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- header section -->
                    <section id="header">
                        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                          <div class="container p_0"> 
                            <a class="navbar-brand" href="{{route('home')}}">A2Z SERVICES</a>
                            
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-right: 46px;">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                  @if(Auth::guard('web')->user()->user_type==1)
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('spNewOrder')}}"><i class="fa fa-bookmark-o" aria-hidden="true"></i> New Requests</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('spPendingOrder')}}"><i class="fa fa-history" aria-hidden="true"></i> Ongoing Orders</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('spCompletedOrder')}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Completed Orders</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('spAllCanceledOrders')}}"><i class="fa fa-ban" aria-hidden="true"></i> Canceled Orders</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('spPaymentAll')}}"><i class="fa fa-money" aria-hidden="true"></i> Payments</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Notifications"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                    </li>

                                  @elseif(Auth::guard('web')->user()->user_type==2)
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('webservice.all')}}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Place Order</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('myOrders')}}"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i> My Orders</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Notifications"><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                                    </li>
                                    
                                  @endif
                                    <li class="nav-item">
                                      <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="fa fa-user" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{route('user.dashboard')}}" data-toggle="tooltip" data-placement="bottom" title="Dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="{{ route('user.logout') }}" data-toggle="tooltip" data-placement="bottom" title="Logout"> <i class="fa fa-power-off" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                              </div>
                            </div>
                        </nav>
                    </section>
                </div>
            </div>
        </div>
         
          @yield('user_dashboard')
            
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

      <style type="text/css">
        .navbar-light .navbar-nav .nav-link:hover{
          color: #3399FF !important;
        }
      </style>

        

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

      <!--    slick slider js start-->
      <script src="{{asset('public/contents/website')}}/js/slick.js"></script>
      <!--    slick slider js ends-->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

      <script type="text/javascript">
    
        // loader js
        $(window).on('load', function () {
            
            $(".loader").hide("slow");
            $("#body-content").show("slow");
       });

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

        //counter js
      </script>
  </body>
</html>