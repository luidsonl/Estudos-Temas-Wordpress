<?php
function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', [],'' ,true);
}

add_action('init', function(){
    if(!is_admin()){
        enqueue_bootstrap();
        wp_enqueue_style('main-css', get_template_directory_uri().'/style.css?gh=aaaaa');
    }
    add_theme_support('widgets');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    
    add_image_size('post-thumbnail', 280, 180, array('center', 'top'));
});


add_action( 'after_setup_theme', function () {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
} );


