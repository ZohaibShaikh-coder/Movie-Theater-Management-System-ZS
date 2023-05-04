<div class=" listview_1_of_3 images_1_of_3">
	<!-- style="padding-left: 99px; margin-left: 24px;" -->
	<h2 style="color:#555;">Films in Theaters</h2>

	<?php
	$today = date("Y-m-d");
	$qry2 = mysqli_query($con, "select * from  tbl_movie where status='0' order by release_date desc");

	while ($m = mysqli_fetch_array($qry2)) {
	?>
		<div class="content-left">
			<div class="listimg listimg_1_of_2">
				<?php

				?>
				<a href="about.php?id=<?php echo $m['movie_id']; ?>"><img src="<?php echo $m['image']; ?>"></a>
			</div>
			<div class="text list_1_of_2">
				<div class="extra-wrap1">
					<a href="about.php?id=<?php echo $m['movie_id']; ?>" class="link4" style="text-decoration:none; font-size:18px;"><?php echo $m['movie_name']; ?></a><br>
					<text style="color : black; font-weight:bold">Release Date :</text><span class="data" style="color : rgb(54, 69, 79); font-weight:bold"> <?php echo $m['release_date']; ?></span><br>
					 <text style="color : black; font-weight:bold">Cast :</text> <Span class="data" style="color :rgb(54, 69, 79); font-weight:bold; font-style: italic"><?php echo $m['cast']; ?></span><br>
					<text style="color : black; font-weight:bold">Description :</text> <span" class="color2" style="text-decoration:none;"><?php echo $m['desc']; ?></span><br>
				</div>
			</div>

			<div class="clear"></div>
		</div>
	<?php
	}
	?>










</div>
<div class="clear"></div>