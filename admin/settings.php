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
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
</head>
<body>

<div id="wrapper">

    <?php include('menu-settings.php');
        if(isset($_GET['action'])){ 
            if ($_GET['action'] == 'emptyblogname') {
                echo '<div class="notification is-danger">';
                echo '<button class="delete"></button>';
                echo 'Blog name can\'t be empty.';
                echo '</div>';	
            } elseif ($_GET['action'] == 'emptyppp') {
                echo '<div class="notification is-info">';
                echo '<button class="delete"></button>';
                echo 'Post per page name can\'t be empty.';
                echo '</div>';	
            }
            }
    ?>


    <form action="../includes/settings-inc.php" method="post">
        <p><label>Blog Name</label><br>
		<input class="input" type='text' name='blogname' value='<?php echo $blogName;?>'></p>
        <p></p>
        <p><label>Posts Per Page</label><br>
		<input class="input" type='text' name='ppp' value='<?php echo $postsPerPage;?>'></p>
        <button class="button is-block is-info is-fullwidth" type="submit" name="submit" value="update">Update Settings</button>
    </form>
</div>
<script type="text/javascript">
	$(document).on('click', '.notification > button.delete', function() {
    $(this).parent().addClass('is-hidden').remove();
    return false;
	});
</script>
</body>
</html>	
