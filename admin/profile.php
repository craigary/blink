<?php
 include 'header.php';
?>
  <div class="empty_placeholder"></div>
  <div class="container">
    <div class="columns">
      <div class="column is-one-third">
        <div class="avatarimg">
          <img src="<?php $grav_url = "https://www.gravatar.com/avatar/".md5(strtolower(trim($userResult['mail'])))."?d=retro&s=300";
          echo $grav_url; ?>" alt="" />
        </div>
      </div>
      <div class="column">
        <div class="divider">
          <p class="is-size-4"><strong>Info</strong></p>
          <form action="../includes/settings-inc.php" method="post">
            <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
            <div class="field">
              <label class="label">Display Name</label>
              <div class="control">
                <input class="input" type="text" name="screenName" placeholder="Display Name" value="<?php echo $userResult['screenName']; ?>">
              </div>
              <p class="help">This will display to public</p>
            </div>
            <div class="field">
              <label class="label">Blog Website</label>
              <div class="control">
                <input class="input" name="website" type="text" placeholder="http://" value="<?php echo $userResult['website']; ?>">
              </div>
              <p class="help">This is your website</p>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input" type="text" name="mail" placeholder="Email input" value="<?php echo $userResult['mail']; ?>">
              </div>
              <p class="help">We use email to get your avatar</p>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link" name="info" value="1">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="divider">
          <p class="is-size-4"><strong>Preferences</strong></p>
          <form action="../includes/settings-inc.php" method="post" name="preferences">
            <input type="text" name="uid" value="<?php echo $uid; ?>" style="display:none;">
            <div class="field">
              <label class="label">Use Markdown Editor</label>
              <div class="control">
                <label class="radio">
                  <input type="radio" name="markdown" id="markdownYes" value="1">
                  Yes
                </label>
                <label class="radio">
                  <input type="radio" name="markdown" id="markdownNo" value="0">
                  No
                </label>
              </div>
              <p class="help">What is Markdown</p>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link" type="submit" name="preferences" value="1">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="divider">
          <p class="is-size-4"><strong>Password</strong></p>
          <form action="../includes/settings-inc.php" method="post">
            <div class="field">
              <label class="label">Current Password</label>
              <div class="control">
                <input class="input" name="currentPass" type="password" placeholder="Display Name" value="">
              </div>
            </div>
            <div class="field">
              <label class="label">New Password</label>
              <div class="control">
                <input class="input" name="newPass" type="password" placeholder="Email input" value="">
              </div>
            </div>
            <div class="field">
              <label class="label">Conform Password</label>
              <div class="control">
                <input class="input" name="doubleCheck" type="password" placeholder="Email input" value="">
              </div>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link" name="changePassword" value="1">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
window.onload=function (){
<?php
  if ($settings['markdown'] == 1) {
    echo "document.getElementById('markdownYes').checked=true;";
    echo "document.getElementById('markdownNo').checked=false;";
  } else{
    echo "document.getElementById('markdownNo').checked=true;";
    echo "document.getElementById('markdownYes').checked=false;";
  }
  ?>
}
</script>"
<?php
  include 'footer.php';
  echo '<script>';
  $errorMessage = $_GET['action'];
  switch($errorMessage) {
  case 'updated':
      echo "window.onload=showNoti('Profile Updated', 'success')";
      break;
  case 'passwordEmpty':
      echo "window.onload=showNoti('Content empty!', 'error')";
      break;
  case 'newPassNotSame':
      echo "window.onload=showNoti('Password not same!', 'error')";
      break;
  case 'passDontMatch':
      echo "window.onload=showNoti('Password not much!', 'error')";
      break;
  case 'infoEmpty':
      echo "window.onload=showNoti('Info missing!', 'error')";
      break;
  case 'wrongurl':
      echo "window.onload=showNoti('Website is not legit!', 'error')";
      break;
  case 'wrongemail':
      echo "window.onload=showNoti('Wrong email!', 'error')";
      break;
  case 'infoUpdated':
      echo "window.onload=showNoti('Profile updated!', 'success')";
      break;
  default:
      echo "";
  }
  echo '</script>';
?>
  </body>
</html>