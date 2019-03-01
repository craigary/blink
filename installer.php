<?php
    require('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Installation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/bulmaswatch.min.css">
    <style>
        html,body {
            margin: 0;
            font-family: sans-serif;
        }
        .installerHero {
            margin-bottom: 2em;
            padding: 2em 0;
            background-color: #292D33;
            color: #FFF;
            text-align: center;
        }

        .installerHero h1 {
            font-weight: bold;
            font-size: 2rem;
        }

        .installerHero ol {
            list-style: none;
            margin: 3em 0 1em;
            padding: 0;
            color: #999;
        }

        .installerHero li {
            display: inline-block;
            margin: 0 .8em;
        }

        .installerHero span {
            display: inline-block;
            margin-right: 5px;
            width: 20px;
            height: 20px;
            line-height: 15px;
            border: 2px solid #999;
            text-align: center;
            border-radius: 2em;
        }

        .installerHero li.current {
            color: #FFF;
            font-weight: bold;
        }

        .installerHero li.current span {
            border-color: #FFF;
        }
        .hideThis {
          display:none;
        }
        .showThis {
          display:block;
        }
    </style>
</head>

<body>

<?php
  $currentStep = $_GET['step'];
  if(empty($currentStep)){
    $currentStep = 2;
  }
  echo '<script>window.onload=function(){';
  
  if($currentStep == 1) {
    echo '$("#installerStepTwo").addClass("hideThis"),$("#installerStepThree").addClass("hideThis"),$("#installerStepFour").addClass("hideThis"),$("#installerStepOne").removeClass();';
  }
  if($currentStep == 2) {
    echo '$("#installerStepOne").addClass("hideThis"),$("#installerStepThree").addClass("hideThis"),$("#installerStepFour").addClass("hideThis"),$("#installerStepTwo").removeClass();';
  }
  if($currentStep == 3) {
    echo '$("#installerStepOne").addClass("hideThis"),$("#installerStepTwo").addClass("hideThis"),$("#installerStepFour").addClass("hideThis"),$("#installerStepThree").removeClass();';
  }
  if($currentStep == 4) {
    echo '$("#installerStepOne").addClass("hideThis"),$("#installerStepTwo").addClass("hideThis"),$("#installerStepThree").addClass("hideThis"),$("#installerStepFour").removeClass();';
  }
  echo '}</script>';

  function siteURL(){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    echo $protocol.$domainName;
  }


?>

    <div class="installerHero">
        <h1>Blink</h1>
        <ol class="path">
            <li class="current">
                <span>1</span>欢迎使用
            </li>
            <li>
                <span>2</span>初始化配置
            </li>
            <li>
                <span>3</span>开始安装
            </li>
            <li>
                <span>4</span>安装成功
            </li>
        </ol>
    </div>
    <div class="container">
        <section id="installerStepOne">
            <a class="button is-primary" href="?step=2">Getting Start</a>
        </section>
        <section id="installerStepTwo">
            <form class="form-horizontal" action="/includes/install-inc.php" method="POST">
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="dbhost">Database host</label>
                    <div class="control">
                        <input id="dbhost" name="dbhost" type="text" placeholder="localhost" class="input " required="" value="<?php echo $dbhost; ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="dbport">Port</label>
                    <div class="control">
                        <input id="dbport" name="dbport" type="text" placeholder="3306" class="input " required="" value="<?php echo $dbport; ?>">
                        <p class="help">If you have no idea wtf this is, just don't change it.</p>
                    </div>
                </div>
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="dbuser">Database username</label>
                    <div class="control">
                        <input id="dbuser" name="dbuser" type="text" placeholder="root" class="input " required="" value="<?php echo $dbuser; ?>">
                        <p class="help">You might use root</p>
                    </div>
                </div>
                <!-- Password input-->
                <div class="field">
                    <label class="label" for="dbpass">Database Password</label>
                    <div class="control">
                        <input id="dbpass" name="dbpass" type="password" placeholder="Password" class="input " required="" value="<?php echo $dbpass; ?>">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="dbname">Database Name</label>
                    <div class="control">
                        <input id="dbname" name="dbname" type="text" placeholder="Database Name" class="input " required="" value="<?php echo $dbname; ?>">
                    </div>
                </div>
                <!-- Button (Double) -->
                <div class="field">
                    <label class="label" for="mysqli">I need some help...</label>
                    <div class="control">
                        <button id="mysqli" name="mysqli" class="button is-inverted">Let's ditch the mysql</button>
                        <button id="submitInfo" name="submitInfo" class="button is-primary" value="1">Submit</button>
                    </div>
                </div>
            </form>
        </section>
        <section id="installerStepThree">
            <form action="/includes/settings-inc.php" method="POST">
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="siteName">Site Name</label>
                    <div class="control">
                        <input id="siteName" name="siteName" type="text" placeholder="Site Name" class="input " required="">
                    </div>
                </div>
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="siteAddress">Site Address</label>
                    <div class="control">
                        <input id="siteAddress" name="siteAddress" type="text" placeholder="Site Address" class="input " required="" value="<?php siteURL(); ?>">
                    </div>
                </div>
                <!-- Text input-->
                <div class="field">
                    <label class="label" for="username">Username</label>
                    <div class="control">
                        <input id="username" name="username" type="text" placeholder="admin" class="input" value="admin">
                        <p class="help">You will use this login</p>
                    </div>
                </div>
                <!-- Password input-->
                <div class="field">
                    <label class="label" for="userPass">Password</label>
                    <div class="control">
                        <input id="userPass" name="userPass" type="password" placeholder="Don't tell others" class="input " required="">
                    </div>
                </div>
                <!-- Password input-->
                <div class="field">
                    <label class="label" for="conformPass">Conform Password</label>
                    <div class="control">
                        <input id="conformPass" name="conformPass" type="password" placeholder="Type it again" class="input " required="">
                    </div>
                </div>
                <!-- Button -->
                <div class="field">
                    <label class="label" for="letsgosubmit"></label>
                    <div class="control">
                        <button id="letsgosubmit" name="letsgosubmit" class="button is-primary" type="submit" value="1">Install</button>
                    </div>
                </div>
            </form>
        </section>
        <section id="installerStepFour">
            <a class="button is-primary" href="/admin">Login</a>
        </section>
    </div>
<script src="/js/jquery-3.3.1.min.js"></script>
</body>

</html>