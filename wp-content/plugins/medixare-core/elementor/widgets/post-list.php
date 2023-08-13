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
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) exit;

class Post_List extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT Post List', 'medixare-core' );
		$this->amt_base = 'rt-post-list';
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
				'id'      => 'style',
				'label'   => esc_html__( 'Style', 'medixare-core' ),
				'options' => array(
					'style1' => esc_html__( 'List Layout 1', 'medixare-core' ),
					'style2' => esc_html__( 'List Layout 2', 'medixare-core' ),
					'style3' => esc_html__( 'List Layout 3', 'medixare-core' ),
					'style4' => esc_html__( 'List Layout 4', 'medixare-core' ),
					'style5' => esc_html__( 'List Layout 5', 'medixare-core' ),
					'style6' => esc_html__( 'List Layout 6', 'medixare-core' ),
					'style7' => esc_html__( 'List Layout 7', 'medixare-core' ),
				),
				'default' => 'style1',
			),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
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
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
				'condition'   => array( 'style' => array( 'style5' ) ),
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
			/*end category*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'list_border',
				'label'   => esc_html__( 'Border', 'medixare-core' ),				
				'options' => array(
					'default' 		=> esc_html__( 'Border On', 'medixare-core' ),
					'border-none' 			=> esc_html__( 'Border Off', 'medixare-core' ),
				),
				'default' => 'default',
				'condition'   => array( 'style' => array( 'style5', 'style6' ) ),
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
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_margin',
				'label'   => esc_html__( 'Item Margin', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),			
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'item_padding',
				'label'   => esc_html__( 'Item Padding', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item' => 'padding-bottom: {{SIZE}}{{UNIT}};',
				),
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
				'default' => 15,
				'description' => esc_html__( 'Maximum number of small title', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__( 'Content Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__( 'Word count', 'medixare-core' ),
				'default' => 20,
				'description' => esc_html__( 'Maximum number of words', 'medixare-core' ),
				'condition'   => array( 'content_display' => array( 'yes' ), 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'imagespace',
				'label'   => esc_html__( 'Image Spacing', 'medixare-core' ),
				'size_units' => array( 'px', '%' ),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-style1 .amt-item .amt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .amt-post-list-style3 .amt-item .amt-image' => 'margin-right: {{SIZE}}{{UNIT}};',
				),
				'condition'   => array( 'style' => array( 'style1', 'style3' ) ),
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
				'id'    => 'amt_tab_single_post',
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
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array (
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__( 'Show Read More', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__( 'Button Text', 'medixare-core' ),
				'default' => esc_html__( 'Read More', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style1', 'style2', 'style4', 'style5', 'style7' ),  'post_read' => array( 'yes' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			// Tab For multi view.
			array(
				'mode'  => 'tab_start',
				'id'    => 'amt_tab_multi_post',
				'label' => esc_html__( 'Multi Post', 'medixare-core' ),
				'condition'   => array( 'style' => array( 'style2', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_author',
				'label'       => esc_html__( 'Show Author', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_date',
				'label'       => esc_html__( 'Show Date', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_category',
				'label'       => esc_html__( 'Show Categories', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'yes',
				'condition'   => array( 'style' => array( 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_comment',
				'label'       => esc_html__( 'Show Comment', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_length',
				'label'       => esc_html__( 'Show Lenght', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_view',
				'label'       => esc_html__( 'Show View', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'small_post_video',
				'label'       => esc_html__( 'Show Video', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'border_on_off',
				'label'   => esc_html__( 'Border', 'medixare-core' ),
				'options' => array(
					'rt-border-bottom'      => esc_html__( 'On', 'medixare-core' ),
					'rt-border-none'        => esc_html__( 'Off', 'medixare-core' ),
				),
				'default' => 'rt-border-bottom',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'border_color',
				'label'   => esc_html__( 'Border Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-style2 .amt-item.multi-post-item' => 'border-color: {{VALUE}}',
				),
				'condition'   => array( 'border_on_off' => array( 'rt-border-bottom' ) ),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode' => 'tabs_end',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'loadmore_display',
				'label'       => esc_html__( 'Load More Display', 'medixare-core' ),
				'label_on'    => esc_html__( 'Show', 'medixare-core' ),
				'label_off'   => esc_html__( 'Hide', 'medixare-core' ),
				'default'     => 'no',
				'condition'   => array( 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'button_text',
				'label'   => esc_html__( 'Load More Text', 'medixare-core' ),
				'default' => 'Load More',
				'condition' => array( 'loadmore_display' => array( 'yes' ), 'style' => array( 'style1' ) ),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',				
				'label'   => esc_html__( 'Image Blend', 'medixare-core' ),	
				'name' => 'blend', 
				'selector' => '{{WRAPPER}} img',
				'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),	
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'border_radius',
	            'label'   => __( 'Radius', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default .amt-item .amt-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	                '{{WRAPPER}} .amt-post-list-style3 .amt-item .amt-image a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	            'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),
	        ),
	        array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'content_spacing',
	            'label'   => __( 'Content Spacing', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-style5 .amt-item .entry-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'condition'   => array( 'style' => array( 'style5' ) ),
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
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.single-post-item .entry-title',
			),
			array (
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_small_typo',
				'label'   => esc_html__( 'Title Small Style', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.multi-post-item .entry-title',
				'condition'   => array( 'style' => array( 'style2', 'style3', 'style4', 'style5', 'style7' ) ),
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'title_color',
				'label'   => esc_html__( 'Title Color', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item:not(.multi-post-item) .entry-title a',
			),
			array(
				'type'    => Group_Control_Background::get_type(),
				'mode'    => 'group',
				'types'   => array( 'classic', 'gradient' ),
				'name'    => 'small_title_color',
				'label'   => esc_html__( 'Small Title Color', 'medixare-core' ),
				'selector' => '{{WRAPPER}} .amt-post-list-default .amt-item.multi-post-item .entry-title a',
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'title_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default .amt-item .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .amt-post-list-default ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__( 'Meta Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__( 'Category Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .entry-categories a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-list-default .amt-item .entry-categories a .category-style' => 'color: {{VALUE}}',
				),
			),		
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_author_color',
				'label'   => esc_html__( 'Meta Author Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .post-author a' => 'color: {{VALUE}}',
				),
				'condition'   => array( 'style' => array( 'style4' ) ),
			),	
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__( 'Meta Icon Color', 'medixare-core' ),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
	            'type'    => Controls_Manager::DIMENSIONS,
	            'mode'          => 'responsive',
	            'size_units' => [ 'px', '%', 'em' ],
	            'id'      => 'meta_margin',
	            'label'   => __( 'Margin', 'medixare-core' ),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
	        array(
				'mode' => 'section_end',
			),

			// Image style
			array(
	            'mode'    => 'section_start',
	            'id'      => 'sec_image_style',
	            'label'   => esc_html__( 'Image', 'medixare-core' ),
	            'tab'     => Controls_Manager::TAB_STYLE,
	            'condition'   => array( 'style' => array( 'style1','style2','style3','style4','style5', 'style7' ) ),
	        ),
	        array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'image_size',
				'label'   => esc_html__( 'Image Size', 'medixare-core' ),				
				'options' => array(
					'size_one' 		=> esc_html__( 'Size 1', 'medixare-core' ),
					'size_two' 		=> esc_html__( 'Size 2', 'medixare-core' ),
				),
				'default' => 'size_one',
				'condition'   => array( 'style' => array( 'style5' ) ),
			),
	        array(
	            'type'    => Controls_Manager::SLIDER,
	            'mode'          => 'responsive',
	            'id'      => 'image_box_width',
	            'label'   => __( 'Box Width', 'medixare-core' ),
	            'size_units' => [ 'px', '%', 'em' ],
	            'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),                 
	            'selectors' => array(
	                '{{WRAPPER}} .amt-post-list-default .amt-item .amt-image' => 'max-width: {{SIZE}}{{UNIT}} !important;',
	            ),
	            'separator' => 'before',
	        ),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_width',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Width', 'medixare-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .amt-image img' => 'width: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'image_height',
				'mode'          => 'responsive',
				'label'   => esc_html__( 'Height', 'medixare-core' ),
				'size_units' => array( '%', 'px', 'vw' ),
				'range' => array(
					'%' => array(
						'min' => 1,
						'max' => 100,
					),
					'px' => array(
						'min' => 1,
						'max' => 1000,
					),
					'vw' => array(
						'min' => 1,
						'max' => 100,
					),
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-list-default .amt-item .amt-image img' => 'height: {{SIZE}}{{UNIT}};',
				),
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
				'label'   => esc_html__( 'Delay', 'medixare-core' ),
				'default' => '0.5',
				'condition'   => array( 'animation' => array( 'wow' ) ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__( 'Duration', 'medixare-core' ),
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
		
		switch ( $data['style'] ) {		
			case 'style7':
			$template = 'post-list-7';
			break;	
			case 'style6':
			$template = 'post-list-6';
			break;		
			case 'style5':
			$template = 'post-list-5';
			break;
			case 'style4':
			$template = 'post-list-4';
			break;
			case 'style3':
			$template = 'post-list-3';
			break;
			case 'style2':
			$template = 'post-list-2';
			break;
			default:
			$template = 'post-list-1';
			break;
		}
		
		return $this->amt_template( $template, $data );
	}
}