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

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Single_Post_Share_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_single_post_share_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_single_post_share_controls( $wp_customize ) {
		
        $wp_customize->add_setting( 'post_share_facebook',
            array(
                'default' => $this->defaults['post_share_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_facebook',
            array(
                'label' => __( 'Show Facebook Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_twitter',
            array(
                'default' => $this->defaults['post_share_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_twitter',
            array(
                'label' => __( 'Show Twitter Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));

        $wp_customize->add_setting( 'post_share_youtube',
            array(
                'default' => $this->defaults['post_share_youtube'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_youtube',
            array(
                'label' => __( 'Show Youtube Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_linkedin',
            array(
                'default' => $this->defaults['post_share_linkedin'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_linkedin',
            array(
                'label' => __( 'Show Linkedin Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_pinterest',
            array(
                'default' => $this->defaults['post_share_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_pinterest',
            array(
                'label' => __( 'Show Pinterest Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_whatsapp',
            array(
                'default' => $this->defaults['post_share_whatsapp'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_whatsapp',
            array(
                'label' => __( 'Show Whatsapp Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));

        $wp_customize->add_setting( 'post_share_cloud',
            array(
                'default' => $this->defaults['post_share_cloud'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_cloud',
            array(
                'label' => __( 'Show Cloud Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_dribbble',
            array(
                'default' => $this->defaults['post_share_dribbble'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_dribbble',
            array(
                'label' => __( 'Show Dribbble Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_tumblr',
            array(
                'default' => $this->defaults['post_share_tumblr'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_tumblr',
            array(
                'label' => __( 'Show Tumblr Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_share_reddit',
            array(
                'default' => $this->defaults['post_share_reddit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share_reddit',
            array(
                'label' => __( 'Show Reddit Share Button', 'medixare' ),
                'section' => 'single_post_share_section',
            )
        ));
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Single_Post_Share_Settings();
}
