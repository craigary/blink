<?php
    require('includes/config.php');
	require('includes/paginator.php');
    require('includes/header.php'); ?>
    <div class="column sidebar">
    </div>
    <div class="column">
    <!-- article starts here -->
    <?php
    $result = mysqli_query($db, 'SELECT * FROM blink_contents ORDER BY cid DESC');
    $num_rows = mysqli_num_rows($result);
    $postsPerPage = $settings['postsPerPage'];
    $sql = 'SELECT * FROM blink_contents ORDER BY cid DESC '.getLimits($postsPerPage, $page);
    $stmt = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($stmt)){
        $sql2 = 'SELECT screenName FROM blink_users WHERE uid = '.$row['authorId'];
        $userResult = mysqli_fetch_assoc(mysqli_query($db,$sql2));
        $sql3 = 'SELECT * FROM blink_metas WHERE mid = '.$row['authorId'];
        $cateResult = mysqli_fetch_assoc(mysqli_query($db,$sql3));
        echo '<article>';
        echo '<h1 class="title"><a href="viewpost.php?id='.$row['cid'].'">'.$row['title'].'</a></h1>';
        echo '<p class="info">';
        echo 'Posted on '.date('jS M Y H:i:s', strtotime($row['modified'])).' by ';
        echo $userResult['screenName'].'. ';
        echo 'Filed by ';
        echo $cateResult['name'];
        echo '</p>';
        echo '<article class="descriptionText">';
        echo $row['description'];
        echo '</article>';
        echo '<a href="viewpost.php?id='.$row['cid'].'" class="button is-white readmore">Readmore</a>';
        echo '<hr>';
        echo '</article>';
    }
?> 
                <nav class="pagination is-rounded is-white" role="navigation" aria-label="pagination">
                <!-- <a class="pagination-previous">Previous</a>
                <a class="pagination-next">Next page</a> -->
                <?php displayPagination ($num_rows, $postsPerPage, $page, $currentParameter) ?>
                </nav>
                <hr>
            </div>
        </div>
    </div>
</section>

<?php require('includes/footer.php') ?>