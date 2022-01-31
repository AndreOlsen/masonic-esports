<?php
/**
 * Header file for Masonic theme.
 *
 * @package Masonic
 */

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php wp_body_open(); ?>

		<header class="site-header">
			<div class="site-header__inner">
				<?php
					if(has_nav_menu('main-menu-left')) {
						wp_nav_menu(
							array(
								'theme_location'  => 'main-menu-left',
								'container' 	  => 'nav',
								'container_class' => 'main-menu main-menu__left',
							)
						);
					}
				?>

				<div class="custom-logo-container">
                    <?php has_custom_logo() ? the_custom_logo() : ''; ?>
                </div>

				<?php
					if(has_nav_menu('main-menu-right')) {
						wp_nav_menu(
							array(
								'theme_location'  => 'main-menu-right',
								'container' 	  => 'nav',
								'container_class' => 'main-menu main-menu__right',
							)
						);
					}
				?>
			</div>

			<div class="site-header__mobile">
				<i id="burger-menu" class="burger-menu fas fa-bars"></i>

				<?php
					if(has_nav_menu('mobile-menu')) {
						wp_nav_menu(
							array(
								'theme_location'  => 'mobile-menu',
								'container' 	  =>  'nav',
								'container_class' => 'main-menu main-menu__mobile'
							)
						);
					}
				?>
			</div>
		</header>

		<main class="main-content">