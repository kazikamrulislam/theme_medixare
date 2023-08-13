<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class Progress_Bar extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = __( 'AMT Progress Bar', 'medixare-core' );
		$this->amt_base = 'amt-progress-bar';
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
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medixare-core' ),
				'default' => esc_html__( 'Total Posts', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'number',
				'label'   => esc_html__( 'Percentage', 'medixare-core' ),
				'default' => array( 'size' => 77 ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_height',
				'label'   => esc_html__( 'Percentage Height', 'medixare-core' ),
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'progress_height',
				'label'   => esc_html__( 'Progress Height', 'medixare-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .amt-progress-bar .progress' => 'height: {{VALUE}}px' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'bgcolor_color',
				'label'   => esc_html__( 'Bgcolor', 'medixare-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .progress' => 'background-color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'per_color',
				'label'   => esc_html__( 'Percent Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .amt-progress-bar .progress .progress-bar > span' => 'color: {{VALUE}}' ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shap_color',
				'label'   => esc_html__( 'Shap Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .amt-progress-bar .progress .progress-bar > span:before' => 'border-top-color: {{VALUE}}' ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-progress-bar .entry-name',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array( '{{WRAPPER}} .amt-progress-bar .entry-name' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'progress-bar';

		return $this->amt_template( $template, $data );
	}
}