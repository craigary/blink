<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php
    	if(!isset($row['postTitle'])) {
    		echo $blogName;
    	} else {
    		echo $blogName.' - '.$row['postTitle'];
    	}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <!-- <link rel="stylesheet" href="style/bulma.min.css"> -->
	   <!-- <link rel="stylesheet" href="style/typo.css"> -->
     <link rel="stylesheet" href="style/indexstyle.css">
	<!-- <link rel="stylesheet" href="style/main.css"> -->
	<script src="https://use.fontawesome.com/7f9ae733f0.js"></script>
</head>
<body>
	<!-- <div id="wrapper" class="box card4article">
		<div class="columns">
		  <div class="column" >
        <h1 class="title"><?php echo $blogName; ?></h1>		  </div>
		  <nav class="column has-text-right breadcrumb has-dot-separator">
		  	<ul>
		  		<li><a href="admin"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Backyard</a></li>
		  	</ul>
		  </nav>
		</div>
		<hr> -->
<div class="container"><!-- this div will close in footer.php -->
  <header>
    <div class="logo"><?php echo $blogName; ?></div>
    <div class="nav">
      <a href="#" class="nav_focus">blog</a>
      <a href="#">archive</a>
      <a href="#">categories</a>
      <a href="#">backyard</a>
    </div>
  </header>
