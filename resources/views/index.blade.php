<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="style-login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style-login/css/util.css">
	<link rel="stylesheet" type="text/css" href="style-login/css/main.css">
<!--===============================================================================================-->
	<!-- toastr -->
	<link rel="stylesheet" href="style-custom/toastr/toastr.min.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic" style="text-align: center;">
					<img src="style-login/images/dmkr.jpeg" alt="IMG" width="80%" >
					<img src="style-login/images/bsb.jpeg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="/process" method="post">
					{{ csrf_field() }}
					<span class="login100-form-title">
						<!-- <img src="style-login/images/simponi.png" alt="IMG" style="width:30px;height:60px;"> -->SIMPONI<br><p>SISTEM INFORMASI MONITORING PENGAJUAN OPINI</p>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "username is required">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-110">
					</div>
				</form>
			</div>
		</div>
	</div>


<!--===============================================================================================-->
	<script src="style-login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="style-login/vendor/bootstrap/js/popper.js"></script>
	<script src="style-login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="style-login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="style-login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="style-login/js/main.js"></script>
	<!-- toastr -->
	<script src="style-custom/toastr/toastr.min.js"></script>

	<script>
    @if (Session::has('message'))
      var type = "{{Session::get('alert-type','info')}}"
      toastr.error("{{ Session::get('message') }}");
		@endif
	</script>


</body>
</html>
