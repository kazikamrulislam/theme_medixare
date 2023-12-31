<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_error_Layout_Settings extends MedixareTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_error_layout_controls' ) );
	}

    public function register_error_layout_controls( $wp_customize ) {
		
		// Content padding top
        $wp_customize->add_setting( 'error_padding_top',
            array(
                'default' => $this->defaults['error_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'error_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'medixare' ),
                'section' => 'error_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'error_padding_bottom',
            array(
                'default' => $this->defaults['error_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'error_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'medixare' ),
                'section' => 'error_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'error_banner',
            array(
                'default' => $this->defaults['error_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'error_banner',
            array(
                'label' => __( 'Banner', 'medixare' ),
                'section' => 'error_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'error_breadcrumb',
            array(
                'default' => $this->defaults['error_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'error_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'medixare' ),
                'section' => 'error_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'error_bgtype',
            array(
                'default' => $this->defaults['error_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'error_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'medixare' ),
                'section' => 'error_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'error_bgimg' => esc_html__( 'BG Image', 'medixare' ),
                    'error_bgcolor' => esc_html__( 'BG Color', 'medixare' ),
                ),
            )
        );

        $wp_customize->add_setting( 'error_bgimg',
            array(
                'default' => $this->defaults['error_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'error_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'medixare' ),
                    'change' => __( 'Change File', 'medixare' ),
                    'default' => __( 'Default', 'medixare' ),
                    'remove' => __( 'Remove', 'medixare' ),
                    'placeholder' => __( 'No file selected', 'medixare' ),
                    'frame_title' => __( 'Select File', 'medixare' ),
                    'frame_button' => __( 'Choose File', 'medixare' ),
                ),
                'active_callback' => 'amttheme_search_banner_bgimg_type_condition',
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('error_bgcolor', 
            array(
                'default' => $this->defaults['error_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'medixare'),
                'settings' => 'error_bgcolor', 
                'priority' => 10, 
                'section' => 'error_layout_section', 
                'active_callback' => 'amttheme_search_banner_bgimg_type_condition',
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'error_page_bgimg',
            array(
                'default' => $this->defaults['error_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'error_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'medixare' ),
                    'change' => __( 'Change File', 'medixare' ),
                    'default' => __( 'Default', 'medixare' ),
                    'remove' => __( 'Remove', 'medixare' ),
                    'placeholder' => __( 'No file selected', 'medixare' ),
                    'frame_title' => __( 'Select File', 'medixare' ),
                    'frame_button' => __( 'Choose File', 'medixare' ),
                ),
            )
        ) );
		
		$wp_customize->add_setting('error_page_bgcolor', 
            array(
                'default' => $this->defaults['error_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'medixare'),
                'settings' => 'error_page_bgcolor', 
                'section' => 'error_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_error_Layout_Settings();
}
