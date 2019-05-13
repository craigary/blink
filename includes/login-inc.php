<?php
if (isset($_POST['submit'])) {
  include 'config.php';
  $unm = mysqli_real_escape_string($db, $_POST['username']);
  $pwd = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($unm) || empty($pwd)) {
    header("Location: ../admin/login.php?login=empty");
    exit();
  } else {
    $sql = "SELECT * FROM blink_users WHERE name='$unm'";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck < 1) {
      header("Location: ../admin/login.php?login=error");
      exit();
    } else {
      if ($row = mysqli_fetch_assoc($result)) {
        $checkPassword = password_verify($pwd, $row['password']);
        if ($checkPassword == false) {
          // echo $checkPassword;
          // echo "123";
          header("Location: ../admin/login.php?login=wrongPass");
          exit();
        } elseif ($checkPassword == true) {
          // Login the user here
          $_SESSION['loggedin'] = true;
          $_SESSION['uid'] = $row['uid'];
          header("Location: ../admin/?action=success");
        }
      }
    }
  }
} else {
  header("Location: ../admin/login.php?login=error");
  exit();
}
