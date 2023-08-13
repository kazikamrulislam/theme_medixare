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
class MedixareTheme_General_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        /**
         * Heading
         */
        $wp_customize->add_setting('logo_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'logo_heading', array(
            'label' => __( 'Site Logo', 'medixare' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'logo',
            array(
                'default' => $this->defaults['logo'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo',
            array(
                'label' => __( 'Logo Dark', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'medixare' ),
                    'change' => __( 'Change File', 'medixare' ),
                    'default' => __( 'Default', 'medixare' ),
                    'remove' => __( 'Remove', 'medixare' ),
                    'placeholder' => __( 'No file selected', 'medixare' ),
                    'frame_title' => __( 'Select File', 'medixare' ),
                    'frame_button' => __( 'Choose File', 'medixare' ),
                )
            )
        ) );

        $wp_customize->add_setting( 'logo_light',
            array(
                'default' => $this->defaults['logo_light'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo_light',
            array(
                'label' => __( 'Logo Light', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'medixare' ),
                    'change' => __( 'Change File', 'medixare' ),
                    'default' => __( 'Default', 'medixare' ),
                    'remove' => __( 'Remove', 'medixare' ),
                    'placeholder' => __( 'No file selected', 'medixare' ),
                    'frame_title' => __( 'Select File', 'medixare' ),
                    'frame_button' => __( 'Choose File', 'medixare' ),
                )
            )
        ) );

        $wp_customize->add_setting( 'logo_width',
            array(
                'default' => $this->defaults['logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'logo_width',
            array(
                'label' => __( 'Logo Width', 'medixare' ),
                'section' => 'general_section',
                'description' => esc_html__( 'Default logo size 224x40px ( Input logo size only number widthout px )', 'medixare' ),
                'type' => 'number',
            )
        );

        $wp_customize->add_setting( 'mobile_logo_width',
            array(
                'default' => $this->defaults['mobile_logo_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'mobile_logo_width',
            array(
                'label' => __( 'Mobile Logo Width', 'medixare' ),
                'section' => 'general_section',
                'description' => esc_html__( 'Default logo size 110x20px ( Input logo size only number widthout px )', 'medixare' ),
                'type' => 'number',
            )
        );

        /**
         * Heading
         */
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => __( 'Site Switch Control', 'medixare' ),
            'section' => 'general_section',
        )));        

        $wp_customize->add_setting( 'image_blend',
            array(
                'default' => $this->defaults['image_blend'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'image_blend',
            array(
                'label' => __( 'Image Blend', 'medixare' ),
                'section' => 'general_section',
                'type' => 'select',
                'choices' => array(
                    'normal' => esc_html__( 'Normal Mode', 'medixare' ),
                    'blend' => esc_html__( 'Blend Mode', 'medixare' ),
                ),
            )
        );
		
		$wp_customize->add_setting( 'container_width',
            array(
                'default' => $this->defaults['container_width'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'container_width',
            array(
                'label' => __( 'Container Width( Bootstrap Grid )', 'medixare' ),
                'section' => 'general_section',
                'type' => 'select',
                'choices' => array(
                    '1320' => esc_html__( '1320px', 'medixare' ),
					'1240' => esc_html__( '1240px', 'medixare' ),
					'1200' => esc_html__( '1200px', 'medixare' ),
					'1140' => esc_html__( '1140px', 'medixare' ),
                ),
            )
        );
		
		// Display No Preview Image
        $wp_customize->add_setting( 'display_no_preview_image',
            array(
                'default' => $this->defaults['display_no_preview_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'display_no_preview_image',
            array(
                'label' => __( 'Display No Preview Image on Blog', 'medixare' ),
                'section' => 'general_section',
            )
        ) );
		
		// Switch for back to top button
        $wp_customize->add_setting( 'back_to_top',
            array(
                'default' => $this->defaults['back_to_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'back_to_top',
            array(
                'label' => __( 'Back to Top Arrow', 'medixare' ),
                'section' => 'general_section',
            )
        ) );

        // Add our Preloader
        $wp_customize->add_setting('preloader',
			array(
			 'default'           => $this->defaults['preloader'],
			 'transport'         => 'refresh',
			 'sanitize_callback' => 'amttheme_switch_sanitization',
			)
        );
        $wp_customize->add_control(new Customizer_Switch_Control($wp_customize, 'preloader',
            array(
                'label'   => esc_html__('Preloader', 'medixare'),
                'section' => 'general_section',
            )
        ));
        $wp_customize->add_setting('preloader_image',
			array(
			  'default'           => $this->defaults['preloader_image'],
			  'transport'         => 'refresh',
			  'sanitize_callback' => 'absint',
			  'active_callback'   => 'amttheme_is_preloader_enabled',
			)
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'preloader_image',
			array(
				'label'         => esc_html__('Preloader Image', 'medixare'),
				'description'   => esc_html__('This is the description for the Media Control', 'medixare'),
				'section'       => 'general_section',
				'active_callback'   => 'amttheme_is_preloader_enabled',
				'mime_type'     => 'image',
				'button_labels' => array(
					'select'       => esc_html__('Select File', 'medixare'),
					'change'       => esc_html__('Change File', 'medixare'),
					'default'      => esc_html__('Default', 'medixare'),
					'remove'       => esc_html__('Remove', 'medixare'),
					'placeholder'  => esc_html__('No file selected', 'medixare'),
					'frame_title'  => esc_html__('Select File', 'medixare'),
					'frame_button' => esc_html__('Choose File', 'medixare'),
				)
			)
        ));
        $wp_customize->add_setting('preloader_bg_color',
			array(
				'default'           => $this->defaults['preloader_bg_color'],
				'transport'         => 'postMessage',
				'sanitize_callback' => 'amttheme_hex_rgba_sanitization',
				'active_callback'   => 'amttheme_is_preloader_enabled',
			)
        );
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'preloader_bg_color',
			array(
				'label'   => esc_html__('Preloader Background color', 'medixare'),
				'section' => 'general_section',
				'active_callback'   => 'amttheme_is_preloader_enabled',
			)
		));	
		
        /**
         * Heading
         */
        $wp_customize->add_setting('social_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'social_heading', array(
            'label' => __( 'Contact And Social', 'medixare' ),
            'section' => 'general_section',
        )));
		
		// Contact
        $wp_customize->add_setting( 'phone_label',
            array(
                'default' => $this->defaults['phone_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'phone_label',
            array(
                'label' => __( 'Phone Label', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		$wp_customize->add_setting( 'phone',
            array(
                'default' => $this->defaults['phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'phone',
            array(
                'label' => __( 'Phone', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'email',
            array(
                'default' => $this->defaults['email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'email',
            array(
                'label' => __( 'Email', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        $wp_customize->add_setting( 'address_label',
            array(
                'default' => $this->defaults['address_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'address_label',
            array(
                'label' => __( 'Address Label', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		
		$wp_customize->add_setting( 'address',
            array(
                'default' => $this->defaults['address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'address',
            array(
                'label' => __( 'Address', 'medixare' ),
                'section' => 'general_section',
                'type' => 'textarea',
            )
        );
		$wp_customize->add_setting( 'sidetext_label',
            array(
                'default' => $this->defaults['sidetext_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'sidetext_label',
            array(
                'label' => __( 'Offcanvus Sidebar Text Label', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
		$wp_customize->add_setting( 'sidetext',
            array(
                'default' => $this->defaults['sidetext'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'sidetext',
            array(
                'label' => __( 'Offcanvus Sidebar Text', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        // Social link
		$wp_customize->add_setting( 'social_label',
            array(
                'default' => $this->defaults['social_label'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_label',
            array(
                'label' => __( 'Social Label', 'medixare' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'social_facebook',
            array(
                'default' => $this->defaults['social_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_facebook',
            array(
                'label' => __( 'Facebook', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_twitter',
            array(
                'default' => $this->defaults['social_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_twitter',
            array(
                'label' => __( 'Twitter', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_linkedin',
            array(
                'default' => $this->defaults['social_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_linkedin',
            array(
                'label' => __( 'Linkedin', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_behance',
            array(
                'default' => $this->defaults['social_behance'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_behance',
            array(
                'label' => __( 'Behance', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_dribbble',
            array(
                'default' => $this->defaults['social_dribbble'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_dribbble',
            array(
                'label' => __( 'Dribbble', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
        $wp_customize->add_setting( 'social_youtube',
            array(
                'default' => $this->defaults['social_youtube'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_youtube',
            array(
                'label' => __( 'Youtube', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_pinterest',
            array(
                'default' => $this->defaults['social_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_pinterest',
            array(
                'label' => __( 'Pinterest', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_instagram',
            array(
                'default' => $this->defaults['social_instagram'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_instagram',
            array(
                'label' => __( 'Instagram', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_skype',
            array(
                'default' => $this->defaults['social_skype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_skype',
            array(
                'label' => __( 'Skype', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_rss',
            array(
                'default' => $this->defaults['social_rss'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_rss',
            array(
                'label' => __( 'RSS', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );
		
		$wp_customize->add_setting( 'social_snapchat',
            array(
                'default' => $this->defaults['social_snapchat'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_url_sanitization',
            )
        );
        $wp_customize->add_control( 'social_snapchat',
            array(
                'label' => __( 'Snapchat', 'medixare' ),
                'section' => 'general_section',
                'type' => 'url',
            )
        );

        // Offcanvas
        $wp_customize->add_setting( 'offcanvas_bgtype',
            array(
                'default' => $this->defaults['offcanvas_bgtype'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'offcanvas_bgtype',
            array(
                'label' => __( 'Background Type', 'medixare' ),
                'section' => 'general_section',
                'description' => esc_html__( 'This is banner background type.', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'offcanvas_color' => esc_html__( 'BG Color', 'medixare' ),
                    'offcanvas_img' => esc_html__( 'BG Image', 'medixare' ),
                ),
            )
        );
        
        $wp_customize->add_setting('offcanvas_color', 
            array(
                'default' => $this->defaults['offcanvas_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'offcanvas_color',
            array(
                'label' => esc_html__('Background Color', 'medixare'),
                'settings' => 'offcanvas_color', 
                'section' => 'general_section', 
                'active_callback' => 'amttheme_offcanvas1_bgcolor_type_condition',
            )
        )); 

        $wp_customize->add_setting( 'offcanvas_img',
            array(
                'default' => $this->defaults['offcanvas_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'offcanvas_img',
            array(
                'label' => __( 'Background Image', 'medixare' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'medixare' ),
                'section' => 'general_section',
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
                'active_callback' => 'amttheme_offcanvas1_bgimg_type_condition',
            )
        ) );
    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_General_Settings();
}
