<?php


add_shortcode('3_posts', 'get_three_posts');

function get_three_posts(){
	
	
	$output = '<div class="row">';
	
	$args = array(
	    'post_type'      => 'post',
	    'posts_per_page'     => 3
	);
	query_posts( $args );
 	while ( have_posts() ) : the_post();
   
 	
  	$output .= '<article class="col-lg-4 col-sm-12">';
 	
 	if ( has_post_thumbnail() ) 
	    $output .= '<a href="'.get_the_permalink().'">'.get_the_post_thumbnail().'</a>';
	$output .=  '<span class="date">'.get_the_date().'</span>';
	$output .=  '<h4>  <a href="'.get_permalink().'">  '.get_the_title().' </a></h4>';
	$output .=  '<p>'.get_the_excerpt().'</p>';	
	$output .=  '<div class="post-footer">';
	$output .=  	'<a href="'.get_permalink().'">Read More</a>';
	$output .=  '</div>';
	$output .=  '</article>';
		
	endwhile;

	wp_reset_query();
	
	$output .=  '</div>';
	
	return $output;
	
}

function my_excerpt_length($length){
return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function vc_custom_css($id) {
        $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
        if ( ! empty( $shortcodes_custom_css ) ) {
            echo '<style type="text/css">';
            echo $shortcodes_custom_css;
            echo '</style>';
        }
    }

function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js?v='.rand(5, 15), array ( 'jquery' ), true);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


add_theme_support( 'post-thumbnails', array( 'post', 'page', 'slide', 'product' ));



function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );




function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src.'?v=1.5.'.rand(0,100);
    //return $src;
}

add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
//add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


add_image_size( 'cat-image', 1880, 620, true );
add_image_size( 'homepage-slide', 1880, 1024, true );
add_image_size( 'homepage-slide-tall', 708, 1024, true );
add_image_size( 'half-width', 990, 1080, true );
add_image_size( 'highlight', 700, 800, true );
add_image_size( 'blog', 600, 400, true );


if ( function_exists('register_sidebar') ) {
    $sidebar1 = array(
        'name' => 'Footer Widgets',
		'id' => 'footer-widgets',
		'description' => 'Appears in the footer area',
		'before_widget' => '<div id="%1$s" class="col-lg-4 col-sm-12 widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>', 
    );  
    $sidebar2 = array(
        'name' => 'Menu Widgets',
		'id' => 'menu-widgets',
		'description' => 'Appears in the menu dropdown',
		'before_widget' => '<div id="%1$s" class="menu-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '', 
    );
    register_sidebar($sidebar1);
    register_sidebar($sidebar2);
}


if( ! function_exists( 'fix_no_editor_on_posts_page' ) ) {

    function fix_no_editor_on_posts_page( $post_type, $post ) {
        if( isset( $post ) && $post->ID != get_option('page_for_posts') ) {
            return;
        }

        remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
        add_post_type_support( 'page', 'editor' );
    }

    add_action( 'add_meta_boxes', 'fix_no_editor_on_posts_page', 0, 2 );

 }