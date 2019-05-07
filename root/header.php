 <header class="s-header">
        <?php session_start(); ?>

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
                    <li class="current"><a class="smoothscroll"  href="#home" title="home">Home</a></li>
                    <li><a href="trip.php" title="start over">Start Over</a></li>
                    <li><a  href="index.php#great-deals" title="great deals">Great Deals</a></li>
                    <li><a  href="help.php" title="help">Help + FAQ</a></li>
                    <li><a  href="index.php#contact" title="contact">Contact Us</a></li>
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

    <span class="home-content__buttons user-log-in">
        <?php if (isset($_SESSION['email'])) {
            echo '<div class = "user-login-text" style="color: white; position: absolute; width: 100%;">Hello, '. $_SESSION['fullname'] .'</div>';
            echo '<form action="logout.inc.php" method="POST" style="margin-left: -180px;">
                  <button type="submit" name="submit" class="btn btn--stroke btn-small">Logout</button>
                </form>';


        } else {
            echo '<div style="margin-left: 20%;">
                <a href="sign-in.php" class="btn btn--primary btn-small" style="margin-left: -180px;">Log In</a>
                  <a href="sign-up.php" class="btn btn--stroke btn-small" style="text-align: center;">Sign Up</a>
                  </div>';
        }

         ?>



        <a class="header-menu-toggle" href="#0">
            <span class="header-menu-text">Menu</span>
            <span class="header-menu-icon"></span>
        </a>
    </span>
    </header> <!-- end s-header -->