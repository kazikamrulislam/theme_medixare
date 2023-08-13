<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Footer_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Footer_Settings extends MedixareTheme_Customizer {

    public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
    }

    public function register_footer_controls( $wp_customize ) {

        // Footer One Widget        
        $wp_customize->add_setting( 'f1_widget_area',
            array(
                'default' => $this->defaults['f1_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'medixare' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f1_wc1',
            array(
                'default' => $this->defaults['f1_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc2',
            array(
                'default' => $this->defaults['f1_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc3',
            array(
                'default' => $this->defaults['f1_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f1_wc4',
            array(
                'default' => $this->defaults['f1_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f1_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_1',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

        // Footer Two Widget        
        $wp_customize->add_setting( 'f2_widget_area',
            array(
                'default' => $this->defaults['f2_widget_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_widget_area',
            array(
                'label' => __( 'Select Total Widget Area', 'medixare' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'f2_wc1',
            array(
                'default' => $this->defaults['f2_wc1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc1',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc2',
            array(
                'default' => $this->defaults['f2_wc2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc2',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc3',
            array(
                'default' => $this->defaults['f2_wc3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc3',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );
        $wp_customize->add_setting( 'f2_wc4',
            array(
                'default' => $this->defaults['f2_wc4'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'f2_wc4',
            array(
                'label' => __( 'Widget Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'footer_layout_2',
                'type' => 'select',
                'choices' => array(
                    '1' => esc_html__( '1', 'medixare' ),
                    '2' => esc_html__( '2', 'medixare' ),
                    '3' => esc_html__( '3', 'medixare' ),
                    '4' => esc_html__( '4', 'medixare' ),
                    '5' => esc_html__( '5', 'medixare' ),
                    '6' => esc_html__( '6', 'medixare' ),
                    '7' => esc_html__( '7', 'medixare' ),
                    '8' => esc_html__( '8', 'medixare' ),
                    '9' => esc_html__( '9', 'medixare' ),
                    '10' => esc_html__( '10', 'medixare' ),
                    '11' => esc_html__( '11', 'medixare' ),
                    '12' => esc_html__( '12', 'medixare' ),
                ),
                'description' => 'Total Columns 12',
            )
        );

        /*** Footer All ***/ 

        // Footer Style
        $wp_customize->add_setting( 'footer_style',
            array(
                'default' => $this->defaults['footer_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'footer_style',
            array(
                'label' => __( 'Select Footer Default Layout', 'medixare' ),
                'description' => esc_html__( 'You can set default footer form here.', 'medixare' ),
                'section' => 'footer_layout_all',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-1.png',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/footer-2.png',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                )
            )
        ) );

        // Copyright On/Off
        $wp_customize->add_setting( 'copyright_area',
            array(
                'default' => $this->defaults['copyright_area'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'copyright_area',
            array(
                'label' => esc_html__( 'Footer Copyright', 'medixare' ),
                'section' => 'footer_layout_all',
            )
        ) );

        // Copyright Text
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => esc_html__( 'Copyright Text', 'medixare' ),
                'section' => 'footer_layout_all',
                'type' => 'textarea',
                'active_callback' => 'amttheme_is_footer_copyright_enabled',
            )
        );

        // Copyright Background Color
        $wp_customize->add_setting('copyright_bg_color', 
            array(
                'default' => $this->defaults['copyright_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_bg_color',
            array(
                'label' => esc_html__('Copyright Background Color', 'medixare'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'amttheme_is_footer_copyright_enabled',
            )
        ));

        // Copyright Text Color
        $wp_customize->add_setting('copyright_text_color', 
            array(
                'default' => $this->defaults['copyright_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_text_color',
            array(
                'label' => esc_html__('Copyright Text Color', 'medixare'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'amttheme_is_footer_copyright_enabled',
            )
        ));

        // Copyright Link Color
        $wp_customize->add_setting('copyright_link_color', 
            array(
                'default' => $this->defaults['copyright_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_color',
            array(
                'label' => esc_html__('Copyright Link Color', 'medixare'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'amttheme_is_footer_copyright_enabled',
            )
        )); 

        // Copyright Link Hover Color
        $wp_customize->add_setting('copyright_link_hover_color', 
            array(
                'default' => $this->defaults['copyright_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'copyright_link_hover_color',
            array(
                'label' => esc_html__('Copyright Link Hover Color', 'medixare'),
                'section' => 'footer_layout_all', 
                'active_callback' => 'amttheme_is_footer_copyright_enabled',
            )
        )); 
        
        /*** Footer One ***/

        // Footer One Title Color 
        $wp_customize->add_setting('footer1_title_color', 
            array(
                'default' => $this->defaults['footer1_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        ));  

        // Footer One Title Shape Color 
        $wp_customize->add_setting('footer1_title_shape_color', 
            array(
                'default' => $this->defaults['footer1_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer One Text Color  
        $wp_customize->add_setting('footer1_text_color', 
            array(
                'default' => $this->defaults['footer1_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer One Link Color        
        $wp_customize->add_setting('footer1_link_color', 
            array(
                'default' => $this->defaults['footer1_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        ));  

        // Footer One Link Hover Color       
        $wp_customize->add_setting('footer1_link_hover_color', 
            array(
                'default' => $this->defaults['footer1_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer One Link Hover Background Color       
        $wp_customize->add_setting('footer1_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer1_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'medixare'),
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer One Background Type
        $wp_customize->add_setting( 'footer1_bg_type',
            array(
                'default' => $this->defaults['footer1_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer1_bg_type',
            array(
                'label' => __( 'Background Type', 'medixare' ),
                'section' => 'footer_layout_1',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'footer1_bg_color' => esc_html__( 'BG Color', 'medixare' ),
                    'footer1_bg_img' => esc_html__( 'BG Image', 'medixare' ),
                ),
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        );

        // Footer One Background Color
        $wp_customize->add_setting('footer1_bg_color', 
            array(
                'default' => $this->defaults['footer1_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer1_bg_color',
            array(
                'label' => esc_html__('Background Color', 'medixare'),
                'settings' => 'footer1_bg_color', 
                'section' => 'footer_layout_1', 
                'active_callback' => 'amttheme_footer1_bgcolor_type_condition',
            )
        ));

        // Footer One Background Image
        $wp_customize->add_setting( 'footer1_bg_img',
            array(
                'default' => $this->defaults['footer1_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer1_bg_img',
            array(
                'label' => __( 'Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'footer_layout_1',
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
                'active_callback' => 'amttheme_footer1_bgimg_type_condition',
            )
        ) );  
        $wp_customize->add_setting( 'footer1_overlay_opacity',
            array(
                'default' => $this->defaults['footer1_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer1_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'medixare' ),
                'section' => 'footer_layout_1',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'medixare' ),
                'type' => 'number',
                'active_callback' => 'amttheme_footer1_bgimg_type_condition',
            )
        );

        /*** Footer Two ***/

        // Footer Two Title Color 
        $wp_customize->add_setting('footer2_title_color', 
            array(
                'default' => $this->defaults['footer2_title_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_title_color',
            array(
                'label' => esc_html__('Footer Title Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Title Shape Color 
        $wp_customize->add_setting('footer2_title_shape_color', 
            array(
                'default' => $this->defaults['footer2_title_shape_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_title_shape_color',
            array(
                'label' => esc_html__('Footer Title Shape Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        ));  

        // Footer Two Text Color  
        $wp_customize->add_setting('footer2_text_color', 
            array(
                'default' => $this->defaults['footer2_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_text_color',
            array(
                'label' => esc_html__('Footer Text Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Link Color        
        $wp_customize->add_setting('footer2_link_color', 
            array(
                'default' => $this->defaults['footer2_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_color',
            array(
                'label' => esc_html__('Footer Link Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        ));  

        // Footer Two Link Hover Color       
        $wp_customize->add_setting('footer2_link_hover_color', 
            array(
                'default' => $this->defaults['footer2_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_hover_color',
            array(
                'label' => esc_html__('Footer Link Hover Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 
        // Footer One Link Hover Background Color       
        $wp_customize->add_setting('footer2_link_hover_bg_color', 
            array(
                'default' => $this->defaults['footer2_link_hover_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_link_hover_bg_color',
            array(
                'label' => esc_html__('Footer Link Hover Background Color', 'medixare'),
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        )); 

        // Footer Two Background Type
        $wp_customize->add_setting( 'footer2_bg_type',
            array(
                'default' => $this->defaults['footer2_bg_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'footer2_bg_type',
            array(
                'label' => __( 'Background Type', 'medixare' ),
                'section' => 'footer_layout_2',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'footer2_bg_color' => esc_html__( 'BG Color', 'medixare' ),
                    'footer2_bg_img' => esc_html__( 'BG Image', 'medixare' ),
                ),
                'active_callback' => 'amttheme_is_footer_enabled',
            )
        );

        // Footer Two Background Color
        $wp_customize->add_setting('footer2_bg_color', 
            array(
                'default' => $this->defaults['footer2_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer2_bg_color',
            array(
                'label' => esc_html__('Background Color', 'medixare'),
                'settings' => 'footer2_bg_color', 
                'section' => 'footer_layout_2', 
                'active_callback' => 'amttheme_footer2_bgcolor_type_condition',
            )
        ));

        // Footer Two Background Image
        $wp_customize->add_setting( 'footer2_bg_img',
            array(
                'default' => $this->defaults['footer2_bg_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer2_bg_img',
            array(
                'label' => __( 'Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'footer_layout_2',
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
                'active_callback' => 'amttheme_footer2_bgimg_type_condition',
            )
        ) ); 
        $wp_customize->add_setting( 'footer2_overlay_opacity',
            array(
                'default' => $this->defaults['footer2_overlay_opacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'footer2_overlay_opacity',
            array(
                'label' => __( 'Overlay Opacity', 'medixare' ),
                'section' => 'footer_layout_2',
                'description' => esc_html__( 'Default Overlay Opacity 0 ( Input Opacity 0 to 1 Example: 0.75 )', 'medixare' ),
                'type' => 'number',
                'active_callback' => 'amttheme_footer2_bgimg_type_condition',
            )
        );     
    }
}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
    new MedixareTheme_Footer_Settings();
}
