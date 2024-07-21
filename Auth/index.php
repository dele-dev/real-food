<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>FoodSave | Login </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.min.css">
	<!-- Vegas CSS -->
	<link rel="stylesheet" href="css/vegas.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
	<section class="fxt-template-animation fxt-template-layout29">
		<div class="container-fluid">
			<div class="row">
				<div class="vegas-container col-md-6 col-12 fxt-bg-img" id="vegas-slide" data-vegas-options='{"delay":5000, "timer":false,"animation":"kenburns", "transition":"swirlLeft", "slides":[{"src": "img/figure/bg29-l-1.jpg"}, {"src": "img/figure/bg29-l-2.jpg"}, {"src": "img/figure/bg29-l-3.jpg"}]}'>
					<div class="fxt-page-switcher">
						<a href="index.php" class="switcher-text1 active">Login</a>
						<a href="register.php" class="switcher-text1">Register</a>
					</div>
				</div>
				<div class="col-md-6 col-12 fxt-bg-color">
					<div class="fxt-content">
						<div class="fxt-header">
							<a href="index.php" class="fxt-logo"><img width="300"src="img/logo-29.png" alt="Logo"></a>
						</div>
						<div class="fxt-form">
							<div class="fxt-transformY-50 fxt-transition-delay-1">
								<h2>Log In</h2>
							</div>
							<div class="fxt-transformY-50 fxt-transition-delay-2">
								<p>Log in to continue in our website</p>
							</div>
							<form method="POST" action="../functions/loginUser.php">
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-4">
										<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
										<i class="flaticon-envelope"></i>
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-5">
										<input type="password" class="form-control" name="password" placeholder="Password" required="required">
										<i class="flaticon-padlock"></i>
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-6">
										<div class="fxt-content-between">
											<button type="submit" class="fxt-btn-fill">Log in</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="js/imagesloaded.pkgd.min.js"></script>
	<!-- Vegas js -->
	<script src="js/vegas.min.js"></script>
	<!-- Validator js -->
	<script src="js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="js/main.js"></script>

</body>

</html>