<?php

/**
*
*
*	Plugin Name: CGC Meta
*/

if( !class_exists( 'CMB2' ) ) {
	require_once( 'init.php' );
}

/* Custom Field Types */

/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB options array
 */
function cgc_get_posts_for_cmb( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type' => 'post',
        'numberposts' => -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array();
    if ( $posts ) {
        foreach ( $posts as $post ) {
                   $post_options[] = array(
                       'name' => $post->post_title,
                       'value' => $post->ID
                   );
        }
    }

    return $post_options;
}