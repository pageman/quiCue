<?php
    session_start();

    if(isset($_SESSION["userId"])) {

    } else {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
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
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,300,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,700" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Start of avigation -->
	<nav class="navbar-justified navbar-default navbar-fixed-top" role="navigation">
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
                        <a href="logoutUser.php"><button type="button" class="btn btn-primary asar">LOGOUT</button></a>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- End of navigation -->

	<!-- Header -->
	<header>
		<div class="container">
			<div class="header">

			</div>
		</div>
	</header>
	<br />
	<br />
	<!-- End of header -->

	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<!-- Chosen Pictures -->
				<div class="row">
					<br /> <br /><br />
					<a href="#pol" onclick="contactPolice()" data-toggle="tab"><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hovPic">
						<img class="img-responsive img-ico img-center" src="images/police.png">
						<h5 class="img-ico-label">POLICE</h5>
					</div>
					</a>

					<a href="#med" onclick="contactHospital()" data-toggle="tab"><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hovPic">
						<img class="img-responsive img-ico img-center" src="images/doctor.png">
						<h5 class="img-ico-label">MEDIC</h5>
					</div>
					</a>
					<a href="#fire" onclick="contactFireMen()" data-toggle="tab"><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hovPic">
						<img class="img-responsive img-ico img-center" src="images/fireman.png">
						<h5 class="img-ico-label">FIREMAN</h5>
					</div></a>


					<a href="#red" onclick="contactRedCross()" data-toggle="tab"><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 hovPic ">
						<img class="img-responsive img-ico img-center" src="images/redCross.png">
						<h5 class="img-ico-label">RED CROSS</h5>
					</div></a>

				</div>
        <div class="tab-content">
          <div class="row tab-pane fade text-center" id="pol">
              <p>POLICE STATION: "Eastern Police District"<br />
Address: Eastern Police District Distric Public Safety Battalion, Metro Walk Compound Meraclo Ave, Pasig, 1604 Metro Manila</p>
          </div>
          <div class="row tab-pane fade text-center" id="med">
              <p>HOSPITAL: "Mission Hospital"<br />
Address: Ortigas Avenue Extention, KM 16, Pasig, 1600 Metro Manila</p>
          </div>
          <div class="row tab-pane fade text-center" id="fire">
              <p>FIRE STATION: "Pasig City Central Fire Station"<br />
Address: F Manalo, Pasig, Metro Manila</p>
          </div>
          <div class="row tab-pane fade text-center" id="red">
              <p>
RED CROSS:"Philippine Red Cross"<br />
Address: 3, Lourdes 1, 661 Boni Ave, Mandaluyong, 1550 Metro Manila</p>
          </div>
        </div>
				<br /><br /><br />
				<!--End of Chosen Pictures -->
					<div class="row instruction">

						<div class="col-xs-0 col-sm-0 col-md-2 col-md-2">.</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<h1 class="page-header head">Click for Help!</h1>
						<p class="homelead section-lead">Click the image you want to seek help. By clicking their icon, they will receive
						an SOS message. They will call your registered mobile phone for verification and make an immediate response.
						All of it in just ONE CLICK!
						Want to create a specific message? <a href="#message">Click here</a></p><br>
						</div>
							<div class="col-xs-0 col-sm-0 col-md-2 col-md-2">.</div>
					</div>
					<br /><br /><br /> <br /> <br /> <br />
					<div class="row" id="message">
						<br />
						<br />
						<br />
						<br />
						<div class="col-xs-0 col-sm-0 col-md-2 col-md-2">.</div>
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<h1 class="page-header head">Enter Your Specific Message!</h1>
							<center><small>This is for the ones who wants to say a specific message</small></center>
							<br />
							<center><select name="receiver" id="whereToSend">
								<option>Where To Send?</option>
								<option value="Police Station">Police Station</option>
									<option value="Hospital">Hospital</option>
										<option value="Fire Station">Fire Station</option>
											<option value="Red Cross">Red Cross </option>
							</select></center>
							<br />
							<center>
							<textarea rows="8" cols="50" id="specificMessage">Enter your Message here
							</textarea>
							</center>
							<br />
							<center><button type="button" class="btn btn-primary" id="btnSendSpecificMessage">SEND</button></center>
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />

							<br />
							<br />
						</div>
						<div class="col-xs-0 col-sm-0 col-md-2 col-md-2">.</div>
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
    <!--<script async defer type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVIdx3RbFKaI-NDa7hw-t-CQVGX_IiEHE&callback=initialize"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	<script src="js/jquery.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/googleAPI.js"></script>
	<script src="js/userFunctionality.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
