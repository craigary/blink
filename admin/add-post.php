<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
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

    if(isset($_GET['action'])){
        if ($_GET['action'] == 'emptytitle') {
            echo '<div class="notification is-danger">';
            echo '<button class="delete"></button>';
            echo 'PLEASE ENTER A TITLE!.';
            echo '</div>';
        } elseif ($_GET['action'] == 'emptycontent') {
            echo '<div class="notification is-danger">';
            echo '<button class="delete"></button>';
            echo 'CONTENT IS EMPTY! ENTER SOMETHING!.';
            echo '</div>';
        }
    }
	?>



	<form action='../includes/post-inc.php' method='post'>

		<p><label>Title</label><br>
		<input class="input" type='text' name='postTitle' value=''></p>
		<p><label>Description</label><br>
		<textarea class="textarea" name='postDesc'></textarea></p>

		<p><label>Content</label><br>
		<textarea class="contentbox" name='postCont'></textarea></p>

		<p><input class="button is-danger is-rounded" type='submit' name='submit' value='create'></p>

	</form>

</div>
