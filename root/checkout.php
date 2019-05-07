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
    <?php include("header.php"); ?>



 <!-- Help + FAQ
    ================================================== -->

    <section id='trip' class="s-home target-section" >

  <div id="planflight">
    <div class="home-content" style="width: 550px; margin-left: auto !important; margin-right: auto !important; display: block;">

            <div class="row home-content__main" style="

                position: relative; 
                margin-left: auto !important; 
                margin-top: 140px;

                margin-right: auto !important; width: 100%;
                border: 3px solid green;
                padding: 50px;">
                    <form action="checkout.inc.php" method="POST">
                    <h1> Checkout</h1>
                    <div class="container--material" style="background-color: rgb(227, 227, 227);>

                     <?php
                    include("dbconnect.php");

                    $dfid = $_SESSION['dfid'];
                    
                    if (isset($_SESSION['rfid'])) {
                         $rfid = $_SESSION['rfid'];
                    } else {
                        $rfid = -1;
                    }
                   
                    $dest = $_SESSION['dest'];

                    $resultSet = $link->query("SELECT fid, fnumber, fdate, ftime, orig, dest, class, price FROM flight WHERE fid = '$dfid' OR fid = '$rfid'");
                    $resultCheck = mysqli_num_rows($resultSet);


                     ?>
                     <div class=wrapper">
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
                            if ($rfid == $fid) {
                               echo "<h4 style='margin-top: -15px; text-shadow: 4px 6px 20px #C1C1C1;'>Return:</h4>"; 
                            } elseif ($dfid == $fid) {
                               echo "<h4 style='margin-top: -15px; text-shadow: 4px 6px 20px #C1C1C1;'>Departure:</h4>"; 
                            } 
                            
                            echo "<div class='tuple-wrapper'><img class='plane-logo-tuple' src='plane-logo.svg' width='72' height='72'><div name='$fid' class='flightTuple' style='background-color: transparent;'>
                            <h5>Flight Number: $title <br> Date: $date <br> Departure Time: $ftime <br><br> Origin: $origin <br> Destination: $dest <br> Class: $class <br> $$price.00 </h5>
                            </div></div>";    
                         }
                          ?>
                     </div>

                        <div class="cont--inline" style="display: inline-flex; margin-left: 180px; margin-right: auto;">
                        <h3 class="container--material--txt">Sets of Tickets: </h3>
                        

                     <select class="dropDown" name="quantity" style="">
                            <option name='1' value="1">1</option>;  
                            <option name='2' value="2">2</option>;
                            <option name='3' value="3">3</option>;
                            <option name='4' value="4">4</option>;
                            <option name='5' value="5">5</option>;
                            <option name='6' value="6">6</option>;
                            <option name='7' value="7">7</option>;
                            <option name='8' value="8">8</option>;
                            <option name='9' value="9">9</option>;  
                            <option name='10' value="10">10</option>;
                         }
                          </div>
                     </select>
                        </div>
                    
                 </div>
                    <div class="home-content__buttons floatright">
                        <button id="submit" name="submit" class="btn btn--primary larger material--shadow" style="border-radius: 0.2em; border-color: transparent;">
                            Submit
                        </button>
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