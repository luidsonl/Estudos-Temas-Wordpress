<?php
// Initialize theme features and assets
add_action('init', 'theme_setup');

function theme_setup() {
    if(!is_admin()){
        enqueue_bootstrap();
        wp_enqueue_style('main-css', get_template_directory_uri().'/style.css');
    }
    add_theme_support('widgets');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    
    // Add custom image size for post thumbnails
    add_image_size('post-thumbnail', 280, 180, array('center', 'top'));

    // Register navigation menus
    register_nav_menus(
        array(
          'header-menu' =>  'Header Menu',
          'footer-menu' => 'Footer Menu',
          'sidebar-menu' => 'Sidebar Menu'
        )
    );
}

// Add logo support after theme setup
add_action( 'after_setup_theme', 'add_logo_support' );

// Function to add custom logo support
function add_logo_support(){
    $defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}

// Enqueue Bootstrap assets
function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('bootstrap-bundle-js', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array(), '', true);
}

// Retrieve menu items based on the theme location
function get_menu_items( $theme_location ) {
    if ( $theme_location && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {

        if( $locations[$theme_location] == 0){
            return array();
        }
		
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
    
        return $menu_items;
    } else {
        return array();
    }
}

function home_page_layout_customizer($wp_customize){
    $wp_customize->add_section(
        'footer',
        array(
            'title' => __('Footer', 'scratch'),
            'priority' => 201
        )
    );
    $wp_customize->add_setting('copyright');
    $wp_customize->add_control(
        'copyright',
        array(
            'label'=>__('Copyright', 'scratch'),
            'section'=> 'footer'
        )
    );
}

add_action('customize_register', 'home_page_layout_customizer');