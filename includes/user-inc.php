<?php
include_once 'config.php';

if ($_POST['submit']=="create") {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	//Error handlers
	//Check for empty fields
	if (empty($username) || empty($email) || empty($password)) {
		header("Location: ../admin/add-user.php?action=empty");
		exit();
	} else {
		//Check if input chars are valid
		if (!preg_match("/^[a-zA-Z]*$/", $username)) {
			header("Location: ../admin/add-user.php?action=invalidusername");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../admin/add-user.php?action=invalidemail");
				exit();
			} else {
				$sql = "SELECT * FROM iceland_users WHERE username = '$username'";
				$result = mysqli_query($db, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: ../admin/add-user.php?action=usertaken");
					exit();
				} else {
					//hashing the pass
					$hashedPWD =  password_hash($password, PASSWORD_DEFAULT);
					//Insert the user into the db
					$sql = "INSERT INTO `iceland_users`(`username`, `password`, `email`) VALUES ('$username', '$hashedPWD', '$email');";
					mysqli_query($db, $sql);
					header("Location: ../admin/users.php?action=created");
					exit();
				}
			}
		}
	}

}elseif ($_POST['submit']=="updateuser"){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $memberid = mysqli_real_escape_string($db, $_POST['memberID']);
    //Check for empty fields
    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../admin/edit-user.php?id=".$memberid."&action=empty");
        exit;
    } else {
        //Check if input chars are valid
        if (!preg_match("/^[a-zA-Z]*$/", $username)) {
            header("Location: ../admin/edit-user.php?id=".$memberid."&action=invalidusername");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../admin/edit-user.php?id=".$memberid."&action=invalidemail");
                exit();
            } else {
                    //hashing the pass
                    $hashedPWD =  password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE iceland_users SET username = $username, password = $hashedPWD email = $email WHERE memberID = $memberid;";
                    mysqli_query($db, $sql);
                    header("Location: ../admin/users.php?action=modified");
                    exit();
                }
            }
        }
} else {
//	header("Location: ../admin/users.php");
//	exit();
    echo "Fuck You!";
}
