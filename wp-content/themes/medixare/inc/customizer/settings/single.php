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
use addonmonster\medixare\Customizer\Controls\Customizer_Image_Radio_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class MedixareTheme_Blog_Single_Post_Settings extends MedixareTheme_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_blog_single_post_controls' ) );
	}

    /**
     * Blog Post Controls
     */
    public function register_blog_single_post_controls( $wp_customize ) {

        /*Scroll post*/
        $wp_customize->add_setting( 'scroll_post_enable',
            array(
                'default' => $this->defaults['scroll_post_enable'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'scroll_post_enable',
            array(
                'label' => __( 'Scroll Post', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        $wp_customize->add_setting( 'post_scroll_limit',
            array(
                'default' => $this->defaults['post_scroll_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'post_scroll_limit',
            array(
                'label' => __( 'Scroll Post Limit', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_single_scroll_post_enabled',
            )
        );
		
		// Post Style
        $wp_customize->add_setting( 'post_style',
            array(
                'default' => $this->defaults['post_style'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization'
            )
        );

        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'post_style',
            array(
                'label' => __( 'Single Post Layout', 'medixare' ),
                'description' => esc_html__( 'Post single layout variation you can selecr and use.', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'choices' => array(
                    'style1' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-1.png',
                        'name' => __( 'Layout 1', 'medixare' )
                    ),
                    'style2' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/post-style-3.png',
                        'name' => __( 'Layout 2', 'medixare' )
                    ),
                )
            )
        ) );
		
		
        $wp_customize->add_setting( 'post_featured_image',
            array(
                'default' => $this->defaults['post_featured_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_featured_image',
            array(
                'label' => __( 'Show Featured Image', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_author_name',
            array(
                'default' => $this->defaults['post_author_name'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_name',
            array(
                'label' => __( 'Show Author Name', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_date',
            array(
                'default' => $this->defaults['post_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_date',
            array(
                'label' => __( 'Show Post Date', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_comment_num',
            array(
                'default' => $this->defaults['post_comment_num'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_comment_num',
            array(
                'label' => __( 'Show Comment Number', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_cats',
            array(
                'default' => $this->defaults['post_cats'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_cats',
            array(
                'label' => __( 'Show Category', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_tags',
            array(
                'default' => $this->defaults['post_tags'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_tags',
            array(
                'label' => __( 'Show Tags', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		if(class_exists('Medixare_Core')){
            $wp_customize->add_setting( 'post_share',
            array(
                'default' => $this->defaults['post_share'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_share',
                array(
                    'label' => __( 'Show Share', 'medixare' ),
                    'section' => 'single_post_secttings_section',
                )
            ));
        }
		
		
		$wp_customize->add_setting( 'post_links',
            array(
                'default' => $this->defaults['post_links'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_links',
            array(
                'label' => __( 'Show Next / Previous post', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		
		$wp_customize->add_setting( 'post_author_bio',
            array(
                'default' => $this->defaults['post_author_bio'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_author_bio',
            array(
                'label' => __( 'Show Author Bio', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));
		if(class_exists('Medixare_Core')){
            $wp_customize->add_setting( 'post_view',
            array(
                'default' => $this->defaults['post_view'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_view',
                array(
                    'label' => __( 'Show Views', 'medixare' ),
                    'section' => 'single_post_secttings_section',
                )
            ));
            $wp_customize->add_setting( 'post_length',
            array(
                'default' => $this->defaults['post_length'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
            );
            $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_length',
                array(
                    'label' => __( 'Post Reading Length', 'medixare' ),
                    'section' => 'single_post_secttings_section',
                )
            ));
        }
		
        $wp_customize->add_setting( 'post_published',
            array(
                'default' => $this->defaults['post_published'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'post_published',
            array(
                'label' => esc_html__( 'Post Published', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));

        $wp_customize->add_setting( 'post_time_format',
            array(
                'default' => $this->defaults['post_time_format'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'post_time_format',
            array(
                'label' => esc_html__( 'Time Format', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'select',
                'choices' => array(
                    'modern' => esc_html__( 'Modern', 'medixare' ),
                    'none' => esc_html__( 'None', 'medixare' ),
                ),
            )
        );
		
		// Related Post
		$wp_customize->add_setting('post_related', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'post_related', array(
            'label' => esc_html__( 'Related Post Settings', 'medixare' ),
            'section' => 'single_post_secttings_section',
        )));
		
		$wp_customize->add_setting( 'show_related_post',
            array(
                'default' => $this->defaults['show_related_post'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'show_related_post',
            array(
                'label' => esc_html__( 'Show Related Post', 'medixare' ),
                'section' => 'single_post_secttings_section',
            )
        ));

		$wp_customize->add_setting( 'related_title',
            array(
                'default' => $this->defaults['related_title'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_textarea_field',
            )
        );
        $wp_customize->add_control( 'related_title',
            array(
                'label' => esc_html__( 'Related Title', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'textarea',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        );

		$wp_customize->add_setting( 'show_related_post_number',
            array(
                'default' => $this->defaults['show_related_post_number'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'show_related_post_number',
            array(
                'label' => __( 'Show Related Post Number', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        );

		$wp_customize->add_setting( 'show_related_post_title_limit',
            array(
                'default' => $this->defaults['show_related_post_title_limit'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'show_related_post_title_limit',
            array(
                'label' => __( 'Show Related Post Title Length', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        );
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
                'section' => 'single_post_secttings_section',
                'active_callback'   => 'amttheme_is_related_post_enabled',
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
                'section' => 'single_post_secttings_section',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        ) );
        $wp_customize->add_setting( 'related_blog_auto_play',
            array(
                'default' => $this->defaults['related_blog_auto_play'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'related_blog_auto_play',
            array(
                'label' => __( 'Auto Play On/Off', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        ) );
        $wp_customize->add_setting( 'related_blog_auto_play_delay',
            array(
                'default' => $this->defaults['related_blog_auto_play_delay'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_blog_auto_play_delay',
            array(
                'label' => __( 'Auto Play Delay', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_blog_delay_enabled',
            )
        ); 
        $wp_customize->add_setting( 'related_blog_auto_play_speed',
            array(
                'default' => $this->defaults['related_blog_auto_play_speed'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'related_blog_auto_play_speed',
            array(
                'label' => __( 'Sliding Speed', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'type' => 'number',
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        ); 
		// Post Query 
        $wp_customize->add_setting( 'related_post_query',
            array(
                'default' => $this->defaults['related_post_query'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_post_query',
            array(
                'label' => __( 'Query Type', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'description' => esc_html__( 'Post Query', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'cat' => esc_html__( 'Posts in the same Categories', 'medixare' ),
                    'tag' => esc_html__( 'Posts in the same Tags', 'medixare' ),
                    'author' => esc_html__( 'Posts by the same Author', 'medixare' ),
                ),
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        );
		
		// Display post Order
        $wp_customize->add_setting( 'related_post_sort',
            array(
                'default' => $this->defaults['related_post_sort'],
                'transport' => 'refresh',
                'sanitize_callback' => 'amttheme_radio_sanitization',
            )
        );
        $wp_customize->add_control( 'related_post_sort',
            array(
                'label' => __( 'Sort Order', 'medixare' ),
                'section' => 'single_post_secttings_section',
                'description' => esc_html__( 'Display post Order', 'medixare' ),
                'type' => 'select',
                'choices' => array(
                    'recent' => esc_html__( 'Recent Posts', 'medixare' ),
                    'rand' => esc_html__( 'Random Posts', 'medixare' ),
                    'modified' => esc_html__( 'Last Modified Posts', 'medixare' ),
                    'popular' => esc_html__( 'Most Commented posts', 'medixare' ),
                    'views' => esc_html__( 'Most Viewed posts', 'medixare' ),
                ),
                'active_callback'   => 'amttheme_is_related_post_enabled',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new MedixareTheme_Blog_Single_Post_Settings();
}
