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

class AMT_CONTACT_VTA extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Contact Cta', 'medixare-core');
		$this->amt_base = 'amt-contact-cta';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$fields = array(
			// Title Controll 
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('Title Content', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'amt_cta_title',
				'label'   => esc_html__('CTA Title', 'medixare-core'),
				'default' => 'Helping You Achieve Your Goals',
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
				'mode' => 'section_end',
			),
			// Button controll 
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_2',
				'label'   => esc_html__('Button', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'cta_btn_feedback',
				'label'   => esc_html__('Button 1', 'medixare-core'),
				'default' => "Feedback",
				'condition'   => array(
					'cta_btn_1' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'button_url_1',
				'label'   => esc_html__('Button Link', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('cta_btn_1' => array('yes')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cta_btn_1',
				'label'       => esc_html__('Display Button 1', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'cta_btn_contact',
				'label'   => esc_html__('Button 2', 'medixare-core'),
				'default' => 'Contact',
				'condition'   => array(
					'cta_btn_2' => 'yes',
				),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'button_url_2',
				'label'   => esc_html__('Button Link', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('cta_btn_2' => array('yes')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cta_btn_2',
				'label'       => esc_html__('Display Button 2', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'cta_btn_career',
				'label'   => esc_html__('Button 3', 'medixare-core'),
				'default' => 'Career',
				'condition'   => array(
					'cta_btn_3' => 'yes',
				),
			), array(
				'type'    => Controls_Manager::URL,
				'id'      => 'button_url_3',
				'label'   => esc_html__('Button Link', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('cta_btn_3' => array('yes')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cta_btn_3',
				'label'       => esc_html__('Display Button 3', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'link_url',
				'label'   => esc_html__('Button URL', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('button_display' => array('yes')),
				'dynamic' => [
					'active' => true,
				],
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
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt_cta__section .amt_section__title_wrapper h3.amt_section__title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-1',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt_cta__section .amt_section__title_wrapper h3.amt_section__title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'title_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt_cta__section .amt_section__title_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
			),
			array(
				'mode' => 'section_end',
			),
			// Button Style
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
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
				'selector' => '{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn'  => 'color: {{VALUE}};',
				],
				'default' => 'var(--body_dark_color);',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn' => 'background-color: {{VALUE}};',
				],
				'default' => 'var(--common_white_color)',
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
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label'   => esc_html__('Padding', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn' => 'padding: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
				],
				'allowed_dimensions' => 'vertical',
				'placeholder' => [
					'top' => '',
					'left' => 'auto',
					'bottom' => '',
					'right' => 'auto',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn',
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
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn:hover'  => 'color: {{VALUE}};',
				],
				'default' => 'var(--body_dark_color)',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover-color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn:hover' => 'background-color: {{VALUE}};',
				],
				'default' => '',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color_hover',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn:hover' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_bottom_color_hover',
				'label'   => esc_html__('Border Bottom Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn:hover::before' => 'background-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'hover-box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt_cta_btn_row .amt_cta__btn-wrapper .cta-white-btn:hover',
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
		);
		return $fields;
	}

	protected function render()
	{
		$data = $this->get_settings();
		$template = 'amt-contact-cta';
		return $this->amt_template($template, $data);
	}
}
