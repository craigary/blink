<?php require('includes/config.php');
	require('includes/paginator.php');
	require('includes/header.php'); ?>
		<div class="title is-parent">
		<?php
			//$result = mysqli_query($db, 'SELECT * FROM blink_contents ORDER BY cid DESC');
			// add pagenator later!!!!!!
			// $pages = new Paginator($postsPerPage,'p');
			//$sql = 'SELECT cid FROM blink_contents';
			//$stmt = mysqli_query($db,$sql);
			// $pages->set_total(mysqli_num_rows($stmt));
			$sql = 'SELECT * FROM blink_contents ORDER BY cid DESC';
			$stmt = mysqli_query($db,$sql);
			while($row = mysqli_fetch_assoc($stmt)){
				echo '<div class="post">';
						echo '<h1 class="post_title"><a href="viewpost.php?id='.$row['cid'].'">'.$row['title'].'</a></h1>';
						echo '<div class="post_info"><p class="post_date">Posted on '.date('jS M Y H:i:s', strtotime($row['modified'])).'</p>';
							$sql = "SELECT * FROM blink_metas WHERE mid = ".$row['categories']." & 'type' = 'category' ORDER BY mid DESC";
							$stmt2 = mysqli_query($db,$sql);
							$cate = mysqli_fetch_assoc($stmt2);
						echo '<p class="post_category"><a href="/?cid='.$cate['mid'].'" title="'.$cate['description'].'">#'.$cate['name'].'</a></p></div>';
						echo '<p class="desc">'.$row['description'].'</p>';
						echo '<p><a href="viewpost.php?id='.$row['cid'].'" class="post_readmore">Read More</a></p>';
						echo '<hr>';
					echo '</div>';
			}
			// echo $pages->page_links();
		?>
		</div>
<?php require('includes/footer.php') ?>
