<?php
/**
 * Product card template for the shop loop
 * Overrides WooCommerce default to match Chique Vintique card style
 */
defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) return;
?>
<li <?php wc_product_class( 'cv-product-card', $product ); ?>>

	<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="cv-product-card__image-link" tabindex="-1" aria-hidden="true">
		<div class="cv-product-card__image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'cv-card' ); ?>
			<?php else : ?>
				<?php echo wc_placeholder_img( 'cv-card' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<?php endif; ?>
			<?php if ( $product->is_on_sale() ) : ?>
				<span class="cv-product-card__badge"><?php esc_html_e( 'Sale', 'chique-vintique' ); ?></span>
			<?php endif; ?>
		</div>
	</a>

	<div class="cv-product-card__body">
		<h3 class="cv-product-card__title">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<?php echo esc_html( $product->get_name() ); ?>
			</a>
		</h3>
		<div class="cv-product-card__price">
			<?php echo $product->get_price_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</div>
	</div>

	<div class="cv-product-card__footer">
		<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="btn btn-outline cv-product-card__btn">
			<?php esc_html_e( 'View Item', 'chique-vintique' ); ?>
		</a>
	</div>

</li>
