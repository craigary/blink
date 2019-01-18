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
          <form action="">
            <div class="field">
              <label class="label">Display Name</label>
              <div class="control">
                <input class="input" type="text" placeholder="Display Name" value="">
              </div>
              <p class="help">This username is available</p>
            </div>
            <div class="field">
              <label class="label">Website</label>
              <div class="control">
                <input class="input" type="email" placeholder="Email input" value="">
              </div>
              <p class="help">This username is available</p>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="control">
                <input class="input" type="email" placeholder="Email input" value="">
              </div>
              <p class="help">This username is available</p>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="divider">
          <p class="is-size-4"><strong>Preferences</strong></p>
          <form action="">
            <div class="field">
              <label class="label">Use Markdown Editor</label>
              <div class="control">
                <label class="radio">
                  <input type="radio" name="foobar">
                  Yes
                </label>
                <label class="radio">
                  <input type="radio" name="foobar" checked>
                  No
                </label>
              </div>
              <p class="help">What is Markdown</p>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="divider">
          <p class="is-size-4"><strong>Password</strong></p>
          <form action="">
            <div class="field">
              <label class="label">Current Password</label>
              <div class="control">
                <input class="input" type="text" placeholder="Display Name" value="">
              </div>
            </div>
            <div class="field">
              <label class="label">New Password</label>
              <div class="control">
                <input class="input" type="email" placeholder="Email input" value="">
              </div>
            </div>
            <div class="field">
              <label class="label">Conform Password</label>
              <div class="control">
                <input class="input" type="email" placeholder="Email input" value="">
              </div>
            </div>
            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
  include 'footer.php';
?>
