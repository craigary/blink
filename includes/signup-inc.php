<?php

if (isset($_POST['submit'])) {
	
	include_once 'config.php';

	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	//Error handlers

	//Check for empty fields
	if (empty($username) || empty($email) || empty($password)) {
		header("Location: ../install/index.php?signup=empty");
		exit();
	} else {
		//Check if input chars are valid
		if (!preg_match("/^[a-zA-Z]*$/", $username)) {
			header("Location: ../install/index.php?signup=invalidusername");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../install/index.php?signup=invalidemail");
				exit();
			} else {
				$sql = "SELECT * FROM blog_members WHERE username = '$username'";
				$result = mysqli_query($db, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: ../install/index.php?signup=usertaken");
					exit();
				} else {
					//hashing the pass
					$hashedPWD =  password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into the db
					$sql = "INSERT INTO `blog_members`(`username`, `password`, `email`) VALUES ('$username', '$hashedPWD', '$email');";
					mysqli_query($db, $sql);
					header("Location: ../install/index.php?signup=success");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../install/index.php");
	exit();
}