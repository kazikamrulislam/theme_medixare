<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class AMT_Image extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Image', 'medixare-core' );
		$this->amt_base = 'amt-image';
		parent::__construct( $data, $args );
	}
	private function amt_tween_load_scripts(){
		wp_enqueue_script( 'tween-max' );
	}

	public function amt_fields(){
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			/*image default*/
			array(
				'type'    => Controls_Manager::MEDIA,
				'id'      => 'amt_logo',
				'label'   => esc_html__( 'Item Image', 'medixare-core' ),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
				'description' => esc_html__( 'Recommended full image', 'medixare-core' ),
			),	
			array(
				'type'     => Group_Control_Css_Filter::get_type(),
				'mode'     => 'group',				
				'label'    => esc_html__( 'Image Blend', 'medixare-core' ),	
				'name'     => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'amt_title',
				'label'   => esc_html__( 'Title', 'medixare-core' ),
				'default' => esc_html__( 'The Most Powerful', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'amt_text',
				'label'   => esc_html__( 'Content', 'medixare-core' ),
				'default' => esc_html__( 'News & Magazine WP Theme', 'medixare-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'social_display',
				'label'       => esc_html__( 'Social', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'yes',
			),			
			array(
				'type'      => Group_Control_Image_Size::get_type(),
				'mode'      => 'group',				
				'label'     => esc_html__( 'image size', 'medixare-core' ),	
				'name'      => 'icon_image_size', 
				'separator' => 'none',		
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template = 'amt-image';

		return $this->amt_template( $template, $data );
	}
}