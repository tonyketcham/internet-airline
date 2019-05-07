<?php 
session_start();
date_default_timezone_set('America/Chicago');


if(isset($_POST['submit'])) {
	include("dbconnect.php");

	$quantity = $_SESSION['quantity'];
	$dfid = $_SESSION['dfid'];
	$cardnum = (string)$_SESSION['cardnum'];
	$cardmonth = $_SESSION['month'];
	$cardyear = $_SESSION['year'];
	$ccv = $_SESSION['ccv'];
	$today = new DateTime("today");
	$today = $today->format('Y-m-d');


	$check_davail = "SELECT available FROM flight WHERE fid = '$dfid'";
	$result = mysqli_query($link, $check_davail);
		$row = mysqli_fetch_assoc($result);

		$available = $row['available'];
		$available = $available - $quantity;

		if ($available < 0) {
			header('Location: order-review.php?Flight Full');
			exit;
			
		}
		$email	= $_SESSION['email'];
		$findCid = "SELECT cid FROM customer WHERE email = '$email'";
		$result = mysqli_query($link, $findCid);
		$row = mysqli_fetch_assoc($result);
		$cid = $row['cid'];



	if($_SESSION['roundtrip']){ 
		$rfid = $_SESSION['rfid'];



		//Return fid trigger
		$check_ravail = "SELECT available FROM flight WHERE fid = '$rfid'";
		
		$result = mysqli_query($link, $check_ravail);
		$row = mysqli_fetch_assoc($result);

		$ravailable = $row['available'];
		$ravailable = $ravailable - $quantity;

		if ($available < 0) {
			header('Location: order-review.php?Flight Full');
			exit;
			
		}

		//Placing reservation

		$makeReservation = "INSERT INTO reservation (cid, dfid, rfid, qty, cardnum, cardmonth, cardyear, ccv, order_date) VALUES ('$cid', '$dfid', '$rfid', '$quantity', '$cardnum', '$cardmonth', '$cardyear', '$ccv', '$today')";
		mysqli_query($link, $makeReservation);

		

		$reservation_ravail = "UPDATE flight SET available = '$ravailable' WHERE fid = '$rfid'";
		mysqli_query($link, $reservation_ravail);


		
	} else {

		//Placing reservation           
		$makeReservation = "INSERT INTO reservation (cid, dfid, rfid, qty, cardnum, cardmonth, cardyear, ccv, order_date) VALUES ('$cid', '$dfid', NULL, '$quantity', '$cardnum', '$cardmonth', '$cardyear', '$ccv', '$today')";
		mysqli_query($link, $makeReservation);


		header("Location: success.php");
		mysqli_close($link);
		exit;
	}

	$reservation_davail = "UPDATE flight SET available = '$available' WHERE fid = '$dfid'";
	mysqli_query($link, $reservation_davail);

	header("Location: success.php");

} else {
	header("Location: order-review.php?Error");
		exit;
}

 ?>