<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

	if($_POST['submit'] == 'no'){
		$_SESSION['noreturn'] = false;
		$_SESSION['roundtrip'] = false;
		if (isset($_SESSION['rfid'])) {
			unset($_SESSION['rfid']);
		}
		header("Location: checkout.php");
		exit();
	} else {	

		$_SESSION['roundtrip'] = true;
		$hasReturn = $_SESSION['noreturn'];
		if ($hasReturn) {
			$_SESSION['showFlights'] = true;
			$_SESSION['makeQuery'] = false;
			header("Location: return.php");
			exit();
		} else {
			$_SESSION['showFlights'] = false;
			$_SESSION['makeQuery'] = true;
			header("Location: return.php");
			exit();
		}

	}
} else {
	header("Location: return.php");
	exit();
	}
 ?>