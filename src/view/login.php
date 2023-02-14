<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="../../public/img/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="../../public/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../../public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../../public/fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="../../public/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="../../public/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="../../public/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="../../public/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="../../public/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="../../public/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../public/css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="../../public/jquery/jquery-3.2.1.min.js"></script>

	<script src="../../public/animsition/js/animsition.min.js"></script>

	<script src="../../public/bootstrap/js/popper.js"></script>
	<script src="../../public/bootstrap/js/bootstrap.min.js"></script>

	<script src="../../public/select2/select2.min.js"></script>

	<script src="../../public/daterangepicker/moment.min.js"></script>
	<script src="../../public/daterangepicker/daterangepicker.js"></script>

	<script src="../../public/countdowntime/countdowntime.js"></script>

	<script src="../../public/js/main.js"></script>

</body>
</html>