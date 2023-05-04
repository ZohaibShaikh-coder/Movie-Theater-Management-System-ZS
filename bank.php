<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('location:login.php');
}
extract($_POST);
?>
<!doctype html>
<html>
  <title>MTMS_ZS | Zohaib Developer</title>
	<link rel="icon" type="image/x-icon" href="./images/favicon_zs.ico">
<video id="background-video" autoplay loop muted>
  <source src="./images/pexels-mikhail-nilov-7535106.mp4" type="video/mp4">
</video>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />

  
  <link href="css/bank.css" rel="stylesheet" type="text/css" />

  <style>
     #background-video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: fixed;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      z-index: -1;
    }
    #mainContainer {
    margin-top: 50px;
    border-radius: 2px;
    border: 1px solid rgb(255,255,255,0.5);
    background-color: rgb(255,255,255,0.5);
    padding: 15px 15px 0px;
    position: relative;
    overflow: hidden;
    max-width: 474px;
}
    </style>

</head>


<body>
 <div>
     <img src="images\Federal-Bank-F-Logo-removebg.png" style="width: 8%; height: 8%; margin-left: 1%">
     <img src="images\212-2128366_verified-by-visa-logo.png" style="width: 13%; height: 13%; margin-left: 76%">
</div>
     
  <div id="mainContainer" class="row large-centered">
   
    <div class="text-center">
      <img src="images\Federal-Bank-Logo-PNG.png" alt="">
    </div>

    <hr class="divider">
    <dl class="mercDetails">
      <dt style="font-weight:bold">Merchant</dt>
      <dd  <dt style="font-weight:bold">Zohaib Mansoor Shaikh</dd>
      <dt  <dt style="font-weight:bold">Transaction Amount</dt>
      <dd  <dt style="font-weight:bold">INR <?php echo  $_SESSION['amount']; ?></dd>
      <dt  <dt style="font-weight:bold">Debit Card</dt>
      <dd  <dt style="font-weight:bold"><?php echo  $number; ?></%>
      </dd>
    </dl>
    <hr class="divider">


    <form name="form1" id="form1" method="post" action="complete_payment.php">
      <fieldset class="page2">
        <div class="page-heading">
          <h6 class="form-heading">Authenticate Payment</h6>
          <p class="form-subheading">OTP sent to your mobile number ending with <strong>2004</strong></p>


        </div>

        <div class="row formInputSection">
          <div class="large-7 columns">
            <label  style="font-weight:bold">
              Enter One Time Password (OTP)
              <input type="tel" name="otp" class="form-control optPass" value="" maxlength="6" autocomplete="on" />
            </label>
          </div>
          <div class="large-5 columns">
            <label>&nbsp;</label><button class="expanded button next" onClick="ValidateForm()">Make Payment</button>
          </div>
        </div>
        <div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Resend OTP</a></div>
        <p>


          <a class="tryAgain" href="./booking.php">Go back</a> to merchant
        </p>
      </fieldset>


    </form>
  </div>
  <script src="http://code.jquery.com/jquery-1.9.1.js">
    document.onmousedown = rightclickD;

    function rightclickD(e) {
      e = e || event;
      if (e.button == 2) {
        alert('Function Disabled...');
        return false;
      }
    }

    function ValidateForm() {
      var regPin = RegExp("^[0-9]{4,6}$");
      if (document.form1.customerpin.value == "" || !document.form1.customerpin.value.match(regPin)) {
        alert("Please enter a valid 6 digit One Time Password (OTP) receive on your registered Mobile Number.");
        document.form1.customerpin.focus();
        return false;
      } else {
        document.form1.submit();
      }

    }
  </script>

</body>

</html>