<?php
    session_start();

    if(isset($_SESSION["adminId"])) {

    } else {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>QuiCue | Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/admin.css">
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
                        <a href="login.php"><button type="button" class="btn btn-b btn-primary asar">LOGOUT</button></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- End of navigation -->
	<header>
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<ol class="breadcrumb">
						<li>
							<a href="#"><span class="glyphicon glyphicon-home">&nbsp;</span></a> Dashboard
						</li>
					</ol>
				</div>
			</div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"">
				<div class="panel panel-default">
					<div class="panel-heading"><a><span class="glyphicon glyphicon-bell"></span></a> &nbsp; Notifications </div>
					<div class="panel-notif">
						<!-- Notification -->
						<table class="table" id="tblLogsContainer">
							<tbody>
								<tr>
									<td>
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<button type="button" id="" class="btn btn-xs btn-success"><span class="hidden-xs glyphicon glyphicon-inbox"></span> +63 923 234 2123</button>&nbsp; Message goes ...
									</div>
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<button type="button" id="" class="btn btn-xs btn-success"><span class="hidden-xs glyphicon glyphicon-inbox"></span> +63 923 234 2123</button>&nbsp; Message goes ...
									</div>
									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<button type="button" id="" class="btn btn-xs btn-success"><span class="hidden-xs glyphicon glyphicon-inbox"></span> +63 923 234 2123</button>&nbsp; Message goes ...
									</div>
									</td>
									</tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
								<tr><td><button type="button" id="" class="btn btn-success">+63 923 234 2123</button> &nbsp; Message goes  </td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Message</h3>
					</div>
					<div class="panel-body">
						<span class="label label-info">Sender: &nbsp; </span><span id="senderPhoneNumber"></span><br><br>
						<textarea name="message" id="senderMessage" class="form-control" rows="9" required="required" readonly></textarea>
					</div>
					<div class="panel-footer">
						<button type="button" id="delete" class="btn btn-primary">Delete <span class="glyphicon glyphicon-erase"></span></button>
						<button type="button" id="done" class="btn btn-primary">Done <span class="glyphicon glyphicon-thumbs-up"></span></button>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p>Copyright &copy; QuiQue 2016</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="js/jquery.js"></script>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/adminFunctionality.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
