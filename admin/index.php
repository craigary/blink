<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delpost'])){
$id = $_GET['delpost'];
// Create a template
$sql = "DELETE FROM iceland_contents WHERE postID = ?";
//Create a prepared statement
$stmt = mysqli_stmt_init($db);
//Prepare the prepared statement
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
//Run
mysqli_stmt_execute($stmt);
header('Location: index.php?action=deleted');
	exit();
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/bulma.min.css">
  <link rel="stylesheet" href="../style/main.css">
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }

  </script>
</head>
<body>

	<div id="wrapper">

	<?php include('menu-posts.php');?>

	<?php
	//show message from add / edit page
	if(isset($_GET['action'])) {
        if ($_GET['action'] == 'deleted') {
            echo '<div class="notification is-danger">';
            echo '<button class="delete"></button>';
            echo 'Post deleted.';
            echo '</div>';
        } elseif ($_GET['action'] == 'posted') {
            echo '<div class="notification is-info">';
            echo '<button class="delete"></button>';
            echo 'Post created.';
            echo '</div>';
        } elseif ($_GET['action'] == 'modified') {
            echo '<div class="notification is-info">';
            echo '<button class="delete"></button>';
            echo 'Post modified.';
            echo '</div>';
        } elseif ($_GET['action'] == 'settingsupdated') {
            echo '<div class="notification is-success">';
            echo '<button class="delete"></button>';
            echo 'Settings Updated.';
            echo '</div>';
        }
    }
	?>
	<div class="box">
	<table class="table">
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php
			$sql = "SELECT postID, postTitle, postDate FROM iceland_contents ORDER BY postID DESC";
			$result = mysqli_query($db, $sql);
			$resultCheck = mysqli_num_rows($result);
				if ($resultCheck == 0) {
					echo '<p class="">You have no posts!</p>';
				} else {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr>';
						echo '<td>'.$row['postTitle'].'</td>';
						echo '<td>'.date('jS M Y', strtotime($row['postDate'])).'</td>';
						echo '<td>';
						echo'<a href="edit-post.php?id='?><?php echo $row['postID'];?><?php echo'">Edit</a> |';
						?>
						<a href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Delete</a>
						<?php

						echo '</td>';
						echo '</tr>';
					}
                }
				?>
	</table>
	</div>

	<a class="button is-danger is-rounded" href="add-post.php">Add Post</a>

</div>
<script type="text/javascript">
	$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden').remove();
    return false;
	});
</script>
</body>
</html>
