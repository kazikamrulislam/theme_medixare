<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_Video extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Video', 'medixare-core' );
		$this->amt_base = 'amt-video';
		parent::__construct( $data, $args );
	}
	
	private function amt_load_scripts(){
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'tween-max' );
	}

	public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__( 'Video Style', 'medixare-core' ),
				'options' => array(
					'style1' => esc_html__( 'Video Style 1', 'medixare-core' ),
					'style2' => esc_html__( 'Video Style 2', 'medixare-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'videourl',
				'label'   => esc_html__( 'Video URL', 'medixare-core' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'video_image',
				'label'   => esc_html__( 'Image', 'medixare-core' ),
				'description' => esc_html__( 'Recommended full image', 'medixare-core' ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'medixare-core' ),	
				'name' => 'video_thumb_size', 
				'separator' => 'none',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general2',
				'label'   => esc_html__( 'Content', 'medixare-core' ),
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-1',
				'label'   => esc_html__( 'Title part 1', 'medixare-core' ),
				'default' => "Live in care your",
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-2',
				'label'   => esc_html__( 'Title part 2', 'medixare-core' ),
				'default' => 'Family will love',
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-3',
				'label'   => esc_html__( 'Title part 3', 'medixare-core' ),
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text',
				'label'   => esc_html__( 'Text', 'medixare-core' ),
				'default' => 'We are best home care service provider',
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt-button',
				'label'   => esc_html__( 'Button Text', 'medixare-core' ),
				'default' => 'APPOINMENT',
				'condition'   => array( 'style' => 'style2',),
			),	
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'arrow_display',
				'label'       => esc_html__( 'Arrow', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => 'style2',),
			),	
			array(
				'id'      => 'link_url',
				// 'type'    => Controls_Manager::URL,
				// 'label'   => esc_html__( 'Button URL', 'medixare-core' ),
				// 'placeholder' => 'https://your-link.com',
				// 'condition'   => array( 'style' => 'style2',),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general3',
				'label'   => esc_html__( 'Stuff Images', 'medixare-core' ),
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-1',
				'label' => esc_html__( 'Image 1', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-2',
				'label' => esc_html__( 'Image 2', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-3',
				'label' => esc_html__( 'Image 3', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),

			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-4',
				'label' => esc_html__( 'Image 4', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-5',
				'label' => esc_html__( 'Image 5', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'image-6',
				'label' => esc_html__( 'Image 6', 'medixare-core' ),
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'   => array( 'style' => 'style2',),
			),
			array(
				'mode' => 'section_end',
			),

			/*title section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'video_title_style',
	            'label'   => esc_html__( 'Content', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => ['style' => 'style2'],
	        ),
			array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_box_margin',
	            'label'   => __( 'Spacing', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-hero-title-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
	            ),
	        ),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_heading',
				'label' => esc_html__( 'Title', 'medixare-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Bold part', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-hero__title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-1',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-hero__title' => 'color: {{VALUE}}',
				),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_2',
				'label'   => esc_html__( ' Normal part', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-hero__title span',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-2',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-hero__title span' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-hero__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	        ),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'text_heading',
				'label' => esc_html__( 'Description', 'medixare-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-hero-title-wrapper p ',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-hero-title-wrapper p ' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'description_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-hero-title-wrapper p ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	        ),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'button_heading',
				'label' => esc_html__( 'Button', 'medixare-core' ),
				'separator' => 'before',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button-text-size',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-section__details .video-button',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label' => esc_html__( 'Icon Spacing', 'medixare-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .video-button i' => 'margin-left:{{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'btn_padding',
				'label' => esc_html__( 'Button Spacing', 'medixare-core' ),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .video-button' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
				array(
					'mode'    => 'tab_start',
					'id'      => 'tab_start_button_normal',
					'label'   => esc_html__( 'Normal', 'medixare-core' ),
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_text_color',
					'label'   => esc_html__( 'Text Color', 'medixare-core' ),
					'selectors' =>[
						'{{WRAPPER}} .amt-section__details .video-button'  => 'color: {{VALUE}};',
					],
					'default' => '#ff4460',
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_icon_color',
					'label'   => esc_html__( 'Icon Color', 'medixare-core' ),
					'selectors' =>[
						'{{WRAPPER}} .amt-section__details .video-button i'  => 'color: {{VALUE}};',
					],
					'default' => '#ff4460',
				),
				array(
					'mode' => 'tab_end',
				),
				array(
					'mode'    => 'tab_start',
					'id'      => 'tab_start_button_hover',
					'label'   => esc_html__( 'Hover', 'medixare-core' ),
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_text_color_hover',
					'label'   => esc_html__( 'Text Color', 'medixare-core' ),
					'selectors' =>[
						'{{WRAPPER}} .amt-section__details .video-button:hover'  => 'color: {{VALUE}};',
					],
					'default' => '#ff9b40',
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_icon_color_hover',
					'label'   => esc_html__( 'Icon Color', 'medixare-core' ),
					'selectors' =>[
						'{{WRAPPER}} .amt-section__details .video-button:hover i'  => 'color: {{VALUE}};',
					],
					'default' => '#ff9b40',
				),
				array(
					'mode' => 'tab_end',
				),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'mode' => 'section_end',
			),
			array(
	            'mode'    => 'section_start',
	            'id'      => 'video_button_style',
	            'label'   => esc_html__( 'Video Button', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_icon_size',
				'label'   => esc_html__( 'Icon Size', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'aspect_ratio',
				'label'   => esc_html__( 'Aspect Ratio', 'ogo-core' ),
				'options' => [
					'169' => '16:9',
					'219' => '21:9',
					'43' => '4:3',
					'32' => '3:2',
					'11' => '1:1',
					'916' => '9:16',
				],
				'default' => '169',
				'prefix_class' => 'elementor-aspect-ratio-',
				'frontend_available' => true,
			),
			array(

				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color',
				'label'   => esc_html__( 'Background Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play' => 'background-color: {{VALUE}}',
				),
			),
			array(

				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_bg_color_hover',
				'label'   => esc_html__( 'Background Hover', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_icon_color',
				'label'   => esc_html__( 'Icon Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'button_icon_color_hover',
				'label'   => esc_html__( 'Icon Hover', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play:hover' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_width',
				'label'   => esc_html__( 'Button Width', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play' => 'width: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'button_height',
				'label'   => esc_html__( 'Button Height', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-video-layout .amt-video .amt-icon .amt-play' => 'height: {{VALUE}}px',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'button_radius',
	            'label'   => __( 'Border Radius', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-video-layout .amt-video .amt-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'medixare-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} .amt-video .amt-img img',		
			),
	        array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$this->amt_load_scripts();

		switch ( $data['style'] ) {
			case 'style2':
			$template = 'amt-video-2';
			break;
			default:
			$template = 'amt-video';
			break;
		}

		// $template = 'amt-video';

		return $this->amt_template( $template, $data );
	}
}