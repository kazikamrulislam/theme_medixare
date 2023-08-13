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
class MedixareTheme_Header_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_header_controls' ) );
	}

    public function register_header_controls( $wp_customize ) {
		
		// Top Bar Style
		$wp_customize->add_setting( 'top_bar',
            array(
                'default' => $this->defaults['top_bar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'top_bar',
            array(
                'label' => __( 'Top Bar On/Off', 'medixare' ),
                'section' => 'header_top_section',
            )
        ) );
		
        $wp_customize->add_setting( 'top_bar_style',
            array(
                'default' => $this->defaults['top_bar_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',

            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'top_bar_style',
            array(
                'label' => __( 'Top Bar Layout', 'medixare' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'medixare' ),
                'section' => 'header_top_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-1.jpg',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-2.jpg',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-3.jpg',
                        'name' => __( 'Layout 3', 'medixare' )
                    ),                    
                    '4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/top-4.jpg',
                        'name' => __( 'Layout 4', 'medixare' )
                    ), 
                ),
                'active_callback'   => 'amttheme_is_topbar_enabled',
            )
        ) );        

        // Topbar One Style   
        $wp_customize->add_setting( 'phone_show',
            array(
                'default' => $this->defaults['phone_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'phone_show',
            array(
                'label' => __( 'Topbar Phone', 'medixare' ),
                'section' => 'header_top_section',
                'active_callback'   => 'amttheme_is_topbar_phone_enabled',
            )
        ) ); 

        $wp_customize->add_setting( 'email_show',
            array(
                'default' => $this->defaults['email_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'email_show',
            array(
                'label' => __( 'Topbar Email', 'medixare' ),
                'section' => 'header_top_section',
                'active_callback'   => 'amttheme_is_topbar3_enabled',
            )
        ) );

        $wp_customize->add_setting( 'address_show',
            array(
                'default' => $this->defaults['address_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'address_show',
            array(
                'label' => __( 'Topbar Address', 'medixare' ),
                'section' => 'header_top_section',
                'active_callback'   => 'amttheme_is_topbar3_enabled',
            )
        ) );

        $wp_customize->add_setting( 'menu_show',
            array(
                'default' => $this->defaults['menu_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'menu_show',
            array(
                'label' => __( 'Topbar Menu', 'medixare' ),
                'section' => 'header_top_section',
                'active_callback'   => 'amttheme_is_topbar_menu_enabled',
            )
        ) ); 


        $wp_customize->add_setting( 'topbar_menu',
            array(
                'default' => $this->defaults['topbar_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );        
        $wp_customize->add_control( 'topbar_menu',
            array(
                'label' => __( 'Select Topbar Menu', 'medixare' ),
                'section' => 'header_top_section',
                'type' => 'select',
                'choices' => medixare_top_menu(),
                'active_callback'   => 'amttheme_is_topbar_menu_field_enabled',
            )
        ); 


        $wp_customize->add_setting( 'social_show',
            array(
                'default' => $this->defaults['social_show'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'social_show',
            array(
                'label' => __( 'Topbar Social', 'medixare' ),
                'section' => 'header_top_section',
                'active_callback'   => 'amttheme_is_topbar_social_enabled',
            )
        ) );      


        // Color
        $wp_customize->add_setting('topbar_bg_color', 
            array(
                'default' => $this->defaults['topbar_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_bg_color',
            array(
                'label' => esc_html__('Topbar Background Color', 'medixare'),
                'section' => 'header_top_section',    
            )
        ));        
        $wp_customize->add_setting('topbar_link_color', 
            array(
                'default' => $this->defaults['topbar_link_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_color',
            array(
                'label' => esc_html__('Topbar Link Color', 'medixare'),
                'section' => 'header_top_section',    
            )
        ));
        $wp_customize->add_setting('topbar_link_hover_color', 
            array(
                'default' => $this->defaults['topbar_link_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_link_hover_color',
            array(
                'label' => esc_html__('Topbar Link Hover Color', 'medixare'),
                'section' => 'header_top_section',    
            )
        ));        
        $wp_customize->add_setting('topbar_text_color', 
            array(
                'default' => $this->defaults['topbar_text_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_text_color',
            array(
                'label' => esc_html__('Topbar Text Color', 'medixare'),
                'section' => 'header_top_section',    
            )
        ));
        $wp_customize->add_setting('topbar_icon_color', 
            array(
                'default' => $this->defaults['topbar_icon_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',   
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'topbar_icon_color',
            array(
                'label' => esc_html__('Topbar Icon Color', 'medixare'),
                'section' => 'header_top_section',    
            )
        ));    

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_variation_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_variation_heading', array(
            'label' => __( 'Header Variation', 'medixare' ),
            'section' => 'header_section',
        )));
		
		$wp_customize->add_setting( 'sticky_menu',
            array(
                'default' => $this->defaults['sticky_menu'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'sticky_menu',
            array(
                'label' => __( 'Sticky Header', 'medixare' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'header_opt',
            array(
                'default' => $this->defaults['header_opt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'header_opt',
            array(
                'label' => __( 'Header On/Off', 'medixare' ),
                'section' => 'header_section',
            )
        ) );

        $wp_customize->add_setting('header_bg_color', 
            array(
                'default' => $this->defaults['header_bg_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color',
            array(
                'label' => esc_html__('Header Background Color', 'medixare'),
                'section' => 'header_section', 
                
            )
        ));

        $wp_customize->add_setting('header_menu_color', 
            array(
                'default' => $this->defaults['header_menu_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_color',
            array(
                'label' => esc_html__('Header Menu Hover Color', 'medixare'),
                'section' => 'header_section', 
                'active_callback' => 'amttheme_is_sticky_menu_enabled',
            )
        ));

        $wp_customize->add_setting('header_menu_hover_color', 
            array(
                'default' => $this->defaults['header_menu_hover_color'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_menu_hover_color',
            array(
                'label' => esc_html__('Header Menu Color', 'medixare'),
                'section' => 'header_section', 
                'active_callback' => 'amttheme_is_sticky_menu_enabled',
            )
        ));
		

        // Header Style
        $wp_customize->add_setting( 'header_style',
            array(
                'default' => $this->defaults['header_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'header_style',
            array(
                'label' => __( 'Header Layout', 'medixare' ),
                'description' => esc_html__( 'You can override this settings only Mobile', 'medixare' ),
                'section' => 'header_section',
                'choices' => array(
                    '1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-3.png',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),                  
                    '2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-1.png',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                    '3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/header-2.png',
                        'name' => __( 'Layout 3', 'medixare' )
                    ),
                )
            )
        ) );

        //Header Action
		$wp_customize->add_setting( 'search_icon',
            array(
                'default' => $this->defaults['search_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'search_icon',
            array(
                'label' => __( 'Search Icon', 'medixare' ),
                'section' => 'header_section',
            )
        ) );

		$wp_customize->add_setting( 'nav_button',
            array(
                'default' => $this->defaults['nav_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'nav_button',
            array(
                'label' => __( 'Button', 'medixare' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (2 == get_theme_mod('header_style')) {
                        return true;
                    }return false;
                    // return 2 == get_theme_mod('header_style');
                }
            )
        ) );

        $wp_customize->add_setting( 'nav_button_txt',
            array(
                'default' => $this->defaults['nav_button_txt'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'nav_button_txt',
            array(
                'label' => __( 'Button Text', 'medixare' ),
                'section' => 'header_section',
                'type' => 'text',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (2 == get_theme_mod('header_style')) {
                        return true;
                    }return false;
                    // return 2 == get_theme_mod('header_style');
                }
            )
        );

        $wp_customize->add_setting( 'cart_icon',
            array(
                'default' => $this->defaults['cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'cart_icon',
            array(
                'label' => __( 'Cart Icon', 'medixare' ),
                'section' => 'header_section',
            )
        ) );
		
		$wp_customize->add_setting( 'vertical_menu_icon',
            array(
                'default' => $this->defaults['vertical_menu_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'vertical_menu_icon',
            array(
                'label' => __( 'Vertical Menu Icon', 'medixare' ),
                'section' => 'header_section',
                'active_callback' => function(){
                    // return get_theme_mod('header_style') == '3' or '4';
                    if (1 == get_theme_mod('header_style')) {
                        return true;
                    }elseif(3 == get_theme_mod('header_style')){
                        return true;
                    }else return false;
                }
            )
        ) );


        $wp_customize->add_setting( 'menu_show2',
            array(
                'default' => $this->defaults['menu_show2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'menu_show2',
            array(
                'label' => __( 'Topbar Menu', 'medixare' ),
                'section' => 'header_section',
                'active_callback'   => 'amttheme_is_header_short_menu_enabled',
            )
        ) ); 

        $wp_customize->add_setting( 'topbar_menu2',
            array(
                'default' => $this->defaults['topbar_menu2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );        
        $wp_customize->add_control( 'topbar_menu2',
            array(
                'label' => __( 'Select Topbar Menu', 'medixare' ),
                'section' => 'header_section',
                'type' => 'select',
                'choices' => medixare_top_menu(),
                'active_callback'   => 'amttheme_is_header_short_menu_field_enabled',
            )
        ); 

        /**
         * Heading for Header Variation
         */
        $wp_customize->add_setting('header_mobile_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'header_mobile_heading', array(
            'label' => __( 'Mobile Header Option', 'medixare' ),
            'section' => 'header_mobile_section',
        )));

        $wp_customize->add_setting( 'mobile_topbar',
            array(
                'default' => $this->defaults['mobile_topbar'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_topbar',
            array(
                'label' => __( 'Mobile Topbar', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_date',
            array(
                'default' => $this->defaults['mobile_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_date',
            array(
                'label' => __( 'Mobile Date', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_phone',
            array(
                'default' => $this->defaults['mobile_phone'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_phone',
            array(
                'label' => __( 'Mobile Phone No', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_email',
            array(
                'default' => $this->defaults['mobile_email'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_email',
            array(
                'label' => __( 'Mobile Email', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_address',
            array(
                'default' => $this->defaults['mobile_address'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_address',
            array(
                'label' => __( 'Mobile Address', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );
        $wp_customize->add_setting( 'mobile_social',
            array(
                'default' => $this->defaults['mobile_social'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_social',
            array(
                'label' => __( 'Mobile Social', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );

        $wp_customize->add_setting( 'mobile_search',
            array(
                'default' => $this->defaults['mobile_search'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'mobile_search',
            array(
                'label' => __( 'Mobile Search', 'medixare' ),
                'section' => 'header_mobile_section',
            )
        ) );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Header_Settings();
}
