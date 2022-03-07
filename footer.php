<?php
/**
 * The template for displaying the footer
 *
 * @package Masonic
 */
?>			

		</main>
		
		<div class="shape-divider shape-divider--masonic-waves"></div>
			
		<footer class="site-footer">
				
			<nav class="footer-menus">
				<div class="custom-logo-container">
					<?php has_custom_logo() ? the_custom_logo() : ''; ?>
				</div>

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

				<div class="payment-options">
					<p><?php _e('Payment options', 'masonic_esports'); ?></p>
					<img class="options" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/payment_options.png'; ?>" alt="<?php _e('Payment options', 'masonic_esports'); ?>">
				</div>
			</nav>
				
			<section class="copyrights">
				<p>&#169; <?php echo date("Y"); ?> MASONIC All Rights Reserved</p>
			</section>
		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
