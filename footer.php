<footer id="colophon" class="site-footer">
	<div class="cv-container">

		<div class="site-footer__grid">

			<!-- Brand column -->
			<div class="site-footer__brand">
				<img src="<?php echo esc_url( CV_URI . '/assets/logo-white.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" height="70" style="height:70px;width:auto;margin-bottom:.75rem;">
				<p><?php bloginfo( 'description' ); ?></p>
			</div>

			<!-- Footer nav columns via widgets -->
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Shop', 'chique-vintique' ); ?></h4>
					<ul>
						<?php if ( class_exists( 'WooCommerce' ) ) : ?>
							<li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'All Items', 'chique-vintique' ); ?></a></li>
							<li><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php esc_html_e( 'Cart', 'chique-vintique' ); ?></a></li>
							<li><a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"><?php esc_html_e( 'Checkout', 'chique-vintique' ); ?></a></li>
							<li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php esc_html_e( 'My Account', 'chique-vintique' ); ?></a></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Explore', 'chique-vintique' ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'chique-vintique' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'chique-vintique' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'chique-vintique' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<?php else : ?>
				<div>
					<h4><?php esc_html_e( 'Get in Touch', 'chique-vintique' ); ?></h4>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'chique-vintique' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

		</div>

		<div class="site-footer__bottom">
			<p>
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
				<?php esc_html_e( 'All rights reserved.', 'chique-vintique' ); ?>
			</p>
			<?php
			wp_nav_menu( [
				'theme_location' => 'footer',
				'menu_class'     => 'footer-nav',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => false,
			] );
			?>
		</div>

	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
