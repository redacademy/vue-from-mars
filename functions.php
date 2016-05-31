<?php
/**
 * Vue from Mars functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vue_from_Mars
 */

if ( ! function_exists( 'vfm_setup' ) ) :

function vfm_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
endif;
add_action( 'after_setup_theme', 'vfm_setup' );

/**
 * Enqueue scripts and styles.
 */
function vfm_scripts() {
	wp_enqueue_style( 'vfm-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vfm-base', get_template_directory_uri() . '/dist/assets/css/base.css', false, false );

	// wp_enqueue_script( 'vfm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	$base_url  = esc_url_raw( home_url() );
	$base_path = rtrim( parse_url( $base_url, PHP_URL_PATH ), '/' );

	wp_enqueue_script( 'vfm-vue', get_template_directory_uri() . '/dist/build.js', array(), '1.0.0', true );

	wp_localize_script( 'vfm-vue', 'wp', array(
		'root'      => esc_url_raw( rest_url() ),
		'base_url'  => $base_url,
		'base_path' => $base_path ? $base_path . '/' : '/',
		'nonce'     => wp_create_nonce( 'wp_rest' ),
		'site_name' => get_bloginfo( 'name' ),
		'routes'    => vfm_routes(),
	) );
}
add_action( 'wp_enqueue_scripts', 'vfm_scripts' );

function vfm_routes() {
	$routes = array();

	$query = new WP_Query( array(
		'post_type'      => 'any',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
	) );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$routes[] = array(
				'id'   => get_the_ID(),
				'type' => get_post_type(),
				'slug' => basename( get_permalink() ),
			);
		}
	}

	wp_reset_postdata();
	return $routes;
}
