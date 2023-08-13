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

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_PARTNER_SLIDER extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Partner Slider', 'medixare-core' );
		$this->amt_base = 'amt-partner-slider';
		parent::__construct( $data, $args );
	}
	
	public function amt_fields(){
		

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'slider_img',
			array(
				'type'    => Controls_Manager::MEDIA,
				'label'   => __('Slider Image', 'medixare-core'),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'slider_items',
				'label'   => esc_html__('Slider Image', 'medixare-core'),
				'fields'  => $repeater->get_controls(),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
			),
			array(
                'mode' => 'group',
                'type'    => Group_Control_Image_Size::get_type(),
                'name'      => 'image',
                'separator' => 'none',
                'default' => 'large',
				'selectors' => [
					        '{{WRAPPER}} .swiper.medixareswiper .swiper-slide img',
					    ],
            ),
			array(
				'mode'    => 'responsive',
				'label' => esc_html__( 'Navigation', 'medixare-core' ),
				'id'	=> 'partners-navigation',
				'type' => Controls_Manager::SELECT,
				'default' => 'partners_both',
				'options' => [
					'partners_both' => esc_html__( 'Arrows and Dots', 'medixare-core' ),
					'partners_arrows' => esc_html__( 'Arrows', 'medixare-core' ),
					'partners_dots' => esc_html__( 'Dots', 'medixare-core' ),
					'none' => esc_html__( 'None', 'medixare-core' ),
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__( 'Smooth Sliding', 'medixare-core' ),
				'id'	=> 'smooth_sliding',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'options' => [
					'yes' => esc_html__( 'Yes', 'medixare-core' ),
					'no' => esc_html__( 'No', 'medixare-core' ),
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__( 'Autoplay', 'medixare-core' ),
				'id'	=> 'autoplay',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'medixare-core' ),
					'no' => esc_html__( 'No', 'medixare-core' ),
				],
				'condition' => [
					'smooth_sliding!' => 'yes',
				],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__( 'Autoplay Speed', 'medixare-core' ),
				'id'	=> 'autoplay_speed',
				'type' => Controls_Manager::NUMBER,
				'default' => 300,
				'frontend_available' => true,
			),
			array(
				'mode'    => 'responsive',
				'label' => esc_html__( 'Slide PerView', 'medixare-core' ),
				'id'	=> 'slide_perview',
				'type' => Controls_Manager::SELECT,
				'devices' => ['desktop','tablet','mobile'],
				'options' => [
					'1' => esc_html__( "1", 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3', 'medixare-core' ),
					'4' => esc_html__( '4', 'medixare-core' ),
					'5' => esc_html__( '5', 'medixare-core' ),
				],
				// 'condition' => [
				// 	'autoplay' => 'no',
				// ],
				'frontend_available' => true,
				'default' => '5',
				'tablet_default' => '3',
				'mobile_default' => '2',
			),
			array(
				'label' => esc_html__( 'Infinite Loop', 'medixare-core' ),
				'id'	=> 'loop',
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'options' => [
					'yes' => esc_html__( 'Yes', 'medixare-core' ),
					'no' => esc_html__( 'No', 'medixare-core' ),
				],
				// 'condition' => [
				// 	'autoplay' => 'no',
				// ],
				'frontend_available' => true,
			),
			array(
				'label' => esc_html__( 'Slide per Group', 'medixare-core' ),
				'id'	=> 'slide_per_group',
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => esc_html__( '1', 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3', 'medixare-core' ),
					'4' => esc_html__( '4', 'medixare-core' ),
					'5' => esc_html__( '5', 'medixare-core' ),
				],
				// 'condition' => [
				// 	'loop' => 'no',
				// ],
				// 'frontend_available' => true,
			),
			array(
				'mode'    => 'responsive',
				'label' => esc_html__( 'Space Between', 'medixare-core' ),
				'id'	=> 'space_between',
				'type' => Controls_Manager::SLIDER,
				'devices' => ['desktop','tablet','mobile'],				
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
				'id'      => 'navigation_color',
				'label'   => esc_html__( 'NAvigaiton Color', 'medixare-core' ),
				'default' => '#1F0D3C',
                'selectors'=>[
                    '{{WRAPPER}} .swiper-button-next.partner_btn_next, .partner_btn_next:after, .swiper-button-prev.partner_btn_prev, .partner_btn_prev:after, .swiper-pagination-bullet-active' => 'color: {{VALUE}};',
                ],
			),
            array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'navigation_dot_color',
				'label'   => esc_html__( 'Navivarion Dot Color', 'medixare-core' ),
				'default' => '#1F0D3C',
                'selectors'=>[
                    '{{WRAPPER}} .swiper-pagination-bullet-active' => 'background-color: {{VALUE}};',
                ],
			),
			array(
				'mode' => 'section_end',
			),
			
		);
		
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'amt-partner-slider';

		return $this->amt_template( $template, $data );
	}
}