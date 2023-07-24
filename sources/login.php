<!--  -->
<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>APP PLN &middot; Login</title>
	<link rel="stylesheet" href="assets/dist/assets/css/main/app.css">
	<link rel="stylesheet" href="assets/dist/assets/css/pages/auth.css">
	<link rel="shortcut icon" href="assets/dist/assets/images/logo/favicon.svg" type="image/x-icon">
	<link rel="shortcut icon" href="assets/dist/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
	<div id="auth">

		<div class="row h-100">
			<div class="col-lg-5 col-12">
				<div id="auth-left">
					<div class="auth-logo">
						<a><i class="bi bi-lightning-fill" style="color: yellow; font-size: 40px;"></i><span style="font-size: 40px;">APLN</span></a>
					</div>
					<h3 class="text-center mb-4">Log in.</h3>


					<form action="index.php?process=login" method="POST">
						<div class="form-group position-relative has-icon-left mb-3">
							<input type="text" id="Username" name="Username" class="form-control form-control-md" placeholder="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-3">
							<input type="password" id="Password" name="Password" class="form-control form-control-md" placeholder="Password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>

						<button type="submit" class="btn btn-primary btn-block btn-sm shadow-sm mt-3">Log in</button>
					</form>

				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">

				</div>
			</div>
		</div>

	</div>
</body>

</html>

<!--  -->
<!--  -->