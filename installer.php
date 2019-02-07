<?php
    require('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
    </style>
</head>
<body>
    
<div class="installerHero">
    <h1>Blink</h1>
    <ol class="path">
        <li class="current"><span>1</span>欢迎使用</li>
        <li><span>2</span>初始化配置</li>
        <li><span>3</span>开始安装</li>
        <li><span>4</span>安装成功</li>
    </ol>
</div>

<div class="container">
    <section>
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
                        <button id="submitInfo" name="submitInfo" class="button is-primary">Submit</button>
                      </div>
                    </div>
                    </form>
                    
    </section>
</div>




</body>
</html>