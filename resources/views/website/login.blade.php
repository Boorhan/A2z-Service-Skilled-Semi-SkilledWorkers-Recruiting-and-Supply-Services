<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no" />
	 <!-- toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body >
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="login-section">
					<div class="login-div">
						<div class="login-header">
							<div class="login-header-btn">
								<a href="#" class="headerBtn1">Login</a><a href="{{route('register')}}" class="headerBtn2">Register</a>
							</div>
							<h4>Login</h4>
							<p>Welcome to A2Z Services</p>
						</div>
						<div class="login-form">
							<form action="{{route('userLogin.submit')}}" method="POST">
								@csrf
								<div style="overflow:hidden">
									<input class="myInput" type="text" name="phone" placeholder="Phone Number">
									@error('phone')
				                      <div class="text-danger ">{{ $message }}</div>
				                    @enderror
								</div>
								<div style="overflow:hidden">
									<input class="myInput" type="password" name="password" placeholder="Password">
									@error('password')
				                      <div class="text-danger ">{{ $message }}</div>
				                    @enderror
								</div>
								<div>
									<input type="submit" name="" value="Login" class="loginBtn"> <span><a href="" class="fotgetPass">Forgot Password</a></span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		body{background: #f7f7f7}
		.text-danger{
			margin-top: -25px;
		    margin-bottom: 10px;
		    font-size: 13px;
		    color: #f00;
		}
		.login-section{
			display: flex;
			align-items: center;
			justify-content: center;
			height: 98vh;
		}
		.login-div{
			padding: 100px 80px;
			background: #fff;
			border: 1px solid #eee;
			border-radius: 5px;
			
		}
		.login-header{padding-bottom: 30px;text-align: center; }
		.login-header-btn{
			display: flex;
		    justify-content: center;
		    padding-bottom: 10px;
		}
		.headerBtn1{
			padding: 5px 15px;
			color: #fff;
			background:#3399FF;
			border-radius: 14px 0px 0px 14px; 
		}
		.headerBtn2{
			padding: 5px 15px;
			color: #3399FF;
			background:#fff;
			border:1px solid #3399FF;
			border-radius: 0px 14px 14px 0px; 
			transition: 0.2s;
		}
		.headerBtn2:hover{
			background:#f7f7f7;
		}

		.login-header h4{
			font-size: 18px;
		    color: #424242;
		    margin: 15px 0px 0px;
		}
		.login-header p{
			font-size: 13px;
		    color: #444;
		    margin: 10px;
		}
		.myInput{
			width: 100%;
		    border: 0px;
		    border-bottom: 2px solid #eee;
		    padding: 5px;
		    margin-bottom: 30px;
		    transition: 0.4s;
		    background-color: transparent;
		}
		.myInput:focus{
			outline: none !important;
		    border-bottom: 2px solid #3399FF;
		}
		.loginBtn{
			padding: 12px 40px;
		    color: #fff;
		    border: 0px;
		    outline: none;
		    background: #3399FF;
		    border-radius: 20px;
		    font-size: 16px;
		    box-shadow: 0 0.125rem 0.25rem 0 rgba(31, 45, 65, 0.6);
		    cursor: pointer;
		}
		.fotgetPass{color: #424242;padding-left: 10px;}
		a{text-decoration: none;}
		
		@media (max-width:500px){
		    .login-div{padding: 55px 30px;}
		}
	</style>
	<script src="{{asset('public/contents/admin')}}/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="{{asset('public/contents/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
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
</body>
</html>