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

    <!-- MySQL Database Connection
    ================================================== -->


</head>

<body id="top">

    <!-- header
    ================================================== -->
   <?php include("header.php") ?>


    <!-- home
    ================================================== -->
    <section id="home" class="s-home target-section material--shadow" data-parallax="scroll" data-image-src="images/1-milk-run-mountains-and-glaciers.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">
                <div id="fadeout">
                    <h3>Welcome to The Internet Airline</h3>

                    <h1>
                        See the world <br>
                        for the best prices <br>
                        in the industry.
                    </h1>

    <!-- Search Query
        ================================================== -->
                    <div class="home-content__buttons">
                        <div id="planTrip" class="btn btn--stroke larger">
                            Plan a trip
                        </div>
                        <a href="index.php#great-deals" class="smoothscroll btn btn--stroke larger">
                            Great Deals
                        </a>
                    </div>
                </div>
            
                <div id="planflight">
                    <form action="search.inc.php" method="POST">
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
                         mysqli_close($link);
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
                        <a href="#great-deals" class="smoothscroll btn btn--stroke larger">
                            Great Deals
                        </a>
                    </div>
                  </form>
                </div>
        </div>

        <script>
            $( "#planflight" ).hide();
            $( "#planTrip" ).click(function() {
              $( "#fadeout" ).fadeOut( "slow" );
              setTimeout(function(){

              $( "#planflight" ).fadeIn( "slow" );}
              ,600); 
                // Animation complete.
        });


    </script>

            <div class="home-content__scroll">
                <a href="#about" class="scroll-link smoothscroll">
                    <span>Scroll Down</span>
                </a>
            </div>

            <div class="home-content__line"></div>

        </div> <!-- end home-content -->


        <ul class="home-social">
            <li>
                <a href="https://facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
            </li>
            <li>
                <a href="https://instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id='about' class="s-about">

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead subhead--dark">Fly with Us for</h3>
                <h1 class="display-1 display-1--light">Unmatched service,<br>on a national scale.</h1>
            </div>
        </div> <!-- end section-header -->

        <div class="row about-desc" data-aos="fade-up">
            <div class="col-full">
                <p>
                We give you the most for the least. Leg room lacking on other airlines? Not enough overhead baggage space? Exotic destinations limited to layovers and connecting flights? We've got you covered. See the world with direct flights to almost anywhere you can imagine. 
                </p>
            </div>
        </div> <!-- end about-desc -->

        <div class="row about-stats stats block-1-4 block-m-1-2 block-mob-full" data-aos="fade-up">
                
            <div class="col-block stats__col ">
                <div class="stats__count">12</div>
                <h5>Destinations</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">806</div>
                <h5>Flights</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">9485</div>
                <h5>Happy Customers</h5>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">73</div>
                <h5>Planes in Our Fleet</h5> 
            </div>

        </div> <!-- end about-stats -->

        <div class="about__line"></div>

    </section> <!-- end s-about -->


    <!-- services
    ================================================== -->
    <div class="adobe-grey" style="padding-bottom: 100px;">
    <section id='great-deals' >

        <div class="row section-header has-bottom-sep" data-aos="fade-up">
            <div class="col-full" style="margin-top: 3rem;">
                <h3 class="subhead">Monthly</h3>
                <h1 class="display-2" style="color: #FFFFFF;">Great Deals</h1>
                
                <h3 class="subhead" style="margin-top: -8px; opacity: 0.9; color: #FFFFFF">What are you waiting for?</h3>

            </div>
        </div> <!-- end section-header -->

        <div class="Greatest-Deals fillerbox material--shadow" data-aos="fade-up" style="background-color: #292929; border-radius: 1.3rem; margin-top: -10px; margin-bottom: 60px; padding-bottom: 20px; padding-top: 20px;>

            <?php
                    include("dbconnect.php");
                    date_default_timezone_set('America/Chicago');

                    //Displays all flights which have not already happened, and which are under $200
                    $resultSet = $link->query("SELECT fid, fnumber, fdate, ftime, orig, dest, class, price FROM flight WHERE fdate > cast((now()) as date) AND price < 250 AND available > 0 ORDER BY fdate, price ASC");
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

                            echo "<div class='tuple-wrapper'><img class='plane-logo-tuple' src='plane-logo.svg' width='72' height='72'><form name='$fid' class='flightTuple' method='POST' action='great-deals.inc.php'>
                            <h5>Flight Number: $title <br> Date: $date <br> Departure Time: $ftime <br><br> Origin: $origin <br> Destination: $dest <br> Class: $class <br> $$price.00 </h5> <input type='hidden' name='fid' value='$fid'><button type='submit' name='submit' class='btn--primary material--shadow btnshift' style='border-radius: 1.2rem;'>Select</button>
                            </form></div>";    
                         }
                         mysqli_close($link);
                          ?>
                     </div>

        </div> <!-- end services-list -->

    </section> <!-- end s-services -->

</div>


    <!-- contact
    ================================================== -->
    <section id="contact" style="margin-top: 100px;">

        <div class="overlay"></div>

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Contact Us</h3>
                <h1 class="display-2 display-2--light">Reach out for a question or just say hello</h1>
            </div>
        </div>

        <div class="row contact-content" data-aos="fade-up">
            
            <div class="contact-primary">

                <h3 class="h6">Send Us A Message</h3>

                <form name="contactForm" id="contactForm" method="post" action="" novalidate="novalidate">
                    <fieldset>
    
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Your Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Your Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="Your Message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>



            </div> <!-- end contact-primary -->

            <div class="contact-secondary">
                <div class="contact-info">

                    <h3 class="h6 hide-on-fullwidth">Contact Info</h3>

                    <div class="cinfo">
                        <h5>Where to Find Us</h5>
                        <p>
                            123 Main St.<br>
                            Valparaiso, IN<br>
                            46383 US
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Email Us At</h5>
                        <p>
                            contact@InternetAirline.com<br>
                            info@InternetAirline.com
                        </p>
                    </div>

                    <div class="cinfo">
                        <h5>Call Us At</h5>
                        <p>
                            Phone: (+63) 555 4642<br>
                            Mobile: (+63) 555 5717<br>
                            Fax: (+63) 555 4213
                        </p>
                    </div>

                    <ul class="contact-social">
                        <li>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </li>
                    </ul> <!-- end contact-social -->

                </div> <!-- end contact-info -->
            </div> <!-- end contact-secondary -->

        </div> <!-- end contact-content -->

    </section> <!-- end s-contact -->


    <!-- footer
    ================================================== -->
 <?php include("footer.php"); ?>
</body>

</html>

<script type="text/javascript">
            var sh = window.location.href,
            empty = "empty";
            origin = "Origin%20cannot%20equal%20Destination";
            returnbefore = "search=return%20flight%20cannot%20be%20before%20departure";
            timetravel = "we%20can't%20time%20travel%20yet,%20sorry";
        if(sh.includes(empty) || sh.includes(origin) || sh.includes(returnbefore) || sh.includes(timetravel)){
            $('#planTrip').click();
         }

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