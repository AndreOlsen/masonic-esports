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
						<div class="socials__inner">
							<?php dynamic_sidebar('socials_widget_area'); ?>
						</div>
					</div>
				<?php endif; ?>
			</nav>
				
			<section class="copyrights">
				<p>&#169; <?php echo date("Y"); ?> MASONIC All Rights Reserved</p>
			</section>
		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
