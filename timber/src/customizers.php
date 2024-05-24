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

    $wp_customize->add_setting('content_margin_x', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '20',
        'transport' => 'refresh', 
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('content_margin_x', array(
        'label' => __('Body Margin X', 'textdomain'),
        'section' => 'content_section',
        'type' => 'number',
        'settings' =>'content_margin_x',
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 10
        ),
    ));

    $wp_customize->add_setting('content_padding_x', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '20',
        'transport' => 'refresh', 
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('content_padding_x', array(
        'label' => __('Body Padding X', 'textdomain'),
        'section' => 'content_section',
        'type' => 'number',
        'settings' =>'content_padding_x',
        'input_attrs' => array(
            'min' => 0,
            'max' => 100,
            'step' => 10
        ),
    ));

    $wp_customize->add_setting('body_bg_color', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '#bbb',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control('body_bg_color', array(
        'label' => __('Background area color', 'textdomain'),
        'section' => 'content_section',
        'type' => 'text',
        'settings' =>'body_bg_color',
    ));

    $wp_customize->add_setting('content_bg_color', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '#fff',
        'transport' => 'refresh', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control('content_bg_color', array(
        'label' => __('Content area color', 'textdomain'),
        'section' => 'content_section',
        'type' => 'text',
        'settings' =>'content_bg_color',
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
