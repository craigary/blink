<?php require('includes/config.php');
	require('includes/paginator.php');
	require('includes/header.php'); ?>

	
		<div class="title is-parent">
		<?php
			$result = mysqli_query($db, 'SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
			
			$pages = new Paginator($postsPerPage,'p');
			$sql = 'SELECT postID FROM blog_posts';
			$stmt = mysqli_query($db,$sql);
			$pages->set_total(mysqli_num_rows($stmt));
			$sql = 'SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC '.$pages->get_limit();
			$stmt = mysqli_query($db,$sql);
			while($row = mysqli_fetch_assoc($stmt)){
				echo '<div class="title is-child typo">';
						echo '<p class="title"><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></p>';
						echo '<p class="subtitle">Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p class="content">'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';
						echo '<hr>';			
					echo '</div>';
			}
			echo $pages->page_links();
		?>
		</div>
</div>
<?php require('includes/footer.php') ?>