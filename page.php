<?php get_header(); ?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if ( ! is_front_page() ) : ?>
			<div style="background:var(--cv-blush);padding-block:clamp(2rem,5vw,3.5rem);">
				<div class="cv-container">
					<h1 style="color:var(--cv-warm-brown);"><?php the_title(); ?></h1>
				</div>
			</div>
		<?php endif; ?>

		<div class="cv-section">
			<div class="cv-container <?php echo is_page_template( 'page-wide.php' ) ? '' : 'cv-content-narrow'; ?>">
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

</main>

<?php get_footer(); ?>
