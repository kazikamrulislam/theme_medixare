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

if ( ! defined( 'ABSPATH' ) ) exit;

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Contact Info', 'medixare-core' );
		$this->amt_base = 'rt-contact-info';
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
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'label'   => esc_html__( 'Alignment', 'medixare-core' ),
				'options' => array(
					'left' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			/*Icon Start*/
			array(					 
			   'type'    => Controls_Manager::CHOOSE,
			   'options' => array(
			     'icon' => array(
			       'title' => esc_html__( 'Icon', 'medixare-core' ),
			       'icon' => 'fa fa-smile',
			     ),
			     'image' => array(
			       'title' => esc_html__( 'Image', 'medixare-core' ),
			       'icon' => 'fa fa-image',
			     ),		     
			   ),
			   'id'      => 'icontype',
			   'label'   => esc_html__( 'Media Type', 'medixare-core' ),
			   'default' => 'icon',
			   'label_block' => false,
			   'toggle' => false,
			),
			array(
				'type'    => Controls_Manager::ICONS,
				'id'      => 'icon_class',
				'label'   => esc_html__( 'Icon', 'medixare-core' ),
				'default' => array(
			      'value' => 'fas fa-map-marker-alt',
			      'library' => 'fa-solid',
				),	
			  	'condition'   => array('icontype' => array( 'icon' ) ),
			),	
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'icon_image',
				'label'   => esc_html__( 'Image', 'medixare-core' ),
				'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'medixare-core' ),
				'condition'   => array('icontype' => array( 'image' ) ),
			),
			array(
				'type'    => Group_Control_Image_Size::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'image size', 'medixare-core' ),	
				'name' => 'icon_image_size', 
				'separator' => 'none',		
				'condition'   => array('icontype' => array( 'image' ) ),
			),	
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Icon Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-contact-info .amt-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),		
			/*Icon end*/
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'address',
				'label'   => esc_html__( 'Address', 'medixare-core' ),
				'default' => esc_html__( '29 Street, Melbourne City, Australia # 34 Road, House #10.', 'medixare-core' ),
			),
			array(
				'mode' => 'section_end',
			),			
			/*Style Option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,
			),		
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'info_typo',
				'label'   => esc_html__( 'Info Typo', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-contact-info .amt-content p',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'icon_size',
				'label'   => esc_html__( 'Icon Size', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-contact-info .amt-icon' => 'font-size: {{VALUE}}px',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'info_color',
				'label'   => esc_html__( 'Info Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-contact-info .entry-text' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-contact-info .entry-text a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'icon_color',
				'label'   => esc_html__( 'Icon Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-contact-info .amt-icon' => 'color: {{VALUE}}',
				),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'contact-info';

		return $this->amt_template( $template, $data );
	}
}