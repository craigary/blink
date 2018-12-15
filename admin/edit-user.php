<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/bulma.min.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

    <?php include('menu-users.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: users.php');
}

if (isset($_GET['action'])) {
    $ac = $_GET['action'];

} else {
    $ac = '';
}

if ($ac == 'empty') {
    echo '<div class="notification is-danger">';
    echo '<button class="delete"></button>';
    echo 'Type Something Asshole!.';
    echo '</div>';
} elseif ($ac  == 'invalidusername') {
    echo '<div class="notification is-info">';
    echo '<button class="delete"></button>';
    echo 'Username invalid.';
    echo '</div>';
} elseif ($ac == 'invalidemail') {
    echo '<div class="notification is-info">';
    echo '<button class="delete"></button>';
    echo 'Password invalid.';    echo '<div class="notification is-info">';

    echo '</div>';
}

$sql = "SELECT memberID, username, email FROM iceland_users WHERE memberID = ?";
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

?>

	<form action='../includes/user-inc.php' method='post'>
		<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>

        <div class="field">
            <div class="control">
                <input class="input" type="text" name="username" placeholder="Your Name" value='<?php echo $row['username'];?>' autofocus="">
            </div>
        </div>

<div class="field">
    <div class="control">
        <input class="input" type="password" name="password" placeholder="Your Password" value=''>
    </div>
</div>
<div class="field">
    <div class="control">
        <input class="input" type="email" name="email" placeholder="Your Email" value='<?php echo $row['email'];?>'>
    </div>
</div>

        <p><button class="button is-danger is-rounded" type='submit' name='submit' value='updateuser'>Update User</button></p>

	</form>

</div>

<script type="text/javascript">
	$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden').remove();
    return false;
	});
</script>


</body>
</html>
