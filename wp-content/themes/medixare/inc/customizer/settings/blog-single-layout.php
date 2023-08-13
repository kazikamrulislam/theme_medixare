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
class MedixareTheme_Blog_Single_Layout_Settings extends MedixareTheme_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_layout_controls' ) );
	}

    public function register_blog_single_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'single_post_layout',
            array(
                'default' => $this->defaults['single_post_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'single_post_layout',
            array(
                'label' => __( 'Layout', 'medixare' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'medixare' ),
                'section' => 'post_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => __( 'Left Sidebar', 'medixare' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => __( 'Full Width', 'medixare' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => __( 'Right Sidebar', 'medixare' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'post_single_layout_section',
        )));
		
		// Content padding top
        $wp_customize->add_setting( 'single_post_padding_top',
            array(
                'default' => $this->defaults['single_post_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'medixare' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'single_post_padding_bottom',
            array(
                'default' => $this->defaults['single_post_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'medixare' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'single_post_banner',
            array(
                'default' => $this->defaults['single_post_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_banner',
            array(
                'label' => __( 'Banner', 'medixare' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'single_post_breadcrumb',
            array(
                'default' => $this->defaults['single_post_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'medixare' ),
                'section' => 'post_single_layout_section',
            )
        ) );
		
        // Banner BG Type 
        $wp_customize->add_setting( 'single_post_bgtype',
            array(
                'default' => $this->defaults['single_post_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'single_post_bgtype',
            array(
                'label' => __( 'Banner Background Type', 'medixare' ),
                'section' => 'post_single_layout_section',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'single_post_bgimg' => esc_html__( 'BG Image', 'medixare' ),
                    'single_post_bgcolor' => esc_html__( 'BG Color', 'medixare' ),
                ),
            )
        );

        $wp_customize->add_setting( 'single_post_bgimg',
            array(
                'default' => $this->defaults['single_post_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'post_single_layout_section',
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
                'active_callback' => 'amttheme_single_post_banner_bgimg_type_condition',
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('single_post_bgcolor', 
            array(
                'default' => $this->defaults['single_post_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'medixare'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'post_single_layout_section', 
                'active_callback' => 'amttheme_singl_post_banner_bgcolor_type_condition',
            )
        ));
		
		// Page background image
		$wp_customize->add_setting( 'single_post_page_bgimg',
            array(
                'default' => $this->defaults['single_post_page_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_page_bgimg',
            array(
                'label' => __( 'Page / Post Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'post_single_layout_section',
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
		
		$wp_customize->add_setting('single_post_page_bgcolor', 
            array(
                'default' => $this->defaults['single_post_page_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_page_bgcolor',
            array(
                'label' => esc_html__('Page / Post Background Color', 'medixare'),
                'settings' => 'single_post_page_bgcolor', 
                'section' => 'post_single_layout_section', 
            )
        ));
        

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Blog_Single_Layout_Settings();
}
