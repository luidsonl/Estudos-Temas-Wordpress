<?
function general_customizer($wp_customize){

    $wp_customize->add_panel('general_panel', array(
        'title' => __('Configurações Gerais', 'textdomain'),
        'priority' => 001,
    ));
    //Header
    $wp_customize->add_section('header_section', array(
        'title' => __('Header', 'textdomain'),
        'priority' => 001,
        'panel' => 'general_panel',
    ));
    $wp_customize->add_setting('header_logo', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
    ));
    

    $wp_customize->add_control('header_logo', array(
        'label' => __('Header Logo', 'textdomain'),
        'section' => 'header_section',
        'type' => 'text',
    ));

    //Body
    $wp_customize->add_section('content_section', array(
        'title' => __('Body', 'textdomain'),
        'priority' => 001,
        'panel' => 'general_panel',
    ));

    $wp_customize->add_setting('content_margin', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '0',
        'transport' => 'refresh', 
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('content_margin_range', array(
        'label' => __('Body Margin', 'textdomain'),
        'section' => 'content_section',
        'type' => 'range',
        'settings' =>'content_margin',
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 10
        ),
    ));
    $wp_customize->add_control('content_margin_number', array(
        'description' => __('px', 'textdomain'),
        'section' => 'content_section',
        'type' => 'number',
        'settings' =>'content_margin',
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 10
        ),
    ));


    //Footer
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer', 'textdomain'),
        'priority' => 999,
        'panel' => 'general_panel',
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_copyright', array(
        'label' => __('Copyright', 'textdomain'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}

add_action('customize_register', 'general_customizer');
