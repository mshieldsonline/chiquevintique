<?php get_header(); ?>

<main id="main" class="site-main">

	<!-- ======= HERO ======= -->
	<section class="hero hero--bg">
		<div class="cv-container" style="position:relative;z-index:2;">
			<img
				src="<?php echo esc_url( CV_URI . '/assets/logo-white.png' ); ?>"
				alt="<?php bloginfo( 'name' ); ?>"
				class="hero__logo"
			>
			<p class="hero__eyebrow"><?php esc_html_e( 'Vintage, Antique &amp; Curios', 'chique-vintique' ); ?></p>
			<div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;margin-top:1.5rem;">
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">
						<?php esc_html_e( 'Shop the Collection', 'chique-vintique' ); ?>
					</a>
				<?php endif; ?>
				<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="btn btn-outline" style="color:#fff;border-color:#fff;">
					<?php esc_html_e( 'Our Story', 'chique-vintique' ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- ======= FEATURED PRODUCTS ======= -->
	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	<section class="cv-section" style="background:var(--cv-white);">
		<div class="cv-container">
			<div class="cv-section-heading">
				<p class="cv-section-heading__eyebrow"><?php esc_html_e( 'Fresh Finds', 'chique-vintique' ); ?></p>
				<h2 class="cv-section-heading__title"><?php esc_html_e( 'New Arrivals', 'chique-vintique' ); ?></h2>
				<p class="cv-section-heading__subtitle"><?php esc_html_e( 'Lovingly sourced pieces waiting for their next home.', 'chique-vintique' ); ?></p>
			</div>

			<?php
			$products = wc_get_products( [
				'status'  => 'publish',
				'limit'   => 4,
				'orderby' => 'date',
				'order'   => 'DESC',
			] );

			if ( $products ) :
			?>
				<div class="cv-product-grid">
					<?php foreach ( $products as $product ) : ?>
						<div class="cv-product-card">
							<div class="cv-product-card__image">
								<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
									<?php echo $product->get_image( 'cv-card' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
								</a>
							</div>
							<div class="cv-product-card__body">
								<h3 class="cv-product-card__title">
									<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
										<?php echo esc_html( $product->get_name() ); ?>
									</a>
								</h3>
								<div class="cv-product-card__price"><?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
							</div>
							<div class="cv-product-card__footer">
								<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="btn btn-outline" style="width:100%;justify-content:center;">
									<?php esc_html_e( 'View Item', 'chique-vintique' ); ?>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div style="text-align:center;margin-top:3rem;">
					<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn btn-primary">
						<?php esc_html_e( 'Browse All Items', 'chique-vintique' ); ?>
					</a>
				</div>

			<?php else : ?>
				<p style="text-align:center;opacity:.7;"><?php esc_html_e( 'No products yet — check back soon!', 'chique-vintique' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- ======= QUOTE BAND ======= -->
	<div class="cv-quote-band">
		<div class="cv-container">
			<blockquote>
				<?php esc_html_e( '"Every piece has a story. Let us help you find the one that belongs with you."', 'chique-vintique' ); ?>
				<cite><?php bloginfo( 'name' ); ?></cite>
			</blockquote>
		</div>
	</div>

	<!-- ======= WHY US ======= -->
	<section class="cv-section" style="background:var(--cv-blush);">
		<div class="cv-container">
			<div class="cv-section-heading">
				<p class="cv-section-heading__eyebrow"><?php esc_html_e( 'Why Chique Vintique', 'chique-vintique' ); ?></p>
				<h2 class="cv-section-heading__title"><?php esc_html_e( 'Thoughtfully Curated', 'chique-vintique' ); ?></h2>
			</div>
			<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:2rem;text-align:center;">
				<?php
				$pillars = [
					[ 'icon' => '✦', 'title' => __( 'Carefully Sourced', 'chique-vintique' ),     'body' => __( 'Each item is hand-picked for quality, character, and charm.', 'chique-vintique' ) ],
					[ 'icon' => '✦', 'title' => __( 'Sustainably Yours', 'chique-vintique' ),      'body' => __( 'Buying vintage gives beautiful things a second life.', 'chique-vintique' ) ],
					[ 'icon' => '✦', 'title' => __( 'Authentic & Unique', 'chique-vintique' ),     'body' => __( 'No two pieces are the same — own something truly one of a kind.', 'chique-vintique' ) ],
					[ 'icon' => '✦', 'title' => __( 'Secure Shopping', 'chique-vintique' ),        'body' => __( 'Safe checkout and easy returns, always.', 'chique-vintique' ) ],
				];
				foreach ( $pillars as $p ) : ?>
					<div style="background:var(--cv-white);border-radius:var(--cv-radius-lg);padding:2rem;box-shadow:var(--cv-shadow);">
						<div style="font-size:1.5rem;color:var(--cv-dusty-rose);margin-bottom:.75rem;"><?php echo esc_html( $p['icon'] ); ?></div>
						<h3 style="font-size:1.1rem;margin-bottom:.5rem;color:var(--cv-warm-brown);"><?php echo esc_html( $p['title'] ); ?></h3>
						<p style="font-size:.9rem;opacity:.8;margin:0;"><?php echo esc_html( $p['body'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- ======= LATEST FROM THE BLOG ======= -->
	<section class="cv-section">
		<div class="cv-container">
			<div class="cv-section-heading">
				<p class="cv-section-heading__eyebrow"><?php esc_html_e( 'Stories &amp; Inspiration', 'chique-vintique' ); ?></p>
				<h2 class="cv-section-heading__title"><?php esc_html_e( 'From the Blog', 'chique-vintique' ); ?></h2>
			</div>

			<?php
			$posts = get_posts( [ 'numberposts' => 3, 'post_status' => 'publish' ] );
			if ( $posts ) : ?>
				<div class="cv-blog-grid">
					<?php foreach ( $posts as $post ) :
						setup_postdata( $post );
						get_template_part( 'template-parts/card', 'post' );
					endforeach;
					wp_reset_postdata(); ?>
				</div>
				<div style="text-align:center;margin-top:3rem;">
					<a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="btn btn-outline">
						<?php esc_html_e( 'Read All Posts', 'chique-vintique' ); ?>
					</a>
				</div>
			<?php else : ?>
				<p style="text-align:center;opacity:.7;"><?php esc_html_e( 'No posts yet — come back soon!', 'chique-vintique' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
