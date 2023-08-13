<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Heading_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Service_Post_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_service_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_service_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'service_archive_style',
            array(
                'default' => $this->defaults['service_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'service_archive_style',
            array(
                'label' => __( 'Service Archive Layout', 'medixare' ),
                'description' => esc_html__( 'Select the gallery layout for gallery page', 'medixare' ),
                'section' => 'amttheme_service_settings',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                )
            )
        ) );

        // Gallery option
        $wp_customize->add_setting( 'service_arexcerpt_limit',
            array(
                'default' => $this->defaults['service_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'service_arexcerpt_limit',
            array(
                'label' => __( 'Service Archive Excerpt Limit', 'medixare' ),
                'section' => 'amttheme_service_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'service_icon_display',
            array(
                'default' => $this->defaults['service_icon_display'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'service_icon_display',
            array(
                'label' => __( 'Show Icon', 'medixare' ),
                'section' => 'amttheme_service_settings',
            )
        ));

		$wp_customize->add_setting( 'service_ar_excerpt',
            array(
                'default' => $this->defaults['service_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'service_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'medixare' ),
                'section' => 'amttheme_service_settings',
            )
        ));
		$wp_customize->add_setting( 'service_ar_button',
            array(
                'default' => $this->defaults['service_ar_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'service_ar_button',
            array(
                'label' => __( 'Show Button', 'medixare' ),
                'section' => 'amttheme_service_settings',
            )
        ));
		
		
		// Related Gallery Post
		// $wp_customize->add_setting('service_related_heading', array(
        //     'default' => '',
        //     'sanitize_callback' => 'esc_html',
        // ));
        // $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'service_related_heading', array(
        //     'label' => __( 'Related Service Settings', 'medixare' ),
        //     'section' => 'amttheme_service_settings',
        // )));
		
		// $wp_customize->add_setting( 'show_related_service',
        //     array(
        //         'default' => $this->defaults['show_related_service'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'amttheme_switch_sanitization',
        //     )
        // );
        // $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_service',
        //     array(
        //         'label' => __( 'Show Related Service', 'medixare' ),
        //         'section' => 'amttheme_service_settings',
        //     )
        // ));
		
		$wp_customize->add_setting( 'service_related_title',
            array(
                'default' => $this->defaults['service_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'service_related_title',
            array(
                'label' => __( 'Related Title', 'medixare' ),
                'section' => 'amttheme_service_settings',
                'type' => 'text',
				'active_callback'   => 'amttheme_is_related_service_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_service_number',
            array(
                'default' => $this->defaults['related_service_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_service_number',
            array(
                'label' => __( 'Service Post', 'medixare' ),
                'section' => 'amttheme_service_settings',
                'type' => 'number',
				'active_callback'   => 'amttheme_is_related_service_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_service_title_limit',
            array(
                'default' => $this->defaults['related_service_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_service_title_limit',
            array(
                'label' => __( 'Title Limit', 'medixare' ),
                'section' => 'amttheme_service_settings',
                'type' => 'number',
				'active_callback'   => 'amttheme_is_related_service_enabled',
            )
        );
        // $wp_customize->add_setting( 'service_slug',
        //     array(
        //         'default' => $this->defaults['service_slug'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'amttheme_text_sanitization'
        //     )
        // );
        // $wp_customize->add_control( 'service_slug',
        //     array(
        //         'label' => __( 'Service Slug', 'medixare' ),
        //         'section' => 'amttheme_service_settings',
        //         'type' => 'text',
        //     )
        // );
        // $wp_customize->add_setting( 'service_cat_slug',
        //     array(
        //         'default' => $this->defaults['service_cat_slug'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'amttheme_text_sanitization'
        //     )
        // );
        // $wp_customize->add_control( 'service_cat_slug',
        //     array(
        //         'label' => __( 'Service Category Slug', 'medixare' ),
        //         'section' => 'amttheme_service_settings',
        //         'type' => 'text',
        //     )
        // );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Service_Post_Settings();
}
