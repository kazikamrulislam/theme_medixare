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
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;

if (!defined('ABSPATH')) exit;

class AMT_Title extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Section Title', 'medixare-core');
		$this->amt_base = 'amt-title';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('Title Content', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__('Section Title Style', 'medixare-core'),
				'options' => array(
					'style1' => esc_html__('Title Style 1', 'medixare-core'),
					'style2' => esc_html__('Title Style 2', 'medixare-core'),
					'style3' => esc_html__('Title Style 3', 'medixare-core'),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__('Alignment', 'medixare-core'),
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
					'{{WRAPPER}} .common-text-align' => 'text-align : {{VALUE}};',
				),
				'condition'   => array(
					'style' => 'style1',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'subtitle_display',
				'label'       => esc_html__('Sub-title Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition'   => array(
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'sub_title',
				'label'   => esc_html__('Sub Title', 'medixare-core'),
				'default' => 'Medixare services',
				'condition'   => array(
					'subtitle_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'label' => esc_html__('Title Shape', 'medixare-core'),
				'id'	=> 'shape_display',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__('Yes', 'medixare-core'),
					'no' => esc_html__('No', 'medixare-core'),
				],
				'frontend_available' => true,
				'condition'   => array('style' => array('style2')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-1',
				'label'   => esc_html__('Title part 1', 'medixare-core'),
				'default' => "Welcome To Medixare's",
				'condition'   => array(
					'style' => ['style1', 'style3'],
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-2',
				'label'   => esc_html__('Title part 2', 'medixare-core'),
				'default' => 'Best Services ',
				'condition'   => array(
					'style' => ['style1', 'style3'],
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-3',
				'label'   => esc_html__('Title part 3', 'medixare-core'),
				'condition'   => array(
					'style' => ['style1', 'style3'],
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-4',
				'label'   => esc_html__('Title part 1', 'medixare-core'),
				'default' => "Impartial",
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-5',
				'label'   => esc_html__('Title part 2', 'medixare-core'),
				'default' => 'Care',
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-6',
				'label'   => esc_html__('Title part 3', 'medixare-core'),
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__('Content Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition'   => array('style' => 'style1'),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text',
				'label'   => esc_html__('Text', 'medixare-core'),
				'default' => 'Mediva provides assisted living, different types of care, good fit for seniors, little cost, and modern practicality.',
				'condition'   => array(
					'content_display' => 'yes',
					'style' => 'style1',
				),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text2',
				'label'   => esc_html__('Text', 'medixare-core'),
				'default' => 'We are best home care service provider',
				'condition'   => array('style' => 'style2'),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_2',
				'label'   => esc_html__('Button', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__('Button Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition' => ['style' => ['style1', 'style3']],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt-button',
				'label'   => esc_html__('Button Text', 'medixare-core'),
				'default' => 'See More',
				'condition' => array('button_display' => array('yes')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'arrow_display',
				'label'       => esc_html__('Arrow Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'link_url',
				'label'   => esc_html__('Button URL', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('button_display' => array('yes')),
			),
			array(
				'mode' => 'section_end',
			),

			/*title section*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__('Content', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_heading',
				'label' => esc_html__('Sub-title', 'medixare-core'),
				'separator' => 'before',
				'condition'   => array(
					'subtitle_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_shape_color',
				'label'   => esc_html__('Shape Color', 'medixare-core'),
				'default' => '#ff4460',
				'selectors' => array(
					'{{WRAPPER}} .amt-section__subtitle.has-circle-border:before' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .amt-section__title2.has-border::before' => 'border-color: {{VALUE}}',
				),
				'condition'   => array(
					'subtitle_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Sub Title Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section__subtitle',
				'condition'   => array(
					'subtitle_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__('Sub Title Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-section__subtitle' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'subtitle_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_heading',
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__('part 1', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section__title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-1',
				'label'   => esc_html__('Color 1', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-section__title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-section__title2' => 'color: {{VALUE}}',
				),
			),

			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_2',
				'label'   => esc_html__('part 2', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section__title span',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-2',
				'label'   => esc_html__('Color 2', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-section__title span' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-section__title2 span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'title_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-section-title-holder .amt-section__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .amt-section__title2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'text_heading',
				'label' => esc_html__('Description', 'medixare-core'),
				'separator' => 'before',
				'condition'   => array(
					'content_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section-title-holder .amt-section__title_wrapper p, .amt-section__details p',
				'condition'   => array(
					'content_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-section-title-holder .amt-section__title_wrapper p' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-section__details p' => 'color: {{VALUE}}',
				),
				'condition'   => array(
					'content_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'description_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-section-title-holder .amt-section__title_wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .amt-section__details p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'condition'   => array(
					'content_display' => 'yes',
					'style' => ['style1', 'style2'],
				),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array('button_display' => array('yes')),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_button_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'button-text-size',
				'label'   => esc_html__('Text', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn, .amt-section__details .title-btn-2',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .amt-section__details .title-btn-2'  => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_icon_color',
				'label'   => esc_html__('Icon Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .title-btn-2 i'  => 'color: {{VALUE}};',
				],
				'condition' => array('style' => 'style2'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'btn_border_style',
				'label' => esc_html__('Border Type', 'medixare-core'),
				'options' => [
					'solid'  => esc_html__('Solid', 'medixare-core'),
					'dashed' => esc_html__('Dashed', 'medixare-core'),
					'dotted' => esc_html__('Dotted', 'medixare-core'),
					'double' => esc_html__('Double', 'medixare-core'),
					'none' => esc_html__('None', 'medixare-core'),
				],
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn' => 'border-color: {{VALUE}};',
				],
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'icon_padding',
				'label' => esc_html__('Icon Spacing', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .title-btn-2 i' => 'margin-left:{{SIZE}}{{UNIT}};',
				],
				'condition' => array('style' => 'style2'),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'btn_padding2',
				'label' => esc_html__('Button Spacing', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .title-btn-2' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => array('style' => 'style2'),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn ',
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_button_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text-hover_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn:hover'  => 'color: {{VALUE}};',
					'{{WRAPPER}} .amt-section__details .title-btn-2:hover'  => 'color: {{VALUE}};',
				],
				// 'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text-arrow-hover_color',
				'label'   => esc_html__('Arrow Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section__details .title-btn-2:hover i'  => 'color: {{VALUE}};',
				],
				'condition' => array('style' => 'style2'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover-color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff9b40',
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color_hover',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => array('style' => ['style1', 'style3']),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'hover-box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-section-title-holder .amt-secondary-btn:hover',
				'condition' => array('style' => ['style1', 'style3']),
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

			// Animation style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_animation_style',
				'label'   => esc_html__('Button Animation', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'button_display' => array('yes'),
					'style' => ['style1', 'style3'],
				),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'animation',
				'label'   => esc_html__('Animation', 'medixare-core'),
				'options' => array(
					'wow'        => esc_html__('On', 'medixare-core'),
					'hide'        => esc_html__('Off', 'medixare-core'),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__('Entrance Animation', 'medixare-core'),
				'options' => array(
					'none' => esc_html__('none', 'medixare-core'),
					'bounce' => esc_html__('bounce', 'medixare-core'),
					'flash' => esc_html__('flash', 'medixare-core'),
					'pulse' => esc_html__('pulse', 'medixare-core'),
					'rubberBand' => esc_html__('rubberBand', 'medixare-core'),
					'shakeX' => esc_html__('shakeX', 'medixare-core'),
					'shakeY' => esc_html__('shakeY', 'medixare-core'),
					'headShake' => esc_html__('headShake', 'medixare-core'),
					'swing' => esc_html__('swing', 'medixare-core'),
					'fadeIn' => esc_html__('fadeIn', 'medixare-core'),
					'fadeInDown' => esc_html__('fadeInDown', 'medixare-core'),
					'fadeInLeft' => esc_html__('fadeInLeft', 'medixare-core'),
					'fadeInRight' => esc_html__('fadeInRight', 'medixare-core'),
					'fadeInUp' => esc_html__('fadeInUp', 'medixare-core'),
					'bounceIn' => esc_html__('bounceIn', 'medixare-core'),
					'bounceInDown' => esc_html__('bounceInDown', 'medixare-core'),
					'bounceInLeft' => esc_html__('bounceInLeft', 'medixare-core'),
					'bounceInRight' => esc_html__('bounceInRight', 'medixare-core'),
					'bounceInUp' => esc_html__('bounceInUp', 'medixare-core'),
					'slideInDown' => esc_html__('slideInDown', 'medixare-core'),
					'slideInLeft' => esc_html__('slideInLeft', 'medixare-core'),
					'slideInRight' => esc_html__('slideInRight', 'medixare-core'),
					'slideInUp' => esc_html__('slideInUp', 'medixare-core'),
				),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'animation_delay',
				'label'   => esc_html__('Delay', 'medixare-core'),
				'default' => '0.5',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'ani_duration',
				'label'   => esc_html__('Animation Duration', 'medixare-core'),
				'default' => '1',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render()
	{
		$data = $this->get_settings();

		switch ($data['style']) {
			case 'style3':
				$template = 'amt-title-3';
				break;
			case 'style2':
				$template = 'amt-title-2';
				break;
			default:
				$template = 'amt-title';
				break;
		}

		return $this->amt_template($template, $data);
	}
}
