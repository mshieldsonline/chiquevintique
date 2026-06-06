<?php
defined( 'ABSPATH' ) || exit;

function cv_pagination() {
	$links = paginate_links( [
		'prev_text' => '&larr;',
		'next_text' => '&rarr;',
		'type'      => 'array',
	] );

	if ( ! $links ) {
		return;
	}

	echo '<nav class="cv-pagination" aria-label="' . esc_attr__( 'Posts pagination', 'chique-vintique' ) . '">';
	foreach ( $links as $link ) {
		echo $link; // phpcs:ignore WordPress.Security.EscapeOutput
	}
	echo '</nav>';
}
