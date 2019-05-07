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
    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="js/main.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
   <?php include("header.php") ?>

   <?php  if(!isset($_SESSION['noreturn'])){
                header ("Location: checkout.php");
                exit; // stop further executing, very important
            }
 ?>

 <!-- Help + FAQ
    ================================================== -->

    <section id='about' class="s-about" style='margin-bottom: 0;'>

        <div class="row section-header" data-aos="fade-up" style="margin-top: 200px;">
            <div class="col-full">
                <h3 class="subhead subhead--dark">What are you waiting for?</h3>
                <h1 class="display-1 display-1--light">Return Flights</h1>
            </div>
        </div> <!-- end section-header -->

<?php if ($_SESSION['showFlights'] == true || isset($_SESSION['makeQuery'])) {
    

       echo "<div id='fadeOut' class='row about-desc' data-aos='fade-up' hidden>";
} else {
        echo "<div id='fadeOut' class='row about-desc' data-aos='fade-up'>";
} ?>
            <div class="col-full">
                <h1 style="margin-top: -60px;">
                    Would you like to select one?
                </h1>
                <div style="margin-top: 100px; margin-bottom: -60px">
                    <form method='POST' action='return-opt.inc.php'>
                <button name="submit" value="yes" id="planTrip" class='btn btn--return'>Yes</button>
                <button name="submit" value="no" id="planTrip" class='btn btn--return' style="width: auto;">No, Checkout</button>
                    </form>
                </div>
            </div>
        </div>

</section>
<section id='flights' class='s-about'>
        <div class="wrapper">

            <?php if ($_SESSION['showFlights'] == true) {
    

                   echo "<div id='flightSelection' class='Greatest-Deals fillerbox material--shadow' data-aos='fade-up' style='background-color: #292929; border-radius: 1.3rem; margin-top: -150px; margin-bottom: 60px; padding-bottom: 20px; padding-top: 20px;'>";

                    include("dbconnect.php");

                    $returndate = $_SESSION['returndate'];
                    $origin = $_SESSION['origin'];
                    $dest = $_SESSION['dest'];

                    $resultSet = $link->query("SELECT fid, fnumber, fdate, ftime, orig, dest, class, price FROM flight WHERE fdate > cast((now()) as date) AND fdate = '$returndate' AND orig = '$dest' AND dest = '$origin' AND available > 0 ORDER BY price ASC");


                     ?>
                     <div class="fillerbox">
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
                            echo "<div class='tuple-wrapper'><img class='plane-logo-tuple' src='plane-logo.svg' width='72' height='72'><form name='$fid' class='flightTuple' method='POST' action='return.inc.php'>
                            <h5>Flight Number: $title <br> Date: $date <br> Departure Time: $ftime <br><br> Origin: $origin <br> Destination: $dest <br> Class: $class <br> $$price.00 </h5> <input type='hidden' name='rfid' value='$fid'><button type='submit' name='submit' class='btn--primary material--shadow btnshift' style='border-radius: 1.2rem; '>Select</button>
                            </form></div>";    
                         }
                          ?>
                          </div>
                          <?php 

            } ?>

    <?php if (isset($_SESSION['makeQuery'])) {
                if ($_SESSION['makeQuery'] == true) {



                    echo "
                    <div style='z-index: 2; width: 250px; margin-left: auto; margin-right: auto; margin-top: -200px;'><div class='container--material' style='background-color: rgb(227, 227, 227);'>
                        <form action='return-search.inc.php' method='POST' style='margin-bottom: -70px; padding-left: 10px;'>
                            <div class='cont--inline'>
                            <h6 class='container--material--txt' style='text-align: center;'>Depart: " . $_SESSION['date'] . "</h6>
                            <h3 class='container--material--txt' style='text-align: center;'>Return Date</h3>
                            <input type='date' name='return' style='border-color: #E5E5E5; background-color: transparent; color: #151515; text-align: right;'>                    
                            
                                <button id='submit' name='submit' class='btn btn--primary larger material--shadow' style='border-radius:1.2rem; width: 100%; margin-left: auto; margin-right: auto;'>
                                    Submit
                                </button>
                           </div>
                        </form></div></div>";
                }
                
            } ?>

                     
            </div>
            
        </div>
    </section> <!-- end s-about -->


<!-- footer
    ================================================== -->
    <footer>

        <div class="row footer-main">

            <div class="col-six tab-full left footer-desc">

              <div class="footer-logo"></div>
                We give you the most for the least. Leg room lacking on other airlines? Not enough overhead baggage space? Exotic destinations limited to layovers and connecting flights? We've got you covered. See the world with direct flights to almost anywhere you can imagine. 

            </div>

            <div class="col-six tab-full right footer-subscribe">

                <h4>Get Notified</h4>
                <p>We send out free tickets every month to two lucky winners. Stay in the loop for a chance to win:</p>

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

<script type="text/javascript">
            var sh = window.location.href,
            empty = "empty";
            origin = "Origin%20cannot%20equal%20Destination";
            returnbefore = "search=return%20flight%20cannot%20be%20before%20departure";
            timetravel = "we%20can't%20time%20travel%20yet,%20sorry";

 if(sh.includes(empty)){
    alert("Required fields were left empty");
} else if(sh.includes(origin)){
    alert("The origin cannot match the destination");
} else if(sh.includes(returnbefore)){
    alert("The return flight cannot happen before you get there");
} else if(sh.includes(timetravel)){
    alert("We can't time travel yet.\n\nSorry.");
}

</script>