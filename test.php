<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="animate.min.css">
  <link rel="stylesheet" type="text/css" href="noty.css">
  <link rel="stylesheet" type="text/css" href="relax.css">
  <style type="text/css">
    html,
    body {
      font-family: sans-serif;
    }
  </style>
</head>

<body>
  <script src="noty.min.js"></script>
  <script type="text/javascript">
    new Noty({
      theme: 'relax',
      type: 'info',
      timeout: 2000,
      animation: {
        open: 'animated bounceInRight fast',
        close: 'animated bounceOutRight fast'
      },
      text: 'Some notification text',
    }).show();
  </script>
</body>

</html>

$errorMessage = $_GET['login']
if($errorMessage == "empty") {
echo '';
}
if($errorMessage == "error") {
echo '';
}
if($errorMessage == "wrongPass") {
echo '';
}