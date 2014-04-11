<!DOCTYPE html>
<html>
<head>
<meta name="google-site-verification" content="Q3UHAukO0iqXgNsEFBrpT8nZAXAcl9r1T0_g5vBu9cs" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Page-Enter" content="RevealTrans(duration=3,Transitionv=12)">
<title>index</title>
<link href="<?php echo THEMEROOT; ?>/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo THEMEROOT; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo THEMEROOT; ?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">

<?php wp_head(); ?>
<style>
</style>
</head>

<body>
<!-- Header Start -->
<header class="navbar navbar-static-top bs-docs-nav" role="banner">
  <div class="container">
	<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
	<a class="logo" href="<?php echo home_url(); ?>"><img src="<?php echo IMAGES ?>/logo.png"></a>
	</div>
	<div class="collapse navbar-right navbar-collapse bs-navbar-collapse" role="navigation">
		
	<?php
	wp_nav_menu(array(
	'menu'=>'global-menus',
	'theme_location'=>'global-menus',
	'depth'=>2,
	'container'=>'div',
	//'container_class'=>'collapse navbar-collapse navbar-ex1-collapse',
	'menu_class'=>'nav navbar-nav',
	'fallback_cb'=>'wp_bootstrap_navwalker::fallback',
	'walker'=>new wp_bootstrap_navwalker())
	);?>




	<?php //if(!is_home()){  ?>
	<!--<form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
	<input type="text" class="letterinput form-control" name="s" placeholder="Search">
	</div>
	<button type="submit" class="gobutton btn btn-default">Search</button>
	</form>-->
	<?php //} ?>

</div>
	
  </div>
</header><!-- Header End -->