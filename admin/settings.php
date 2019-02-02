<?php
include 'header.php';
?>
  <div class="empty_placeholder"></div>
  <div class="container">
  <div class="columns">
    <div class="column">
    <form action="">
      <div class="field">
        <label class="label">Site Name</label>
        <div class="control">
          <input class="input" type="text" placeholder="Site Name" value="<?php echo $settings['siteName']; ?>">
        </div>
        <p class="help">This username is available</p>
      </div>
      <div class="field">
        <label class="label">Site Address</label>
        <div class="control">
          <input class="input" type="text" placeholder="Site Address" value="<?php echo $settings['siteUrl']; ?>">
        </div>
        <p class="help">This username is available</p>
      </div>
      <div class="field">
        <label class="label">Site Description</label>
        <div class="control">
          <input class="input" type="text" placeholder="Site Description" value="<?php echo $settings['description']; ?>">
        </div>
        <p class="help">This username is available</p>
      </div>

      <div class="field">
        <label class="label">Keywords</label>
        <div class="control">
          <input class="input" type="text" placeholder="Keywords" value="<?php echo $settings['keywords']; ?>">
        </div>
        <p class="help">This username is available</p>
      </div>
<hr>
<div class="field">
  <label class="label">Themes</label>
  <div class="control">
    <input class="input" type="text" placeholder="Posts Per Page" value="10">
  </div>
  <p class="help">This username is available</p>
</div>
<div class="field">
  <label class="label">Posts Per Page</label>
  <div class="control">
    <input class="input" type="text" placeholder="Posts Per Page" value="10">
  </div>
  <p class="help">This username is available</p>
</div>
<hr>
<div class="field">
  <label class="label">Code Embeded</label>
  <div class="control">
    <input class="input" type="text" placeholder="Posts Per Page" value="10">
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
  </div>
  </div>
<?php
  include 'footer.php';
?>
