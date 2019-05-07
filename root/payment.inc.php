<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])) { 

	$submitbutton= $_POST['submit'];
	include("dbconnect.php");

$cardnum = mysqli_escape_string($link, $_POST['cardnum']);
$address = mysqli_escape_string($link, $_POST['address']);
$month = mysqli_escape_string($link, $_POST['month']);
$year = mysqli_escape_string($link, $_POST['year']);
$ccv = mysqli_escape_string($link, $_POST['ccv']);

$today = new DateTime("today");

	$number= $cardnum;

	function validatecard($number)
	 {
	    global $type;

	    $cardtype = array(
	        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
	        "mastercard" => "/^5[1-5][0-9]{14}$/",
	        "amex"       => "/^3[47][0-9]{13}$/",
	        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
	    );

	    if (preg_match($cardtype['visa'],$number))
	    {
		$type= "visa";
	        return 'visa';
		
	    }
	    else if (preg_match($cardtype['mastercard'],$number))
	    {
		$type= "mastercard";
	        return 'mastercard';
	    }
	    else if (preg_match($cardtype['amex'],$number))
	    {
		$type= "amex";
	        return 'amex';
		
	    }
	    else if (preg_match($cardtype['discover'],$number))
	    {
		$type= "discover";
	        return 'discover';
	    }
	    else
	    {
	        return false;
	    } 
	 }


if (!validatecard($number)){
	header("Location: payment.php?error=Not a valid card number"); 
	exit;
} else {
	if (empty($address)) {
	header("Location: payment.php?error=No address entered"); 
	exit;
	} else {
		if (empty($month)) {
	header("Location: payment.php?error=No month selected"); 
	exit;
	} else {
		if (empty($year)) {
	header("Location: payment.php?error=No year selected"); 
	exit;
	} else {
		if (empty($ccv) || strlen($ccv) != 3) {
	header("Location: payment.php?error=CCV invalid"); 
	exit;
	} else {
			$email = $_SESSION['email'];
			$sql = "UPDATE customer SET address = '$address' WHERE email = '$email'";
			mysqli_query($link, $sql);
			header("Location: index.php?updated"); 

			$_SESSION['cardnum'] = $cardnum;
			$_SESSION['month'] = $month;
			$_SESSION['year'] = $year;
			$_SESSION['ccv'] = $ccv;

			header("Location: order-review.php?review");
			exit();

	}
}
}
}
}
} else {
	header("Location: payment.php?error=error");
		exit();
	}
?>
	