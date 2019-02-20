<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poor+Story" rel="stylesheet">
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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126905341-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
 
		  gtag('config', 'UA-126905341-1');
		</script>
	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

				<div id="logobox" class="logobox">
					<a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo get_template_directory_uri();?>/img/mcocp-web-logo.svg"></a>
				</div><!--.logobox-mobile-->
				<div class="help-nav">
					<a href="<?php bloginfo('wpurl');?>/search"><img class="search-icon" src="<?php echo get_template_directory_uri();?>/img/search-icon-white.png" alt="Mobile Search Icon"></a>
					<img class="nav-icon" src="<?php echo get_template_directory_uri();?>/img/nav-icon.svg" alt="Mobile Navigation Icon">
				</div><!--help-nav-->
				<!-- nav -->
				<nav class="header-navigation toggle-nav" role="navigation">
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
