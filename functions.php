<?php

namespace DD8;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

define( 'DD8_VER', 1.8 );

get_template_part( 'functions', 'loop' );
if ( is_admin() ) {
	get_template_part( 'functions', 'acf' );
}

/**
 * Add scripts & styles
 */
add_action( 'wp_enqueue_scripts', '\DD8\enqueue_scripts' );
function enqueue_scripts(){
    wp_register_style( 'style', get_theme_file_uri( 'assets/css/minified.css' ), null, DD8_VER );
    wp_enqueue_style( 'style' );

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1-b', true );
    wp_register_script( 'imagesloaded', '//unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', false, DD8_VER, true );
    wp_register_script( 'textarea-caret-position', get_theme_file_uri( 'assets/js/textarea-caret-position.min.js' ), array(), DD8_VER, true );
    wp_register_script( 'glitcher', get_theme_file_uri( 'assets/js/glitcher.min.js' ), array( 'imagesloaded' ), DD8_VER, true );
    wp_register_script( 'background', get_theme_file_uri( 'assets/js/background.min.js' ), array(), DD8_VER, true );
    wp_register_script( 'main', get_theme_file_uri( 'assets/js/script.min.js' ), array( 'jquery', 'textarea-caret-position', 'glitcher', 'background' ), DD8_VER, true );
	wp_enqueue_script( 'main' );
	
	wp_localize_script( 'main', 'wpt2018', array( 'newsletter' => home_url( '/wp-json/wptech/v1/addsubscriber' ) ) );
}

/**
 * Add menus
 */
add_action( 'after_setup_theme', '\DD8\register_menus' );
function register_menus() {
	add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
	add_theme_support( 'title-tag' );  
	register_nav_menu( 'main-menu', 'Menu principal (entête)' );
	register_nav_menu( 'footer-menu', 'Menu footer (pied de page)' );
}

/**
 * Add images sizes
 */
add_action( 'after_setup_theme', '\DD8\register_image_sizes' );
function register_image_sizes() {
	add_image_size( 'screen-background', 2100, 1000, true );
	add_image_size( 'header', 1750, 650, true );
	add_image_size( 'header-single', 1750, 450, true );
	add_image_size( 'medium-500', 500, 300, false );
    add_image_size( 'pave', 390, 390, true );
    add_image_size( 'portrait-0', 250, 335, true );
    add_image_size( 'portrait-1', 340, 460, true );
    add_image_size( 'post-0', 732, 416, true );
    add_image_size( 'post-1', 350, 200, true );
}

add_action( 'admin_init', '\DD8\theme_settings' );
function theme_settings() {
	foreach ( array( 'twitter' => 'Twitter', 'facebook' => 'Facebook', 'instagram' => 'Instagram' ) as $r => $reseau ) {
    	register_setting( 'reading', $r );
		add_settings_field(
			$r,
			'URL de la page ' . $reseau,
			'\DD8\input_url',
			'reading',
			'default',
			array(
				'value' => get_option( $r ),
				'name'  => $r,
				'type'  => 'text',
			)
		);
	}
	register_setting( 'reading', 'dd8_list_id' );
	add_settings_field(
			'dd8_list_id',
			'ID de la liste de newsletter DeliPress',
			'\DD8\input_url',
			'reading',
			'default',
			array(
				'value' => get_option( 'dd8_list_id' ),
				'name'  => 'dd8_list_id',
				'type'  => 'text',
			)
		);
	register_setting( 'reading', 'tickets-page' );
	add_settings_field(
			'tickets-page',
			'Page de vente des tickets',
			'wp_dropdown_pages',
			'reading',
			'default',
			array(
				'selected' => get_option( 'tickets-page' ),
				'name'  => 'tickets-page',
			)
		);
}

function input_url( $args ) {
	printf( '<input type="' . $args['type'] . '" value="%1$s" name="%2$s" id="%2$s" class="regular-text ltr"/>', $args['value'], $args['name'] );
}


add_action( 'wp_head', '\DD8\wp_head' );
function wp_head() {
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- Au sujet de ce thème 👻 : https://github.com/willybahuaud/2018 -->
	<?php
}

add_action( 'widgets_init', '\DD8\register_sidebars' );
function register_sidebars() {
	register_sidebar( array(
		'name'          => 'Colonne principale',
		'id'            => 'main-sidebar',    // ID should be LOWERCASE  ! ! !
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="titre">',
		'after_title'   => '</div>'
	) );
}


function add_subscriber( $req ) {
	if ( function_exists( 'delipress_create_subscriber_on_list' ) ) {
		$list_id = get_option( 'dd8_list_id', 1 );
		return delipress_create_subscriber_on_list( $req->get_param( 'email' ), $list_id );
	}
	return false;
}

add_action( 'rest_api_init', function() {
	register_rest_route( 'wptech/v1', '/addsubscriber', array(
		'methods'  => 'POST',
		'callback' => '\DD8\add_subscriber',
	) );
} );
