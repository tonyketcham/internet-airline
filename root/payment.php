

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Internet Airline - Payment Details</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Inconsolata'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="js/main.js"></script>
    <script type="js/payment.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

  
</head>

<body class="paymentcheckout">

   <?php include("header.php") ?>
   
   <?php 

if(!isset($_SESSION['email']))
{
  header("Location: checkout-login.php");
  exit;
}
 ?>


<div class="checkout"  style="background-color: rgb(227, 227, 227);">
  <div class="box" >
   <a href="index.php">
          <img src="plane-logo.svg" id="plane" alt="" width="72" height="72">
  </a>
  <div>
    
    <?php 

    $roundtrip = $_SESSION['roundtrip'];

    if (isset($_SESSION['rfid']) && $_SESSION['rfid'] == -1) {

      $roundtrip == false;
      
    }


      
   ?>

    <h3 style="text-align: center;"><?php echo $_SESSION['fullname']; ?>,<br> <?php if ($roundtrip == true) { echo "You're about to save 40% on your round trip!<br><br>";
      
    } ?>Your total is: $<?php 

      include("dbconnect.php");

      $total = 0;
      $dfid = $_SESSION['dfid'];
      $quantity = $_SESSION['quantity'];

      
        if ($roundtrip == true) {
        $rfid = $_SESSION['rfid'];

          $sql = "SELECT SUM(price) AS 'tot' FROM flight WHERE fid = '$dfid' OR fid = '$rfid'";
          $result = mysqli_query($link, $sql);

          $rows = $result->fetch_assoc();
          $total = $rows['tot'] * $quantity * 0.6;
        } else {

          $sql = "SELECT SUM(price) AS 'tot' FROM flight WHERE fid = '$dfid'";
          $result = mysqli_query($link, $sql);

          $rows = $result->fetch_assoc();
          $total = $rows['tot'] * $quantity; 


      }

      echo $total;
      $_SESSION['total'] = $total;  

     ?></h3>

  </div>
  </div>
  <form class="paymentform" autocomplete="on" action="payment.inc.php" method="POST" novalidate>
    <fieldset>
      <label for="card-number">Card Number</label>
      <input name="cardnum" type="num" class="card-num" maxlength="16">
      <label for="card-number">Mailing Address</label>
      <input name="address" type="address" class="mailing address" maxlength="50">
      <label for="card-holder">Card holder</label>
      <input name="billingname" type="text" class="card-hold" placeholder="ex. John Doe" style="background-color: white;">
    </fieldset>
    <fieldset class="fieldset-expiration">
      <label for="card-expiration-month">Expiration date</label>
      <div class="select" style="background-color: white;">
        <select name="month" id="card-expiration-month">
          <option></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      </div>
      <div class="select" style="background-color: white;">
        <select name="year" id="card-expiration-year">
          <option></option>
          <option>2016</option>
          <option>2017</option>
          <option>2018</option>
          <option>2019</option>
          <option>2020</option>
          <option>2021</option>
          <option>2022</option>
          <option>2023</option>
          <option>2024</option>
          <option>2025</option>
        </select>
      </div>
    </fieldset>
    <fieldset class="fieldset-ccv">
      <label for="card-ccv">CCV</label>
      <input name="ccv" type="text" id="card-ccv" maxlength="3" style="background-color: white;">
    </fieldset>
    <button name="submit" class="btn"><i class="fa fa-lock"></i> submit</button>
  </form>
</div>
</body>

 <?php include("footer.php"); ?>
</html>

<script type="text/javascript">
            var sh = window.location.href,
            year = "year";
            card = "card";
            address = "address";
            ccv = "ccv";
            month = "month";

 if(sh.includes(year)){
    alert("No year selected");
} else if(sh.includes(card)){
    alert("The card number entered is not valid");
} else if(sh.includes(address)){
    alert("Mailing address was not entered");
} else if(sh.includes(ccv)){
    alert("Invalid CCV entered");
} else if(sh.includes(month)){
    alert("No month selected");
}

</script>