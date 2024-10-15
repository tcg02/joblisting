<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="header" class="clearfix">
	<!-- navbar -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- navbar-header -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><img class="img-responsive" src="<?= get_template_directory_uri(); ?>/dist/images/logo.png" alt="Logo"></a>
			</div>
			<!-- /navbar-header -->
			
			<div class="navbar-left">
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?= get_home_url(); ?>">Job list</a></li>
						</li>
					</ul>
				</div>
			</div><!-- navbar-left -->
			
			<!-- nav-right -->
			<div class="nav-right">			
				<a href="post.html" class="btn">Post Your Job</a>
			</div>
			<!-- nav-right -->
		</div><!-- container -->
	</nav><!-- navbar -->
</header><!-- header -->