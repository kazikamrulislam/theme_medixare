<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_Ticker extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT News Ticker', 'medixare-core' );
		$this->amt_base = 'rt-ticker';
		parent::__construct( $data, $args );
	}
	public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			array(
				'type'    	  => Controls_Manager::TEXT,
				'id'      	  => 'ticker_title',
				'label'   	  => esc_html__( 'Ticker Title', 'medixare-core' ),
				'default' 	  => esc_html__( 'TRENDING', 'medixare-core' ),
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'ticker_item',
				'label'   	  => esc_html__( 'Number of Ticker', 'medixare-core' ),
				'default' 	  => 5,
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'ticker_delay',
				'label'   	  => esc_html__( 'Ticker Delay', 'medixare-core' ),
				'default' 	  => 3000,
			),
			array(
				'type'    	  => Controls_Manager::NUMBER,
				'id'      	  => 'ticker_speed',
				'label'   	  => esc_html__( 'Ticker Speed', 'medixare-core' ),
				'default' 	  => 0.10,
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'display_type',
				'label'   => esc_html__( 'Display Type', 'medixare-core' ),
				'options' => array(
					'fade' => esc_html__( 'Fade', 'medixare-core' ),
					'reveal' => esc_html__( 'Reveal', 'medixare-core' ),
				),
				'default' => 'fade',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ticker_color',
				'label'   => esc_html__( 'Text Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-news-ticker .ticker-content a' => 'color: {{VALUE}}!important' ,
				),
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ticker_hover_color',
				'label'   => esc_html__( 'Text Hover Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-news-ticker .ticker-content a:hover' => 'color: {{VALUE}}!important',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'ticker_bg_color',
				'label'   => esc_html__( 'Background Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-news-ticker .ticker-wrapper .ticker-swipe' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .amt-news-ticker .ticker-wrapper .ticker-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .amt-news-ticker .ticker-wrapper .ticker' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .amt-news-ticker .ticker-wrapper .ticker-swipe span' => 'background-color: {{VALUE}}',
				),
			),
			
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'rt-ticker';

		return $this->amt_template( $template, $data );
	}
}