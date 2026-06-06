<?php
defined( 'ABSPATH' ) || exit;
get_header();
?>

<main id="main" class="site-main">

	<div style="background:var(--cv-blush);padding-block:clamp(2rem,5vw,3.5rem);">
		<div class="cv-container">
			<?php woocommerce_breadcrumb(); ?>
			<h1 style="color:var(--cv-warm-brown);">
				<?php woocommerce_page_title(); ?>
			</h1>
		</div>
	</div>

	<section class="cv-section">
		<div class="cv-container">

			<?php if ( woocommerce_product_loop() ) : ?>

				<?php do_action( 'woocommerce_before_shop_loop' ); ?>

				<ul class="cv-product-grid products" style="list-style:none;padding:0;">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				</ul>

				<?php do_action( 'woocommerce_after_shop_loop' ); ?>

			<?php else : ?>
				<?php do_action( 'woocommerce_no_products_found' ); ?>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>
