<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Thumb_Slider extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Thumb Slider', 'medixare-core' );
		$this->amt_base = 'rt-thumb-slider';
		parent::__construct( $data, $args );
	}

	public function amt_fields(){
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'post_not_in', array(
				'type'    => Controls_Manager::NUMBER,
				'label'   => __( 'Post ID', 'medixare-core' ),
				'default' => '0',
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'slider_style',
				'label'   => esc_html__( 'Slider Style', 'medixare-core' ),
				'default' => 'horizontal-1',
				'options' => array(
					'horizontal-1' => esc_html__( 'Horizontal 1', 'medixare-core' ),
					'horizontal-2' => esc_html__( 'Horizontal 2', 'medixare-core' ),
					'horizontal-3' => esc_html__( 'Horizontal 3', 'medixare-core' ),
					'horizontal-4' => esc_html__( 'Horizontal 4', 'medixare-core' ),
					'vertical' => esc_html__( 'Vertical', 'medixare-core' ),
				),
			),	
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__( 'Alignment', 'medixare-core' ),
				'options' => array(
					'justify-content-start text-start' => array(
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					),
					'justify-content-center text-center' => array(
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					),
					'justify-content-end text-end' => array(
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'condition'   => array( 'slider_style' => array( 'horizontal-1', 'horizontal-2', 'horizontal-3' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat_layout',
				'label'   => esc_html__( 'Category Layout', 'medixare-core' ),				
				'options' => array(
					'cat_layout1' 		=> esc_html__( 'Cat Layout 1', 'medixare-core' ),
					'cat_layout2' 		=> esc_html__( 'Cat Layout 2', 'medixare-core' ),
				),
				'default' => 'cat_layout1',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'play_button_size',
				'label'   => esc_html__( 'Play Button Size', 'medixare-core' ),				
				'options' => array(
					'size-lg' 		=> esc_html__( 'Button Size Big', 'medixare-core' ),
					'size-md' 		=> esc_html__( 'Button Size Medium', 'medixare-core' ),
					'size-sm' 	    => esc_html__( 'Button Size Small', 'medixare-core' ),
				),
				'default' => 'size-md',
				'condition'   => array( 'slider_style' => array( 'vertical', 'horizontal-4' ) ),
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_height',
				'label'   => esc_html__( 'Item Height', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 2000,
	               	),
		       	),
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-default .amt-item' => 'min-height: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__( 'Item Limit', 'medixare-core' ),
				'range' => array(
	                'px' => array(
	                    'min' => 1,
	                    'max' => 12,
	               	),
		       	),
	            'default' => array(
	                'size' => 3,
	            ),
				'description' => esc_html__( 'Maximum number of Item', 'medixare-core' ),
			),			
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__( 'Title count', 'medixare-core' ),
				'default' => 15,
				'description' => esc_html__( 'Maximum number of title', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'small_title_count',
				'label'   => esc_html__( 'Small Title count', 'medixare-core' ),
				'default' => 5,
				'description' => esc_html__( 'Maximum number of title', 'medixare-core' ),
				'condition'   => array( 'slider_style' => array( 'vertical', 'horizontal-4' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'medixare-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'medixare-core' ),
			),
			array(
				'mode' => 'section_end',
			),
			/*query option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_query',
				'label'   => esc_html__( 'Query Settings', 'medixare-core' ),
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__( 'Post Ordering', 'medixare-core' ),
				'options' => array(
					'DESC'	=> esc_html__( 'Desecending', 'medixare-core' ),
					'ASC'	=> esc_html__( 'Ascending', 'medixare-core' ),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_orderby',
				'label'   => esc_html__( 'Post Sorting', 'medixare-core' ),				
				'options' => array(
					'recent' 		=> esc_html__( 'Recent Post', 'medixare-core' ),
					'rand' 			=> esc_html__( 'Random Post', 'medixare-core' ),
					'menu_order' 	=> esc_html__( 'Custom Order', 'medixare-core' ),
					'title' 		=> esc_html__( 'By Name', 'medixare-core' ),
				),
				'default' => 'recent',
			),
			/*Start category*/
			array(
				'id'      => 'query_type',
				'label' => esc_html__( 'Query type', 'medixare-core' ),
            	'type' => Controls_Manager::SELECT,
            	'default' => 'category',
            	'options' => array(
					'category'  => esc_html__( 'Category', 'medixare-core' ),
                	'posts' => esc_html__( 'Posts', 'medixare-core' ),
				),
			),
			array(
				'id'      => 'postid',
				'label' => esc_html__( 'Selects posts', 'medixare-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_all_posts('post'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'posts',
				),
			),
			array(
				'id'      => 'catid',
				'label' => esc_html__( 'Categories', 'medixare-core' ),
	            'type' => Controls_Manager::SELECT2,
	            'options' => $this->get_taxonomy_drops('category'),
	            'label_block' => true,
	            'multiple' => true,
            	'condition' => array(
					'query_type' => 'category',
				),
			),
			/*post offset*/
	        array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_of_post_offset',
				'label'   => __( 'Offset ( No of Posts )', 'medixare-core' ),
				'default' => '0',
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => __( 'Exclude Post by ID', 'medixare-core' ),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__( 'Meta Option', 'medixare-core' ),
				'tab'     => Controls_Manager::TAB_STYLE,				
			),
			// Tab For Normal view.
			array(
				'mode' => 'tabs_start',
				'id'   => 'meta_tabs_start',
			),			
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_single_post',
				'label' => esc_html__( 'Single Post', 'medixare-core' ),
			),	
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_author',
				'label'       => esc_html__( 'Show Author', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__( 'Show Date', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__( 'Show Categories', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__( 'Show Comment', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__( 'Show Lenght', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__( 'Show View', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__( 'Show Video', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
				'condition'   => array( 'slider_style' => array( 'vertical','horizontal-4' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Button Text', 'medixare-core' ),
				'default' => esc_html__( 'Read More', 'medixare-core' ),
				'condition' => array( 'post_read' => array( 'yes' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			// Tab For multi view.
			array(
				'mode'  => 'tab_start',
				'id'    => 'rt_tab_multi_post',
				'label' => esc_html__( 'Multi Post', 'medixare-core' ),
				'condition'   => array( 'slider_style' => array( 'vertical', 'horizontal-4' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_author',
				'label'       => esc_html__( 'Show Author', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_date',
				'label'       => esc_html__( 'Show Date', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_category',
				'label'       => esc_html__( 'Show Categories', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_comment',
				'label'       => esc_html__( 'Show Comment', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_length',
				'label'       => esc_html__( 'Show Lenght', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_view',
				'label'       => esc_html__( 'Show View', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Thumb Image Blend', 'medixare-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',		
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_radius',
	            'label'   => __( 'Radius', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-thumb-slider-horizontal .amt-slide-thumb .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	                '{{WRAPPER}} .amt-thumb-slider-horizontal-2 .amt-slide-thumb .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	                '{{WRAPPER}} .amt-thumb-slider-vertical .amt-slide-thumb .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),
			// Title style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_title_style',
	            'label'   => esc_html__( 'Title Typo', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo',
				'label'   => esc_html__( 'Title Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-thumb-slider-default .amt-item.amt-slide .entry-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'small_title_typo',
				'label'   => esc_html__( 'Small Title Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-thumb-slider-default .amt-item.amt-slide-thumb .entry-title',
				'condition'   => array( 'slider_style' => array( 'vertical', 'horizontal-4' ) ),
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-thumb-slider-default .amt-item .entry-title a',
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-thumb-slider-default .amt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'mode' => 'section_end',
			),					
			// Meta style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_meta_style',
	            'label'   => esc_html__( 'Meta Style', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	        ),
	        array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__( 'Meta Typo', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-thumb-slider-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-thumb-slider-default ul.entry-meta li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-thumb-slider-default .amt-item .amt-cat a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-default .amt-item .post-author a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_small_color',
				'label'   => esc_html__( 'Small Meta Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-horizontal-5 .amt-thumnail-area .amt-cat a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-thumb-slider-horizontal-5 .amt-thumnail-area ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-thumb-slider-horizontal-5 .amt-thumnail-area ul.entry-meta li a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'slider_style' => array( 'horizontal-5' ) ),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-thumb-slider-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),
			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__( 'PerView Options', 'medixare-core' ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'thumb_slides_height',
				'label'   => esc_html__( 'Thumb Slides Height', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 230,
						'max' => 1000,
					),
				),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-thumb-slider-vertical .amt-thumnail-area .swiper-item-wrap' => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'slider_style' => array( 'vertical', 'horizontal-4' ) ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__( 'Desktops: > 1200px', 'medixare-core' ),
				'default' => '3',
				'options' => array(
					'1' => esc_html__( '1', 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3',  'medixare-core' ),
					'4' => esc_html__( '4',  'medixare-core' ),
					'5' => esc_html__( '5',  'medixare-core' ),
					'6' => esc_html__( '6',  'medixare-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__( 'Desktops: > 992px', 'medixare-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3',  'medixare-core' ),
					'4' => esc_html__( '4',  'medixare-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__( 'Tablets: > 768px', 'medixare-core' ),
				'default' => '2',
				'options' => array(
					'1' => esc_html__( '1', 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3',  'medixare-core' ),
					'4' => esc_html__( '4',  'medixare-core' ),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__( 'Phones: > 576px', 'medixare-core' ),
				'default' => '1',
				'options' => array(
					'1' => esc_html__( '1', 'medixare-core' ),
					'2' => esc_html__( '2', 'medixare-core' ),
					'3' => esc_html__( '3',  'medixare-core' ),
					'4' => esc_html__( '4',  'medixare-core' ),
				),
			),
			array(
				'mode' => 'section_end',
			),
			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__( 'Slider Options', 'medixare-core' ),
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
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'nav_style',
				'label'   => esc_html__( 'Nav Style', 'medixare-core' ),				
				'options' => array(
					'rt-swiper-nav-1' 		=> esc_html__( 'Nav Style 1', 'medixare-core' ),
					'rt-swiper-nav-2' 		=> esc_html__( 'Nav Style 2', 'medixare-core' ),
					'rt-swiper-nav-3' 		=> esc_html__( 'Nav Style 3', 'medixare-core' ),
					'rt-swiper-nav-4' 		=> esc_html__( 'Nav Style 4', 'medixare-core' ),
				),
				'default' => 'rt-swiper-nav-1',
				'condition'   => array( 'slider_style' => array( 'horizontal-1', 'horizontal-2', 'horizontal-3' ) ),
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
				'id'      => 'slides_space',
				'label'   => esc_html__( 'Slides Space', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => 24,
				),
				'description' => esc_html__( 'Slides Space. Default: 24', 'medixare-core' ),
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
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();
		
		$swiper_data = array(
			'slidesPerView' 	=>2,
			'loop'				=>$data['slider_loop']=='yes' ? true:false,
			'spaceBetween'		=>$data['slides_space']['size'],
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
			),
		);
		
		switch ( $data['slider_style'] ) {	
			case 'vertical':
			$template = 'thumb-slider-5';
			break;
			case 'horizontal-4':
			$template = 'thumb-slider-4';
			break;
			case 'horizontal-3':
			$template = 'thumb-slider-3';
			break;
			case 'horizontal-2':
			$template = 'thumb-slider-2';
			break;
			default:
			$template = 'thumb-slider-1';
			break;
		}

		$data['swiper_data'] = json_encode( $swiper_data );   
		
		return $this->amt_template( $template, $data );
	}
}