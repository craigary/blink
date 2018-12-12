<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/bulma.min.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea.contentbox",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">

    <?php include('menu-posts.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
}

if (isset($_GET['action'])) {
    $ac = $_GET['action'];
} else {
    $ac = '';
}

if ($ac == 'emptytitle') {
    echo '<div class="notification is-danger">';
    echo '<button class="delete"></button>';
    echo 'You need a title dude!';
    echo '</div>';
} elseif ($ac  == 'emptycontent') {
    echo '<div class="notification is-info">';
    echo '<button class="delete"></button>';
    echo 'Type someting! This is a post.';
    echo '</div>';
} 

$sql = "SELECT postID, postTitle, postDesc, postCont FROM blog_posts WHERE postID = ?";
    $stmt = mysqli_stmt_init($db);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

?>
	<form action='../includes/post-inc.php' method='post'>
		<input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>
        <p><label>Title</label><br>
		<input class="input" type='text' name='postTitle' value='<?php echo $row['postTitle'];?>'></p>
		<p><label>Description</label><br>
		<textarea class="textarea" name='postDesc'><?php echo $row['postDesc'];?></textarea></p>
		<p><label>Content</label><br>
		<textarea class="contentbox" name='postCont'><?php echo $row['postCont'];?></textarea></p>
        <p><button class="button is-danger is-rounded" type='submit' name='submit' value='update'>Update Post</button></p>
	</form>
</div>

</body>
</html>	
