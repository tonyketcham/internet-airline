    <?php  if(isset($_SESSION['email'])){
                header ("Location: index.php?Already signed in");
                exit;
            }
 ?>

 <!doctype html>

<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

  <head>

    <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="  sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->

    <link href="css/signin.css" rel="stylesheet">



    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Internet Airline - Log In</title>
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
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.php">
                <img src="images/logo.png" alt="Homepage">
            </a>
        </div>

        <nav class="header-nav">

            <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

            <div class="header-nav__content">
                <h3>Navigation</h3>
                
                <ul class="header-nav__list">
                    <li class="current"><a  href="index.php" title="home">Home</a></li>
                    <li><a href="trip.php" title="start over">Start Over</a></li>
                    <li><a href="index.php#great-deals" title="great deals">Great Deals</a></li>
                    <li><a href="help.php" title="help">Help + FAQ</a></li>
                    <li><a href="index.php#contact" title="contact">Contact Us</a></li>
                </ul>
    
                <p>We hope you find what you're looking for. Need any help?<br> <a href="help.php">Click here.</a></p>
    
                <ul class="header-nav__social">
                    <li>
                        <a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://instagram.com"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>

            </div> <!-- end header-nav__content -->

        </nav>  <!-- end header-nav -->

        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>

    </header> <!-- end s-header -->

  <body class="text-center">
    <div class="space">
    <form class="form-signin sign-in" id="telement" action="checkout-signup.inc.php" method="POST">
      <a href="index.php">
      <img class="plane-logo" src="plane-logo.svg" alt="" width="72" height="72">
      </a>
     

      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <input type="text" name="fullname" class="form-control" placeholder="Full name" required autofocus>
      <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
      <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
      <button type="submit" name="submit" class="btn-block btn--primary">Sign Up</button>

      <?php 
        if (isset($_GET['signup'])) {
            print '<script type="text/javascript">alert("' . $_GET['signup'] . '");</script>';
          }
           
       ?>

     </form>
      <div class="form-signin sign-in">
      <h6>Already have an account?</h6>
      <form class="buttonSpace" action="checkout-login.php">
       <button class="btn btn-lg btn-primary btn-block" type="login">Log in</button>
      </form>
      <form class="buttonSpace" action="checkout.php">
        <button class="btn btn-lg btn btn-block" type="go-back" name="go-back">Go back</button>
      </form>
      <h6>&copy; The Internet Airline 2018</h6>
    </div>
  </div>
  </body>


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
