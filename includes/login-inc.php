<?php

if (isset($_POST['submit'])) {

	include 'config.php';

	$unm = mysqli_real_escape_string($db, $_POST['username']);
	$pwd = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($unm) || empty($pwd)) {
		header("Location: ../admin/login.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM blog_members WHERE username='$unm'";
		$result = mysqli_query($db, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../admin/login.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				// De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $row['password']);
				if ($hashedPwdCheck == false) {
					header("Location: ../admin/login.php?login=error");
					exit();
				}elseif ($hashedPwdCheck == true) {
					// Login the user here
					$_SESSION['loggedin'] = true;
				    $_SESSION['unm'] = $row['username'];
				    header("Location: ../admin");				}
			}
		}
	}

} else {
	header("Location: ../admin/login.php?login=error");
	exit();
}