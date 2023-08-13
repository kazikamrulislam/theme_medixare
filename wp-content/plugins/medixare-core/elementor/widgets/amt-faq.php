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
use Elementor\Utils;

use MedixareTheme;
use MedixareTheme_Helper;

if (!defined('ABSPATH')) exit;
class AMT_FAQ extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT FAQ', 'medixare-core');
		$this->amt_base = 'amt-faq';
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'faq-title',
			array(
				'label' => esc_html__('Text', 'medixare-core'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('#Title', 'medixare-core'),
				'default' => esc_html__('#Title', 'medixare-core'),
				'dynamic' => [
					'active' => true,
				],
			)
		);
		$repeater->add_control(
			'faq-content',
			array(
				'label' => esc_html__('Content', 'medixare-core'),
				'type' => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__('A dedicated product design team can help you achieve your business goals. Whether you need to craft an idea for a completely new product or elevate the quality of an existing solution, we’ll help you to create a product that is laser targeted to your users’ needs and delivers business results.', 'medixare-core'),
				'dynamic' => [
					'active' => true,
				],
			)
		);
		$repeater->add_control(
			'selected_icon',
			[
				'label' => esc_html__('Icon', 'elementor'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'after',
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-arrow' . (is_rtl() ? '-right' : '-down'),
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-down',
						'angle-down',
						'angle-double-down',
						'caret-down',
						'caret-square-down',
					],
					'fa-regular' => [
						'caret-square-down',
					],
				],
				'label_block' => false,
				'skin' => 'inline',
			]
		);
		$repeater->add_control(
			'selected_active_icon',
			[
				'label' => esc_html__('Active Icon', 'elementor'),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon_active',
				'default' => [
					'value' => 'fas fa-arrow' . (is_rtl() ? '-right' : '-up'),
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'chevron-up',
						'angle-up',
						'angle-double-up',
						'caret-up',
						'caret-square-up',
					],
					'fa-regular' => [
						'caret-square-up',
					],
				],
				'skin' => 'inline',
				'label_block' => false,
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),

			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'faq_items',
				'label'   => esc_html__('Faq Items', 'medixare-core'),
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'faq-title' => esc_html__('Title', 'medixare-core'),
						'faq-content' => esc_html__('Sharing Marketing Agency Website Landing Page UI Design. This design is suitable for marketing agency', 'medixare-core'),

					]
				],
			),
			array(
				'mode' => 'section_end',
			),
			// Style Tab

			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'sec_style_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::SLIDER,
				'id'      => 'divider_width-1',
				'label' => esc_html__('Border', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-custom-accordio .accordion-item' => 'border-width: {{SIZE}}{{UNIT}} ;',
				],
			),
			array(
				'type' => Controls_Manager::COLOR,
				'id'      => 'divider_color-1',
				'label' => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .tp-custom-accordio .accordion-item' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'faq_border_radius',
				'label' => esc_html__( 'Border Radius', 'medixare-core' ),
				'selectors' => [
					'{{WRAPPER}} .tp-custom-accordio .accordion-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
				'id' => 'acc_padding',
	            'size_units' => [ 'px', '%', 'em' ],
	            'label'   => __( 'Padding', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .tp-custom-accordio .accordion-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                '{{WRAPPER}} .tp-custom-accordio .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ),
	            'separator' => 'before',
	        ),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
				'id' => 'acc_margin',
	            'size_units' => [ 'px', '%', 'em' ],
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .tp-custom-accordio .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'sec_style',
				'label'   => esc_html__('Title', 'medixare-core'),
			),
			array(
				'type' 		=> Controls_Manager::COLOR,
				'id'      	=> 'icon_color',
				'label' 	=> esc_html__('Icon Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .arrow .faq-toggle-icon-closed i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .arrow .faq-toggle-icon-opened i' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460'
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
					'name'    => 'acc_title_typo',
					'label'   => esc_html__('Typography', 'medixare-core'),
					'selector' => '{{WRAPPER}} .accordion-wrapper h2 .accordion-button',
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'accordian_title_color',
					'label'   => esc_html__('Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper h2 .accordion-button.collapsed ' => 'color: {{VALUE}};',
					],
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'accordian_title_background',
					'label'   => esc_html__('Background', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper .accordion-button.collapsed' => 'background-color: {{VALUE}};',
					],
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
					'id'      => 'accordian_title_color_hover',
					'label'   => esc_html__('Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper h2 .accordion-button.collapsed:hover ' => 'color: {{VALUE}};',
					],
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'accordian_title_background_hover',
					'label'   => esc_html__('Background', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper .accordion-button.collapsed:hover' => 'background-color: {{VALUE}};',
					],
				),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_button_active',
				'label'   => esc_html__('Active', 'medixare-core'),
			),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'accordian_title_background_active',
					'label'   => esc_html__('Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper .accordion-button:not(.collapsed)' => 'color: {{VALUE}};',
					],
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'accordian_title_background_active_2',
					'label'   => esc_html__('Background', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .accordion-wrapper .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}};',
					],
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
				'tab'     => Controls_Manager::TAB_STYLE,
				'id'      => 'sec_acc_para',
				'label'   => esc_html__('Description', 'medixare-core'),
			),
				array(
					'mode'    	=> 'group',
					'type'    	=> Group_Control_Typography::get_type(),
					'name'    	=> 'acc_desc_typo',
					'label'   	=> esc_html__('Typography', 'medixare-core'),
					'selector' 	=> '{{WRAPPER}} .tp-custom-accordio .accordion-body',
				),
				array(
					'type'    	=> Controls_Manager::COLOR,
					'id'      	=> 'accordian_body_color',
					'label'   	=> esc_html__('Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-custom-accordio .accordion-body ' => 'color: {{VALUE}};',
					],
				),
				array(
					'mode'    	=> 'responsive',
					'type' 		=> Controls_Manager::SLIDER,
					'id'     	=> 'divider_width',
					'label' 	=> esc_html__('Border Width', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-custom-accordio .accordion-body' => 'border-width: 0 0 {{SIZE}}{{UNIT}} 0;',
					],
				),
				array(
					'type' 		=> Controls_Manager::COLOR,
					'id'      	=> 'divider_color',
					'label' 	=> esc_html__('Border Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-custom-accordio .accordion-body' => 'border-color: {{VALUE}};',
					],
				),
				array(
					'mode'    => 'responsive',
					'type' => Controls_Manager::DIMENSIONS,
					'id'      => 'faq-desc-padding',
					'label' => esc_html__('Padding', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-custom-accordio .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
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
		$template = 'amt-faq';
		return $this->amt_template($template, $data);
	}
}
