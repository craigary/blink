<?php require('includes/config.php'); 
$id = $_GET['id'];
// Create a template
$sql = "SELECT * FROM blink_contents WHERE cid = ?";
//Create a prepared statement
$stmt = mysqli_stmt_init($db);
//Prepare the prepared statement
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
//Run
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

//if post does not exists redirect user.
	if($row['cid'] == ''){
		header('Location: ./');
		exit;
	}

require('includes/header.php') ?>
		<div class="title is-parent">
		<article class="title is-child typo">
		<?php
				echo '<p class="title">'.$row['title'].'</p>';
				echo '<p class="subtitle">Posted on '.date('jS M Y', strtotime($row['modified'])).'</p>';
				echo '<div class="content">'.$row['text'].'</div>';
		?>
	</article>
	</div>
<?php require('includes/footer.php') ?>