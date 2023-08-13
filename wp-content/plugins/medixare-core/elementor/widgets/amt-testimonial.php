<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

use MedixareTheme;
use MedixareTheme_Helper;

if (!defined('ABSPATH')) exit;

class AMT_TESTIMONIAL extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Testimonial Slider', 'medixare-core');
		$this->amt_base = 'amt-testimonial';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'testimonial_reting',
			array(
				'label' => esc_html__('Reting', 'medixare-core'),
				'type' => Controls_Manager::NUMBER,
				'label_block' => true,
				'placeholder' => esc_html__('', 'medixare-core'),
				'description' => 'input any number or fraction between 1-5',
				'default' => esc_html__('2', 'medixare-core'),
				// 'dynamic' => [
				// 	'active' => true,
				// ],
			)
		);
		$repeater->add_control(
			'testimonial_description',
			array(
				'label' => esc_html__('Description', 'medixare-core'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'placeholder' => esc_html__('Description', 'medixare-core'),
				'default' => esc_html__('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione debitis architecto eos odio optio molestias tenetur esse vitae molestiae minima ut labore vel adipisci obcaecati dolorem eius, modi voluptatem!', 'medixare-core'),
				// 'dynamic' => [
				// 	'active' => true,
				// ],
			)
		);
		$repeater->add_control(
			'testimonial_author_img',
			array(
				'type'    => Controls_Manager::MEDIA,
				'label'   => __('Upload Author Image', 'medixare-core'),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'testimonial_author_name',
			array(
				'label' => esc_html__('Author Name', 'medixare-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Name', 'medixare-core'),
				'default' => esc_html__('Name', 'medixare-core'),
				// 'dynamic' => [
				// 	'active' => true,
				// ],
			)
		);
		$repeater->add_control(
			'testimonial_author_designation',
			array(
				'label' => esc_html__('Author Designation', 'medixare-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Designation', 'medixare-core'),
				'default' => esc_html__('Designation', 'medixare-core'),
				// 'dynamic' => [
				// 	'active' => true,
				// ],
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__('Style', 'medixare-core'),
				'options' => array(
					'style1' => esc_html__('testimonial Style 1', 'medixare-core'),
					'style2' => esc_html__('testimonial Style 2', 'medixare-core'),
				),
				'default' => 'style1',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'heading_display',
				'label'       => esc_html__('Heading Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition'   => array('style' => 'style1'),
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__('Heading Alignment', 'medixare-core'),
				'options' => array(
					'left' => array(
						'title' => __('Left', 'elementor'),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __('Right', 'elementor'),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-testimonial-1 .testimonial_title_area' => 'text-align : {{VALUE}};',
				),
				'condition'   => array(
					'style' => array('style1'),
					'heading_display' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'testimonial_title',
				'label'   => esc_html__('Subtitle', 'medixare-core'),
				'default' => 'Testimonial',
				'condition'   => array(
					'style' => array('style1'),
					'heading_display' => 'yes',
				),
			),
			array(
				'label' => esc_html__('Sub Title Shape', 'medixare-core'),
				'id'	=> 'shape_display',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__('Yes', 'medixare-core'),
					'no' => esc_html__('No', 'medixare-core'),
				],
				'frontend_available' => true,
				'condition'   => array(
					'style' => array('style1'),
					'heading_display' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'testimonial_des',
				'label'   => esc_html__('Title', 'medixare-core'),
				'default' => 'Mdixare Customer Feedback',
				'condition'   => array(
					'style' => array('style1'),
					'heading_display' => 'yes',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'icon_display',
				'label'       => esc_html__('Icon Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'testimonial_icon',
				'label'   => esc_html__('Icon', 'medixare-core'),
				'default' => [
					'value' => 'fa fa-quote-right',
					'library' => 'fa-solid',
				],
				'fa4compatibility' => 'icon',
				'condition'   => array(
					'icon_display' => 'yes',
				),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_items',
				'label'   => esc_html__('Slider Items', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'testimonial_items',
				'label'   => esc_html__('Slider Items', 'medixare-core'),
				'fields'  => $repeater->get_controls(),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			),
			array(
				'mode' => 'section_end',
			),
			// SLIDER oPTIONS 
			array(
				'mode'    => 'section_start',
				'id'      => 'slide_options',
				'label'   => esc_html__('Slide Option', 'medixare-core'),
			),
			array(
				'label' => esc_html__('Navigation', 'medixare-core'),
				'id'	=> 'navigation',
				'type' => Controls_Manager::SELECT,
				'default' => 'dots',
				'options' => [
					// 'both' => esc_html__( 'Arrows and Dots', 'medixare-core' ),
					// 'arrows' => esc_html__( 'Arrows', 'medixare-core' ),
					'dots' => esc_html__('Dots', 'medixare-core'),
					'none' => esc_html__('None', 'medixare-core'),
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__('Smooth Sliding', 'medixare-core'),
				'id'	=> 'smooth_sliding',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'options' => [
					'yes' => esc_html__('Yes', 'medixare-core'),
					'no' => esc_html__('No', 'medixare-core'),
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__('Autoplay', 'medixare-core'),
				'id'	=> 'autoplay',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__('Yes', 'medixare-core'),
					'no' => esc_html__('No', 'medixare-core'),
				],
				'condition' => [
					'smooth_sliding!' => 'yes',
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__('Autoplay Speed', 'medixare-core'),
				'id'	=> 'autoplay_speed',
				'type' => Controls_Manager::NUMBER,
				'default' => 300,
				'frontend_available' => true,
			),
			array(
				'mode'    => 'responsive',
				'label' => esc_html__('Slide PerView', 'medixare-core'),
				'id'	=> 'slide_perview2',
				'type' => Controls_Manager::SELECT,
				'devices' => ['desktop', 'tablet', 'mobile'],
				'options' => [
					'1' => esc_html__("1", 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3', 'medixare-core'),
				],
				'frontend_available' => true,
				'default' => '2',
				'tablet_default' => '2',
				'mobile_default' => '1',
			),
			array(
				'label' => esc_html__('Infinite Loop', 'medixare-core'),
				'id'	=> 'loop',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__('Yes', 'medixare-core'),
					'no' => esc_html__('No', 'medixare-core'),
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__('Slide per Group', 'medixare-core'),
				'id'	=> 'slide_per_group',
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3', 'medixare-core'),
					'4' => esc_html__('4', 'medixare-core'),
					'5' => esc_html__('5', 'medixare-core'),
				],
			),
			array(
				'mode'    => 'responsive',
				'label' => esc_html__('Space Between', 'medixare-core'),
				'id'	=> 'space_between',
				'type' => Controls_Manager::SLIDER,
				'devices' => ['desktop', 'tablet', 'mobile'],
				'desktop_default' => [
					'size' => 30,
				],
				'tablet_default' => [
					'size' => 20,
				],
				'mobile_default' => [
					'size' => 10,
				],
				'frontend_available' => true,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'navigation_bullet_color',
				'label'   => esc_html__('Navivarion Bullet Color', 'medixare-core'),
				'default' => '#1F0D3C',
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
				],
			),
			array(
				'mode' => 'section_end'
			),

			//Styles starts from here
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_animation_style',
				'label'   => esc_html__('General', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array(
					'style' => array('style1'),
					'heading_display' => 'yes',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_subtitle_style',
				'label'   => esc_html__('Sub-title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_shape_color',
				'label'   => esc_html__('Shape Color', 'medixare-core'),
				'default' => '#ff4460',
				'selectors' => array(
					'{{WRAPPER}} .amt-testimonial-1 .testimonial_title_area .testimonial-subtitle:before' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_subtitle_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .testimonial_title_area .testimonial-subtitle',

			),
			array(
				'id'      => 'testimonial_subtitle_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial_title_area .testimonial-subtitle' => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_title_style',
				'label'   => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_title_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .testimonial_title_area .testimonial-title',
			),
			array(
				'id'      => 'testimonial_title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial_title_area .testimonial-title' => 'color: {{VALUE}};',
				],
				'default' => '#1F0D3C',
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'title_padding_bottom',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Spacing', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .testimonial_title_area' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode' => 'section_end'
			),

			// Slider Items
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_slide_style',
				'label'   => esc_html__('Slider Items', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_single_item_style',
				'label'   => esc_html__('Single Item', 'medixare-core'),
				'separator' => 'after',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'slider_item_bg_color',
				'label'   => esc_html__('Background', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .testimonial-content-wrap' => 'background: {{VALUE}};',
				],
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'single-item-padding',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Padding', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .testimonial-content-wrap' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'slider_item_border_radius',
				'label' => esc_html__('Border Radius Radius', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .testimonial-content-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Hover Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .testimonial-item-2:hover',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_border_style',
				'label'   => esc_html__('Border', 'medixare-core'),
				'separator' => 'after',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'label' => esc_html__('Border Top', 'medixare-core'),
				'id' => 'testimonial_border_top',
				'range' => [
					'px' => [
						'max' => 15,
					],
				],
				'default' => [
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-content-wrap' =>  'border-top: {{SIZE}}{{UNIT}};',
				],
				'condition'   => array('style' => array('style1')),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SELECT,
				'id'      => '3rd-btn_border_style',
				'label' => esc_html__('Border Type', 'medixare-core'),
				'options' => [
					'solid'  => esc_html__('Solid', 'medixare-core'),
					'dashed' => esc_html__('Dashed', 'medixare-core'),
					'dotted' => esc_html__('Dotted', 'medixare-core'),
					'double' => esc_html__('Double', 'medixare-core'),
					'none' => esc_html__('None', 'medixare-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-content-wrap' => 'border-top-style: {{VALUE}};',
				],
				'default' => 'solid',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'border-color-heading',
				'label' => esc_html__('Border & Quote', 'medixare-core'),
				'separator' => 'before',
				'condition'   => array('style' => ['style1']),
			),
			array(
				'id'      => 'testimunial_2_border_icon1',
				'label'   => esc_html__('Color 1', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(n+1) .testimonial-content-wrap' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(n+1) .testimonial_meta i' => 'color: {{VALUE}};',
				],
				'default' => '#5bb286',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'id'      => 'testimunial_2_border_icon2',
				'label'   => esc_html__('Color 2', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(2n+0) .testimonial-content-wrap' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(2n+0) .testimonial_meta i' => 'color: {{VALUE}};',
				],
				'default' => '#ff9b40',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'id'      => 'testimunial_2_border_icon3',
				'label'   => esc_html__('Color 3', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(3n+0) .testimonial-content-wrap' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .amt-testimonial-1 .swiper-slide:nth-child(3n+0) .testimonial_meta i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_rating',
				'label'   => esc_html__('Rating', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'rating_style',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Size', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .star-ratings span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'id'      => 'testimonial_rating_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .star-ratings .fill-ratings span' => 'color: {{VALUE}};',
				],
				'default' => '#ff9b40',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'rating_padding',
				'label' => esc_html__('Margin', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-2 .star-ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .amt-testimonial-1 .star-ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_content_style',
				'label'   => esc_html__('Content', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'id'      => 'testimonial_content_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-content-wrap .testimonial-content .amt_testimonial_content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .amt-testimonial__content .amt_testimonial_content' => 'color: {{VALUE}};',
				],
				'default' => '#74696b',
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_content_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt_testimonial_content',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'component_padding',
				'label' => esc_html__('Margin', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_testimonial_content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end'
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_author_details ',
				'label'   => esc_html__('Author Details', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'author-content-spacing',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Spacing', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-1 .author_meta' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .amt-testimonial-2 .amt-testimonial__avata' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'author_icon_style',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Quote Size', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .testimonial_meta i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => ['style' => 'style1',],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'image_border_radius',
				'label' => esc_html__('Image Radius', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .author_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'id'      => 'author_icon__color',
				'label'   => esc_html__('Quote Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .amt-testimonial-2 .amt-testimonial__avata-quote' => 'color: {{VALUE}};',
				],
				'condition'   => array('style' => array('style2')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_author_name_style',
				'label'   => esc_html__('Name', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_author_name_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .author_name .author-name-value',
			),
			array(
				'id'      => 'testimonial_author_name',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author_name .author-name-value' => 'color: {{VALUE}};',
				],
				'default' => '#000',
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'testimonial_designation_style',
				'label'   => esc_html__('Designation', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_author_designation_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .author_meta .author_designation',
				'condition'   => array('style' => array('style1')),
			),
			array(
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'testimonial_author_designation_typo-2',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .author_meta .author_designation',
				'condition'   => array('style' => array('style2')),
			),
			array(
				'id'      => 'testimonial_author_designation',
				'label'   => esc_html__('Color', 'medixare-core'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .author_meta .author_designation' => 'color: {{VALUE}};',
				],
				'default' => '#676E89',
			),
			array(
				'mode' => 'section_end'
			),
		);
		return $fields;
	}

	protected function render()
	{
		$data = $this->get_settings();

		switch ($data['style']) {
			case 'style2':
				$template = 'amt-testimonial-2';
				break;
			default:
				$template = 'amt-testimonial-1';
				break;
		}

		return $this->amt_template($template, $data);
	}
}
