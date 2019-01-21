<?php
  include 'header.php';
  $sql = "SELECT * FROM blink_metas WHERE type = 'category';";
  $result = mysqli_query($db, $sql);
  $cid = $_GET['cid'];
  if($cid == ''){
    echo "<script>window.onload=function(){document.getElementById('categorySubmitButton').value = 'Add New'}</script>";
  } else {
    echo "<script>window.onload=function(){document.getElementById('categorySubmitButton').value = 'Update'}</script>";
    $sql2 = "SELECT * FROM blink_metas WHERE mid = ".$cid;
    if (mysqli_num_rows(mysqli_query($db, $sql2)) == 0) {
      echo "这特么的怎么了"; //if there is no category find based on id,
    }else {
        $singleCategoryResult = mysqli_fetch_assoc(mysqli_query($db, $sql2));
    }
  }
 ?>
<div class="container">
  <div class="empty_placeholder">
  </div>
  <div class="columns">
    <div class="column">
      <table class="table is-fullwidth is-transparent is-hoverable">
          <tr>
            <th>Name</th>
            <th>Abbr</th>
            <th>Posts</th>
            <th></th>
          </tr>
          <?php
          if (mysqli_num_rows($result) == 0) {
            echo '这特么的怎么了'; // if there's no categories
          } else {
            while ($categoryResults = mysqli_fetch_assoc($result)) {
              echo '<tr>';
                echo '<td>'.$categoryResults['name'].'</td>';
                echo '<td>'.$categoryResults['slug'].'</td>';
                $sql = "SELECT COUNT(*) FROM blink_contents WHERE categories = ".$categoryResults['mid'];
                $postNumPerCategory = mysqli_fetch_assoc(mysqli_query($db, $sql));
                echo '<td>'.$postNumPerCategory['COUNT(*)'].'</td>';
                echo '<td><a href="category.php?cid='.$categoryResults['mid'].'">Modify</a></td>';
              echo '</tr>';
            }
          }
          ?>
      </table>
    </div>
    <div class="column">
      <form class="" method="post">
        <div class="field">
          <label class="label">Category Name</label>
          <div class="control">
            <input class="input" type="text" placeholder="Category Name" value="<?php echo $singleCategoryResult['name'] ?>">
          </div>
          <p class="help">This username is available</p>
        </div>
        <div class="field">
          <label class="label">Abbreviation Name*</label>
          <div class="control">
            <input class="input" type="text" placeholder="Category Name" value="<?php echo $singleCategoryResult['slug'] ?>">
          </div>
          <p class="help">* we will use this as the link address.</p>
        </div>
        <div class="field">
          <label class="label">Description*</label>
          <div class="control">
            <input class="input" type="text" placeholder="Category Name" value="<?php echo $singleCategoryResult['description'] ?>">
          </div>
          <p class="help">* we will use this as the link address.</p>
        </div>
        <input type="submit" name="button" id="categorySubmitButton" class="button is-primary" value="Add New">
      </form>
    </div>
  </div>
</div>
<?php
include 'footer.php';
?>
