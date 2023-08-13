<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Separator_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Color_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_color_controls' ) );
	}

    public function register_color_controls( $wp_customize ) {	
	
		// Main Color
		$wp_customize->add_setting('primary_color', 
            array(
                'default' => $this->defaults['primary_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color',
            array(
                'label' => esc_html__('Primary Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('secondary_color', 
            array(
                'default' => $this->defaults['secondary_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color',
            array(
                'label' => esc_html__('Secondary Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));		
				
		$wp_customize->add_setting('body_color', 
            array(
                'default' => $this->defaults['body_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_color',
            array(
                'label' => esc_html__('Body Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		// Separator
        $wp_customize->add_setting('separator_color', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_color', 
			array(
				'settings' => 'separator_color',
				'section'  => 'color_section',
			)
		));
		
		// Menu Color
		$wp_customize->add_setting('menu_dark_color', 
            array(
                'default' => $this->defaults['menu_dark_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_dark_color',
            array(
                'label' => esc_html__('Menu Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_hover_color', 
            array(
                'default' => $this->defaults['menu_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color',
            array(
                'label' => esc_html__('Menu Hover Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('menu_light_color', 
            array(
                'default' => $this->defaults['menu_light_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_light_color',
            array(
                'label' => esc_html__('Transparent Menu Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		// Separator
        $wp_customize->add_setting('separator_sub_color', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_sub_color', 
			array(
				'settings' => 'separator_sub_color',
				'section'  => 'color_section',
			)
		));
		
		// Sub menu color		
		$wp_customize->add_setting('submenu_color', 
            array(
                'default' => $this->defaults['submenu_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_color',
            array(
                'label' => esc_html__('Submenu Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_hover_color', 
            array(
                'default' => $this->defaults['submenu_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_color',
            array(
                'label' => esc_html__('Submenu Hover Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_bgcolor', 
            array(
                'default' => $this->defaults['submenu_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_bgcolor',
            array(
                'label' => esc_html__('Submenu Background Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
		
		$wp_customize->add_setting('submenu_hover_bgcolor', 
            array(
                'default' => $this->defaults['submenu_hover_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'submenu_hover_bgcolor',
            array(
                'label' => esc_html__('Submenu Hover Background Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));

        // Dark Mode Separator
        $wp_customize->add_setting('separator_color_mode', array(
            'default'           => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_color_mode', 
            array(
                'settings' => 'separator_color_mode',
                'section'  => 'color_section',
            )
        ));

        $wp_customize->add_setting( 'color_mode',
            array(
                'default' => $this->defaults['color_mode'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'color_mode',
            array(
                'label' => __( 'Color Mode', 'medixare' ),
                'section' => 'color_section',
            )
        ) );

        $wp_customize->add_setting( 'code_mode_type',
            array(
                'default' => $this->defaults['code_mode_type'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( 'code_mode_type',
            array(
                'label' => esc_html__( 'Select Color Mode', 'medixare' ),
                'section' => 'color_section',
                'description' => esc_html__( 'This is work if you disable "Color Mode Switch"', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'light-mode' => esc_html__( 'Light Mode', 'medixare' ),
                    'dark-mode' => esc_html__( 'Dark Mode', 'medixare' ),
                ),
            )
        );

        $wp_customize->add_setting('dark_mode_bgcolor', 
            array(
                'default' => $this->defaults['dark_mode_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_bgcolor',
            array(
                'label' => esc_html__('Dark Mode Background Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_light_bgcolor', 
            array(
                'default' => $this->defaults['dark_mode_light_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color', 
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_light_bgcolor',
            array(
                'label' => esc_html__('Dark Mode Light Background Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_color', 
            array(
                'default' => $this->defaults['dark_mode_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_color',
            array(
                'label' => esc_html__('Dark Mode Text Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));
        $wp_customize->add_setting('dark_mode_border_color', 
            array(
                'default' => $this->defaults['dark_mode_border_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dark_mode_border_color',
            array(
                'label' => esc_html__('Dark Mode Border Color', 'medixare'),
                'section' => 'color_section', 
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Color_Settings();
}
