<?php get_header(); ?>

<main id="main" class="site-main">

	<div style="background:var(--cv-blush);padding-block:clamp(2rem,5vw,3.5rem);">
		<div class="cv-container">
			<h1 style="color:var(--cv-warm-brown);">
				<?php
				/* translators: %s: search query */
				printf( esc_html__( 'Search results for: %s', 'chique-vintique' ), '<em>' . esc_html( get_search_query() ) . '</em>' );
				?>
			</h1>
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
				<p><?php esc_html_e( 'No results found. Try a different search.', 'chique-vintique' ); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>
