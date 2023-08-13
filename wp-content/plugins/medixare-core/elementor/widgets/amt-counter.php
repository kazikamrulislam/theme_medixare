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

class AMT_Counter extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = __( 'AMT Counter', 'medixare-core' );
		$this->amt_base = 'rt-Counter';
		parent::__construct( $data, $args );
	}

	private function amt_load_scripts(){
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
	}

	public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'iconalign',
				'label'   => esc_html__( 'Icon Align', 'medixare-core' ),
				'options' => array(
					'left' => esc_html__( 'left', 'medixare-core' ),
					'center' => esc_html__( 'Center', 'medixare-core' ),
					'right' => esc_html__( 'Right', 'medixare-core' ),
				),
				'default' => 'center',
			),
			array(
				'type'    => Controls_Manager::SWITCHER,
				'id'      => 'showhide',
				'label'   => esc_html__( 'Icon/image', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			/*Icon Start*/
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'medixare-core' ),
				'default' => array(
			      'value' => 'flaticon-heart',
			      'library' => 'far fa-map',
				),
				'condition'   => array( 'showhide' =>'yes' ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medixare-core' ),
				'default' => esc_html__( 'Happy Clients', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__( 'Counter Number', 'medixare-core' ),
				'default' => 243,
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'speed',
				'label'   => esc_html__( 'Animation Speed', 'medixare-core' ),
				'default' => 2000,
				'description' => esc_html__( 'The total duration of the count animation in milisecond eg. 5000', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'steps',
				'label'   => esc_html__( 'Animation Steps', 'medixare-core' ),
				'default' => 50,
				'description' => esc_html__( 'Counter steps eg. 10', 'medixare-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			// Style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_colors',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-counter .amt-item .amt-title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'counter_color',
				'label'   => esc_html__( 'Counter Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-counter .amt-item .amt-counter' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-counter .amt-item .amt-media i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-counter .amt-item .amt-media i:before' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'item_bg_color',
				'label'   => esc_html__( 'Item Bag Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-counter.amt-counter-style2 .amt-item' => 'background-color: {{VALUE}}',
				),
			),

			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-counter .amt-item .amt-title',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'counter_size',
				'label'   => esc_html__( 'Counter Font Size', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-counter .amt-item .amt-counter',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Icon Font Size', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-counter .amt-item .amt-media i' => 'font-size: {{VALUE}}px',
					'{{WRAPPER}} .amt-counter .amt-item .amt-media i:before' => 'font-size: {{VALUE}}px',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'counter_padding',
	            'label'   => __( 'Padding', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-counter .amt-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Animation style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__( 'Animation', 'medixare-core' ),
				'options' => array(
					'wow'        => esc_html__( 'On', 'medixare-core' ),
					'hide'        => esc_html__( 'Off', 'medixare-core' ),
				),
				'default' => 'wow',
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
				'id'      => 'delay',
				'label'   => esc_html__( 'Delay', 'digeco-core' ),
				'default' => '0.2',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'digeco-core' ),
				'default' => '0.4',
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
		$this->amt_load_scripts();
		
		$template = 'rt-counter-1';

		return $this->amt_template( $template, $data );
	}

}