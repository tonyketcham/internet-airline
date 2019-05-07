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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <?php include("header.php"); ?>

 <!-- Help + FAQ
    ================================================== -->

    <section id='trip' class="s-home target-section">

  <div id="planflight">
    <div class="home-content" style="width: 100%; margin: 0 auto;">

            <div class="row home-content__main" style="margin: 20rem;
  width: 50%;
  border: 3px solid green;
  padding: 50px;">
                    <form action="trip.inc.php" method="POST">
                    <h1> Looking for somewhere to go?</h1>
                    <div class="container--material">
                        <div class="cont--inline">
                        <h3 class="container--material--txt">Origin: </h3>
                    <?php
                    include("dbconnect.php");

                    $resultSet = $link->query("SELECT title FROM city");

                     ?>
                     <select class="dropDown" name="origin">
                         <?php 
                         while ($rows = $resultSet->fetch_assoc())
                        {
                            $title = $rows['title'];
                            echo "<option name='$cityid'>$title</option>";    
                         }
                          ?>
                     </select>
                        </div>
                        <div class="cont--inline">
                        <h3 class="container--material--txt">Destination: </h3>
                    <?php

                    $resultSet = $link->query("SELECT title FROM city");

                     ?>
                     <select class="dropDown" name="dest">
                         <?php 
                         while ($rows = $resultSet->fetch_assoc())
                        {
                            $secondtitle = $rows['title'];
                            echo "<option name='$cityid'>$secondtitle</option>";    
                         }
                          ?>
                     </select>
                        </div>
                        <div class="cont--inline">
                        <h3 class="container--material--txt">Class: </h3>
                     <select class="dropDown" name="class">
                         
                         "<option name='economy'>Economy</option>";    
                         "<option name='business'>Business</option>";    
                         
                     </select>
                        </div>
                        <div class="cont--inline">
                    <h3 class="container--material--txt">Departure Date: </h3>
                    <input class="" type="date" name="date">
                        </div>                     

                        <div class="cont--inline">
                    <h3 class="container--material--txt">Return Date: </h3>
                    <input class="" type="date" name="returndate">
                        </div>                     
                 </div>
                    <div class="home-content__buttons floatright">
                        <button id="submit" name="submit" class="btn btn--primary larger">
                            Submit
                        </button>
                        <a href="index.php#great-deals" class="btn btn--stroke larger">
                            Great Deals
                        </a>
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