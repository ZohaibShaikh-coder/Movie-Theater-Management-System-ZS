<?php include('header.php');
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}
$qry2 = mysqli_query($con, "select * from tbl_movie where movie_id='" . "'");
$movie = mysqli_fetch_array($qry2);
?>
<style>
	table {
		white-space: nowrap;
	}
	table.table-bordered{
    border:0.7px solid rgb(54, 69, 79,0.6);
  }
table.table-bordered > thead > tr > th{
    border:0.7px solid rgb(54, 69, 79,0.6);
}
table.table-bordered > tbody > tr > td{
    border:0.7px solid rgb(54, 69, 79,0.6);
}
th{
	color : black;
	font-weight: bold;
}
br {
  content: "";
  margin: 2.5em;
  display: block;
  font-size: 24%;
}
</style>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<div class="section group">
				<div class="about span_1_of_2">
					<h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
					<?php include('msgbox.php'); ?>
					<?php
					$bk = mysqli_query($con, "select * from tbl_bookings where user_id='" . $_SESSION['user'] . "'");
					if (mysqli_num_rows($bk)) {
					?>
						<div class="row">
							<table class="table table-bordered col-auto">
								<thead>
									<th>Booking Id</th>
									<th>Release Date</th>
									<th>Booking Date</th>
									<th>Ticket Date</th>
									<th>Movie</th>
									<th>Theater</th>
									<th>Screen</th>
									<th>Show</th>
									<th>Seats</th>
									<th>Total no of seats</th>
									<!-- <th>Remaing Seats</th> -->
									<th>Amount</th>
									<th>Action</th>
								</thead>

								<tbody>
									<?php
									while ($bkg = mysqli_fetch_array($bk)) {
										$m = mysqli_query($con, "select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
										$mov = mysqli_fetch_array($m);
										$s = mysqli_query($con, "select * from tbl_screens where screen_id='" . $bkg['screen_id'] . "'");
										$srn = mysqli_fetch_array($s);
										$tsn = mysqli_query($con, "select * from tbl_screens where screen_id=(select screen_id from tbl_screens where screen_id='" . $bkg['screen_id'] . "')");
										$tamtsn = mysqli_fetch_array($tsn);
										$tt = mysqli_query($con, "select * from tbl_theatre where id='" . $bkg['t_id'] . "'");
										$thr = mysqli_fetch_array($tt);
										$st = mysqli_query($con, "select * from tbl_show_time where st_id=(select st_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
										$stm = mysqli_fetch_array($st);
										$rld = mysqli_query($con, "select * from tbl_movie where movie_id=(select movie_id from tbl_shows where s_id='" . $bkg['show_id'] . "')");
										$rldm = mysqli_fetch_array($rld);
										$av = mysqli_query($con, "select sum(no_seats) as total from tbl_bookings where book_id=(select book_id from tbl_bookings where book_id='" . $bkg['book_id'] . "')");
										$avl = mysqli_fetch_array($av);
										$bkd = mysqli_query($con, "select * from tbl_bookings where book_id=(select book_id from tbl_bookings where book_id='" . $bkg['book_id'] . "')");
										$bkdm = mysqli_fetch_array($bkd);
										$tkd = mysqli_query($con, "select * from tbl_bookings where book_id=(select book_id from tbl_bookings where book_id='" . $bkg['book_id'] . "')");
										$tkdm = mysqli_fetch_array($tkd);
									?>
										<tr>
											<td>
												<?php echo $bkg['ticket_id']; ?>

											</td>
											<td>
												<?php echo $rldm['release_date']; ?>
											</td>
											<td>
												<?php echo $bkdm['date']; ?>
											</td>
											<td>
												<?php echo $tkdm['ticket_date']; ?>
											</td>
											<td>
												<?php echo $mov['movie_name']; ?>
											</td>
											<td>
												<?php echo $thr['name']; ?>
											</td>
											<td>
												<?php echo $srn['screen_name']; ?>
											</td>
											<td>
												<?php echo $stm['name']; ?>
											</td>
											<td>
												<?php echo $bkg['no_seats']; ?>
											</td>
											<td>
												<?php echo $tamtsn['seats']; ?>
											</td>
											<!-- <td>
												<?php $vsr = ($tamtsn['seats'] - $bkg['no_seats']);
												echo $vsr; ?>


											</td> -->
											<td>
												Rs. <?php echo $bkg['amount']; ?>
											</td>
											<td>
												<?php if ($bkg['ticket_date'] < date('Y-m-d')) {
												?>
													<i class="glyphicon glyphicon-ok"></i>
												<?php
												} else { ?>
													<a href="cancel.php?id=<?php echo $bkg['book_id']; ?>" style="text-decoration:none; color:red;">Cancel</a>
												<?php
												}
												?>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					<?php
					} else {
					?>
						<h3 style="color:red;" class="text-center">No Previous Bookings Found!</h3>
						<p>Once you start booking movie tickets with this account, you'll be able to see all the booking history.</p>
					<?php
					}
					?>
				</div>

				<?php include('movie_sidebar.php'); ?>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$('#seats').change(function() {
		var charge = <?php echo $screen['charge']; ?>;
		amount = charge * $(this).val();
		$('#amount').html("Rs " + amount);
		$('#hm').val(amount);
	});
</script>
<script type="text/javascript" src="vanilla-tilt.min.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelector("img"), {
		max: 25,
		speed: 400
	});
	
	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll("img"));
</script>