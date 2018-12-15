<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['deluser'])){

	//if user id is 1 ignore
	if($_GET['deluser'] !='1'){
		$id = $_GET['deluser'];
		$sql = "DELETE FROM iceland_users WHERE memberID = ?";
		$stmt = mysqli_stmt_init($db);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "s", $id);
		mysqli_stmt_execute($stmt);
		header('Location: users.php?action=deleted');
			exit();
	}
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Users</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/bulma.min.css">
  <link rel="stylesheet" href="../style/main.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'users.php?deluser=' + id;
	  }
  }
  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu-users.php');

	//show message from add / edit page
	if(isset($_GET['action'])){
		if ($_GET['action'] == 'deleted') {
			echo '<div class="notification is-danger">';
			echo '<button class="delete"></button>';
			echo 'User deleted.';
			echo '</div>';
		} elseif ($_GET['action'] == 'created') {
			echo '<div class="notification is-info">';
			echo '<button class="delete"></button>';
			echo 'User created.';
			echo '</div>';
		} elseif ($_GET['action'] == 'modified') {
			echo '<div class="notification is-success">';
			echo '<button class="delete"></button>';
			echo 'User modified.';
			echo '</div>';
		}
	}
	?>
	<div class="box">
	<table class="table">
	<tr>
		<th>Username</th>
		<th>Email</th>
		<th>Action</th>
	</tr>
	<?php


			$sql= "SELECT memberID, username, email FROM iceland_users ORDER BY username";
			$result = mysqli_query($db, $sql);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				?>

				<td>
					<a href="edit-user.php?id=<?php echo $row['memberID'];?>">Edit</a>
					<?php if($row['memberID'] != 1){?>
						| <a href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Delete</a>
					<?php } ?>
				</td>

				<?php
				echo '</tr>';

			}

	?>
	</table>
	</div>
	<a class="button is-danger is-rounded" href='add-user.php'>Add User</a>

</div>
<script type="text/javascript">
	$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden').remove();
    return false;
	});
</script>
</body>
</html>
