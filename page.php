<?php
    require('includes/config.php');
    require('includes/Parsedown.php');
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
    require('includes/header.php'); 
?>
    <div class="column sidebar">
    </div>
    <div class="column">
<?php 
    $Parsedown = new Parsedown();
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
    echo '<article class="articleText">';
    echo $Parsedown->text($row['text']); 
    echo '</article>';
    echo '<hr>';
    echo '</article>'; 
?>
            </div>
        </div>
    </div>
</section>
<?php require('includes/footer.php') ?>