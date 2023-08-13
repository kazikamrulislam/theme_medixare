<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Heading_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Ad_Option_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_adoption_controls' ) );
	}

    public function register_adoption_controls( $wp_customize ) {
        /*header ad*/
        $wp_customize->add_setting('header_ad_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_ad_heading', array(
            'label' => __( 'Header Ad', 'medixare' ),
            'section' => 'ad_section',
        )));

        /*After Header ad*/
        $wp_customize->add_setting( 'before_head_ad_option',
            array(
                'default' => $this->defaults['before_head_ad_option'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'before_head_ad_option',
            array(
                'label' => __( 'Header Before Ad', 'medixare' ),
                'section' => 'ad_section',
            )
        ) );
        $wp_customize->add_setting( 'before_ad_type',
            array(
                'default' => $this->defaults['before_ad_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'before_ad_type',
            array(
                'label' => __( 'Ad Type', 'medixare' ),
                'section' => 'ad_section',
                'description' => esc_html__( 'This is ad type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'before_adimage' => esc_html__( 'Add Image', 'medixare' ),
                    'before_adcustom' => esc_html__( 'Custom Code', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'before_adimage',
            array(
                'default' => $this->defaults['before_adimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'before_adimage',
            array(
                'label' => __( 'Banner Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'ad_section',
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
                'active_callback' => 'amttheme_head_before_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'before_ad_img_link',
            array(
                'default' => $this->defaults['before_ad_img_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'before_ad_img_link',
            array(
                'label' => __( 'Image Link', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'url',
                'active_callback' => 'amttheme_head_before_ad_type_image_condition',
            )
        );
        $wp_customize->add_setting( 'before_ad_img_target',
            array(
                'default' => $this->defaults['before_ad_img_target'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'before_ad_img_target',
            array(
                'label' => __( 'Open Link in New Tab', 'medixare' ),
                'section' => 'ad_section',
                'active_callback' => 'amttheme_head_before_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'before_adcustom',
            array(
                'default' => $this->defaults['before_adcustom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'before_adcustom',
            array(
                'label' => __( 'Ad Custom Code', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'textarea',
                'active_callback' => 'amttheme_head_before_ad_type_custom_condition',
            )
        );
        // Separator
        $wp_customize->add_setting('separator_before_header', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_before_header', 
            array(
                'settings' => 'separator_before_header',
                'section'  => 'ad_section',
            )
        ));
        
        /*After Header ad*/
        $wp_customize->add_setting( 'head_ad_option',
            array(
                'default' => $this->defaults['head_ad_option'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'head_ad_option',
            array(
                'label' => __( 'Header After Ad', 'medixare' ),
                'section' => 'ad_section',
            )
        ) );

        $wp_customize->add_setting( 'ad_type',
            array(
                'default' => $this->defaults['ad_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'ad_type',
            array(
                'label' => __( 'Ad Type', 'medixare' ),
                'section' => 'ad_section',
                'description' => esc_html__( 'This is ad type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'adimage' => esc_html__( 'Add Image', 'medixare' ),
                    'adcustom' => esc_html__( 'Custom Code', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'adimage',
            array(
                'default' => $this->defaults['adimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'adimage',
            array(
                'label' => __( 'Banner Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'ad_section',
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
                'active_callback' => 'amttheme_head_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'ad_img_link',
            array(
                'default' => $this->defaults['ad_img_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'ad_img_link',
            array(
                'label' => __( 'Image Link', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'url',
                'active_callback' => 'amttheme_head_ad_type_image_condition',
            )
        );
        $wp_customize->add_setting( 'ad_img_target',
            array(
                'default' => $this->defaults['ad_img_target'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'ad_img_target',
            array(
                'label' => __( 'Open Link in New Tab', 'medixare' ),
                'section' => 'ad_section',
                'active_callback' => 'amttheme_head_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'adcustom',
            array(
                'default' => $this->defaults['adcustom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'adcustom',
            array(
                'label' => __( 'Ad Custom Code', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'textarea',
                'active_callback' => 'amttheme_head_ad_type_custom_condition',
            )
        );

        // Separator
        $wp_customize->add_setting('separator_before_post', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_before_post', 
            array(
                'settings' => 'separator_before_post',
                'section'  => 'ad_section',
            )
        ));

        /*Before Post Contents ad*/
        $wp_customize->add_setting('before_post_ad_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'before_post_ad_heading', array(
            'label' => __( 'Before Post Contents Ad', 'medixare' ),
            'section' => 'ad_section',
        )));

        $wp_customize->add_setting( 'before_post_ad_option',
            array(
                'default' => $this->defaults['before_post_ad_option'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'before_post_ad_option',
            array(
                'label' => __( 'Content Before Ad', 'medixare' ),
                'section' => 'ad_section',
            )
        ) );
        $wp_customize->add_setting( 'ad_before_post_type',
            array(
                'default' => $this->defaults['ad_before_post_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'ad_before_post_type',
            array(
                'label' => __( 'Ad Type', 'medixare' ),
                'section' => 'ad_section',
                'description' => esc_html__( 'This is ad type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'post_before_adimage' => esc_html__( 'Add Image', 'medixare' ),
                    'post_before_adcustom' => esc_html__( 'Custom Code', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'post_before_adimage',
            array(
                'default' => $this->defaults['post_before_adimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'post_before_adimage',
            array(
                'label' => __( 'Banner Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'ad_section',
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
                'active_callback' => 'amttheme_cbefore_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'post_before_ad_img_link',
            array(
                'default' => $this->defaults['post_before_ad_img_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'post_before_ad_img_link',
            array(
                'label' => __( 'Image Link', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'url',
                'active_callback' => 'amttheme_cbefore_ad_type_image_condition',
            )
        );
        $wp_customize->add_setting( 'post_before_ad_img_target',
            array(
                'default' => $this->defaults['post_before_ad_img_target'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_before_ad_img_target',
            array(
                'label' => __( 'Open Link in New Tab', 'medixare' ),
                'section' => 'ad_section',
                'active_callback' => 'amttheme_cbefore_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'post_before_adcustom',
            array(
                'default' => $this->defaults['post_before_adcustom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'post_before_adcustom',
            array(
                'label' => __( 'Ad Custom Code', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'textarea',
                'active_callback' => 'amttheme_cbefore_ad_type_custom_condition',
            )
        );

        // Separator
        $wp_customize->add_setting('separator_after_post', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_after_post', 
            array(
                'settings' => 'separator_after_post',
                'section'  => 'ad_section',
            )
        ));

        /*After Post Contents ad*/
        $wp_customize->add_setting('after_post_ad_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'after_post_ad_heading', array(
            'label' => __( 'After Post Contents Ad', 'medixare' ),
            'section' => 'ad_section',
        )));

        $wp_customize->add_setting( 'after_post_ad_option',
            array(
                'default' => $this->defaults['after_post_ad_option'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'after_post_ad_option',
            array(
                'label' => __( 'Content After Ad', 'medixare' ),
                'section' => 'ad_section',
            )
        ) );
        $wp_customize->add_setting( 'ad_after_post_type',
            array(
                'default' => $this->defaults['ad_after_post_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'ad_after_post_type',
            array(
                'label' => __( 'Ad Type', 'medixare' ),
                'section' => 'ad_section',
                'description' => esc_html__( 'This is ad type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'post_after_adimage' => esc_html__( 'Add Image', 'medixare' ),
                    'post_after_adcustom' => esc_html__( 'Custom Code', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'post_after_adimage',
            array(
                'default' => $this->defaults['post_after_adimage'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'post_after_adimage',
            array(
                'label' => __( 'Banner Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'ad_section',
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
                'active_callback' => 'amttheme_cafter_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'post_after_ad_img_link',
            array(
                'default' => $this->defaults['post_after_ad_img_link'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'post_after_ad_img_link',
            array(
                'label' => __( 'Image Link', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'url',
                'active_callback' => 'amttheme_cafter_ad_type_image_condition',
            )
        );
        $wp_customize->add_setting( 'post_after_ad_img_target',
            array(
                'default' => $this->defaults['post_after_ad_img_target'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_after_ad_img_target',
            array(
                'label' => __( 'Open Link in New Tab', 'medixare' ),
                'section' => 'ad_section',
                'active_callback' => 'amttheme_cafter_ad_type_image_condition',
            )
        ) );
        $wp_customize->add_setting( 'post_after_adcustom',
            array(
                'default' => $this->defaults['post_after_adcustom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_textarea_sanitization',
            )
        );
        $wp_customize->add_control( 'post_after_adcustom',
            array(
                'label' => __( 'Ad Custom Code', 'medixare' ),
                'section' => 'ad_section',
                'type' => 'textarea',
                'active_callback' => 'amttheme_cafter_ad_type_custom_condition',
            )
        );
        
    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Ad_Option_Settings();
}
