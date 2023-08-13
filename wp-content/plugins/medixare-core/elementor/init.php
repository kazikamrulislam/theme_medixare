<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
use Elementor\Plugin;
use MedixareTheme_Helper;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Custom_Widget_Init {

	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'init' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );
		
		/*ajax actions*/
		add_filter( 'elementor/icons_manager/additional_tabs',  [$this, 'additional_tabs'], 10, 1 );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'after_enqueue_styles_elementor_editor' ), 10, 1 );

		/*Elementor image scroll parallex*/
		add_action( 'elementor/element/section/section_background/before_section_end', array($this,'add_elementor_section_background_controls') );
		add_action( 'elementor/frontend/section/before_render', array($this,'render_elementor_section_parallax_background') );
	}
	
	public function after_enqueue_styles_elementor_editor()	{
		wp_enqueue_style( 'flaticon', \MedixareTheme_Helper::get_font_css( 'flaticon' ) );
	}


	public function editor_style() {
		$img = plugins_url( 'icon.png', __FILE__ );
		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .amtheme-el-custom{content: url( '.$img.');width: 28px;}' );
		wp_add_inline_style( 'elementor-editor', '.select2-container--default .select2-selection--single {min-width: 126px !important; min-height: 30px !important;}' );
	}

	public function init() {
		require_once __DIR__ . '/base.php';
		
		// Widgets -- filename=>classname /@dev
		$widgets1 = array(
//			'amt-title'           			=> 'AMT_Title',
//			'amt-button'             	=> 'AMT_Button',
//			'contact-info'         		=> 'Contact_Info',
//			'progress-bar'          	=> 'Progress_Bar',
// 			'post-list'       				=> 'Post_List',
//			'post-overlay'       			=> 'Post_Overlay',
//			'post-slider'       			=> 'Post_Slider',
//			'thumb-slider'       			=> 'Thumb_Slider',
//			'amt-image'      					=> 'AMT_Image',
//			'amt-category'      				=> 'AMT_Category',
//			'amt-ticker'      					=> 'AMT_Ticker',
//			'text-with-button'      	=> 'Text_With_Button',
// 			'amt-counter'      	      => 'AMT_Counter',
			'amt-team'       	    		  => 'AMT_Team',
			'amt-post-grid'       			  => 'AMT_Post_Grid',
			'amt-video'      	              => 'AMT_Video',
			'amt-title'      	              => 'AMT_Title',
			'amt-contact-box'      	          => 'AMT_Contact_Box',
			'amt-service-box'      	      	  => 'AMT_Service_Box',
			'amt-about-features'      	      => 'AMT_About_Features',
			'amt-counter-section'      	      => 'AMT_Counter_Section',
			'amt-banner-section'      	      => 'AMT_Banner_Section',
			'amt-faq'      	      			  => 'AMT_FAQ',
			'amt-partner-slider'      	      => 'AMT_PARTNER_SLIDER',
			'amt-testimonial'				  => 'AMT_TESTIMONIAL',
			'amt-contact-cta'				  => 'AMT_CONTACT_VTA',
			'amt-masonry-gallery'			  => 'AMT_MASONRY_GALLERY',
			'amt-info-box'				  	  => 'AMT_Info_Box',
			'amt-event-cta'			  		  => 'AMT_EVENT_CTA',
		);
		

		$widgets = array_merge( $widgets1 );
		
		foreach ( $widgets as $widget => $class ) {
			$template_name = "/elementor-custom/widgets/{$widget}.php";
			if ( file_exists( STYLESHEETPATH . $template_name ) ) {
				$file = STYLESHEETPATH . $template_name;
			}
			elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
				$file = TEMPLATEPATH . $template_name;
			}
			else {
				$file = __DIR__ . '/widgets/' . $widget. '.php';
			}

			require_once $file;
			
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register_widget_type( new $classname );
		}
	}

	public function widget_categoty( $class ) {
		$id         = MEDIXARE_CORE_THEME_PREFIX . '-widgets'; // Category /@dev
		$properties = array(
			'title' => __( 'AddonMonster Elements', 'medixare-core' ),
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}
	
	public function custom_icon_for_elementor( $controls_registry )
	{
		// Get existing icons
		$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
		// Append new icons		
		$flaticons = MedixareTheme_Helper::get_flaticon_icons();
		// Then we set a new list of icons as the options of the icon control
		$new_icons = array_merge($flaticons, $icons);
		$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
	}

	public function additional_tabs($tabs)
      {
        $json_url = MedixareTheme_Helper::get_asset_file('json/flaticon.json');

        $flaticon = [
          'name'          => 'flaticon',
          'label'         => esc_html__( 'Medixare Icon', 'medixare-core' ),
          'url'           => false,
          'enqueue'       => false,
          'prefix'        => '',
          'displayPrefix' => '',
          'labelIcon'     => 'fab fa-font-awesome-alt',
          'ver'           => '1.0.0',
          'fetchJson'     => $json_url,
        ];
        array_push( $tabs, $flaticon);

        return $tabs;
      }

  function add_elementor_section_background_controls( \Elementor\Element_Section $section ) {

		$section->add_control(
			'amt_section_parallax',
			[
				'label' => __( 'Parallax', 'medixare-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'Off', 'medixare-core' ),
				'label_on' => __( 'On', 'medixare-core' ),
				'default' => 'no',
				'prefix_class' => 'amt-parallax-bg-',
			]
		);

		$section->add_control(
			'amt_parallax_speed',
			[
				'label' => __( 'Speed', 'medixare-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 5,
				'step' => 0.1,
				'default' => 0.5,
				'condition' => [
					'amt_section_parallax' => 'yes'
				]
			]
		);

		$section->add_control(
			'amt_parallax_transition',
			[
				'label' => __( 'Parallax Transition off?', 'medixare-core' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => __( 'on', 'medixare-core' ),
				'label_on' => __( 'Off', 'medixare-core' ),
				'default' => 'off',
				'return_value' => 'off',
				'prefix_class' => 'amt-parallax-transition-',
				'condition' => [
					'amt_section_parallax' => 'yes'
				]
			]
		);

	}

	// Render section background parallax
	function render_elementor_section_parallax_background( \Elementor\Element_Base $element ) {

		if('section' === $element->get_name()){
			if ( 'yes' === $element->get_settings_for_display( 'amt_section_parallax' ) ) {
				$amt_background = $element->get_settings_for_display( 'background_image' );
				if( ! isset($amt_background ) ) {
					return;
				}
				$amt_background_URL = $amt_background['url'];
				$data_speed = $element->get_settings_for_display( 'amt_parallax_speed' );

				$element->add_render_attribute( '_wrapper', [
					'data-speed' => $data_speed,
					'data-bg-image' => $amt_background_URL,
				] ) ;
			}
		}
	}

}

new Custom_Widget_Init();