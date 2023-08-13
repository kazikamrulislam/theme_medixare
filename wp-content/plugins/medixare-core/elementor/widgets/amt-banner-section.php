<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme_Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Background;


if (!defined('ABSPATH')) exit;

class AMT_Banner_Section extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Banner Section', 'medixare-core');
		$this->amt_base = 'amt-banner-section';
		parent::__construct($data, $args);
	}
	public function amt_fields()
	{
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('Description', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'subtitle_display',
				'label'       => esc_html__('Sub-title Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'sub_title',
				'label'   => esc_html__('Sub Title', 'medixare-core'),
				'default' => 'Medixare services',
				'condition'   => array(
					'subtitle_display' => 'yes',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'title_display',
				'label'       => esc_html__('Title Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-1',
				'label'   => esc_html__('Title part 1', 'medixare-core'),
				'default' => "Live in care your",
				'condition'   => array(
					'title_display' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-2',
				'label'   => esc_html__('Title part 2', 'medixare-core'),
				'default' => 'Family will love ',
				'condition'   => array(
					'title_display' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-3',
				'label'   => esc_html__('Title part 3', 'medixare-core'),
				'condition'   => array(
					'title_display' => 'yes',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__('Content Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text',
				'label'   => esc_html__('Text', 'medixare-core'),
				'default' => 'Mediva provides assisted living, different types of care, good fit for seniors, little cost, and modern practicality.',
				'condition'   => array(
					'content_display' => 'yes',
				),
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
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt-button',
				'label'   => esc_html__('Button Text', 'medixare-core'),
				'default' => 'MORE INFORMATION',
				'condition' => array('button_display' => array('yes')),
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
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_3',
				'label'   => esc_html__('Contact Info', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'contact_info_display',
				'label'       => esc_html__('Contact Info', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'bottom-icon',
				'label'   => esc_html__('Icon', 'medixare-core'),
				'default' => [
					'value' => 'fa fa-envelope',
					'library' => 'fa-solid',
				],
				'condition' => ['contact_info_display' => 'yes'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'contact-title',
				'label'   => esc_html__('Title', 'medixare-core'),
				'default' => 'Medixare services',
				'condition' => ['contact_info_display' => 'yes'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone',
				'label'   => esc_html__('Phone', 'medixare-core'),
				'default' => esc_html__('+(224) 762 442 32', 'medixare-core'),
				'condition' => ['contact_info_display' => 'yes'],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email',
				'label'   => esc_html__('Email', 'medixare-core'),
				'default' => esc_html__('support@infowebmail.com', 'medixare-core'),
				'condition' => ['contact_info_display' => 'yes'],
			),
			array(
				'mode' => 'section_end',
			),
			//styles

			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style_1',
				'label'   => esc_html__('General', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array('classic', 'gradient'),
				'name'    => 'title_color',
				'fields_options' => [
					'background' => [
						'label' => esc_html('Custom Background', 'medixare-core'),
						'default' => 'classic',
					],
					'image' => [
						'label' => esc_html('Custom image', 'medixare-core'),
					],
				],
				'selector' => '{{WRAPPER}} .amt-hero__section',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'hero_section_padding',
				'label'   => __('Padding', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-hero__section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'bg_overlay_colors',
				'label' => esc_html__('Background Overlay', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'overlay-1',
				'label'   => esc_html__('Color 1', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'overlay-2',
				'label'   => esc_html__('Color 2', 'medixare-core'),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style_2',
				'label'   => esc_html__('Content', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_heading',
				'label' => esc_html__('Sub-title', 'medixare-core'),
				'separator' => 'before',
				'condition' => array('subtitle_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_shape_color',
				'label'   => esc_html__('Shape Color', 'medixare-core'),
				'default' => '#ff4460',
				'selectors' => array(
					'{{WRAPPER}} .tp-section__subtitle.has-circle-border:before' => 'background-color: {{VALUE}}',
				),
				'condition' => array('subtitle_display' => array('yes')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Sub Title Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-section__subtitle',
				'condition' => array('subtitle_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__('Sub Title Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .tp-section__subtitle' => 'color: {{VALUE}}',
				),
				'default' => '#74696b',
				'condition' => array('subtitle_display' => array('yes')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_heading',
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__('Bold part', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-hero__title',
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-1',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '#fff',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__title' => 'color: {{VALUE}}',
				),
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_2',
				'label'   => esc_html__(' Normal part', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-hero__title span',
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-2',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__title span' => 'color: {{VALUE}}',
				),
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'title_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
				'condition' => array('title_display' => array('yes')),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'text_heading',
				'label' => esc_html__('Description', 'medixare-core'),
				'separator' => 'before',
				'condition' => array('content_display' => array('yes')),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-hero-title-wrapper p',
				'condition' => array('content_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '#d0d0d0',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero-title-wrapper p' => 'color: {{VALUE}}',
				),
				'condition' => array('content_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'description_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-hero__section .tp-hero-title-wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
				'condition' => array('content_display' => array('yes')),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array('button_display' => array('yes'),),
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
				'selector' => '{{WRAPPER}} .amt-hero__section .tp-secondary-btn',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn'  => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff9b40',
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
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-hero__section .tp-secondary-btn ',
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
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn:hover'  => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover-color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '#ff4460',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color_hover',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-secondary-btn:hover' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'hover-box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-hero__section .tp-secondary-btn:hover',
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
				'condition' => array('button_display' => array('yes'),),
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
			array(
				'mode'    => 'section_start',
				'id'      => 'contact_info_style',
				'label'   => esc_html__('Contact Info', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => ['contact_info_display' => 'yes'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'contact_box_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__contact-info' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'contact_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-hero__section .tp-hero__contact-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'contact_box__padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-hero__contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'contact_title_typo',
				'label'   => esc_html__('Title Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-hero__contact-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'contact_title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '#74696b',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__contact-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'responsive',
				'id'      => 'contact-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Icon Size', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .tp-hero__contact-title span i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'contact_icon_color',
				'label'   => esc_html__('Icon Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-hero__contact-title span i' => 'color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'divider_width',
				'label' => esc_html__('Divider width', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-hero__contact-title' => 'border-width: 0  {{SIZE}}{{UNIT}} 0 0;',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'contact_title_border_color',
				'label'   => esc_html__('Divider Color', 'medixare-core'),
				'default' => '#74696b',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__contact-title' => 'border-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'contact_info_typo',
				'label'   => esc_html__('contact details', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-hero__contact-action a',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'contact_info_color',
				'label'   => esc_html__('contact details Color', 'medixare-core'),
				'default' => '#74696b',
				'selectors' => array(
					'{{WRAPPER}} .tp-hero__contact-action a' => 'color: {{VALUE}}',
				),
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
		$template = 'amt-banner-section';
		return $this->amt_template($template, $data);
	}
}
