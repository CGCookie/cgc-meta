<?php

/**
*
*
*	Plugin Name: CGC Meta - Custom Fields
*	Description:
*/

if( !class_exists( 'CMB2' ) ) {
	require_once('custom-fields/select2/cmb-field-select2.php');
}

function cgc_get_posts_for_cmb( $query_args ) {

    $args = wp_parse_args( $query_args, array(
        'post_type' => array('post'),
        'numberposts' => -1,
    ) );

    $posts = get_posts( $args );

    $post_options = array();

    if ( $posts ) {
        foreach ( $posts as $post ) {

        	$type = $post->post_type;

           	$post_options[] = array(
               'name' => strtoupper($type).': '.$post->post_title,
               'value' => $post->ID
           	);
        }
    }

    return $post_options;
}