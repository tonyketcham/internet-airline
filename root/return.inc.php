<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

		
	$rfid = $_POST['rfid'];
	$_SESSION['rfid'] = $rfid;
	$_SESSION['roundtrip'] = true;
	header("Location: checkout.php");
	exit();	

} else {
	header("Location: return.php#no return flight registered");
	exit();
}

 ?>