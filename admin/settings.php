<?php include 'header.php'; ?>
<div class="empty_placeholder"></div>
<div class="container">
  <div class="columns">
    <div class="column">
      <form action="../includes/settings-inc.php" method="post">
        <div class="field">
          <label class="label">Site Name</label>
          <div class="control">
            <input class="input" type="text" name="siteName" placeholder="Site Name" value="<?php echo $settings['siteName']; ?>">
          </div>
          <p class="help">Your site name</p>
        </div>
        <div class="field">
          <label class="label">Site Address</label>
          <div class="control">
            <input class="input" type="text" name="siteUrl" placeholder="Site Address" value="<?php echo $settings['siteUrl']; ?>">
          </div>
          <p class="help">Your blog address, don't change this unless you change your address, it's not fun!</p>
        </div>
        <div class="field">
          <label class="label">Site Description</label>
          <div class="control">
            <input class="input" type="text" name="siteDescription" placeholder="Site Description" value="<?php echo $settings['siteDescription']; ?>">
          </div>
          <p class="help">Describe your website in short sentence. Set this properly for SEO</p>
        </div>
        <div class="field">
          <label class="label">Keywords</label>
          <div class="control">
            <input class="input" type="text" name="siteKeywords" placeholder="Keywords" value="<?php echo $settings['siteKeywords']; ?>">
          </div>
          <p class="help">Your website Keywords. Set this properly for SEO</p>
        </div>
        <hr>
        <div class="field">
          <label class="label">Themes</label>
          <div class="control">
            <label class="radio">
              <input type="radio" name="siteTheme" id="catus" value="catus">
              Light
            </label>
            <label class="radio">
              <input type="radio" name="siteTheme" id="catus-dark" value="catus-dark">
              Dark
            </label>
          </div>
          <p class="help">Pick a theme.</p>
        </div>
        <div class="field">
          <label class="label">Posts Per Page</label>
          <div class="control">
            <input type="number" class="input" name="postsPerPage" value="<?php echo $settings['postsPerPage']; ?>">
          </div>
          <p class="help">How many posts do you wanna display in one single page?</p>
        </div>
        <hr>
        <div class="field">
          <label class="label">Code Embed</label>
          <div class="control">
            <textarea id="codeArea" class="textarea is-primary" spellcheck="false" name="codeEmbed" placeholder="Please include <script></script> code."><?php echo $settings['codeEmbed']; ?></textarea>
          </div>
          <p class="help">You can paste code here like web stats.</p>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" name="changeSettings" value="1">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  window.onload = function() {
    $("#<?php echo $settings['theme']; ?>").prop("checked", true);
  }
</script>
<?php
include 'footer.php';
echo '<script>';
$errorMessage = $_GET['action'];
switch ($errorMessage) {
  case 'updated':
    echo "window.onload=showNoti('Settings Updated!', 'success');";
    echo '$("#' . $settings['theme'] . '").prop("checked", true);';
    break;
  case 'infoEmpty':
    echo "window.onload=showNoti('Info missing!', 'error');";
    echo '$("#' . $settings['theme'] . '").prop("checked", true);';
    break;
  default:
    echo "";
}
?>
document.title = "Settings";
</script>
</body>

</html>