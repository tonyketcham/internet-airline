<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

include("dbconnect.php");

$fid = $_POST['fid'];
$_SESSION['dfid'] = $fid;

$sql = "SELECT * FROM flight WHERE fid = '$fid'";
$result = mysqli_query($link, $sql);
	$row = $result->fetch_assoc();

	$origin = $row["dest"];
	$dest = $row["orig"]; 
	$tempdate = strtr($row["fdate"], '/', '-');
	$date = DateTime::createFromFormat('Y-m-d', $tempdate);
	$date = $date->format('Y-m-d');
	$class = $row["class"];



	$return_date_time = DateTime::createFromFormat('Y-m-d', $tempdate);
	$return_date_time->add(new DateInterval('P7D'));
	$return_date_time = $return_date_time->format('Y-m-d');


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



$_SESSION['date'] = $date;
$_SESSION['returndate'] = $return_date_time;
$_SESSION['origin'] = $dest;
$_SESSION['dest'] = $origin;
$_SESSION['noreturn'] = true;
$_SESSION['showFlights'] = false;

if (isset($_SESSION['makeQuery'])) {
	unset($_SESSION['makeQuery']);
}


					
header("Location: return.php");
exit();

} else {
	header("Location: index.php#great-deals");
	exit();
}
 ?>