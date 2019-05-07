<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

$hasReturn = $_SESSION['noreturn'];

include("dbconnect.php");

$fid = $_POST['fid'];
$_SESSION['dfid'] = $fid;

$sql = "SELECT * FROM flight WHERE fid = '$fid'";
$result = mysqli_query($link, $sql);
	$row = $result->fetch_assoc();

	$origin = $row["dest"];
	$dest = $row["orig"];
	$tempdate = strtr($row["fdate"], '/', '-');
	$date = strtotime($tempdate);
	$class = $row["class"];

if ($hasReturn) {

	$return_date_time = $_SESSION["returndate"]; // return date

	$fnumber = rand(1000,9999);
	$mornEve = array('AM','PM');
	$elmnt = array_rand($mornEve);
		if($elmnt == 0)
			{
			$ftime = rand(1,12) . ":" . str_pad(rand(0,59), 2, "0", STR_PAD_LEFT) . " AM";
		} else {
			$ftime = rand(1,12) . ":" . str_pad(rand(0,59), 2, "0", STR_PAD_LEFT) . " PM";
		}

	$capacity = rand(100,200);
	$available = rand(30,60);
	$price = rand(200,350);

	//Insert return flight into DB
	$sql2 = "INSERT INTO flight (fnumber, fdate, ftime, price, class, capacity, available, orig, dest) VALUES ('$fnumber', '$return_date_time', '$ftime', '$price', '$class', '$capacity', '$available', '$origin', '$dest')";
	mysqli_query($link, $sql2);

	mysqli_close($link);
}	

if($hasReturn) {
	$_SESSION['returndate'] = $return_date_time;
}
$_SESSION['origin'] = $dest;
$_SESSION['dest'] = $origin;
$_SESSION['showFlights'] = false;
if (isset($_SESSION['makeQuery'])) {
	unset($_SESSION['makeQuery']);
}




					
header("Location: return.php");

exit();

} else {
	mysqli_close($link);
	header("Location: index.php");
	exit();
}
 ?>