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

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_Info_Box extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Info Box', 'medixare-core' );
		$this->amt_base = 'amt-info-box';
		parent::__construct( $data, $args );
	}
    public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
            array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'title_display',
				'label'       => esc_html__( 'Title Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
            array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
            array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'button_display',
				'label'       => esc_html__( 'Button Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
            array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_1',
				'label'   => esc_html__( 'Box 1', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'about-icon',
				'label'   => esc_html__( 'Icon', 'medixare-core' ),
				'default' => [
                    'value' => 'fa fa-envelope',
                    'library' => 'fa-solid',
                ],
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-1',
				'label'   => esc_html__( 'Title part 1', 'medixare-core' ),
				'default' => "Welcome To Medixare's",
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-2',
				'label'   => esc_html__( 'Title part 2', 'medixare-core' ),
				'default' => 'Best Services ',
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-3',
				'label'   => esc_html__( 'Title part 3', 'medixare-core' ),
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text-1',
				'label'   => esc_html__( 'Text', 'medixare-core' ),
				'default' => 'Mediva provides assisted living, different types of care, good fit for seniors, little cost, and modern practicality.',
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt-button',
				'label'   => esc_html__( 'Button Text', 'medixare-core' ),
				'default' => 'See More',
				'condition' => array( 'button_display' => array( 'yes' ) ),
			),		
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'link_url',
				'label'   => esc_html__( 'Button URL', 'medixare-core' ),
				'placeholder' => 'https://your-link.com',
				'condition' => array( 'button_display' => array( 'yes' ) ),
			),	
            array(
				'mode' => 'section_end',
			),
            array(
				'mode'    => 'section_start',
				'id'      => 'sec_general_2',
				'label'   => esc_html__( 'Box 2', 'medixare-core' ),
			),
            array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'story-icon',
				'label'   => esc_html__( 'Icon', 'medixare-core' ),
				'default' => [
                    'value' => 'fa fa-envelope',
                    'library' => 'fa-solid',
                ],
			),
            array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-4',
				'label'   => esc_html__( 'Title part 1', 'medixare-core' ),
				'default' => "Welcome To Medixare's",
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-5',
				'label'   => esc_html__( 'Title part 2', 'medixare-core' ),
				'default' => 'Best Services ',
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title-6',
				'label'   => esc_html__( 'Title part 3', 'medixare-core' ),
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
            array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'text-2',
				'label'   => esc_html__( 'Text', 'medixare-core' ),
				'default' => 'Mediva provides assisted living, different types of care, good fit for seniors, little cost, and modern practicality.',
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
			),
            array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt-button-1',
				'label'   => esc_html__( 'Button Text', 'medixare-core' ),
				'default' => 'See More',
				'condition' => array( 'button_display' => array( 'yes' ) ),
			),		
			array(
				'type'    => Controls_Manager::URL,
				'id'      => 'link2_url',
				'label'   => esc_html__( 'Button URL', 'medixare-core' ),
				'placeholder' => 'https://your-link.com',
				'condition' => array( 'button_display' => array( 'yes' ) ),
			),	
            array(
				'mode' => 'section_end',
			),
            array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_box_style',
	            'label'   => esc_html__( 'General', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box1_bg_color',
				'label'   => esc_html__( 'Box-1 Background', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-box-bg-1 ' => 'background-color: {{VALUE}};',
                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'box2_bg_color',
				'label'   => esc_html__( 'Box-2 Background', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-box-bg-2 ' => 'background-color: {{VALUE}};',
                ],
			),
            array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'box-padding',
	            'label'   => __( 'Padding', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-about__info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	        ),
            array(
				'mode' => 'section_end',
			),
            array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_icon_style',
	            'label'   => esc_html__( 'Icon', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
            array (
				'mode'    => 'responsive',
                'id'      => 'abs-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__( 'Size', 'medixare-core' ),
                'size_units' => array('px','%'),
				'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon span i ' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'icon_margin',
				'label'   => esc_html__( 'Spacing', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'icon_padding',
	            'label'   => __( 'Padding', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-about__info-icon span i ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	        ),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_abs-1',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_normal',
				'label'   => esc_html__( 'Normal', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon span i ' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_bg_color',
				'label'   => esc_html__( 'Background Color', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon span i ' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_hover',
				'label'   => esc_html__( 'Hover', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_color_hover',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon span i:hover' => 'color: {{VALUE}};',
                ],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'abs_icon_bg_color_hover',
				'label'   => esc_html__( 'Background Color', 'medixare-core' ),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-icon span i:hover' => 'background-color: {{VALUE}};',
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
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Content', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_heading',
				'label' => esc_html__( 'Title', 'medixare-core' ),
				'separator' => 'before',
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Bold part', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-about__info-title',
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-1',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-about__info-title' => 'color: {{VALUE}}',
				),
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo_2',
				'label'   => esc_html__( ' Normal part', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-about__info-title span',
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color-2',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-about__info-title span' => 'color: {{VALUE}}',
				),
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-about__info-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
				'condition'   => array( 
					'title_display' => 'yes',
				 ),
	        ),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'text_heading',
				'label' => esc_html__( 'Description', 'medixare-core' ),
				'separator' => 'before',
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'text_typo',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-about__info-content p',
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text_color',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-about__info-content p' => 'color: {{VALUE}}',
				),
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
			),
            array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'text-title_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-about__info-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
				'condition'   => array( 
					'content_display' => 'yes',
				 ),
	        ),
	        array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__( 'Button Style', 'medixare-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array( 'button_display' => array( 'yes' ) ),
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
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Typography::get_type(),
						'name'    => 'button-text-size',
						'label'   => esc_html__( 'Text', 'medixare-core' ),
						'selector' => '{{WRAPPER}} .amt-info-btn',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_text_color',
						'label'   => esc_html__( 'Text Color', 'medixare-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-info-btn'  => 'color: {{VALUE}};',
						],
						'default' => '#000',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_bg_color',
						'label'   => esc_html__( 'Background Color', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn' => 'background-color: {{VALUE}};',
						],
						'default' => '#fff',
					),
					array(
						'type' => Controls_Manager::SELECT,
						'id'      => 'btn_border_style',
						'label' => esc_html__( 'Border Type', 'medixare-core' ),
						'options' => [
							'solid'  => esc_html__( 'Solid', 'medixare-core' ),
							'dashed' => esc_html__( 'Dashed', 'medixare-core' ),
							'dotted' => esc_html__( 'Dotted', 'medixare-core' ),
							'double' => esc_html__( 'Double', 'medixare-core' ),
							'none' => esc_html__( 'None', 'medixare-core' ),
						],
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn' => 'border-style: {{VALUE}};',
						],
						'default' => 'none',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_border_color',
						'label'   => esc_html__( 'Border Color', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn' => 'border-color: {{VALUE}};',
						],
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_border_radius',
						'label' => esc_html__( 'Border Radius', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
						
					),
					array(
						'mode'    => 'responsive',
						'type' => Controls_Manager::DIMENSIONS,
						'id'      => 'btn_padding',
						'label' => esc_html__( 'Padding', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'box_shadow',
						'label'   => esc_html__( 'Box Shadow', 'medixare-core' ),
						'selector' => '{{WRAPPER}} .amt-info-btn ',
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
						'id'      => 'text-hover_color',
						'label'   => esc_html__( 'Text Color', 'medixare-core' ),
						'selectors' =>[
							'{{WRAPPER}} .amt-info-btn:hover'  => 'color: {{VALUE}};',
						],
						'default' => '#fff',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_bg_hover-color',
						'label'   => esc_html__( 'Background Color', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn:hover' => 'background-color: {{VALUE}};',
						],
						'default' => '#000',
					),
					array(
						'type'    => Controls_Manager::COLOR,
						'id'      => 'btn_border_color_hover',
						'label'   => esc_html__( 'Border Color', 'medixare-core' ),
						'selectors' => [
							'{{WRAPPER}} .amt-info-btn:hover' => 'border-color: {{VALUE}};',
						],
					),
					array (
						'mode'    => 'group',
						'type'    => Group_Control_Box_Shadow::get_type(),
						'name'    => 'hover-box_shadow',
						'label'   => esc_html__( 'Box Shadow', 'medixare-core' ),
						'selector' => '{{WRAPPER}} .amt-info-btn:hover',
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
	            'label'   => esc_html__( 'Button Animation', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array( 'button_display' => array( 'yes' ) ),
	        ),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'medixare-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'medixare-core' ),
					'hide'        => esc_html__( 'Off', 'medixare-core' ),
				),
				'default' => 'hide',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__( 'Entrance Animation', 'medixare-core' ),
				'options' => array(
                    'none' => esc_html__( 'none', 'medixare-core' ),
					'bounce' => esc_html__( 'bounce', 'medixare-core' ),
					'flash' => esc_html__( 'flash', 'medixare-core' ),
					'pulse' => esc_html__( 'pulse', 'medixare-core' ),
					'rubberBand' => esc_html__( 'rubberBand', 'medixare-core' ),
					'shakeX' => esc_html__( 'shakeX', 'medixare-core' ),
					'shakeY' => esc_html__( 'shakeY', 'medixare-core' ),
					'headShake' => esc_html__( 'headShake', 'medixare-core' ),
					'swing' => esc_html__( 'swing', 'medixare-core' ),					
					'fadeIn' => esc_html__( 'fadeIn', 'medixare-core' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'medixare-core' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'medixare-core' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'medixare-core' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'medixare-core' ),					
					'bounceIn' => esc_html__( 'bounceIn', 'medixare-core' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'medixare-core' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'medixare-core' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'medixare-core' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'medixare-core' ),			
					'slideInDown' => esc_html__( 'slideInDown', 'medixare-core' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'medixare-core' ),
					'slideInRight' => esc_html__( 'slideInRight', 'medixare-core' ),
					'slideInUp' => esc_html__( 'slideInUp', 'medixare-core' ), 
                ),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'animation_delay',
				'label'   => esc_html__( 'Delay', 'medixare-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'ani_duration',
				'label'   => esc_html__( 'Animation Duration', 'medixare-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),			
			array(
				'mode' => 'section_end',
			),
        );
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		$template = 'amt-info-box';
		return $this->amt_template( $template, $data );
	}
}
