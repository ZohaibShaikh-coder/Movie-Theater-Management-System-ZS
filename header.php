<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>
<title>MTMS_ZS | Zohaib Developer</title>
	<link rel="icon" type="image/x-icon" href="./images/favicon_zs.ico">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
	<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/example.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		/* .wrap-header {
			width: 90%;
			margin: auto auto;
			/* justify-content: space-evenly; */



		/* 
		.zms-logo {
			width: 70%;
			/* height: 50%; */
		/* 
		.h-logo {
			margin: auto auto auto -110;
			float: left;
		} */
	</style>
</head>

<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap-header">
				<div class="h-logo" style="margin: auto auto auto -6%;">
					<a href="https://zohaibshaikh-coder.github.io/CVWebsite-HTML-CSS/" target="_blank"><img src="images/mtms_zs1.gif" alt="Logo Image Here" width="60%"/></a>
				</div>
				<div class="nav-wrap">
					<ul class="group" id="example-one">
						<li><a href="index.php">Home</a></li>
						<li><a href="movies_events.php">Movies</a></li>
						<li><?php if (isset($_SESSION['user'])) {
								$us = mysqli_query($con, "select * from tbl_registration where user_id='" . $_SESSION['user'] . "'");
								$user = mysqli_fetch_array($us); ?><a href="profile.php"><?php echo $user['name']; ?></a><a href="logout.php">Logout</a><?php } else { ?><a href="login.php">Login</a> <a href="registration.php">Register</a><?php } ?></li>
					</ul>
				</div>
				<div class="clear"></div>

			</div>

		</div>
		<div class="clear"></div>

		<div class="block">
			<div class="wrap-header">

				<form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
					<fieldset style="height: 50px;">
						<div class="field">


							<input type="text" placeholder="Enter A Movie Name" style="height:30px;width:300px" required id="search111" name="search">

							<input type="submit" value="Search" style="height:31px;padding-top:5px;left: 4px; align-items: center;" id="button111">
						</div>

					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>
		<script>
			function myFunction() {
				if ($('#hero-demo').val() == "") {
					alert("Please enter movie name...");
					return false;
				} else {
					return true;
				}
			}
		</script>
	</div>
</body>