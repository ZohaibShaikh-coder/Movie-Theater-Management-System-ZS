<div class="footer">
	<div class="wrap">
		<div class="footer-top">
			<div class="col_1_of_4 span_1_of_4">
				<div class="footer-nav">
					<ul>
						<li><a href="index.php" style="text-decoration:none;" id="textf1">Home</a></li>
						<li><a href="movies_events.php" style="text-decoration:none;" id="textf1">Movies</a></li>
						<li><a href="login.php" style="text-decoration:none;" id="textf1">Login</a></li>
					</ul>
				</div>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<div class="textcontact">
					<p id="textf">Zohaib Mansoor Shaikh<br>
					<p id="textf">Theatre Admin ZMS<br>
						Movie Theatre Management System<br>
						Ph: +918956023451<br>
					</p>
				</div>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<div class="call_info">
					<p class="txt_3" id="textf">Contact Us At :</p>
					<p class="txt_4" id="textf">ZohaibShaikhDeveloper@gmail.com
						<br>+918956023451
					</p>
				</div>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<div class=social>
					<a href="https://zohaibshaikh-coder.github.io/CVWebsite-HTML-CSS/" target="_blank"><img id="footerimg" src="images/294058_dribble_icon.png" alt="" /></a>
					<a href="https://www.linkedin.com/in/zohaib-shaikh-636609248/" target="_blank"><img id="footerimg" src="images/294091_linkedin_icon.png" alt="" /></a>
					<a href="https://www.instagram.com/flash_zs/" target="_blank"><img id="footerimg" src="images/294092_instagram_icon.png" alt="" /></a>
					<a href="https://www.facebook.com/profile.php?id=100070314612106" target="_blank"><img id="footerimg" src="images/294073_facebook_icon.png" alt="" /></a>
					<a href="https://twitter.com/ZOHAIBS61022606" target="_blank"><img id="footerimg" src="images/294068_twitter_icon.png" alt="" /></a>
				</div>
			</div>
			<!-- <div class="col_1_of_4 span_1_of_4">
				<div class="call_info">
					<p class="txt_4" id="textf">ZohaibShaikhDeveloper@gmail.com
					</p>
				</div>
			</div> -->
			<div class="clear"></div>
		</div>
	</div>
</div>
</body>

</html>

<style>
	.content {
		padding-bottom: 0px !important;
	}

	#textf1:hover {
		color: #ffdc18;
	}

	#textf:hover {
		color: white;
	}


	#form111 {
		width: 500px;
		margin: 50px auto;
	}

	#search111 {
		padding: 8px 15px;
		background-color: #fff;
		border: 0px solid #dbdbdb;
	}

	#button111 {
		position: relative;
		padding: 6px 15px;
		left: -8px;
		border: 2px solid #db9603;
		background-color: #db9603;
		color: #fafafa;
	}

	#button111:hover {
		background-color: #ffdc18;
		border: 2px solid #ffdc18;
		color: grey;
	}

	#footerimg {
		width: 30px;
	}
</style>

<script src="js/auto-complete.js"></script>
<link rel="stylesheet" href="css/auto-complete.css">
<script>
	var demo1 = new autoComplete({
		selector: '#search111',
		minChars: 1,
		source: function(term, suggest) {
			term = term.toLowerCase();
			<?php
			$qry2 = mysqli_query($con, "select * from tbl_movie");
			?>
			var string = "";
			<?php $string = "";
			while ($ss = mysqli_fetch_array($qry2)) {

				$string .= "'" . strtoupper($ss['movie_name']) . "'" . ",";
				//$string=implode(',',$string);


			}
			?>
			//alert("<?php echo $string; ?>");
			var choices = [<?php echo $string; ?>];
			var suggestions = [];
			for (i = 0; i < choices.length; i++)
				if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
			suggest(suggestions);
		}
	});
</script>