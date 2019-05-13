<?php
include 'header.php';
?>
<div class="container">
  <div class="empty_placeholder">
  </div>
  <form action="../includes/post-inc.php" method="post">
    <div class="columns">
      <div class="column is-three-quarters">
        <div class="new_post">
          <input class="single_input" type="text" name="postTitle" placeholder="Title" value="">
          <textarea id="article_textarea" class="article_textarea" name="article_textarea"></textarea>
        </div>
        <p class="is-size-5"><strong>Description</strong></p>
        <div class="new_post">
          <textarea id="description_textarea" class="description_textarea" name="description_textarea"></textarea>
        </div>
      </div>
      <div class="column">
        <div class="sidebar-divider">
          <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
          <p class="is-size-5"><strong>Date & Time</strong></p>
          <div class="field has-addons">
            <p class="control">
              <a class="button is-static">
                <ion-icon name="calendar"></ion-icon>
              </a>
            </p>
            <p class="control is-expanded">
              <input class="input" id="datepicker" name="date" readonly>
            </p>
          </div>
          <div class="field has-addons">
            <p class="control">
              <a class="button is-static">
                <ion-icon name="clock"></ion-icon>
              </a>
            </p>
            <p class="control is-expanded">
              <input class="input" id="timepicker" name="time" readonly>
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
                  while ($categoryResult = mysqli_fetch_assoc($cateResult)) {
                    if ($categoryResult['mid'] == $settings['defaultCategory']) {
                      echo '<option value="' . $categoryResult['mid'] . '" selected="selected">' . $categoryResult['name'] . '</option>';
                    } else {
                      echo '<option value="' . $categoryResult['mid'] . '">' . $categoryResult['name'] . '</option>';
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
          <input class="button is-primary" id="submit" type="submit" name="submit" value="Submit">
        </div>
      </div>
    </div>
  </form>
</div><!-- close tag for container div -->
<?php
include 'footerforpost.php';
echo '<script>';
$errorMessage = $_GET['action'];
switch ($errorMessage) {
  case 'emptytitle':
    echo "window.onload=showNoti('Please set a title', 'error')";
    break;
  case 'emptycontent':
    echo "window.onload=showNoti('Content empty!', 'error')";
    break;
  case 'posted':
    echo "window.onload=showNoti('Article posted!', 'success')";
    break;
  case 'modified':
    echo "window.onload=showNoti('Article modified!', 'success')";
    break;
  default:
    echo "";
}
echo '</script>';
?>
</body>

</html>