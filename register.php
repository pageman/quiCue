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
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,300,500" rel="stylesheet" type="text/css">
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
						<a href="index.php"><button type="button" class="btn btn-primary asar">BACK</button></a>
					</div>
				</div>
			</div>
		</div>
	</nav>
   </div>
<!--End of navigation -->
<!-- Header -->
<header>
  <div class="container main">
    <div class="header">
      <h1>Insert your Mobile Number</h1>
    </div>
  </div>
</header>
<br />
<!-- End of header -->
<div class="container main" >
<div class="row">
    <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2">.</div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
  <div class="input-group">
    <div class="input-group-addon">+63</div>
    <input type="text" class="form-control" id="phoneNumberToRegister" placeholder="Mobile Number" required>
    <br />
  </div>
  <div class="btn-reg">
    <br />

    <a href="#verify" role="tab" data-toggle="tab"><button type="button" class="btn btn-primary" id="btnRegisterUser">REGISTER</button></a>
    <p><small>Already registered? <a href="index.php">Click Here</a></small></p>
  </div>
    </div>
</div>
</div>
<div class="tab-content" id="verificationDiv">
  <div class="tab-pane fade" id="verify">
      <center><h3>A text message has been sent to you!</h3></center>
     <div class="row">
         <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2">.</div>
         <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
       <div class="input-group">
         <input type="text" class="form-control" id="verificationCodeEntered" placeholder="Verification Code" required>
         <br />
       </div>
       <div class="btn-reg">
         <br />

         <a href="#verify" role="tab" data-toggle="tab"><button type="button" class="btn btn-primary" id="btnSubmitVerificationCode">VERIFY</button></a>
         <p><small>Already registered? <a href="index.php">Click Here</a></small></p>
       </div>
     </div>
         <div class="col-xs-0 col-sm-0 col-md-2 col-lg-2">.</div>

  </div>
</div>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/userFunctionality.js" type="text/javascript"></script>
</body>
</html>
