<?php

add_action( 'genesis_entry_header', 'cloe_do_post_format_image', 4 );

/**
 * Add a post format icon.
 *
 * Adds an image, corresponding to the post format, before the post title.
 *
 * @since 1.4.0
 *
 * @uses CHILD_DIR
 * @uses CHILD_URL
 *
 * @return null Return early if post formats are not supported, or `genesis-post-format-images` is not supported
 */
function cloe_do_post_format_image() {

	//* Do nothing if post formats aren't supported
	if ( ! current_theme_supports( 'post-formats' ) || ! current_theme_supports( 'genesis-post-format-dashicons' ) )
		return;

	//* Get post format
	$post_format = get_post_format();

	//* If post format is set, look for post format image
	if ( $post_format && file_exists( sprintf( '%s/images/post-formats/%s.png', CHILD_DIR, $post_format ) ) )
		printf( '<a href="%s" rel="bookmark" class="post-format-icon"><span class="dashicons dashicons-format-%s"></span><span class="screen-reader-text">%s icon</span></a>', get_permalink(), $post_format, $post_format );

	//* Else, look for the default post format image
	else
		printf( '<a href="%s" rel="bookmark" class="post-format-icon"><span class="dashicons dashicons-media-default"></span><span class="screen-reader-text">Standard post</span></a>', get_permalink() );
}