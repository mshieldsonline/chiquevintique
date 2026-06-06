<?php get_header(); ?>

<main id="main" class="site-main">
	<section class="cv-section" style="text-align:center;">
		<div class="cv-container cv-content-narrow">
			<p style="font-size:5rem;line-height:1;color:var(--cv-blush);">404</p>
			<h1 style="color:var(--cv-warm-brown);"><?php esc_html_e( 'Page Not Found', 'chique-vintique' ); ?></h1>
			<p style="opacity:.75;margin-block:1rem 2rem;"><?php esc_html_e( "This page seems to have wandered off. Let's get you back on track.", 'chique-vintique' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Back to Home', 'chique-vintique' ); ?></a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
