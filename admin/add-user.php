<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add User</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/bulma.min.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>

<div id="wrapper">

	<?php include('menu-users.php');
		if(isset($_GET['action'])){ 
		if ($_GET['action'] == 'empty') {
			echo '<div class="notification is-danger">';
			echo '<button class="delete"></button>';
			echo 'Type Something Asshole!';
			echo '</div>';	
		} elseif ($_GET['action'] == 'invalidusername') {
			echo '<div class="notification is-info">';
			echo '<button class="delete"></button>';
			echo 'Username invalid.';
			echo '</div>';	
		} elseif ($_GET['action'] == 'invalidemail') {
            echo '<div class="notification is-info">';
            echo '<button class="delete"></button>';
            echo 'Password invalid  .';
            echo '</div>';
        } elseif ($_GET['action'] == 'usertaken') {
            echo '<div class="notification is-info">';
            echo '<button class="delete"></button>';
            echo 'This username has been taken!  .';
            echo '</div>';
        }
        }
	?>
	<h2>Add User</h2>

                        <form action="../includes/user-inc.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" name="username" value="" placeholder="Your Name" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="Your Email">
                                </div>
                            </div>
                            <button class="button is-block is-info is-fullwidth" type="submit" name="submit" value="create">Create User</button>
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