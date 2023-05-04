<?php
include('../../config.php');
extract($_POST);

$uploaddir = "../../upcoming_movie_images/";

$uploadfile = $uploaddir . basename($_FILES["attachment"]["name"]);

$flname = "upcoming_movie_images/" . basename($_FILES["attachment"]["name"]);

mysqli_query($con, "insert into  tbl_upcoming_movie values(NULL,'$name','$cast','$date','$description','$flname')");

move_uploaded_file($_FILES["attachment"]["tmp_name"], $uploadfile);

$_SESSION['add'] = 1;
header('location:add_movie_details.php');
?>