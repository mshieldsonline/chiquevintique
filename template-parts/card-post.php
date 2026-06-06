<article class="cv-blog-card">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="cv-blog-card__image">
			<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php the_post_thumbnail( 'cv-blog' ); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="cv-blog-card__body">
		<p class="cv-blog-card__meta">
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<?php
			$cats = get_the_category();
			if ( $cats ) {
				echo ' &middot; <a href="' . esc_url( get_category_link( $cats[0]->term_id ) ) . '">' . esc_html( $cats[0]->name ) . '</a>';
			}
			?>
		</p>
		<h3 class="cv-blog-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="cv-blog-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a href="<?php the_permalink(); ?>" class="cv-blog-card__link">
			<?php esc_html_e( 'Read more', 'chique-vintique' ); ?> &rarr;
		</a>
	</div>
</article>
