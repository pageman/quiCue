<?php
    session_start();

    if(isset($_SESSION["userId"])) {
        header("Location: message.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>QuiCue</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Navigation -->
	<div class="container main">
	<nav class="nav-justified navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header test1">
				<!--For the menu bar is viewed in phone -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" id="btn-menu">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!--Menu Bar ends -->

				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 logoPic" >
				<img class="img-responsive" src="images/QuiCueLogo.png" />
				<h2 class="collapse navbar-collapse navbar-ex1-collapse"><strong>QuiCue</strong></h2>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse col-xs-6 col-sm-6 col-md-6 col-lg-6 btn-register">
						<a href="register.php"><button type="button" class="btn btn-primary asar">REGISTER</button></a>
					</div>
				</div>
			</div>
		</div>
	</nav>
   </div>
	<!-- End of navigation -->

	<!-- Header -->
	<header>
		<div class="container main">
			<div class="header">
				<h1>Quick Rescue in One Click!</h1>
			</div>
		</div>
	</header>
	<br />
	<!-- End of header -->

	<!-- Page Content -->
	<div class="container main">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
			<div class="row">
				<h2 class="page-header head">What is QuiCue?</h2>
                <p class="lead section-lead">QuiCue stands for "Quick Rescue". This will help you in major disasters. In here, you can now send an emergency SOS or message to a police, hospital, fireman or red cross in just one-click.</p>
                <small><center>WARNING: Inappropriate use of this app will cost you P10,000 or more depends on the damage made.</center></small><br /><br />
			</div>
			<div class="row">
				<div class="input-group">
					<div class="input-group-addon">+63</div>
					<input type="text" class="form-control" id="phoneNumber" placeholder="Mobile Number" required>
					<br />
				</div>
				<div class="btn-reg">
					<br />
					<button type="button" class="btn btn-primary" id="btnLoginUser">START</button>
					<p><small>Not registered? <a href="register.php">Click Here</a></small></p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-7 text-center">
			<div class="row rightPane">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<!--For the Pictures -->
					<img class="img-responsive circle" src="images/Circle.gif" />
				</div>
			</div>
		</div>

        <hr width="100%" />
        <footer>

            <div class="row footer-first">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a href="register.php">REGISTER</a> | <a href="#index">LOGIN</a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                    &copy;QuiCue 2016 Made in Philippines
                </div>
            </div>
        </footer>
	</div>
	<!-- End of Page Content -->
    <input type="text" id="neededDistance" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <!--<script src="js/googleAPI.js"></script>-->
    <script src="js/userFunctionality.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
