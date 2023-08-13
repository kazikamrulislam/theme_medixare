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
class MedixareTheme_WooCommerce_Shop_Layout_Settings extends MedixareTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_shop_archive_layout_controls' ) );
	}

    public function register_shop_archive_layout_controls( $wp_customize ) {

        	
		// Content padding top
        $wp_customize->add_setting( 'shop_padding_top',
            array(
                'default' => $this->defaults['shop_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'shop_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'medixare' ),
                'section' => 'wc_shop_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'shop_padding_bottom',
            array(
                'default' => $this->defaults['shop_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'shop_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'medixare' ),
                'section' => 'wc_shop_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'shop_banner',
            array(
                'default' => $this->defaults['shop_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'shop_banner',
            array(
                'label' => __( 'Banner', 'medixare' ),
                'section' => 'wc_shop_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'shop_breadcrumb',
            array(
                'default' => $this->defaults['shop_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'shop_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'medixare' ),
                'section' => 'wc_shop_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'shop_bgtype',
            array(
                'default' => $this->defaults['shop_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'shop_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'medixare' ),
                'section' => 'wc_shop_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'bgimg' => esc_html__( 'BG Image', 'medixare' ),
                    'bgcolor' => esc_html__( 'BG Color', 'medixare' ),
                ),
            )
        );

        $wp_customize->add_setting( 'shop_bgimg',
            array(
                'default' => $this->defaults['shop_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'wc_shop_layout_section',
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

        // Banner background color
        $wp_customize->add_setting('shop_bgcolor', 
            array(
                'default' => $this->defaults['shop_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shop_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'medixare'),
                'settings' => 'shop_bgcolor', 
                'priority' => 10, 
                'section' => 'wc_shop_layout_section', 
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'shop_page_bgimg',
            array(
                'default' => $this->defaults['shop_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'shop_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'wc_shop_layout_section',
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
		
		$wp_customize->add_setting('shop_page_bgcolor', 
            array(
                'default' => $this->defaults['shop_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shop_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'medixare'),
                'settings' => 'shop_page_bgcolor', 
                'section' => 'wc_shop_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_WooCommerce_Shop_Layout_Settings();
}
