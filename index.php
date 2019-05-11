<?php
	require('includes/config.php');
    require('includes/paginator.php');
    require('includes/Parsedown.php');
    require('includes/header.php'); ?>
    <div class="column sidebar">
    </div>
    <div class="column">
    <!-- article starts here -->
    <?php
    $result = mysqli_query($db, 'SELECT * FROM blink_contents WHERE isPage=0');
    $num_rows = mysqli_num_rows($result);
    $postsPerPage = $settings['postsPerPage'];
    if($num_rows<=$postsPerPage) {
        $sql = 'SELECT * FROM blink_contents WHERE isPage=0 ORDER BY cid DESC';
    } else {
        $sql = 'SELECT * FROM blink_contents WHERE isPage=0 ORDER BY cid DESC '.getLimits($postsPerPage, $page);  
    }
    $stmt = mysqli_query($db,$sql);
    $Parsedown = new Parsedown();
    while($row = mysqli_fetch_assoc($stmt)){
        $sql2 = 'SELECT screenName FROM blink_users WHERE uid = '.$row['authorId'];
        $userResult = mysqli_fetch_assoc(mysqli_query($db,$sql2));
        $sql3 = 'SELECT * FROM blink_metas WHERE mid = '.$row['categories'];
        $cateResult = mysqli_fetch_assoc(mysqli_query($db,$sql3));
        echo '<article>';
        echo '<h1 class="title"><a href="viewpost.php?id='.$row['cid'].'">'.$row['title'].'</a></h1>';
        echo '<p class="info">';
        echo 'Posted on '.date('jS M Y H:i:s', strtotime($row['modified'])).' by ';
        echo $userResult['screenName'].'. ';
        echo 'Filed by ';
        echo '<a href="filter.php?method=category&s='.$row['categories'].'">';
        echo $cateResult['name'];
        echo '</a>';
        echo '</p>';
        echo '<article class="descriptionText">';
        echo $Parsedown->text($row['description']); 
        echo '</article>';
        echo '<a href="viewpost.php?id='.$row['cid'].'" class="button readmore">Readmore</a>';
        echo '<hr>';
        echo '</article>';
    }

                if($num_rows >= $postsPerPage) {
    echo '<nav class="pagination is-rounded is-white" role="navigation" aria-label="pagination">';
    displayPagination ($num_rows, $postsPerPage, $page, $currentParameter);
    echo '</nav>';
    echo '<hr>';
} ?>
            </div>
        </div>
    </div>
</section>

<?php require('includes/footer.php') ?>