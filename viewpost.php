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
		<article class="post">
		<?php
				echo '<h1 class="post_title">'.$row['title'].'</h1>';
				echo '<div class="post_info"><p class="post_date">Posted on '.date('jS M Y H:i:s', strtotime($row['modified'])).'</p>';
					$sql = "SELECT * FROM blink_metas WHERE mid = ".$row['categories']." & 'type' = 'category' ORDER BY mid DESC";
					$stmt2 = mysqli_query($db,$sql);
					$cate = mysqli_fetch_assoc($stmt2);
				echo '<p class="post_category"><a href="/?cid='.$cate['mid'].'" title="'.$cate['description'].'">#'.$cate['name'].'</a></p></div>';
				echo '<p class="desc">'.$row['text'].'</p>';
?>
	</article>

<?php require('includes/footer.php') ?>
