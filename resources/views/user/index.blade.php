<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Smart Home</title>
	<link rel="stylesheet" href="{{ asset('user/styles.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('user/rs.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>

</head>
<body >
	<div id="bg" style="background-image: url({{asset('user/images/background.jpg')}});">
		<div id="top">
			<ul>
				<img src="" alt="">
				<li><img src="{{asset('user/images/nhom7x.png')}}" style="width: 50px; height: 50px" alt=""></li>
				<li><a href="{{url('admin/dashboard')}}">Hệ Thống</a></li>
				<li></li>
				<li style="margin-left: 255px; !important;">
					<div id="clock">
					
					</div>
				</li>
			</ul>
		</div>
		<div id="container">
			<div class="row" id="select">
				<!-- talk -->
				<div class="col-md-4 col-sm-4 col-lg-4">
					<a href="#" id="speech"><i class="fa fa-microphone fa-5x" style="color: #15aabf"></i></a>
				</div>
				<!--/talk-->

				<!-- hand-->
				<div class="col-md-4 col-sm-4 col-lg-4">
					<a href="#" id="hand"><i class="fa fa-hand-rock fa-5x" style="color: #15aabf"></i></i></a>
				</div>
				<!--/hand-->

				<!-- auto-->
				<div class="col-md-4 col-sm-4 col-lg-4">
					<a href="#" id="auto"><i class="fa fa-gamepad fa-5x" style="color: #15aabf"></i></a>
				</div>
				<!--/auto-->
			</div>
			<div class="row" id="content">
				<div class="col-md-3 col-lg-3 col-sm-1"></div>
				<div class="col-md-6 col-lg-6 col-sm-10" style="background-color: rgba(192,192,192,0.8);">
					<div id="scontent">
						<div id="sspeak">
							<div id="context"></div>
							<a href="#" id="start"><i class="fa fa-microphone fa-2x" style="color: white"></i></a>
						</div>
					</div>
					<div id="hcontent">
						<div class="row">
							<div id="shand" class="col-md-3 col-sm-3 col-lg-3">
								<a href="#" class="iconhand" id="light1"><i class="fas fa-lightbulb fa-3x" style="color: white"></i></a>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<a href="#" class="iconhand" id="light2"><i class="fas fa-lightbulb fa-3x" style="color: white"></i></a>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<a href="#" class="iconhand" id="fan1"><i class="fas fa-sync-alt fa-3x" style="color: white"></i></a>
							</div>
							<div class="col-md-3 col-sm-3 col-lg-3">
								<a href="#" class="iconhand" id="fan2"><i class="fas fa-sync-alt fa-3x" style="color: white"></i></a>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-3 col-sm-3 col-lg-3">
								<a href="#" class="iconhand" id="pump"><i class="fas fa-tint fa-3x" style="color: white"></i></a>
							</div>						
						</div>
					</div>
				</div>
				<div class="col-md-3 col-lg-3 col-sm-1"></div>
			</div>
		</div>
	</div>
	

	


	<!-- jquery click change select content -->
	<script type="text/javascript">
		$(document).ready(function()
		{
			$("#hand").click(function()
			{
				$("#scontent").css("display","none");
				$("#hcontent").css("display","inline-block");
			});
			$("#speech").click(function()
			{
				$("#hcontent").css("display","none");
				$("#scontent").css("display","inline-block");
			});
			
		});
	</script>
	<!--/jquery click change select content -->
	<script src="{{ asset('user/control.js') }}"></script>
	<script src="{{ asset('user/clock.js') }}"></script>
	
</body>
</html>