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

function footer_customizer($wp_customize){
    $wp_customize->add_section(
        'footer',
        array(
            'title' => __('Footer'),
            'priority' => 201
        )
    );
    $wp_customize->add_setting('copyright',
        array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));
    $wp_customize->add_control(
        'copyright',
        array(
            'label'=>__('Copyright'),
            'section'=> 'footer',
            'type'     => 'text'
        )
    );
}

function slider_customizer($wp_customize){
    $wp_customize->add_section(
        'slider',
        array(
            'title' => __('Slider'),
            'description' => __('Set slider'),
            'priority' => 202
        )
    );

    // slider 1
    $wp_customize->add_setting('slider_banner_1', 
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', 
      ));
    $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'slider_banner_1',
            array(
                'label'      => __( 'Image to banner 1'),
                'section'    => 'slider',
                'settings'   => 'slider_banner_1',
                'context'    => 'setting context',
                'height'=>200,
                'width'=>1000,
                'flex_height'=> false,
                'flex_width'=> false,
            )
        )
    );
    $wp_customize->add_setting('slider_label_1',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control(
        'slider_label_1',
        array(
            'label'=>__('Text to label 1'),
            'section'=> 'slider',
            'type'     => 'text'
        )
    );
    $wp_customize->add_setting('slider_content_1',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control( 
        'slider_content_1',
        array(
            'label'    => 'Text to content 1',
            'section'  => 'slider',
            'type'     => 'textarea',
        )
    );
    
    // slider 2
    $wp_customize->add_setting('slider_banner_2',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'slider_banner_2',
            array(
                'label'      => __( 'Image to banner 2'),
                'section'    => 'slider',
                'settings'   => 'slider_banner_2',
                'context'    => 'setting context',
                'height'=>200,
                'width'=>1000,
                'flex_height'=> false,
                'flex_width'=> false,
            )
        )
    );
    $wp_customize->add_setting('slider_label_2',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control(
        'slider_label_2',
        array(
            'label'=>__('Text to label 2'),
            'section'=> 'slider',
            'type'     => 'text'
        )
    );
    $wp_customize->add_setting('slider_content_2',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control( 
        'slider_content_2',
        array(
            'label'    => 'Text to content 2',
            'section'  => 'slider',
            'type'     => 'textarea',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    // slider 3
    $wp_customize->add_setting('slider_banner_3',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
      ));

      $wp_customize->add_control(
        new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'slider_banner_3',
            array(
                'label'      => __( 'Image to banner 3'),
                'section'    => 'slider',
                'settings'   => 'slider_banner_3',
                'context'    => 'setting context',
                'height'=>200,
                'width'=>1000,
                'flex_height'=> false,
                'flex_width'=> false,
            )
        )
    );
    $wp_customize->add_setting('slider_label_3',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control(
        'slider_label_3',
        array(
            'label'=>__('Text to label 3'),
            'section'=> 'slider',
            'type'     => 'text'
        )
    );
    $wp_customize->add_setting('slider_content_3',
    array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
      ));

    $wp_customize->add_control( 
        'slider_content_3',
        array(
            'label'    => 'Text to content 3',
            'section'  => 'slider',
            'type'     => 'textarea',
        )
    );
}

add_action('customize_register', 'footer_customizer');
add_action('customize_register', 'slider_customizer');