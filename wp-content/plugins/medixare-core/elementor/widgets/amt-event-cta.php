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

class AMT_EVENT_CTA extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('Amt Event CTA', 'medixare-core');
		$this->amt_base = 'amt-event-cta';
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
				'type' 	=> Controls_Manager::SELECT,
				'id'    => 'event_date',
				'label' => esc_html__('Select date', 'medixare-core'),
				'options' => [
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3', 'medixare-core'),
					'4' => esc_html__('4', 'medixare-core'),
					'5' => esc_html__('5', 'medixare-core'),
					'6' => esc_html__('6', 'medixare-core'),
					'7' => esc_html__('7', 'medixare-core'),
					'8' => esc_html__('8', 'medixare-core'),
					'9' => esc_html__('9', 'medixare-core'),
					'10' => esc_html__('10', 'medixare-core'),
					'11' => esc_html__('11', 'medixare-core'),
					'12' => esc_html__('12', 'medixare-core'),
					'13' => esc_html__('13', 'medixare-core'),
					'14' => esc_html__('14', 'medixare-core'),
					'15' => esc_html__('15', 'medixare-core'),
					'16' => esc_html__('16', 'medixare-core'),
					'17' => esc_html__('17', 'medixare-core'),
					'18' => esc_html__('18', 'medixare-core'),
					'19' => esc_html__('19', 'medixare-core'),
					'20' => esc_html__('20', 'medixare-core'),
					'21' => esc_html__('21', 'medixare-core'),
					'22' => esc_html__('22', 'medixare-core'),
					'23' => esc_html__('23', 'medixare-core'),
					'24' => esc_html__('24', 'medixare-core'),
					'25' => esc_html__('25', 'medixare-core'),
					'26' => esc_html__('26', 'medixare-core'),
					'27' => esc_html__('27', 'medixare-core'),
					'28' => esc_html__('28', 'medixare-core'),
					'29' => esc_html__('29', 'medixare-core'),
					'30' => esc_html__('30', 'medixare-core'),
					'31' => esc_html__('31', 'medixare-core'),
				],
				'default' => '23',
			),
			array(
				'type' => Controls_Manager::SELECT,
				'id'      => 'select_month',
				'label' => esc_html__('Select Month', 'medixare-core'),
				'options' => [
					'JAN' => esc_html__('JAN', 'medixare-core'),
					'FEB' => esc_html__('FEB', 'medixare-core'),
					'MAR' => esc_html__('MAR', 'medixare-core'),
					'APR' => esc_html__('APR', 'medixare-core'),
					'MAY' => esc_html__('MAY', 'medixare-core'),
					'JUN' => esc_html__('JUN', 'medixare-core'),
					'JUL' => esc_html__('JUL', 'medixare-core'),
					'AUG' => esc_html__('AUG', 'medixare-core'),
					'SEP' => esc_html__('SEP', 'medixare-core'),
					'OCT' => esc_html__('OCT', 'medixare-core'),
					'NOV' => esc_html__('NOV', 'medixare-core'),
					'DEC' => esc_html__('DEC', 'medixare-core'),
				],
				'default' => 'JAN',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-part-1',
				'label'   => esc_html__('Title part 1', 'medixare-core'),
				'default' => "Jogging for the",
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-part-2',
				'label'   => esc_html__('Title part 2', 'medixare-core'),
				'default' => ' Best Services ',
			),

			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'event_excerpt_display',
				'label'       => esc_html__('Event Excerpt Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'event_excerpt',
				'label'   => esc_html__('Text', 'medixare-core'),
				'default' => 'Mediva provides assisted living, different types of care, good fit for seniors, little cost, and modern practicality.',
				'condition'   => array(
					'event_excerpt_display' => 'yes',
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
				'id'      => 'amt-event-button',
				'label'   => esc_html__('Button Text', 'medixare-core'),
				'default' => 'See More',
				'condition' => array('button_display' => array('yes')),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'event_link_url',
				'label'   => esc_html__('Button URL', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
				'condition' => array('button_display' => array('yes')),
			),
			array(
				'mode' => 'section_end',
			),

			/*Date Style*/
			array(
				'mode'    => 'section_start',
				'id'      => 'event_general',
				'label'   => esc_html__('General', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_section_bg',
				'label'   => esc_html__('Event Background', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-event__item' => 'background: {{VALUE}};',
				],
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'event_section_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-event__shadow .amt-event__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'event_section_margin',
				'label' => esc_html__('Margin', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-event__shadow .amt-event__item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'event_section_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-event__shadow .amt-event__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'event_date_style',
				'label'   => esc_html__('Event Date', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'date_align',
				'label'   => esc_html__('Alignment', 'medixare-core'),
				'options' => array(
					'flex-start' => array(
						'title' => __('Left', 'elementor'),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					),
					'flex-end' => array(
						'title' => __('Right', 'elementor'),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => 'flex-start',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date' => 'justify-content : {{VALUE}};',
				),

			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_event_normal',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_event_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_day_bg_color',
				'label'   => esc_html__('Background', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'event_date_typo',
				'label'   => esc_html__('Date', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-event__date .event_date_box .event_date',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_date_color',
				'label'   => esc_html__('Date', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box .event_date' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'event_day_typo',
				'label'   => esc_html__('Day', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-event__date .event_date_box .event_month',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_day_color',
				'label'   => esc_html__('Day', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box .event_month' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'event_date_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-event__date .event_date_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'   => 'event_date_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .amt-event__date .event_date_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_event_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_day_bg_color_hover',
				'label'   => esc_html__('Background', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box:hover' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_date_color_hover',
				'label'   => esc_html__('Date', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box:hover .event_date' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'event_day_color_hover',
				'label'   => esc_html__('Day', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__date .event_date_box:hover .event_month' => 'color: {{VALUE}}',
				),
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
				'id'      => 'sec_title_style',
				'label'   => esc_html__('Content', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'event_title_heading',
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_part_1_typo',
				'label'   => esc_html__('Part 1', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper .amt-event__title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_part_1_color',
				'label'   => esc_html__('Color 1', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper .amt-event__title' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_part_2_typo',
				'label'   => esc_html__(' Part 2 ', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper .amt-event__title span',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_part_2_color',
				'label'   => esc_html__('Color 2', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper .amt-event__title span' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'title_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper .amt-event__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'excerpt_desc_heading',
				'label' => esc_html__('Excerpt', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'event_excerpt_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper p',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '#5e5f6b',
				'selectors' => array(
					'{{WRAPPER}} .amt-event__shadow .amt-event__title-wrapper p' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Button Style //
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array('button_display' => array('yes')),
			),
			// Button Style Normal 
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
				'selector' => '{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a'  => 'color: {{VALUE}};',
				],
				'default' => 'var(--primary_color)',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a' => 'background-color: {{VALUE}};',
				],
				'default' => '#fff',
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
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a' => 'border-style: {{VALUE}};',
				],
				'default' => 'solid',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a ',
			),
			array(
				'mode' => 'tab_end',
			),
			// Button Style Hover 
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
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a:hover'  => 'color: {{VALUE}};',
				],
				'default' => '#FFF',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover-color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a:hover' => 'background-color: {{VALUE}};',
				],
				'default' => 'var(--primary_color)',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color_hover',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a:hover' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'hover-box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amr_event_bitton .amt-evnet-btn-wrapper a:hover',
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
				'condition' => array('button_display' => array('yes')),
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
		$template = 'amt-event-cta';
		return $this->amt_template($template, $data);
	}
}
