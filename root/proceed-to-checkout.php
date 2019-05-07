<?php 

if (isset($_POST['submit'])) {
	session_start();
	header("Location: payment.php");
	exit();
} else {
	header("Location: index.php");
}
 ?>