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
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_News_Ticker_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_news_ticker_controls' ) );
	}

    public function register_news_ticker_controls( $wp_customize ) {
	
		// Ticker enable	
		 $wp_customize->add_setting( 'ticker_enable',
            array(
                'default' => $this->defaults['ticker_enable'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'ticker_enable',
            array(
                'label' => __( 'Display Ticker', 'medixare' ),
                'section' => 'news_ticker_section',
            )
        ) );

        // Ticker enable
        $wp_customize->add_setting( 'ticker_title_text',
            array(
                'default' => $this->defaults['ticker_title_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'ticker_title_text',
            array(
                'label' => __( 'News Ticker title', 'medixare' ),
                'section' => 'news_ticker_section',
                'type' => 'text',
            )
        );

        // ticker delay
        $wp_customize->add_setting( 'ticker_delay',
            array(
                'default' => $this->defaults['ticker_delay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'ticker_delay',
            array(
                'label' => __( 'Ticker Delay', 'medixare' ),
                'section' => 'news_ticker_section',
                'type' => 'number',
            )
        );

        // ticker speed
        $wp_customize->add_setting( 'ticker_speed',
            array(
                'default' => $this->defaults['ticker_speed'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'ticker_speed',
            array(
                'label' => __( 'Ticker Speed', 'medixare' ),
                'section' => 'news_ticker_section',
                'type' => 'number',
            )
        );

        // ticker style
        $wp_customize->add_setting( 'ticker_style',
            array(
                'default' => $this->defaults['ticker_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'ticker_style',
            array(
                'label' => __( 'Ticker Style', 'medixare' ),
                'section' => 'news_ticker_section',
                'type' => 'select',
                'choices' => array(
                    'reveal' => esc_html__( 'Reveal', 'medixare' ),
                    'fade' => esc_html__( 'Fade', 'medixare' ),
                ),
            )
        );

        // ticker post number
        $wp_customize->add_setting( 'ticker_post_number',
            array(
                'default' => $this->defaults['ticker_post_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'ticker_post_number',
            array(
                'label' => __( 'Number of Ticker', 'medixare' ),
                'section' => 'news_ticker_section',
                'type' => 'number',
            )
        );

        // ticker swiper bg color
        $wp_customize->add_setting('ticker_swiper_bg_color', 
            array(
                'default' => $this->defaults['ticker_swiper_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ticker_swiper_bg_color',
            array(
                'label' => esc_html__('Ticker Background Color', 'medixare'),
                'section' => 'news_ticker_section', 
            )
        ));

        // ticker swiper color
        $wp_customize->add_setting('ticker_text_color', 
            array(
                'default' => $this->defaults['ticker_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ticker_text_color',
            array(
                'label' => esc_html__('Ticker Text Color', 'medixare'),
                'section' => 'news_ticker_section', 
            )
        ));

        // ticker swiper color
        $wp_customize->add_setting('ticker_text_hover_color', 
            array(
                'default' => $this->defaults['ticker_text_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ticker_text_hover_color',
            array(
                'label' => esc_html__('Ticker Text Hover Color', 'medixare'),
                'section' => 'news_ticker_section', 
            )
        ));

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_News_Ticker_Settings();
}
