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
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Blog_Post_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_post_controls( $wp_customize ) {

        // Blog Post Style
        $wp_customize->add_setting( 'blog_style',
            array(
                'default' => $this->defaults['blog_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'blog_style',
            array(
                'label' => __( 'Blog/Archive Layout', 'medixare' ),
                'description' => esc_html__( 'Blog Post layout variation you can selecr and use.', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                    'style3' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 3', 'medixare' )
                    ),
                    'style4' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 4', 'medixare' )
                    ),
                    'style5' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog1.png',
                        'name' => __( 'Layout 5', 'medixare' )
                    ),
                    'style6' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/blog2.png',
                        'name' => __( 'Layout 6', 'medixare' )
                    ),
                )
            )
        ) );
        /*Loadmore*/
        $wp_customize->add_setting( 'blog_loadmore',
            array(
                'default' => $this->defaults['blog_loadmore'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_loadmore',
            array(
                'label' => __( 'Blog Pagination', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'pagination' => esc_html__( 'Pagination', 'medixare' ),
                    'loadmore' => esc_html__( 'Load More', 'medixare' ),
                ),
            )
        );
        $wp_customize->add_setting( 'load_more_limit',
            array(
                'default' => $this->defaults['load_more_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'load_more_limit',
            array(
                'label' => __( 'Load More Limit', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'number',
            )
        );	
		$wp_customize->add_setting( 'post_content_limit',
            array(
                'default' => $this->defaults['post_content_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        
        $wp_customize->add_control( 'post_content_limit',
            array(
                'label' => __( 'Blog Content Limit', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );		
		$wp_customize->add_setting( 'blog_content',
            array(
                'default' => $this->defaults['blog_content'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_content',
            array(
                'label' => __( 'Show Content', 'medixare' ),
                'section' => 'blog_post_settings_section',
            )
        ) );		
		$wp_customize->add_setting( 'blog_date',
            array(
                'default' => $this->defaults['blog_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_date',
            array(
                'label' => __( 'Show Date', 'medixare' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		
		$wp_customize->add_setting( 'blog_author_name',
            array(
                'default' => $this->defaults['blog_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_author_name',
            array(
                'label' => __( 'Show Author', 'medixare' ),
                'section' => 'blog_post_settings_section',
            )
        ) );		
		$wp_customize->add_setting( 'blog_comment_num',
            array(
                'default' => $this->defaults['blog_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_comment_num',
            array(
                'label' => __( 'Show Comment', 'medixare' ),
                'section' => 'blog_post_settings_section',
            )
        ) );		
		$wp_customize->add_setting( 'blog_cats',
            array(
                'default' => $this->defaults['blog_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_cats',
            array(
                'label' => __( 'Show Category', 'medixare' ),
                'section' => 'blog_post_settings_section',
            )
        ) );
		if(class_exists('Medixare_Core')){
            $wp_customize->add_setting( 'blog_view',
            array(
                'default' => $this->defaults['blog_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_view',
                array(
                    'label' => __( 'Show Views', 'medixare' ),
                    'section' => 'blog_post_settings_section',
                )
            ) );
            $wp_customize->add_setting( 'blog_length',
            array(
                'default' => $this->defaults['blog_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'blog_length',
                array(
                    'label' => __( 'Show Reading Length', 'medixare' ),
                    'section' => 'blog_post_settings_section',
                )
            ) );
        }
		
        $wp_customize->add_setting( 'button_text',
            array(
                'default' => $this->defaults['button_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'button_text',
            array(
                'label' => __( 'Read More Button Text', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'text',
            )
        );

        // $wp_customize->add_setting( 'blog_post_sort',
        //     array(
        //         'default' => $this->defaults['blog_post_sort'],
        //         'transport' => 'refresh',
        //         'sanitize_callback' => 'amttheme_radio_sanitization',
        //     )
        // );
        // $wp_customize->add_control( 'blog_post_sort',
        //     array(
        //         'label' => __( 'Post Sort', 'medixare' ),
        //         'section' => 'blog_post_settings_section',
        //         'description' => esc_html__( 'Display post Order', 'medixare' ),
        //         'type' => 'select',
        //         'choices' => array(
        //             'recent' => esc_html__( 'Recent Posts', 'medixare' ),
        //             'title' => esc_html__( 'Random Posts', 'medixare' ),
        //             'modified' => esc_html__( 'Last Modified Posts', 'medixare' ),
        //             'popular' => esc_html__( 'Most Commented posts', 'medixare' ),
        //             'views' => esc_html__( 'Most Viewed posts', 'medixare' ),
        //         )
        //     )
        // );

        /*Author bg image*/
        $wp_customize->add_setting('author_bg_image',
            array(
              'default'           => $this->defaults['author_bg_image'],
              'transport'         => 'refresh',
              'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'author_bg_image',
            array(
                'label'         => esc_html__('Author Top Background', 'medixare'),
                'description'   => esc_html__('This is the description for the Media Control', 'medixare'),
                'section'       => 'blog_post_settings_section',
                'mime_type'     => 'image',
                'button_labels' => array(
                    'select'       => esc_html__('Select File', 'medixare'),
                    'change'       => esc_html__('Change File', 'medixare'),
                    'default'      => esc_html__('Default', 'medixare'),
                    'remove'       => esc_html__('Remove', 'medixare'),
                    'placeholder'  => esc_html__('No file selected', 'medixare'),
                    'frame_title'  => esc_html__('Select File', 'medixare'),
                    'frame_button' => esc_html__('Choose File', 'medixare'),
                ),
            )
        ));

        /*Animation*/
        $wp_customize->add_setting( 'blog_animation',
            array(
                'default' => $this->defaults['blog_animation'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation',
            array(
                'label' => __( 'Animation On/Off', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'wow' => esc_html__( 'Animation On', 'medixare' ),
                    'hide' => esc_html__( 'Animation Off', 'medixare' ),
                ),
            )
        );

        $wp_customize->add_setting( 'blog_animation_effect',
            array(
                'default' => $this->defaults['blog_animation_effect'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'blog_animation_effect',
            array(
                'label' => __( 'Entrance Animation', 'medixare' ),
                'section' => 'blog_post_settings_section',
                'type' => 'select',
                'choices' => array(
                    'none' => esc_html__( 'none', 'medixare' ),
                    'bounce' => esc_html__( 'bounce', 'medixare' ),
                    'flash' => esc_html__( 'flash', 'medixare' ),
                    'pulse' => esc_html__( 'pulse', 'medixare' ),
                    'rubberBand' => esc_html__( 'rubberBand', 'medixare' ),
                    'shakeX' => esc_html__( 'shakeX', 'medixare' ),
                    'shakeY' => esc_html__( 'shakeY', 'medixare' ),
                    'headShake' => esc_html__( 'headShake', 'medixare' ),
                    'swing' => esc_html__( 'swing', 'medixare' ),                 
                    'fadeIn' => esc_html__( 'fadeIn', 'medixare' ),
                    'fadeInDown' => esc_html__( 'fadeInDown', 'medixare' ),
                    'fadeInLeft' => esc_html__( 'fadeInLeft', 'medixare' ),
                    'fadeInRight' => esc_html__( 'fadeInRight', 'medixare' ),
                    'fadeInUp' => esc_html__( 'fadeInUp', 'medixare' ),                   
                    'bounceIn' => esc_html__( 'bounceIn', 'medixare' ),
                    'bounceInDown' => esc_html__( 'bounceInDown', 'medixare' ),
                    'bounceInLeft' => esc_html__( 'bounceInLeft', 'medixare' ),
                    'bounceInRight' => esc_html__( 'bounceInRight', 'medixare' ),
                    'bounceInUp' => esc_html__( 'bounceInUp', 'medixare' ),           
                    'slideInDown' => esc_html__( 'slideInDown', 'medixare' ),
                    'slideInLeft' => esc_html__( 'slideInLeft', 'medixare' ),
                    'slideInRight' => esc_html__( 'slideInRight', 'medixare' ),
                    'slideInUp' => esc_html__( 'slideInUp', 'medixare' ), 
                ),
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Blog_Post_Settings();
}
