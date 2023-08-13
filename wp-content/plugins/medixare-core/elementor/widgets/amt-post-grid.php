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
use Elementor\Utils;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Box_Shadow;

if (!defined('ABSPATH')) exit;

class AMT_Post_Grid extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Post Grid', 'medixare-core');
		$this->amt_base = 'amt-post-grid';
		$this->amt_translate = array(
			'cols'  => array(
				'12' => esc_html__('1 Col', 'medixare-core'),
				'6'  => esc_html__('2 Col', 'medixare-core'),
				'4'  => esc_html__('3 Col', 'medixare-core'),
				'3'  => esc_html__('4 Col', 'medixare-core'),
				'2'  => esc_html__('6 Col', 'medixare-core'),
			),
		);
		parent::__construct($data, $args);
	}

	public function amt_fields()
	{
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'post_not_in',
			array(
				'type'    => Controls_Manager::NUMBER,
				'label'   => __('Post ID', 'medixare-core'),
				'default' => '0',
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),
			// array(
			// 	'type'    => Controls_Manager::SELECT2,
			// 	'id'      => 'style',
			// 	'label'   => esc_html__('Style', 'medixare-core'),
			// 	'options' => array(
			// 		'style1' => esc_html__('Grid Layout 1', 'medixare-core'),
			// 		'style2' => esc_html__('Grid Layout 2', 'medixare-core'),
			// 		'style3' => esc_html__('Grid Layout 3', 'medixare-core'),
			// 	),
			// 	'default' => 'style1',
			// ),
			array(
				'type' => Controls_Manager::CHOOSE,
				'id'      => 'content_align',
				'mode'    => 'responsive',
				'label'   => esc_html__('Alignment', 'medixare-core'),
				'options' => array(
					'left' => array(
						'title' => __('Left', 'elementor'),
						'icon' => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __('Center', 'elementor'),
						'icon' => 'eicon-text-align-center',
					),
					'right' => array(
						'title' => __('Right', 'elementor'),
						'icon' => 'eicon-text-align-right',
					),
				),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'news_style',
				'label'   => esc_html__('Category Layout', 'medixare-core'),
				'options' => array(
					'style1' 		=> esc_html__('News Style 1', 'medixare-core'),
					'style2' 		=> esc_html__('News Style 2', 'medixare-core'),
					'style3' 		=> esc_html__('News Style 3', 'medixare-core'),
				),
				'default' => 'style1',
			),
			/*end category*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'play_button_size',
				'label'   => esc_html__('Play Button Size', 'medixare-core'),
				'options' => array(
					'size-lg' 		=> esc_html__('Button Size Big', 'medixare-core'),
					'size-md' 		=> esc_html__('Button Size Medium', 'medixare-core'),
					'size-sm' 	    => esc_html__('Button Size Small', 'medixare-core'),
				),
				'default' => 'size-md',
			),
			array(
				'mode'    => 'responsive',
				'type'    => Controls_Manager::SLIDER,
				'id'      => 'itemlimit',
				'label'   => esc_html__('Item Limit', 'medixare-core'),
				'range' => array(
					'px' => array(
						'min' => 1,
						'max' => 12,
					),
				),
				'default' => array(
					'size' => 3,
				),
				'description' => esc_html__('Maximum number of Item', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'itemspace',
				'label'   => esc_html__('Item Spacing', 'medixare-core'),
				'size_units' => array('px', '%'),
				'default' => array(
					'unit' => 'px',
					'size' => '',
				),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-3 .amt-post-grid__item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'title_count',
				'label'   => esc_html__('Title count', 'medixare-core'),
				'default' => 15,
				'description' => esc_html__('Maximum number of title', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'content_display',
				'label'       => esc_html__('Content Display', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition'   => array( 'news_style' => array('style1','style2') ),
				
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__('Word count', 'medixare-core'),
				'default' => 20,
				'condition' => array('content_display' => array('yes'), 'style' => array('style1', 'style2', 'style3',)),
				'description' => esc_html__('Maximum number of words', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_gutter',
				'label'   => esc_html__('Item Gutter', 'medixare-core'),
				'options' => array(
					'g-0' => esc_html__('Gutters 0', 'medixare-core'),
					'g-1' => esc_html__('Gutters 1', 'medixare-core'),
					'g-2' => esc_html__('Gutters 2', 'medixare-core'),
					'g-3' => esc_html__('Gutters 3', 'medixare-core'),
					'g-4' => esc_html__('Gutters 4', 'medixare-core'),
					'g-5' => esc_html__('Gutters 5', 'medixare-core'),
				),
				'default' => 'g-4',
			),
			array(
				'mode' => 'section_end',
			),
			// Option
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_style',
				'label'   => esc_html__('Option', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_author',
				'label'       => esc_html__('Show Author', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
				'condition'   => array( 'news_style' => array('style1','style2') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_date',
				'label'       => esc_html__('Show Date', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_category',
				'label'       => esc_html__('Show Categories', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_comment',
				'label'       => esc_html__('Show Comment', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
				'condition'   => array( 'news_style' => array('style1') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_length',
				'label'       => esc_html__('Show Lenght', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
				'condition'   => array( 'news_style' => array('style1') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_view',
				'label'       => esc_html__('Show View', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
				'condition'   => array( 'news_style' => array('style1') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_video',
				'label'       => esc_html__('Show Video', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'no',
				'condition'   => array( 'news_style' => array('style1') ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'post_read',
				'label'       => esc_html__('Show Read More', 'medixare-core'),
				'label_on'    => esc_html__('Show', 'medixare-core'),
				'label_off'   => esc_html__('Hide', 'medixare-core'),
				'default'     => 'yes',
				'condition'   => array( 'news_style' => array('style1','style2') ),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'read_more_text',
				'label'   => esc_html__('Button Text', 'medixare-core'),
				'default' => esc_html__('Read More', 'medixare-core'),
				'condition' => array('post_read' => array('yes')),
			),
			array(
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',
				'label'   => esc_html__('Image Blend', 'medixare-core'),
				'name' => 'blend',
				'selector' => '{{WRAPPER}} img',
			),
			array(
				'mode' => 'section_end',
			),

			/*query option*/
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_query',
				'label'   => esc_html__('Query Settings', 'medixare-core'),
			),
			/*Post Order*/
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_ordering',
				'label'   => esc_html__('Post Ordering', 'medixare-core'),
				'options' => array(
					'DESC'	=> esc_html__('Desecending', 'medixare-core'),
					'ASC'	=> esc_html__('Ascending', 'medixare-core'),
				),
				'default' => 'DESC',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'post_orderby',
				'label'   => esc_html__('Post Sorting', 'medixare-core'),
				'options' => array(
					'recent' 		=> esc_html__('Recent Post', 'medixare-core'),
					'rand' 			=> esc_html__('Random Post', 'medixare-core'),
					'menu_order' 	=> esc_html__('Custom Order', 'medixare-core'),
					'title' 		=> esc_html__('By Name', 'medixare-core'),
				),
				'default' => 'recent',
			),
			/*Start category*/
			array(
				'id'      => 'query_type',
				'label' => esc_html__('Query type', 'medixare-core'),
				'type' => Controls_Manager::SELECT,
				'default' => 'category',
				'options' => array(
					'category'  => esc_html__('Category', 'medixare-core'),
					'posts' => esc_html__('Posts', 'medixare-core'),
				),
			),
			array(
				'id'      => 'postid',
				'label' => esc_html__('Selects posts', 'medixare-core'),
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
				'label' => esc_html__('Categories', 'medixare-core'),
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
				'label'   => __('Offset ( No of Posts )', 'medixare-core'),
				'default' => '0',
				'separator' => 'before',
			),
			array(
				'type'    => Controls_Manager::REPEATER,
				'id'      => 'posts_not_in',
				'label'   => __('Exclude Post by ID', 'medixare-core'),
				'fields' => $repeater->get_controls(),
			),
			array(
				'mode' => 'section_end',
			),

			// Title style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_title_style',
				'label'   => esc_html__('Content Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'single_item_bg_color',
                'label'   => esc_html__('Item Background', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-post-grid__content' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .amt-post-grid-3 .amt-post-grid__items .amt-post-grid__item' => 'background-color: {{VALUE}};',
                ],
            ),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow2',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-post-grid__item',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'border_radius',
				'label'   => __('Image Radius', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid__item .amt-post-grid__thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'content_box__padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-post-grid__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'title_heading',
				'label' => esc_html__('Title', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'grid_title_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-post-grid__item .amt-post-grid__title',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'grid_title_color',
				'label'   => esc_html__( 'Color', 'medixare-core' ),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid__item .amt-post-grid__title' => 'color: {{VALUE}}',
				),
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_heading',
				'label' => esc_html__('Description', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub_title_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-post-grid__content .amt-post-grid-desc',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'grid_sub_title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid__content .amt-post-grid-desc p' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'title_margin',
				'label'   => __('Padding', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid__item .amt-post-grid__content .amt-post-grid-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'label'   => esc_html__('Meta Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'meta_typo',
				'label'   => esc_html__('Meta Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-post-grid-3 ul.entry-meta li',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_color',
				'label'   => esc_html__('Meta Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-3 ul.entry-meta li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .amt-post-grid-3 ul.entry-meta li a' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'meta_icon_color',
				'label'   => esc_html__('Meta Icon Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-3 ul.entry-meta li i' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'meta_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-3 ul.entry-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
			),
			array(
				'mode' => 'section_end',
			),
			// Category style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_category_style',
				'label'   => esc_html__('Category Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'cat_typo',
				'label'   => esc_html__('Category Typo', 'medixare-core'),
				'selector' => '{{WRAPPER}} .entry-categories.style-1 .category-style',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color',
				'label'   => esc_html__('Category Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .entry-categories.style-1 .category-style' => 'color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'cat_color_bg',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'default' => '',
				'selectors' => array(
					'{{WRAPPER}} .entry-categories.style-1 .category-style' => 'background-color: {{VALUE}}',
				),
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'cat_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-post-grid-3 .amt-post-grid__item .entry-categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('Button Style', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => array('news_style' => array('style1','style2')),
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_icon',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_button_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
			),
				array(
					'mode'    => 'group',
					'type'    => Group_Control_Typography::get_type(),
					'name'    => 'button-text-size',
					'label'   => esc_html__('Text', 'medixare-core'),
					'selector' => '{{WRAPPER}} .tp-readmore-btn',
					'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_1',
					'label'   => esc_html__('Color 1', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(1n+0) .amt-post-grid__content .tp-readmore-btn' => 'color: {{VALUE}} !important;;',
					],
					'default' => '#5bb286',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_1',
					'label'   => esc_html__('Background Color 1', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(1n+0) .amt-post-grid__content .tp-readmore-btn' => 'background-color: {{VALUE}} !important;;',
					],
					'default' => '#5bb28626',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_2',
					'label'   => esc_html__('Color 2', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(2n+0) .amt-post-grid__content .tp-readmore-btn' => 'color: {{VALUE}} !important;;',
					],
					'default' => '#ff9b40',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_2',
					'label'   => esc_html__('Background Color 2', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(2n+0) .amt-post-grid__content .tp-readmore-btn' => 'background-color: {{VALUE}} !important;;',
					],
					'default' => '#ff9b4026',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_3',
					'label'   => esc_html__('Color 3', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(3n+0) .amt-post-grid__content .tp-readmore-btn' => 'color: {{VALUE}} !important;;',
					],
					'default' => '#ff4460',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_3',
					'label'   => esc_html__('Background Color 3', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(3n+0) .amt-post-grid__content .tp-readmore-btn' => 'background-color: {{VALUE}} !important;',
					],
					'default' => '#ff446026',
				),
				array(
					'type' => Controls_Manager::SELECT,
					'id'      => 'btn_border_style',
					'label' => esc_html__('Border Type', 'medixare-core'),
					'options' => [
						'solid'  => esc_html__('Solid', 'medixare-core'),
						'dashed' => esc_html__('Dashed', 'medixare-core'),
						'dotted' => esc_html__('Dotted', 'medixare-core'),
						'double' => esc_html__('Double', 'medixare-core'),
						'none' => esc_html__('None', 'medixare-core'),
					],
					'selectors' => [
						'{{WRAPPER}} .tp-readmore-btn' => 'border-style: {{VALUE}};',
					],
					'default' => 'none',
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_border_color',
					'label'   => esc_html__('Border Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-readmore-btn' => 'border-color: {{VALUE}};',
					],
				),
				array(
					'mode'    => 'responsive',
					'type' => Controls_Manager::DIMENSIONS,
					'id'      => 'btn_border_radius',
					'label' => esc_html__('Border Radius', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-readmore-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				),
				array(
					'mode'    => 'responsive',
					'type' => Controls_Manager::DIMENSIONS,
					'id'      => 'btn_padding',
					'label' => esc_html__('Padding', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-readmore-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				),
				array(
					'mode'    => 'group',
					'type'    => Group_Control_Box_Shadow::get_type(),
					'name'    => 'box_shadow',
					'label'   => esc_html__('Box Shadow', 'medixare-core'),
					'selector' => '{{WRAPPER}} .tp-readmore-btn ',
				),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_button_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_1_hover',
					'label'   => esc_html__('Color 1', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(1n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'color: {{VALUE}} !important;;',
					],
					'default' => '#FFFFFF',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_1_hover',
					'label'   => esc_html__('Background Color 1', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(1n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'background-color: {{VALUE}} !important;;',
					],
					'default' => '#5bb286',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_2_hover',
					'label'   => esc_html__('Color 2', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(2n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'color: {{VALUE}} !important;;',
					],
					'default' => '#FFFFF',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_2_hover',
					'label'   => esc_html__('Background Color 2', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(2n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'background-color: {{VALUE}} !important;;',
					],
					'default' => '#ff9b40',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_txt_color_3_hover',
					'label'   => esc_html__('Color 3', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(3n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'color: {{VALUE}} !important;',
					],
					'default' => '#FFFFFF',
				),
				array(
					'type' => Controls_Manager::COLOR,
					'id'      => 'btn_bg_color_3_hover',
					'label'   => esc_html__('Background Color 3', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .amt-post-grid__items:nth-child(3n+0) .amt-post-grid__content .tp-readmore-btn:hover' => 'background-color: {{VALUE}} !important;',
					],
					'default' => '#ff4460',
				),
				array(
					'type'    => Controls_Manager::COLOR,
					'id'      => 'btn_border_color_hover',
					'label'   => esc_html__('Border Color', 'medixare-core'),
					'selectors' => [
						'{{WRAPPER}} .tp-readmore-btn:hover' => 'border-color: {{VALUE}};',
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
			// Animation style
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_animation_style',
				'label'   => esc_html__('Animation', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation',
				'label'   => esc_html__('Animation', 'medixare-core'),
				'options' => array(
					'wow'        => esc_html__('On', 'medixare-core'),
					'hide'        => esc_html__('Off', 'medixare-core'),
				),
				'default' => 'wow',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'animation_effect',
				'label'   => esc_html__('Entrance Animation', 'medixare-core'),
				'options' => array(
					'none' => esc_html__('none', 'medixare-core'),
					'bounce' => esc_html__('bounce', 'medixare-core'),
					'flash' => esc_html__('flash', 'medixare-core'),
					'pulse' => esc_html__('pulse', 'medixare-core'),
					'rubberBand' => esc_html__('rubberBand', 'medixare-core'),
					'shakeX' => esc_html__('shakeX', 'medixare-core'),
					'shakeY' => esc_html__('shakeY', 'medixare-core'),
					'headShake' => esc_html__('headShake', 'medixare-core'),
					'swing' => esc_html__('swing', 'medixare-core'),
					'fadeIn' => esc_html__('fadeIn', 'medixare-core'),
					'fadeInDown' => esc_html__('fadeInDown', 'medixare-core'),
					'fadeInLeft' => esc_html__('fadeInLeft', 'medixare-core'),
					'fadeInRight' => esc_html__('fadeInRight', 'medixare-core'),
					'fadeInUp' => esc_html__('fadeInUp', 'medixare-core'),
					'bounceIn' => esc_html__('bounceIn', 'medixare-core'),
					'bounceInDown' => esc_html__('bounceInDown', 'medixare-core'),
					'bounceInLeft' => esc_html__('bounceInLeft', 'medixare-core'),
					'bounceInRight' => esc_html__('bounceInRight', 'medixare-core'),
					'bounceInUp' => esc_html__('bounceInUp', 'medixare-core'),
					'slideInDown' => esc_html__('slideInDown', 'medixare-core'),
					'slideInLeft' => esc_html__('slideInLeft', 'medixare-core'),
					'slideInRight' => esc_html__('slideInRight', 'medixare-core'),
					'slideInUp' => esc_html__('slideInUp', 'medixare-core'),
				),
				'default' => 'fadeInUp',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'delay',
				'label'   => esc_html__('Delay', 'medixare-core'),
				'default' => '0.5',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'duration',
				'label'   => esc_html__('Duration', 'medixare-core'),
				'default' => '1',
				'condition'   => array('animation' => array('wow')),
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__('Number of Responsive Columns', 'medixare-core'),
				'condition'   => array( 'news_style' => array('style3') ),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xl',
				'label'   => esc_html__('Desktops: > 1199px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__('Desktops: > 991px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__('Tablets: > 767px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__('Phones: > 576px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col',
				'label'   => esc_html__('Phones: < 576px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render()
	{
		$data = $this->get_settings();

		switch ( $data['news_style'] ) {
			case 'style3':
			$template = 'amt-post-grid-3';
			break;
			case 'style2':
			$template = 'amt-post-grid-2';
			break;
			default:
			$template = 'amt-post-grid-1';
			break;
		}

		return $this->amt_template($template, $data);
	}
}
