<?php
include 'header.php';
?>
<div class="container">
  <section class="hero">
    <div class="hero-body">
      <h1 class="title">
        Hi, <?php echo $userResult['screenName']; ?>!
      </h1>
      <h2 class="subtitle">
        Welcome to the dashboard.<br>Click these links to quick start.
      </h2>
      <div class="level is-mobile">
        <div class="level-left">
          <p class="level-item"><a href="add-post.php">Write</a></p>
          <p class="level-item"><a href="posts.php">Posts</a></p>
          <p class="level-item"><a href="pages.php">Pages</a></p>
          <p class="level-item"><a href="settings.php">Settings</a></p>
        </div>
      </div>
    </div>
  </section>
  <hr>
</div><!-- close tag for container div -->
<?php
include 'footer.php';
echo '<script>';
$errorMessage = $_GET['action'];
switch ($errorMessage) {
  case 'success':
    echo "window.onload=showNoti('Login success!', 'success')";
    break;
  default:
    echo "";
}
?>

document.title = "Dashboard";
</script>

</body>

</html>