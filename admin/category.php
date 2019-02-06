<?php
  include 'header.php';
  $sql = "SELECT * FROM blink_metas WHERE type = 'category';";
  $result = mysqli_query($db, $sql);
  $cid = $_GET['cid'];
  if($cid == ''){
    echo "<script>window.onload=function(){document.getElementById('categorySubmitButton').value = 'Add New'}</script>";
  } else {
    $sql2 = "SELECT * FROM blink_metas WHERE mid = ".$cid;
    if (mysqli_num_rows(mysqli_query($db, $sql2)) == 0) {
      echo "这特么的怎么了"; //if there is no category find based on id,
    }else {
        $singleCategoryResult = mysqli_fetch_assoc(mysqli_query($db, $sql2));
    }
    echo "<script>window.onload=function(){document.getElementById('categorySubmitButton').value = 'Update';document.getElementById('metaId').value = '".$singleCategoryResult['mid']."'}</script>";
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
                echo '<td>';
                echo '<a href="category.php?cid='.$categoryResults['mid'].'">Modify</a> / <a href="../includes/delete-inc.php?from=categories&defaultCategoryId='.$settings['defaultCategory'].'&cid='. $categoryResults['mid'] .'" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                echo '</td>';
              echo '</tr>';
            }
          }
          ?>
      </table>
    </div>
    <div class="column">
      <form action="../includes/cate-inc.php" method="post">
        <input type="text" name="metaId" id="metaId" value="" style="display:none">
        <div class="field">
          <label class="label">Category Name</label>
          <div class="control">
            <input class="input" type="text" name="metaName" placeholder="Category Name" value="<?php echo $singleCategoryResult['name'] ?>">
          </div>
          <p class="help">This username is available</p>
        </div>
        <div class="field">
          <label class="label">Abbreviation Name*</label>
          <div class="control">
            <input class="input" type="text" name="metaSlug" placeholder="Abbreviation Name" value="<?php echo $singleCategoryResult['slug'] ?>">
          </div>
          <p class="help">* we will use this as the link address.</p>
        </div>
        <div class="field">
          <label class="label">Description*</label>
          <div class="control">
            <input class="input" type="text" name="metaDescription" placeholder="Category Name" value="<?php echo $singleCategoryResult['description'] ?>">
          </div>
          <p class="help">* we will use this as the link address.</p>
        </div>
        <div class="field">
        <label class="checkbox">
          <input type="checkbox" id="isDefaultCategory" name ="isDefault"> Default Category
        </label>
        </div>
        <input type="submit" name="submit" id="categorySubmitButton" class="button is-primary" value="Add New">
      </form>
    </div>
  </div>
</div>
<script>
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
  };

  if (getUrlParameter('cid') == <?php echo $settings['defaultCategory'] ?>) {
    window.onload = function (){
      $('#isDefaultCategory').prop('checked', true);
    }
  }

</script>
<?php
include 'footer.php';
?>
