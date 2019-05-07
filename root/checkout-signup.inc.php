<?php 

if (isset($_POST['submit'])){

	include("dbconnect.php");

	$cname = mysqli_real_escape_string($link, $_POST['fullname']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	//$cpassword = mysqli_real_ecape_string($link, $_POST['confirmPassword']);

	if ($cname == "" || $email == "" || $password == "") {
		header("Location: checkout-sign-up.php?signup=empty");
		exit();
	} else {
		//Input character check
		if(preg_match("/^[a-zA-Z]*$/", $cname)) {
		header("Location: checkout-sign-up.php?signup=Invalid characters entered");
		exit();
		} else {
			//Email check
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: checkout-sign-up.php?signup=Email not valid");
				exit();
			} else {
				$sql = "SELECT * FROM customer WHERE email='$email'";
				$result = mysqli_query($link, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: checkout-sign-up.php?signup=user already exists with this email");
					exit();
				} else {
					// //Hashing password
					// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					
					//Insert customer into DB
					$sql = "INSERT INTO customer (cname, email, password) VALUES ('$cname', '$email', '$password')";
					mysqli_query($link, $sql);


					$sql = "SELECT * FROM customer WHERE email='$email' AND password = '$password'";
					$result = mysqli_query($link, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck < 1) {
						header("Location: checkout-login.php?login=Invalid login info");
						$message = "<div class='alert alert-danger'>Invalid Log In Info</div>";
						exit();
					} else {
						$row = mysqli_fetch_assoc($result);
						if ($password = $row['password']) {
							$_SESSION['email'] = $row['email'];
							$_SESSION['fullname'] = $row['cname'];
							$_SESSION['address'] = $row['address'];

							header("Location: payment.php?login=success");
							mysqli_close($link);
							exit();
						} else {
							header("Location: checkout-login.php?login=Invalid password");
							exit();
						}
					}
				}
			}
		}
	}

} else {
	header("Location: checkout-sign-up.php");
	exit();
}

mysqli_close($link);
 ?>