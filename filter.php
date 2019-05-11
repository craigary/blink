<?php require('includes/config.php');
	require('includes/paginator.php');
    require('includes/header.php'); ?>
    <div class="column sidebar">
    </div>
    <!-- article starts here -->
<?php

$filterType=$_GET['method'];
$filterKeywords=$_GET['s'];

if (empty($filterType) || empty($filterKeywords)) {
    header("Location: index.php");
    exit();
} else {

    if ($filterType == 'search'){
        $filterQuery = "SELECT * FROM blink_contents WHERE title LIKE '%$filterKeywords%' or description LIKE '%$filterKeywords%' or `text` LIKE '%$filterKeywords%' ORDER BY cid DESC";
    } elseif ($filterType == 'category') {
        $filterQuery = "SELECT * FROM blink_contents WHERE categories = ".$filterKeywords." ORDER BY cid DESC";
    } else {
        header("Location: index.php");
        exit();
    }
    
}

echo '<div class="column">';
echo '<hr>';
echo '<h1 class="filter">';
if($filterType == 'search'){
    echo 'Search: '.$filterKeywords;
} elseif($filterType == 'category') {
    $categoryQueryString = 'SELECT * FROM blink_metas WHERE mid = '.$filterKeywords;
    $currentCategory = mysqli_fetch_assoc(mysqli_query($db,$categoryQueryString));
    echo 'Category: '.$currentCategory['name'];
}

echo '</h1>';
echo '<hr>';

    $result = mysqli_query($db, $filterQuery);
    $num_rows = mysqli_num_rows($result);
    $postsPerPage = $settings['postsPerPage'];
    $sql = $filterQuery.getLimits($postsPerPage, $page);
    $stmt = mysqli_query($db,$sql);

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
        echo '<a href=filter.php?method=category&s='.$row['categories'].'>';
        echo $cateResult['name'];
        echo '</a>';
        echo '</p>';
        echo '<article class="descriptionText">';
        echo $row['description'];
        echo '</article>';
        echo '<a href="viewpost.php?id='.$row['cid'].'" class="button readmore">Readmore</a>';
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