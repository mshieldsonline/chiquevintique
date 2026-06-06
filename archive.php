<?php get_header(); ?>

<main id="main" class="site-main">

	<div style="background:var(--cv-blush);padding-block:clamp(2rem,5vw,3.5rem);">
		<div class="cv-container">
			<?php the_archive_title( '<h1 style="color:var(--cv-warm-brown);">', '</h1>' ); ?>
			<?php the_archive_description( '<p style="opacity:.75;margin-top:.5rem;">', '</p>' ); ?>
		</div>
	</div>

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
				<p><?php esc_html_e( 'Nothing found.', 'chique-vintique' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
