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

class AMT_Category extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Category', 'medixare-core' );
		$this->amt_base = 'rt-category';
		$this->amt_translate = array(
			'cols'  => array(
				'12' => esc_html__( '1 Col', 'medixare-core' ),
				'6'  => esc_html__( '2 Col', 'medixare-core' ),
				'4'  => esc_html__( '3 Col', 'medixare-core' ),
				'3'  => esc_html__( '4 Col', 'medixare-core' ),
				'2'  => esc_html__( '6 Col', 'medixare-core' ),
			),
		);
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'style',
				'label'   => esc_html__( 'Category Style', 'medixare-core' ),
				'options' => array(
					'style1' => esc_html__( 'Grid Layout 01' , 'medixare-core' ),
					'style4' => esc_html__( 'Grid Layout 02' , 'medixare-core' ),
					'style5' => esc_html__( 'Grid Layout 03' , 'medixare-core' ),
					'style2' => esc_html__( 'List Layout' , 'medixare-core' ),
					'style3' => esc_html__( 'Slider Layout', 'medixare-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_space',
				'label'   => esc_html__( 'Item Space', 'medixare-core' ),
				'options' => array(
					'g-0' => esc_html__( 'Gutters 0', 'medixare-core' ),
					'g-1' => esc_html__( 'Gutters 1', 'medixare-core' ),
					'g-2' => esc_html__( 'Gutters 2', 'medixare-core' ),
					'g-3' => esc_html__( 'Gutters 3', 'medixare-core' ),
					'g-4' => esc_html__( 'Gutters 4', 'medixare-core' ),
					'g-5' => esc_html__( 'Gutters 5', 'medixare-core' ),
				),
				'default' => 'g-4',
				'condition'   => array( 'style' => array( 'style1','style2','style4','style5' ) ),
			),
			/*Start category*/
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'medixare-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'title',
				'label'   => esc_html__( 'Title', 'medixare-core' ),
				'default' => esc_html__( 'Today Best Trending Topics', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .section-title .related-title',
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__( 'Title Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .section-title .related-title' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
			array(
				'mode' => 'section_end',
			),

			/*Animation section*/
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_cat_style',
	            'label'   => esc_html__( 'Category', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__( 'Category Typo', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-category .amt-item .amt-cat-name',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-category .amt-item .amt-cat-name a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-category-style2 .amt-item .amt-cat-name' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_hov_color',
				'label'   => esc_html__( 'Category Hover Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-category .amt-item .amt-cat-name a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-category-style2 .amt-item a:hover .amt-cat-name' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'cat_count',
				'label'       => esc_html__( 'Count Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Show or Hide Count. Default: true', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_bottom',
				'label'   => esc_html__( 'Item Padding', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-category-style3 .amt-content' => 'bottom: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),
	        array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__( 'Number of Responsive Columns', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style1','style2','style4','style5' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__( 'Desktops: > 1199px', 'medixare-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__( 'Desktops: > 991px', 'medixare-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__( 'Tablets: > 767px', 'medixare-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__( 'Phones: > 576px', 'medixare-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__( 'Phones: < 576px', 'medixare-core' ),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
			// Animation
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_animation_style',
	            'label'   => esc_html__( 'Animation', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style' => array( 'style2' ) ),
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
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'digeco-core' ),
				'default' => '1',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),			
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable autoplay. Default: On', 'medixare-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__( 'Navigation Arrow', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Navigation Arrow. Default: On', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__( 'slides Per Group', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 1,
				),
				'description' => esc_html__( 'slides Per Group. Default: 1', 'medixare-core' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__( 'Centered Slides', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'no',
				'description' => esc_html__( 'Centered Slides. Default: Off', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2' ) ),
			),
			array(
				'type'        => Controls_Manager::NUMBER,
				'id'          => 'slides_space',
				'label'       => esc_html__( 'Slides Space', 'consalty-core' ),
				'default'     => 10,
				'description' => esc_html__( 'Slides Space. Default: 10', 'consalty-core' ),
			),		
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__( 'Autoplay Slide Delay', 'medixare-core' ),
				'default' => 5000,
				'description' => esc_html__( 'Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'medixare-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__( 'Autoplay Slide Speed', 'medixare-core' ),
				'default' => 1000,
				'description' => esc_html__( 'Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'medixare-core' ),
				'condition'   => array( 'slider_autoplay' => 'yes' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__( 'Loop', 'medixare-core' ),
				'label_on'    => esc_html__( 'On', 'medixare-core' ),
				'label_off'   => esc_html__( 'Off', 'medixare-core' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Loop to first item. Default: On', 'medixare-core' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'PerView Options', 'consalty-core' ),
				'condition'   => array( 'style' => array( 'style3' ) ),
			),			
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__( 'Desktops: > 1600px', 'consalty-core' ),
				'default' => '4',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'consalty-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'consalty-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'consalty-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'consalty-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'consalty-core' ),
					'2' => esc_html__( '2', 'consalty-core' ),
					'3' => esc_html__( '3',  'consalty-core' ),
					'4' => esc_html__( '4',  'consalty-core' ),
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
		$swiper_data = array(
			'slidesPerView' 	=>2,
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space'],
			'slidesPerGroup'	=>$data['slides_per_group']['size'],
			'centeredSlides'	=>$data['centered_slides']=='yes' ? true:false ,
			'slideToClickedSlide' =>true,
			'autoplay'          => $data['slider_autoplay'] == 'yes' ? true : false,
			'autoplaydelay'     => $data['slider_autoplay_delay'],
			'speed'      =>$data['slider_autoplay_speed'],
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>$data['mobile']),
				'768'    =>array('slidesPerView' =>$data['tablet']),
				'992'    =>array('slidesPerView' =>$data['sm_desktop']),
				'1200'    =>array('slidesPerView' =>$data['md_desktop']),				
				'1600'    =>array('slidesPerView' =>$data['desktop'])
			),
		);

		switch ( $data['style'] ) {
			case 'style5':
			$template = 'rt-category-5';
			break;
			case 'style4':
			$template = 'rt-category-4';
			break;
			case 'style3':
			$data['swiper_data'] = json_encode( $swiper_data );
			$template = 'rt-category-3';
			break;
			case 'style2':
			$template = 'rt-category-2';
			break;
			default:			
			$template = 'rt-category-1';
			break;
		}
		
		return $this->amt_template( $template, $data );
	}
}