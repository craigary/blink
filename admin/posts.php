<?php
  include 'header.php';
  $sql = "SELECT * FROM blink_contents ORDER BY modified DESC";
  $result = mysqli_query($db, $sql);
?>
  <div class="container">
    <section class="hero">
      <div class="hero-body">
        <h1 class="title">
          Hi, Craig!
        </h1>
        <h2 class="subtitle">
          Welcome to the dashboard.<br>Click these links to quick start.
        </h2>
        <div class="level is-mobile">
          <div class="level-left">
            <p class="level-item"><a>All</a></p>
            <p class="level-item"><a>Published</a></p>
            <p class="level-item"><a>Drafts</a></p>
            <p class="level-item"><a>Deleted</a></p>
          </div>
        </div>
      </div>
    </section>
    <hr>
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
          $sql = "SELECT * FROM blink_metas WHERE mid = ".$contentResult['categories']." & 'type' = 'category' ORDER BY mid DESC";
          $stmt2 = mysqli_query($db,$sql);
          $cate = mysqli_fetch_assoc($stmt2);
          echo '<td>'.$cate['name'].'</td>';
          echo '<td>'.$userResult['screenName'].'</td>';
          echo '<td>'.date('jS M Y', strtotime($contentResult['created'])).'</td>';
          echo '<td>';
          echo'<a href="edit-post.php?id='?><?php echo $contentResult['cid'];?><?php echo'">Edit</a> |';
          ?>
          <a href="javascript:delpost('<?php echo $contentResult['cid'];?>','<?php echo $contentResult['title'];?>')">Delete</a>
          <?php

          echo '</td>';
          echo '</tr>';
        }
      }
    ?>
  </div><!-- close tag for container div -->
<?php
  include 'footer.php';
?>
