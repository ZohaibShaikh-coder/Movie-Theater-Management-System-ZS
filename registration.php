<?php include('header.php'); ?>
<!-- <link rel="stylesheet" href="validation/dist/css/bootstrapValidator.css" /> -->
<head>
  <style>
    .h2, h2 {
    font-size: 42px;
}
  </style>
</head>
<script type="text/javascript" src="/validation//dist/./js/./bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php
include('./form.php');
$frm = new formBuilder;
?>
<link rel="stylesheet" href="./css/./styleregisterpage.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">
</div>
<div class="content">
  <div class="wrap">
    <div class="content-top" style="min-height:300px;padding:50px">
      <div class="col-md-4 col-md-offset-4">
        <form action="process_registration.php" method="post" id="form1">
          <div class="box">
            <div class="form">

              <h2 style="font-family: 'Cinzel', serif; color: #ffdc18;
  text-align: center;
  letter-spacing: 0.1em;">Register</h2>
              <div class="inputbox">
                <input name="name" type="text" required="required">
                <?php $frm->validate("name", array("required", "label" => "Name", "regexp" => "name")); // Validating form using form builder written in form.php 
                ?>
                <span>Name</span>
                <i></i>
              </div>

              <div class="inputbox">
                <input name="age" type="number" required="required">
                <?php $frm->validate("age", array("required", "label" => "Age", "regexp" => "age")); // Validating form using form builder written in form.php 
                ?>
                <span>Age</span>
                <i></i>
              </div>
              <div class="inputbox">
                <select name="gender" required="required" style="background-color: #1c1c1c; border-color : #ffdc18; color: 	rgb(255,255,255,0.8); padding :3px; width :100%">
                  <option value>Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <?php $frm->validate("gender", array("required", "label" => "Gender")); // Validating form using form builder written in form.php 
                ?>
              </div>

              <div class="inputbox">
                <input name="phone" type="number" required="required">
                <?php $frm->validate("phone", array("required", "label" => "Mobile Number", "regexp" => "mobile")); // Validating form using form builder written in form.php 
                ?>
                <span>Phone No</span>
                <i></i>
              </div>


              <div class="inputbox">
                <input name="email" type="text" required="required">
                <?php $frm->validate("email", array("required", "label" => "Email", "email")); // Validating form using form builder written in form.php 
                ?>
                <span>Username </span>
                <i></i>
              </div>

              <div class="inputbox">
                <input name="password" type="password" required="required">
                <?php $frm->validate("password", array("required", "label" => "Password", "min" => "7")); // Validating form using form builder written in form.php 
                ?>
                <span>Password</span>
                <i></i>
              </div>

              <div class="links">
                <a href="login.php">Sign In</a>
              </div>
              <input type="submit" value="Continue">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="clear"></div>

  </div>
  <?php include('footer.php'); ?>
</div>
<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>