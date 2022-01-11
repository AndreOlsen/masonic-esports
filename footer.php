<?php
/**
 * The template for displaying the footer
 *
 * @package Masonic
 */

?>
			<footer class="site-footer">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'footer-menu-left',
							'container' 	  => 'nav',
							'container_class' => 'menu-left',
						)
					);

					wp_nav_menu(
						array(
							'theme_location'  => 'footer-menu-right',
							'container' 	  => 'nav',
							'container_class' => 'menu-right',
						)
					);
				?>

				
				<?php if ( is_active_sidebar('socials_widget_area')) : ?>
					<div class="socials">
						<?php dynamic_sidebar('socials_widget_area'); ?>
					</div>
				<?php endif; ?>

			</footer><!-- .site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
