<?php
/**
 * Single product page wrapper
 * Overrides WooCommerce default to use our cv-container for proper centering
 */
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main single-product-page">
	<div class="cv-container">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>
