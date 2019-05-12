<?php
  include 'header.php';
  $sql = "SELECT * FROM blink_contents WHERE isPage != 1 ORDER BY created DESC";
  $result = mysqli_query($db, $sql);
?>
  <div class="container">
    <section class="hero">
      <div class="hero-body">
        <h1 class="title">
          Hi, <?php echo $userResult['screenName']; ?>!
        </h1>
        <h2 class="subtitle">
          Welcome to the dashboard.<br>Click these links to quick start.
        </h2>
        <div class="level is-mobile">
          <div class="level-left">
            <p class="level-item"><a href="add-posts.php">Write</a></p>
            <p class="level-item"><a href="posts.php">Posts</a></p>
            <p class="level-item"><a href="pages.php">Pages</a></p>
            <p class="level-item"><a href="settings.php">Settings</a></p>
          </div>
        </div>
      </div>
    </section>
    <hr>
      <div class="tablelist">
    <?php
    $resultCheck = mysqli_num_rows($result);
      if ($resultCheck == 0) {
        echo '<p class="is-size-3	has-text-centered"><strong>You have no post!</strong></p>';
      } else {
        echo'<table class="table is-fullwidth is-striped is-narrow is-hoverable">';
          echo'<tr>';
            echo'<th></th>';
            echo'<th>Title</th>';
            echo'<th>Category</th>';
            echo'<th>Author</th>';
            echo'<th>Date</th>';
            echo'<th>Modify</th>';
          echo'</tr>';
        while ($contentResult = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td></td>';
          echo '<td>'.$contentResult['title'].'</td>';
            $mid = $contentResult['categories'];
            $sql2 = "SELECT * FROM blink_metas WHERE mid = ".$mid." AND type = 'category'";
            $stmt2 = mysqli_query($db,$sql2);
            $cate = mysqli_fetch_assoc($stmt2);
          echo '<td>'.$cate['name'].'</td>';
          echo '<td>'.$userResult['screenName'].'</td>';
          echo '<td>'.date('jS M Y', strtotime($contentResult['created'])).'</td>';
          echo '<td>';
          echo'<a href="edit-post.php?id='?><?php echo $contentResult['cid'];?><?php echo'">Edit</a> /';
          ?> 

<a href="../includes/delete-inc.php?from=posts&cid=<?php echo $contentResult['cid'];?>" onclick="return confirm('Are you sure?')">Delete</a>
          <?php
          echo '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }
    ?>
    </div><!-- close tag for tablelist div -->
  </div><!-- close tag for container div -->
<?php
  include 'footer.php';
  echo '<script>';
  $errorMessage = $_GET['action'];
  switch($errorMessage) {
  case 'posted':
      echo "window.onload=showNoti('Article posted!', 'success')";
      break;
  case 'modified':
      echo "window.onload=showNoti('Article modified!', 'success')";
      break;
  case 'deleted':
        echo "window.onload=showNoti('Article deleted!', 'success')";
      break;
  default:
      echo "";
  }
  echo '</script>';
?>
  </body>
</html>