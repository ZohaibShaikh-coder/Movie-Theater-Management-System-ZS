<?php include('header.php'); ?>
<style>
  /* Google Fonts - Poppins */
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
    .h2, h2 {
    font-size: 42px;
}
</style>
<link rel="stylesheet" href="./css/./styleloginpage.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">
</div>

<div class="content">
  <div class="wrap">
    <div class="content-top" style="min-height:300px;padding:50px">
      <div class="col-md-4 col-md-offset-4">
        <?php include('msgbox.php'); ?>
        <form action="process_login.php" method="post">
          <div class="box">
            <div class="form">

              <h2 style="font-family: 'Cinzel', serif;">Login </h2>
              <div class="inputbox">
                <input name="Email" type="text" required="required">
                <span>Username </span>
                <i></i>
              </div>

              <div class="inputbox">
                <input name="Password" type="password" required="required">
                <span>Password</span>
                <i></i>
              </div>

              <div class="links">
                <a href="registration.php">Register</a>
              </div>
              <input type="submit" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="clear"></div>

  </div>
  <?php include('footer.php'); ?>
</div>