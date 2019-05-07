<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

	include("dbconnect.php");

	$date1 = $_SESSION['date'];
	$date2 = $_POST['return'];

	
	$return_date_time = DateTime::createFromFormat('Y-m-d', $date2);
	// $return_date_time = $return_date_time->format('Y-m-d');
	$today = new DateTime("today");
	$date2 = $return_date_time;
	// $today = $today->format('Y-m-d');



	if ($return_date_time == "mm/dd/yyyy" || $return_date_time == "00/00/0000" || $return_date_time == "") {
		header("Location: return.php?search=empty");
		exit();
	} elseif ($date2 < $today) {

    	header("Location: return.php?search=we can't time travel yet, sorry");
		exit();
	
	} elseif ($date2 != "00/00/0000" && $date2 != "" && $date1 > $date2) {
    	header("Location: return.php?search=return flight cannot be before departure");
		exit();
	} else {

		$_SESSION['noreturn'] = false;



		$fid = $_SESSION['dfid'];

		$sql = "SELECT * FROM flight WHERE fid = '$fid'";
		$result = mysqli_query($link, $sql);
			$row = $result->fetch_assoc();

			$origin = $row["dest"];
			$dest = $row["orig"];

			$class = $row["class"];

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
			$price = rand(200,795);
			
			$return_date_time = $return_date_time->format('Y-m-d');
			
			//Insert return flight into DB
			$sql2 = "INSERT INTO flight (fnumber, fdate, ftime, price, class, capacity, available, orig, dest) VALUES ('$fnumber', '$return_date_time', '$ftime', '$price', '$class', '$capacity', '$available', '$origin', '$dest')";
			mysqli_query($link, $sql2);


		$_SESSION['returndate'] = $return_date_time;
		$_SESSION['showFlights'] = true;
		$_SESSION['makeQuery'] = false;
							
		header("Location: return.php");
		mysqli_close($link);
		exit();
	}
} else {
	header("Location: index.php");
	exit();
}
 ?>