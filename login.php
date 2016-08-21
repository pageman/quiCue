<?php
    session_start();

    if(isset($_SESSION["adminId"])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>QuiCue | Admin</title>
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
<!-- Navigation -->
<div class="container main">
    <nav class="nav-justified navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header test1">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 logoPic" >
                        <img class="img-responsive" src="images/QuiCueLogo.png" />
                        <h2 class="collapse navbar-collapse navbar-ex1-collapse"><strong>QuiCue</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- End of navigation -->

	<div class="container form-body-login">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="" method="POST" role="form" onsubmit="return false;">
						<legend>Sign Up</legend>
						<div class="form-group">
							<select name="" id="type" class="form-control">
								<option value="">What type of Organization are you?</option>
								<option value="Police Station">Police Station</option>
								<option value="Hospital">Hospital</option>
								<option value="Fire Station">Fire Station</option>
								<option value="Red Cross">Red Cross</option>
							</select><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                <form><input type="text" class="form-control" id="name" placeholder="Organization Name"></form><br>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></div>
                                <form><input type="readonly" class="form-control" id="address" placeholder="Address" required></form><br>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></div>
                                <form><input type="text" class="form-control" id="telephoneNumber" placeholder="Telephone Number [optional]"></form><br>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon">+63</div>
                                <input type="text" class="form-control" id="mobileNumber" placeholder="Mobile Number" required>
                                <br />
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <form><input type="text" class="form-control" id="username" placeholder="Username" required></form>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <form><input type="password" class="form-control" id="password" placeholder="Password" required></form>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required></form>
                    </div>
                    <!-- Warning for wrong username or passoword -->
                    <div class="tab-content" id="wrong">
                        <div class="tab-pane fade" id="wronginputwarning">
                            <div class="row">
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Password don't match. </strong>Check if the capslock is on.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of waring -->
                    <div class="checkbox">
                        <label>
                            <input type="radio" value="" checked> By checking the button, you agree to our Terms and Conditions.
                        </label>
                    </div>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-primary" id="btnRegisterAdmin">Register <span class="glyphicon glyphicon-thumbs-up"></span></button>
                </div>
					</form>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">

			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="" method="POST" role="form" onsubmit="return false;">
						<legend>Log In</legend>
						<div class="form-group">
                            <div class="input-group width">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                <form><input type="text" class="form-control" id="usernameEntered" placeholder="Username" required></form>
                            </div><br>
                            <div class="input-group width">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                                <form><input type="password" class="form-control" id="passwordEntered" placeholder="Password" required></form>
                            </div>
                            <div>
                                <br><span class="glyphicon glyphicon-question-sign"></span><a> Forgot Account?</a>
                            </div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary push-right" id="btnLogInAdmin">Log In</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
<!-- Footer -->
<hr width="100%" />
<footer>
    <div class="row footer-first">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <a href="register.php">REGISTER</a> | <a href="#index">LOGIN</a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            &copy; QuiCue 2016 Made in Philippines
        </div>
    </div>
</footer>
<!--End of footer -->
</div>
<!-- End of page content -->
	</div>
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVIdx3RbFKaI-NDa7hw-t-CQVGX_IiEHE"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	<script src="js/jquery.js"></script>
	<script src="js/jquery-1.9.1.min.js"></script>
	<!--<script src="js/googleAPI.js"></script>-->
	<script src="js/adminFunctionality.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            initialize();
        });
    </script>
</body>
</html>
