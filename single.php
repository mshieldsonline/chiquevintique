<?php get_header(); ?>

<main id="main" class="site-main">
<div class="cv-section">
<div class="cv-container cv-content-narrow">

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<?php
			$cats = get_the_category();
			if ( $cats ) : ?>
				<a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ) ); ?>" class="cv-tag"><?php echo esc_html( $cats[0]->name ); ?></a>
			<?php endif; ?>
			<h1 class="entry-title" style="margin-top:.75rem;"><?php the_title(); ?></h1>
			<p class="entry-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php
				$author_id = get_the_author_meta( 'ID' );
				echo ' &middot; <a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author() ) . '</a>';
				?>
			</p>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail"><?php the_post_thumbnail( 'cv-hero' ); ?></div>
		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( [
				'before' => '<nav class="page-links">' . __( 'Pages:', 'chique-vintique' ),
				'after'  => '</nav>',
			] );
			?>
		</div>

		<footer class="entry-footer" style="margin-top:2rem;">
			<?php the_tags( '<div style="display:flex;gap:.5rem;flex-wrap:wrap;">', '', '</div>' ); ?>
		</footer>

	</article>

	<?php
	the_post_navigation( [
		'prev_text' => '&larr; %title',
		'next_text' => '%title &rarr;',
	] );
	?>

<?php endwhile; ?>

</div>
</div>
</main>

<?php get_footer(); ?>
