<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

				<div id="logobox-mobile" class="logobox-mobile mob-head">
					<a href="<?php bloginfo('wpurl');?>">Logo Image File</a>
				</div><!--.logobox-mobile-->
	
				<div class="mob-head help-nav">
					<img class="search-icon" src="<?php echo get_template_directory_uri();?>/img/search-icon-434343.png" alt="Mobile Navigation Icon">
					<img class="nav-icon" src="<?php echo get_template_directory_uri();?>/img/nav-icon.svg" alt="Mobile Navigation Icon">
				</div><!--help-nav-->
	
				<div id="logobox" class="logobox head-inline">
					<a href="<?php bloginfo('wpurl');?>">Logo Image File</a>
				</div><!--.logobox-->

				<!-- nav -->
				<nav class="header-navigation head-inline" role="navigation">
					<?php wp_nav_menu( array(
							'theme_location' => 'header-menu', 
							'menu_class' => 'header-nav', 
							)
						);
					?>
				</nav>
				<!-- /nav -->

			</header>
			<!-- /header -->
