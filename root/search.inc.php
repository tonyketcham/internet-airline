<?php 

session_start();
date_default_timezone_set('America/Chicago');

if (isset($_POST['submit'])){

	include("dbconnect.php");

	$origin = mysqli_real_escape_string($link, $_POST['origin']);
	$dest = mysqli_real_escape_string($link, $_POST['dest']);
	$class = mysqli_real_escape_string($link, $_POST['class']);
	$date = mysqli_real_escape_string($link, $_POST['date']);
	$returndate = mysqli_real_escape_string($link, $_POST['returndate']);
	$date1 = strtotime($date); // origin
	$date2 = strtotime($returndate); //return
	$today = strtotime("today");

	//$cpassword = mysqli_real_ecape_string($link, $_POST['confirmPassword']);

	if ($origin == "" || $origin == " " || $class == "" || $dest == "" || $dest == " " || $date == "mm/dd/yyyy" || $date == "00/00/0000" || $date == "") {
		mysqli_close($link);
		header("Location: index.php#planflight?search=empty");
		exit();
	} elseif ($date2 != "00/00/0000" && $date2 != "" && $date2 < $today) {
		mysqli_close($link);
    	header("Location: index.php#planflight?search=we can't time travel yet, sorry");
		exit();
	
	} elseif ($date2 != "00/00/0000" && $date2 != "" && $date1 > $date2) {
		mysqli_close($link);
    	header("Location: index.php#planflight?search=return flight cannot be before departure");
		exit();
	
	} elseif ($date1 < $today) {
		mysqli_close($link);
    	header("Location: index.php#planflight?search=we can't time travel yet, sorry");
		exit();
	
	}  else {
		//Input character check
		if($origin == $dest) {
			mysqli_close($link);
		header("Location: index.php#planflight?search=Origin cannot equal Destination");
		exit();

		} else {					
					//Insert flight into DB

					$fnumber = rand(1000,9999);
					$mornEve = array('AM','PM');
					$elmnt = array_rand($mornEve);
						if($elmnt == 0)
						{
							$ftime = rand(1,12) . ":" . str_pad(rand(0,59), 2, "0", STR_PAD_LEFT) . " AM";
						} else {
							$ftime = rand(1,12) . ":" . str_pad(rand(0,59), 2, "0", STR_PAD_LEFT) . " PM";
						}
					$price = rand(200, 500);
					$capacity = rand(100,200);
					$available = rand(30,60);


					$_SESSION['date'] = $date;
					$_SESSION['returndate'] = $returndate;
					$_SESSION['origin'] = $origin;
					$_SESSION['dest'] = $dest;

					if ($returndate == "mm/dd/yyyy" || $returndate == "00/00/0000" || $returndate == "") {
						$_SESSION['noreturn'] = false;
					} else {
						$_SESSION['noreturn'] = true;
					}

					$sql = "INSERT INTO flight (fnumber, fdate, ftime, price, class, capacity, available, orig, dest) VALUES ('$fnumber', '$date', '$ftime', '$price', '$class', '$capacity', '$available', '$origin', '$dest')";
					mysqli_query($link, $sql);
					mysqli_close($link);
					header("Location: departure.php");
					exit();
				}
			}

} else {
	mysqli_close($link);
	header("Location: index.php");
	exit();
}

 ?>