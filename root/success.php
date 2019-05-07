<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Internet Airline</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <?php include("header.php");

    if(!isset($_SESSION['email']))
    {
    header("Location: checkout-login.php");
    exit;
    }
                                    date_default_timezone_set('America/Chicago');
                                    $today = new DateTime("today");
                                 $today = $today->format('Y-m-d');
    ?>



 <!-- Help + FAQ
    ================================================== -->

    <section id='trip' class="s-home target-section" >

  <div id="planflight">
    <div class="home-content" style="width: 950px; margin-left: auto !important; margin-right: auto !important; display: block;">

            <div class="row home-content__main" style="

                position: relative; 
                margin-left: auto !important; 
                margin-top: 140px;

                margin-right: auto !important; width: 100%;
                border: 3px solid #80FFBF;
                padding: 50px;">
                    <form action="order-review.inc.php" method="POST">
                    <h1> Thanks for your purchase!</h1>
                    <div class="container--material" style="background-color: rgb(227, 227, 227); height: 670px;">

                     <?php
                    include("dbconnect.php");

                    $dfid = $_SESSION['dfid'];
                    
                    if (isset($_SESSION['rfid'])) {
                         $rfid = $_SESSION['rfid'];
                    } else {
                        $rfid = -1;
                    }
                   
                    $email = $_SESSION['email'];

                    $resultSet = $link->query("SELECT fid, fnumber, fdate, ftime, orig, dest, class, price, capacity, available FROM flight WHERE fid = '$dfid' OR fid = '$rfid'");

                    $resultSet2 = $link->query("SELECT cname, email, address FROM customer WHERE email = '$email'");


                     ?>
                     <div class=wrapper" style="display: inline-flex;">
                     <div class="fillerbox" style="margin-left: 50px; padding-top: 50px;">
                         <?php 

                         while ($rows = $resultSet->fetch_assoc())

                        {
                            $fid = $rows['fid'];
                            $title = $rows['fnumber'];
                            $date = $rows['fdate'];
                            $ftime = $rows['ftime'];
                            $origin = $rows['orig'];
                            $dest = $rows['dest'];
                            $class = $rows['class'];
                            $price = $rows['price'];
                            $capacity = $rows['capacity'];
                            $avail = $rows['available'];

                            if ($rfid == $fid) {
                               echo "<h4 style='margin-top: -15px; text-shadow: 4px 6px 20px #C1C1C1;'>Return:</h4>"; 
                            } elseif ($dfid == $fid) {
                               echo "<h4 style='margin-top: -15px; text-shadow: 4px 6px 20px #C1C1C1;'>Departure:</h4>"; 
                            } 
                            
                            echo "<div class='tuple-wrapper'><img class='plane-logo-tuple' src='plane-logo.svg' width='72' height='72'><div name='$fid' class='flightTuple' style='background-color: transparent;'>
                            <h5>Flight Number: $title <br> Date: $date <br> Departure Time: $ftime <br><br> Origin: $origin <br> Destination: $dest <br> Class: $class <br> Open Seats: $avail/$capacity <br> Price: $$price.00 </h5>
                            </div></div>";
                              
                         }

                         $total = $_SESSION['total'];

                         while ($rows2 = $resultSet2->fetch_assoc()) {

                            $cname = $rows2['cname'];
                            $address = $rows2['address'];
                            $email = $rows2['email'];
                            $quantity = $_SESSION['quantity'];


                            
                            echo "<div class='tuple-wrapper' style='width:100%; float: right; position: absolute; height: 500px; margin-top: -60px; margin-bottom: auto;'><div name='$fid' class='flightTuple' style='background-color: transparent;  width:100%; margin-top: -10px; margin-bottom: -30px;'>
                            <h4>Order Details: <br>Order Date: $today </h4><h4>Placed by: $cname <br> Email: $email <br> Mailing Address: $address <br><br> Sets of tickets: $quantity<br> Paid: $$total</h4>
                            </div></div>";
                         }
                          ?>
                     </div>

                    
                 </div>
                  </form>
                </div>
            </div>
        </div>


    </section> <!-- end s-about -->


<!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

                <div class="footer-logo"></div>
                Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Nulla porttitor accumsan tincidunt. Quaerat voluptas autem necessitatibus vitae aut.

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>Quia quo qui sed odit. Quaerat voluptas autem necessitatibus vitae aut non alias sed quia. Ut itaque enim optio ut excepturi deserunt iusto porro.</p>

                <div class="subscribe-form">
                    <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                        <input type="submit" name="subscribe" value="Subscribe">
                        <label for="mc-email" class="subscribe-message"></label>
                    </form>
                </div>

            </div>

        </div> <!-- end footer-main -->

        <div class="row footer-bottom">

            <div class="col-twelve">
                <div class="copyright">
                    <span>© Copyright The Internet Airline 2018</span> 
                    <span>Site Development by <a href="https://karmalies.studio/">Tony Ketcham</a></span>   
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
                </div>
            </div>

        </div> <!-- end footer-bottom -->

    </footer> <!-- end footer -->


    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale-pulse-out">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>