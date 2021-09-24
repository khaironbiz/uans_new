<?php
include 'auth/site.php'; ?>
<!doctype html>
<html lang="en">

<head>
	<title>SignIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link rel="icon" href="assets/img/favicon.ico">
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="https://ppni.or.id/admin/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/css/util.css">
        <link rel="stylesheet" type="text/css" href="https://ppni.or.id/admin/login1/css/main.css">
    <!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(https://ppni.or.id/admin/login1/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						DPK PPNI RSPON
					</span>
				</div>
				<form class="login100-form validate-form" action="auth/login.php" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div>
							<a href="<?= $site_url ?>/registrasi/index.php" class="txt1">
								Registrasi
							</a>
						</div>
                        <div>
							<a href="auth/forgot.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
	<script src="https://ppni.or.id/admin/login1/js/main.js"></script>

</body>
</html>
<!--
	========================================TIM PENYUSUSN=======================================================
	Nama	: Khairon
	NIM		: 200401010072
	Kelas	: IT-01
	Prodi	: PJJ Informatika
-->