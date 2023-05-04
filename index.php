<html>
	<title>MTMS_ZS | Zohaib Developer</title>
	<link rel="icon" type="image/x-icon" href="./images/favicon_zs.ico">
	<head>
		<style>
			br {
  content: "";
  margin: 2.5em;
  display: block;
  font-size: 24%;
}
		</style>
	</head>
<body>
	<?php
	include('header.php');
	?>

	<div class="content">
		<div class="wrap">
			<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Upcoming Movies</h2>
					<?php
					$qry3 = mysqli_query($con, "SELECT * FROM tbl_upcoming_movie ORDER BY upcoming_movie_date ");


					while ($n = mysqli_fetch_assoc($qry3)) {
					?>
						<div class="content-left" style="margin-top: 10px;">
							<div class="listimg listimg_1_of_2">
								<img src="<?php echo $n['attachment']; ?>">
							</div>
							<div class="text list_1_of_2">
								<div class="extra-wrap">
									<span style="color : black" class="data"><strong><?php echo $n['name']; ?></strong><br><br>
										 <text style="color : black; font-weight:bold;">Cast :</text> <span class="data" style="color : rgb(54, 69, 79); font-style: italic"><strong><?php echo $n['cast']; ?></strong><br>
											<div class="data" style="color : rgb(54, 69, 79)"> <text style="color : black; font-weight:bold">Release Date :</text> <strong><?php echo $n['upcoming_movie_date']; ?></strong></div>



											<span class="text-top" style="color : black;"><?php echo $n['description']; ?></span>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					<?php
					}
					?>


				</div>
				<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Movie Trailers</h2>
					<div class="middle-list">
						<?php
						$qry4 = mysqli_query($con, "SELECT * FROM tbl_movie ORDER BY rand()");

						while ($nm = mysqli_fetch_array($qry4)) {
						?>

							<div class="listimg1">
								<a target="_blank" href="<?php echo $nm['video_url']; ?>"><img src="<?php echo $nm['image']; ?>" alt="" /></a>
								<a target="_blank" href="<?php echo $nm['video_url']; ?>" class="link" style="text-decoration:none; font-size:14px; color:black"><?php echo $nm['movie_name']; ?></a>
							</div>
						<?php
						}
						?>
					</div>


				</div>
				<?php include('movie_sidebar.php'); ?>
			</div>
			<script type="text/javascript" src="vanilla-tilt.min.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelector("img"), {
		max: 25,
		speed: 400
	});
	
	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll("img"));
</script>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('searchbar.php'); ?>