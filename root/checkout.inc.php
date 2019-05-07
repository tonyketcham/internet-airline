<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){
     
    $_SESSION['quantity'] = $_POST['quantity'];

     } if(!isset($_SESSION['email'])){
                header ("Location: checkout-login.php?log in first");
                exit;
            } else {
            	header ("Location: payment.php?sucess");
            }

 ?>