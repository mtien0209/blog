<?php
/**
 * Fashion Photography Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Fashion Photography
 */

use WPTRT\Customize\Section\Fashion_Photography_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Fashion_Photography_Button::class );

    $manager->add_section(
        new Fashion_Photography_Button( $manager, 'fashion_photography_pro', [
            'title'       => __( 'Photography Pro', 'fashion-photography' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'fashion-photography' ),
            'button_url'  => esc_url( 'https://www.themagnifico.net/themes/fashion-photography-wordpress-theme/', 'fashion-photography')
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'fashion-photography-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'fashion-photography-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fashion_photography_customize_register($wp_customize){
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_setting('fashion_photography_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'fashion_photography_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_photography_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'fashion-photography' ),
        'section'        => 'title_tagline',
        'settings'       => 'fashion_photography_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('fashion_photography_logo_text', array(
        'default' => true,
        'sanitize_callback' => 'fashion_photography_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_photography_logo_text',array(
        'label'          => __( 'Enable Disable Tagline', 'fashion-photography' ),
        'section'        => 'title_tagline',
        'settings'       => 'fashion_photography_logo_text',
        'type'           => 'checkbox',
    )));
    
    // Theme Color
    $wp_customize->add_section('fashion_photography_color_option',array(
        'title' => esc_html__('Theme Color','fashion-photography'),
        'description' => esc_html__('Change theme color on one click.','fashion-photography'),
        'priority'   => 110
    ));

    $wp_customize->add_setting( 'fashion_photography_theme_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_photography_theme_color', array(
        'label' => esc_html__('Color Option','fashion-photography'),
        'section' => 'fashion_photography_color_option',
        'settings' => 'fashion_photography_theme_color' 
    )));
    
    // Header
    $wp_customize->add_section('fashion_photography_header_top',array(
        'title' => esc_html__('On Click Sidebar','fashion-photography'),
    ));

    $wp_customize->add_setting('fashion_photography_rightside_box',array(
        'default' => 1,
        'sanitize_callback' => 'fashion_photography_sanitize_checkbox'
    )); 
    $wp_customize->add_control('fashion_photography_rightside_box',array(
        'label' => esc_html__('On / Off Sidebar','fashion-photography'),
        'section' => 'fashion_photography_header_top',
        'setting' => 'fashion_photography_rightside_box',
        'type'  => 'checkbox'
    ));

    $wp_customize->add_setting('fashion_photography_rightside_address',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    )); 
    $wp_customize->add_control('fashion_photography_rightside_address',array(
        'label' => esc_html__('Add Address','fashion-photography'),
        'section' => 'fashion_photography_header_top',
        'setting' => 'fashion_photography_rightside_address',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('fashion_photography_rightside_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    )); 
    $wp_customize->add_control('fashion_photography_rightside_email',array(
        'label' => esc_html__('Add Email Address','fashion-photography'),
        'section' => 'fashion_photography_header_top',
        'setting' => 'fashion_photography_rightside_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('fashion_photography_rightside_call',array(
        'default' => '',
        'sanitize_callback' => 'fashion_photography_sanitize_phone_number'
    )); 
    $wp_customize->add_control('fashion_photography_rightside_call',array(
        'label' => esc_html__('Add Phone Number','fashion-photography'),
        'section' => 'fashion_photography_header_top',
        'setting' => 'fashion_photography_rightside_call',
        'type'  => 'text'
    ));

    // General Settings
     $wp_customize->add_section('fashion_photography_general_settings',array(
        'title' => esc_html__('General Settings','fashion-photography'),
        'description' => esc_html__('General settings of our theme.','fashion-photography'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('fashion_photography_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'fashion_photography_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_photography_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'fashion-photography' ),
        'section'        => 'fashion_photography_general_settings',
        'settings'       => 'fashion_photography_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'fashion_photography_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_photography_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','fashion-photography'),
        'section' => 'fashion_photography_general_settings',
        'settings' => 'fashion_photography_preloader_bg_color' 
    )));
    
    $wp_customize->add_setting( 'fashion_photography_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_photography_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','fashion-photography'),
        'section' => 'fashion_photography_general_settings',
        'settings' => 'fashion_photography_preloader_dot_1_color' 
    )));

    $wp_customize->add_setting( 'fashion_photography_preloader_dot_2_color', array(
        'default' => '#d66060',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fashion_photography_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','fashion-photography'),
        'section' => 'fashion_photography_general_settings',
        'settings' => 'fashion_photography_preloader_dot_2_color' 
    )));

    $wp_customize->add_setting('fashion_photography_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'fashion_photography_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'fashion_photography_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'fashion-photography' ),
        'section'        => 'fashion_photography_general_settings',
        'settings'       => 'fashion_photography_sticky_header',
        'type'           => 'checkbox',
    )));
    
    // Social Link
    $wp_customize->add_section('fashion_photography_social_link',array(
        'title' => esc_html__('Social Links','fashion-photography'),
    ));

    $wp_customize->add_setting('fashion_photography_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_photography_facebook_url',array(
        'label' => esc_html__('Facebook Link','fashion-photography'),
        'section' => 'fashion_photography_social_link',
        'setting' => 'fashion_photography_facebook_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_photography_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_photography_twitter_url',array(
        'label' => esc_html__('Twitter Link','fashion-photography'),
        'section' => 'fashion_photography_social_link',
        'setting' => 'fashion_photography_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_photography_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_photography_intagram_url',array(
        'label' => esc_html__('Intagram Link','fashion-photography'),
        'section' => 'fashion_photography_social_link',
        'setting' => 'fashion_photography_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_photography_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_photography_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','fashion-photography'),
        'section' => 'fashion_photography_social_link',
        'setting' => 'fashion_photography_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('fashion_photography_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )); 
    $wp_customize->add_control('fashion_photography_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','fashion-photography'),
        'section' => 'fashion_photography_social_link',
        'setting' => 'fashion_photography_pintrest_url',
        'type'  => 'url'
    ));

    //Slider
    $wp_customize->add_section('fashion_photography_top_slider',array(
        'title' => esc_html__('Slider Option','fashion-photography')
    ));

    $args = array('numberposts' => -1); 
    $post_list = get_posts($args);
    $pst_sls[]= __('Select','fashion-photography');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }

    $wp_customize->add_setting('fashion_photography_post_section',array(
        'sanitize_callback' => 'fashion_photography_sanitize_choices',
    ));
    $wp_customize->add_control('fashion_photography_post_section',array(
        'type'    => 'select',
        'choices' => $pst_sls,
        'label' => __('Select Post','fashion-photography'),
        'description' => esc_html__('Here you have to select post in below dropdown. Image Dimension ( 580px x 580px )','fashion-photography'),
        'section' => 'fashion_photography_top_slider',
    ));

    wp_reset_postdata();

    $args = array('numberposts' => -1);
    $post_list = get_posts($args);
    $i = 0;
    $pst_sls[]= __('Select','fashion-photography');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting('fashion_photography_post_section_part'.$i,array(
            'sanitize_callback' => 'fashion_photography_sanitize_choices',
        ));
        $wp_customize->add_control('fashion_photography_post_section_part'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','fashion-photography'),
            'description' => esc_html__('Here you have to select post in below dropdown. Image Dimension ( 260px x 260px )','fashion-photography'),
            'section' => 'fashion_photography_top_slider',
        ));
    }
    wp_reset_postdata();

    // Footer
    $wp_customize->add_section('fashion_photography_site_footer_section', array(
        'title' => esc_html__('Footer', 'fashion-photography'),
    ));

    $wp_customize->add_setting('fashion_photography_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('fashion_photography_footer_text_setting', array(
        'label' => __('Replace the footer text', 'fashion-photography'),
        'section' => 'fashion_photography_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));
}
add_action('customize_register', 'fashion_photography_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fashion_photography_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fashion_photography_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fashion_photography_customize_preview_js(){
    wp_enqueue_script('fashion-photography-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'fashion_photography_customize_preview_js');