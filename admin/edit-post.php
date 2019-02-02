<?php
include 'header.php';
$id = $_GET['id'];
if($id== ''){
  header('Location: ./');
  exit;
} else {
  $sql = "SELECT * FROM blink_contents WHERE cid = ".$id;
  $result = mysqli_query($db, $sql);
  $singleArticleResult = mysqli_fetch_assoc($result);
  if (isset($singleArticleResult['cid']) == false) {
    header('Location: ./');
    exit;
  }
}
?>
  <div class="container">
    <div class="empty_placeholder">
    </div>
    <form action="../includes/post-inc.php" method="post">
      <div class="columns">
        <div class="column is-three-quarters">
        <input type="text" name="postID" value="<?php echo $singleArticleResult['cid']; ?>" style="display:none;">
          <div class="new_post">
            <input class="single_input" type="text" name="postTitle" placeholder="Title" value="<?php echo $singleArticleResult['title']; ?>">
            <div id="article_textarea" class="article_textarea">
            </div>
            <textarea id="hiddenTextarea" name="hiddenTextarea" style="display:none;"></textarea>
          </div>
          <div class="new_post">
            <div id="description_textarea" class="description_textarea">
            </div>
            <textarea id="hiddenDescriptionTextarea" name="hiddenDescriptionTextarea" style="display:none;"></textarea>
          </div>
        </div>
        <div class="column">
          <div class="sidebar-divider">
            <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
            <input type="text" name="cid" value="<?php echo $singleArticleResult['cid']; ?>" style="display:none;">
            <p class="is-size-5"><strong>Date & Time</strong></p>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="calendar"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" id="datepicker" name="date" data-toggle="datepicker" readonly>
              </p>
            </div>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="clock"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" id="timepicker" name="time">
              </p>
            </div>
          </div><!-- close tag for sidebar divider -->
          <div class="sidebar-divider">
            <p class="is-size-5"><strong>Categories</strong></p>
            <div class="field">
              <div class="control">
                <div class="select is-fullwidth">
                  <select name="categoryId">
                    <?php
                      $sql = "SELECT * FROM blink_metas WHERE type = 'category';";
                      $cateResult = mysqli_query($db, $sql);
                      while ($categoryResult = mysqli_fetch_assoc($cateResult)){
                        if ($categoryResult['mid'] == $singleArticleResult['categories']) {
                          echo '<option value="'.$categoryResult['mid'].'" selected="selected">'.$categoryResult['name'].'</option>';
                        } else {
                          echo '<option value="'.$categoryResult['mid'].'">'.$categoryResult['name'].'</option>';
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="sidebar-divider">
          <p class="is-size-5"><strong>Page</strong></p>
            <input type="checkbox" class="isPagecheckbox" name="isPage" value="1"> It's a Page<br>
          </div>
          <div class="sidebar-divider">
            <input class="button is-primary" id="submit" type="submit" name="submit" value="Update">
          </div>
        </div>
      </div>
    </form>
  </div><!-- close tag for container div -->
<?php
  include 'footerforpost.php';
?>
