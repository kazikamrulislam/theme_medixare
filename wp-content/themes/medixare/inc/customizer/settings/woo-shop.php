<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\medixare\Customizer\Settings;

use addonmonster\medixare\Customizer\MedixareTheme_Customizer;
use addonmonster\medixare\Customizer\Controls\Customizer_Switch_Control;
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Woo_Shop_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_woo_shop_controls' ) );
	}

    public function register_woo_shop_controls( $wp_customize ) {
		
		$wp_customize->add_setting('products_cols_width',
			array(
				'default'           => $this->defaults['products_cols_width'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'amttheme_sanitize_integer'
			)
        );
        $wp_customize->add_control('products_cols_width',
			array(
			   'label'       => esc_html__('Products Per Column', 'medixare'),
			   'description' => esc_html__('Use product per col default 4', 'medixare'),
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );
		
		$wp_customize->add_setting('products_per_page',
			array(
				'default'           => $this->defaults['products_per_page'],
				'transport'         => 'refresh',
				'sanitize_callback' => 'amttheme_sanitize_integer'
			)
        );
        $wp_customize->add_control('products_per_page',
			array(
			   'label'       => esc_html__('Number of items per page', 'medixare'),
			   'description' => esc_html__('Effect only for Shop custom page template ', 'medixare'),
			   'section'       => 'shop_layout_section',
			   'type'        => 'number'
			)
        );

        // Add to cart view
        $wp_customize->add_setting( 'wc_shop_cart_icon',
            array(
                'default' => $this->defaults['wc_shop_cart_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_cart_icon',
            array(
                'label' => __( 'Cart view', 'medixare' ),
                'section' => 'shop_layout_section',
            )
        ) );
			
		// Quick view
        $wp_customize->add_setting( 'wc_shop_quickview_icon',
            array(
                'default' => $this->defaults['wc_shop_quickview_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_quickview_icon',
            array(
                'label' => __( 'Quick view', 'medixare' ),
                'section' => 'shop_layout_section',
            )
        ) );
		
		// Wishlist view
        $wp_customize->add_setting( 'wc_shop_wishlist_icon',
            array(
                'default' => $this->defaults['wc_shop_wishlist_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_wishlist_icon',
            array(
                'label' => __( 'Wishlist', 'medixare' ),
                'section' => 'shop_layout_section',
            )
        ) );
		
		// Compare view
        $wp_customize->add_setting( 'wc_shop_compare_icon',
            array(
                'default' => $this->defaults['wc_shop_compare_icon'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_compare_icon',
            array(
                'label' => __( 'Compare', 'medixare' ),
                'section' => 'shop_layout_section',
            )
        ) );

        // Rating view
        $wp_customize->add_setting( 'wc_shop_rating',
            array(
                'default' => $this->defaults['wc_shop_rating'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'wc_shop_rating',
            array(
                'label' => __( 'Rating', 'medixare' ),
                'section' => 'shop_layout_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Woo_Shop_Settings();
}
