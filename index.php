<?php get_header(); ?>

<main id="main" class="site-main">

<?php if ( is_home() && ! is_front_page() ) : ?>
	<div style="background:var(--cv-blush);padding-block:clamp(2rem,5vw,3.5rem);">
		<div class="cv-container">
			<h1><?php single_post_title(); ?></h1>
		</div>
	</div>
<?php endif; ?>

<section class="cv-section">
	<div class="cv-container">

		<?php if ( have_posts() ) : ?>

			<div class="cv-blog-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/card', 'post' ); ?>
				<?php endwhile; ?>
			</div>

			<?php cv_pagination(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'chique-vintique' ); ?></p>
		<?php endif; ?>

	</div>
</section>

</main>

<?php get_footer(); ?>
