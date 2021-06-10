<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?><?php wp_title('|',true,'left'); ?></title>

	<meta property="og:site_name" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>"/>
	<meta property="og:title" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>"/>
	<meta name="description" content="<?php bloginfo('name'); echo " | "; bloginfo('description');  ?>"/>
	<meta property="og:description" content="<?php bloginfo('name'); echo " | "; bloginfo('description'); ?>"/>

	<?php wp_head(); ?>
		
</head>

<body <?php body_class($class); ?>>
	<div id="site-header">
		<div class="container">
		<a href="/" class="logo">
			<img src="<?php bloginfo('template_directory'); ?>/img/wisdom-logo.png" alt="" />
		</a>
		<span id="menu-button">
			<span></span>
			<span></span>
			<span></span>
		</span>
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'main-menu',
				'container_class' => '',
				'container_id'    => '',
				'container'    	  => '',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2
			)
		); ?>
		<div id="menu-exand">
			<?php if(is_active_sidebar('menu-widgets')) dynamic_sidebar('menu-widgets'); ?>
		</div>
		</div>
	</div>
	<div id="wrapper">
		