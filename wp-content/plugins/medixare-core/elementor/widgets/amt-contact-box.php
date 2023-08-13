<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if (!defined('ABSPATH')) exit;

class AMT_Contact_Box extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Contact Box', 'medixare-core');
		$this->amt_base = 'amt-contact-box';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__('Service Style', 'medixare-core'),
				'options' => array(
					'style1' => esc_html__('Service Style 1', 'medixare-core'),
					'style2' => esc_html__('Service Style 2', 'medixare-core'),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'label'   => esc_html__('Single Item Alignment', 'medixare-core'),
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
					'justify' => array(
						'title' => __('Justified', 'elementor'),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => 'left',
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__info-box' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} h3.tp-contact__title' => 'text-align: {{VALUE}};',
				),
				'condition'   => array(
					'style' => 'style1',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'contact-title',
				'label'   => esc_html__('Contact Title', 'medixare-core'),
				'default' => esc_html__('New York Office'),
				'condition'   => array(
					'style' => 'style1',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-1',
				'label'   => esc_html__('Title part 1', 'medixare-core'),
				'default' => "Book",
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-2',
				'label'   => esc_html__('Title part 2', 'medixare-core'),
				'default' => 'appointment',
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-3',
				'label'   => esc_html__('Title part 3', 'medixare-core'),
				'condition'   => array(
					'style' => 'style2',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'title_display',
				'label'       => esc_html__('Sub-titles Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_address',
				'label'   => esc_html__('Address', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'address-icon',
				'label'   => esc_html__('Icon', 'medixare-core'),
				'default' => [
					'value' => 'fa fa-location-dot',
					'library' => 'fa-solid',
				],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'address-title',
				'label'   => esc_html__('Title', 'medixare-core'),
				'default' => esc_html__('New York Office'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'address',
				'label'   => esc_html__('Address', 'medixare-core'),
				'default' => esc_html__('Australia Square, George Street,
                Sydney NSW, Australia', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'address_url',
				'label'   => esc_html__('Address URL', 'medixare-core'),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_email',
				'label'   => esc_html__('Emails', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'email-icon',
				'label'   => esc_html__('Icon', 'medixare-core'),
				'default' => [
					'value' => 'fa fa-envelope',
					'library' => 'fa-solid',
				],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email-title',
				'label'   => esc_html__('Title', 'medixare-core'),
				'default' => esc_html__('New York Office'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email-1',
				'label'   => esc_html__('Email-1', 'medixare-core'),
				'default' => esc_html__('support@infowebmail.com', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'email-2',
				'label'   => esc_html__('Email-2', 'medixare-core'),
				'default' => esc_html__('support@infowebmail.com', 'medixare-core'),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_phone',
				'label'   => esc_html__('Phone Numbers', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'phone-icon',
				'label'   => esc_html__('Icon', 'medixare-core'),
				'default' => [
					'value' => 'fa fa-mobile-screen-button',
					'library' => 'fa-solid',
				],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'number-title',
				'label'   => esc_html__('Title', 'medixare-core'),
				'default' => esc_html__('New York Office'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone-1',
				'label'   => esc_html__('Phone 1', 'medixare-core'),
				'default' => esc_html__('+(224) 762 442 32', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'phone-2',
				'label'   => esc_html__('Phone 2', 'medixare-core'),
				'placeholder' 	  => esc_html__('+ 805 920 71 33', 'medixare-core'),
				'default'     => '+(224) 762 442 32',
			),
			array(
				'mode' => 'section_end',
			),
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__('Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'section_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-contact-from__section_1' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .amt-contact__section_2' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'contact_section_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-contact__section_2 .tp-contact__from-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
					'{{WRAPPER}} .amt-contact-from__section_1 .tp-contact__info-box-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title-heading',
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-contact__title',
				'condition' => ['style' => 'style1'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_2',
				'label'   => esc_html__('Part 1', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-contact__section_2 .amt-section__title',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color_2',
				'label'   => esc_html__('Color 1', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-contact__section_2 .amt-section__title' => 'color: {{VALUE}}',
				),
				'condition' => ['style' => 'style2'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_3',
				'label'   => esc_html__('Part 2', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-contact__section_2 .amt-section__title span',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color_3',
				'label'   => esc_html__('Color 2', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-contact__section_2 .amt-section__title span' => 'color: {{VALUE}}',
				),
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__title' => 'color: {{VALUE}}',
				),
				'condition' => ['style' => 'style1'],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'contact_title_margin',
				'label' => esc_html__('Margin', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-section__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .tp-contact__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'subtitle-heading',
				'label' => esc_html__('Sub-title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-contact__info-title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub_title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__info-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'sub_title_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'info-heading',
				'label' => esc_html__('Informations', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'info_typo',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .tp-contact__info-box a',
				'condition' => ['style' => 'style1'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'info_typo2',
				'label'   => esc_html__('Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-contact__section_2 .tp-contact__info-title-wrapper span a',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'info_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__info-box a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-contact__section_2 .tp-contact__info-title-wrapper span a' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'abs_icon_style',
				'label'   => esc_html__('Icons Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'abs-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Size', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-2 i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tp-contact__info-icon span i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_margin',
				'label'   => esc_html__('Text Indent', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-2 ' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tp-contact__info-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'contact_title_margin_box',
				'label' => esc_html__('Item Spacing', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-contact__section_2 .tp-contact__info-box-2' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
				],
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'icon_padding',
				'label'   => __('Padding', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .tp-contact__info-icon-2 i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					'{{WRAPPER}} .tp-contact__info-icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'icon_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-contact__section_2 .tp-contact__info-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => array('style' => 'style2'),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_abs-1',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-2 i' => 'color: {{VALUE}};',
					// '{{WRAPPER}} .tp-contact__info-icon span i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color-2',
				'label'   => esc_html__('Color 1', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-color-1 i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color-3',
				'label'   => esc_html__('Color 2', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-color-2 i' => 'color: {{VALUE}};',
				],
				'default' => '#5bb286',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color-4',
				'label'   => esc_html__('Color 3', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-color-3 i' => 'color: {{VALUE}};',
				],
				'default' => '#ff9b40',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon' => 'background-color: {{VALUE}};',
				],
				'condition' => ['style' => 'style2'],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color_hover',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon-2 i:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tp-contact__info-icon:hover span i' => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_bg_color_hover',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-contact__info-icon:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => ['style' => 'style2'],
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

		switch ($data['style']) {
			case 'style2':
				$template = 'amt-contact-box-2';
				break;
			default:
				$template = 'amt-contact-box';
				break;
		}

		return $this->amt_template($template, $data);
	}
}
