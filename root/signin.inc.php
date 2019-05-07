<?php 

session_start();

$message = '';

if(isset($_POST['login'])) {
	include("dbconnect.php");

	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	if ($email == "" || $password == "") {
		header("Location: sign-in.php?login=Empty login info");
		exit();
	} else {
		$sql = "SELECT * FROM customer WHERE email='$email' AND password = '$password'";
		$result = mysqli_query($link, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: sign-in.php?login=Invalid login info");
			$message = "<div class='alert alert-danger'>Invalid Log In Info</div>";
			exit();
		} else {
			$row = mysqli_fetch_assoc($result);
			if ($password = $row['password']) {
				$_SESSION['email'] = $row['email'];
				$_SESSION['fullname'] = $row['cname'];
				$_SESSION['address'] = $row['address'];

				header("Location: index.php?login=success");
			} else {
				header("Location: sign-in.php?login=Invalid password");
				exit();
			}
			}
		}
} else {
	header("Location: sign-in.php?login=error");
		exit();
	}

 ?>



