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
class MedixareTheme_Team_Post_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_team_post_controls' ) );
	}

    /**
     * Gallery Post Controls
     */
    public function register_team_post_controls( $wp_customize ) {
		
		$wp_customize->add_setting( 'team_archive_style',
            array(
                'default' => $this->defaults['team_archive_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'team_archive_style',
            array(
                'label' => __( 'Team Archive Layout', 'medixare' ),
                'description' => esc_html__( 'Select the gallery layout for gallery page', 'medixare' ),
                'section' => 'amttheme_team_settings',
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
        $wp_customize->add_setting( 'team_arexcerpt_limit',
            array(
                'default' => $this->defaults['team_arexcerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_arexcerpt_limit',
            array(
                'label' => __( 'Team Archive Excerpt Limit', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'team_ar_excerpt',
            array(
                'default' => $this->defaults['team_ar_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_excerpt',
            array(
                'label' => __( 'Show Excerpt', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_ar_position',
            array(
                'default' => $this->defaults['team_ar_position'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_position',
            array(
                'label' => __( 'Show Position', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_ar_social',
            array(
                'default' => $this->defaults['team_ar_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_ar_social',
            array(
                'label' => __( 'Show Social', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		// Single Gallery Post
		$wp_customize->add_setting('team_single_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_single_heading', array(
            'label' => __( 'Single Team', 'medixare' ),
            'section' => 'amttheme_team_settings',
        )));
		
        $wp_customize->add_setting( 'team_social',
            array(
                'default' => $this->defaults['team_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_social',
            array(
                'label' => __( 'Show Social', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
        
        $wp_customize->add_setting( 'team_position',
            array(
                'default' => $this->defaults['team_position'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_position',
            array(
                'label' => __( 'Show Position', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));

        $wp_customize->add_setting( 'team_excerpt',
            array(
                'default' => $this->defaults['team_excerpt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_excerpt',
            array(
                'label' => __( 'Show Position', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));

        $wp_customize->add_setting( 'team_excerpt_limit',
            array(
                'default' => $this->defaults['team_excerpt_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_excerpt_limit',
            array(
                'label' => __( 'Team Archive Excerpt Limit', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
            )
        );

		$wp_customize->add_setting( 'team_info',
            array(
                'default' => $this->defaults['team_info'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_info',
            array(
                'label' => __( 'Show Info', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));

		$wp_customize->add_setting( 'team_awards',
            array(
                'default' => $this->defaults['team_awards'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_awards',
            array(
                'label' => __( 'Show Awards', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_skill',
            array(
                'default' => $this->defaults['team_skill'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_skill',
            array(
                'label' => __( 'Show Skill', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));

		$wp_customize->add_setting( 'team_education',
            array(
                'default' => '',
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_html',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'team_education',
            array(
                'label' => __( 'Show Education', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		// Related Gallery Post
		$wp_customize->add_setting('team_related_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'team_related_heading', array(
            'label' => __( 'Related Team Settings', 'medixare' ),
            'section' => 'amttheme_team_settings',
        )));
		
		$wp_customize->add_setting( 'show_related_team',
            array(
                'default' => $this->defaults['show_related_team'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_team',
            array(
                'label' => __( 'Show Related Team', 'medixare' ),
                'section' => 'amttheme_team_settings',
            )
        ));
		
		$wp_customize->add_setting( 'team_related_title',
            array(
                'default' => $this->defaults['team_related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'team_related_title',
            array(
                'label' => __( 'Related Title', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'text',
				'active_callback'   => 'amttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_number',
            array(
                'default' => $this->defaults['related_team_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_number',
            array(
                'label' => __( 'Team Post', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'amttheme_is_related_team_enabled',
            )
        );
		
		$wp_customize->add_setting( 'related_team_title_limit',
            array(
                'default' => $this->defaults['related_team_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_title_limit',
            array(
                'label' => __( 'Title Limit', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
				'active_callback'   => 'amttheme_is_related_team_enabled',
            )
        );
        $wp_customize->add_setting( 'related_team_auto_play',
            array(
                'default' => $this->defaults['related_team_auto_play'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_team_auto_play',
            array(
                'label' => __( 'Auto Play On/Off', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'active_callback'   => 'amttheme_is_related_team_enabled',
            )
        ) );
        $wp_customize->add_setting( 'related_team_auto_play_delay',
            array(
                'default' => $this->defaults['related_team_auto_play_delay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_auto_play_delay',
            array(
                'label' => __( 'Auto Play Delay', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_team_delay_enabled',
            )
        );
        $wp_customize->add_setting( 'related_team_auto_play_speed',
            array(
                'default' => $this->defaults['related_team_auto_play_speed'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_team_auto_play_speed',
            array(
                'label' => __( 'Sliding Speed', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_team_enabled',
            )
        ); 
        $wp_customize->add_setting( 'team_slug',
            array(
                'default' => $this->defaults['team_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_slug',
            array(
                'label' => __( 'Team Slug', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting( 'team_cat_slug',
            array(
                'default' => $this->defaults['team_cat_slug'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization'
            )
        );
        $wp_customize->add_control( 'team_cat_slug',
            array(
                'label' => __( 'Team Category Slug', 'medixare' ),
                'section' => 'amttheme_team_settings',
                'type' => 'text',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Team_Post_Settings();
}
