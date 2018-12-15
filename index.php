<?php require('includes/config.php');
	require('includes/paginator.php');
	require('includes/header.php'); ?>
		<div class="title is-parent">
		<?php
			$result = mysqli_query($db, 'SELECT * FROM iceland_contents ORDER BY cid DESC');
			$pages = new Paginator($postsPerPage,'p');
			$sql = 'SELECT cid FROM iceland_contents';
			$stmt = mysqli_query($db,$sql);
			$pages->set_total(mysqli_num_rows($stmt));
			$sql = 'SELECT * FROM iceland_contents ORDER BY cid DESC'.$pages->get_limit();
			$stmt = mysqli_query($db,$sql);
			while($row = mysqli_fetch_assoc($stmt)){
				echo '<div class="post">';
						echo '<h1 class="post_title"><a href="viewpost.php?id='.$row['cid'].'">'.$row['title'].'</a></h1>';
						echo '<div class="post_info"><p class="post_date">Posted on '.date('jS M Y H:i:s', strtotime($row['modified'])).'</p>';
						echo '<p class="post_category"><a href="#">#trial</a></p></div>';

							$categoryid = $row['category'];
							$sql = 'SELECT * FROM iceland_categories WHERE cid = '.$categoryid.'ORDER BY mid DESC';
							$stmt = mysqli_query($db,$sql);
							$cate = mysqli_fetch_assoc($stmt);
							echo '<p class="post_category"><a href="#" title="'.$cate['description'].'">#'.$cate['name'].'</a></p></div>';
						
						echo '<p class="desc">'.$row['description'].'</p>';
						echo '<p><a href="viewpost.php?id='.$row['cid'].'" class="post_readmore">Read More</a></p>';
						echo '<hr>';
					echo '</div>';
			}
			echo $pages->page_links();
		?>
		</div>
<?php require('includes/footer.php') ?>
