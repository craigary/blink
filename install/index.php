<?php
//include config
require_once('../includes/config.php');

//check if already logged in
if( $user->is_logged_in() ){ header('Location: index.php'); } 
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../style/normalize.css">
        <link rel="stylesheet" href="../style/bulma.min.css">
        <link rel="stylesheet" href="../style/main.css">
    </head>

    <body>
        <div class="login-page">
            
            <div id="login">
    <h1 class="title">
        SIGN UP A USER!
        </h1>

                            <div class="box">
                        <form action="../includes/signup-inc.php" method="post">
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
                            <button class="button is-block is-info is-fullwidth" type="submit" name="submit" value="Signup">Signup</button>
                        </form>

                    </div>

            </div>
        </div>

    </body>

    </html>