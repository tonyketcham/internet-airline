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
   <?php include("header.php") ?>

 <!-- Help + FAQ
    ================================================== -->

    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead subhead--dark">What are you waiting for?</h3>
                <h1 class="display-1 display-1--light">Let's take you places</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full">
                <h4 style="color: white; margin-bottom: -15px; margin-top: -3px; ">
                    Showing Results for <?php echo $_SESSION['origin'] . " to " . $_SESSION['dest'] . " on " . $_SESSION['date'] . ":";?>
                </h4>
            </div>
        </div> <!-- end about-desc -->

</section>
<section id='flights' class='fillerbox'>
        <div class="wrapper-results">
            <div class="">      
                    <?php
                    include("dbconnect.php");

                    $date = $_SESSION['date'];
                    $origin = $_SESSION['origin'];
                    $dest = $_SESSION['dest'];

                    $resultSet = $link->query("SELECT fid, fnumber, fdate, ftime, orig, dest, class, price FROM flight WHERE fdate = '$date' AND orig = '$origin' AND dest = '$dest' AND available > 0 ORDER BY price ASC");

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
                            echo "<div class='tuple-wrapper'><img class='plane-logo-tuple' src='plane-logo.svg' width='72' height='72'><form name='$fid' class='flightTuple' method='POST' action='departure.inc.php'>
                            <h5>Flight Number: $title <br> Date: $date <br> Departure Time: $ftime <br><br> Origin: $origin <br> Destination: $dest <br> Class: $class <br> $$price.00 </h5> <input type='hidden' name='fid' value='$fid'><button type='submit' name='submit' class='btn--primary material--shadow btnshift' style='border-radius: 1.2rem; '>Select</button>
                            </form></div>";    
                         }
                          ?>
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