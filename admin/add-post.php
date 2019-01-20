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
            <input class="single_input" type="text" name="postTitle" placeholder="Title">
            <div id="article_textarea" class="article_textarea"></div>
            <textarea id="hiddenTextarea" name="hiddenTextarea"></textarea>
          </div>
          <div class="new_post">
            <div id="discription_textarea" class="discription_textarea"></div>
            <textarea id="hiddenDescriptionTextarea" name="hiddenDescriptionTextarea" style="display:none;"></textarea>
          </div>
        </div>
        <div class="column">
          <div class="sidebar-divider">
            <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
            <p class="is-size-5"><strong>Date</strong></p>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="calendar"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input type="date" class="input" id="datepicker" name="date">
              </p>
            </div>
            <div class="field has-addons">
              <p class="control">
                <a class="button is-static">
                  <ion-icon name="clock"></ion-icon>
                </a>
              </p>
              <p class="control is-expanded">
                <input class="input" id="clockpicker" type="time" name="clock">
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
                        echo '<option value="'.$categoryResult['mid'].'">'.$categoryResult['name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
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
?>
