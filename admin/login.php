<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../style/bulmaswatch.min.css">
    <link rel="stylesheet" href="../style/dashboard.css">
</head>
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login</h3>
                    <p class="subtitle has-text-grey">Please login to proceed.</p>
                    <div class="box">
                      <form action="../includes/login-inc.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" name="username" value="" placeholder="Your Name" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input" type="password" name="password" value="" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="field">
                            </div>
                            <button class="button is-block is-info is-fullwidth" type="submit" name="submit" value="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/ionicons@4.5.1/dist/ionicons.js"></script>
</body>
</html>
