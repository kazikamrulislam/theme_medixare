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
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes\Typography as Scheme_Typography;

if (!defined('ABSPATH')) exit;

class AMT_Team extends Custom_Widget_Base
{

	public function __construct($data = [], $args = null)
	{
		$this->amt_name = esc_html__('AMT Team', 'medixare-core');
		$this->amt_base = 'rt-team';
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
		$terms = get_terms(array('taxonomy' => 'medixare_team_category', 'fields' => 'id=>name'));
		$category_dropdown = array('0' => esc_html__('All Categories', 'medixare-core'));

		foreach ($terms as $id => $name) {
			$category_dropdown[$id] = $name;
		}

		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__('General', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT,
				'id'      => 'style',
				'label'   => esc_html__('Style', 'medixare-core'),
				'options' => array(
					'style1' => esc_html__('Team Grid 1', 'medixare-core'),
					'style2' => esc_html__('Team Grid 2', 'medixare-core'),
				),
				'default' => 'style1',
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number',
				'label'   => esc_html__('Total number of items', 'medixare-core'),
				'default' => 4,
				'description' => esc_html__('Write -1 to show all', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'item_space',
				'label'   => esc_html__('Item Space', 'medixare-core'),
				'options' => array(
					'g-0' => esc_html__('Gutters 0', 'medixare-core'),
					'g-1' => esc_html__('Gutters 1', 'medixare-core'),
					'g-2' => esc_html__('Gutters 2', 'medixare-core'),
					'g-3' => esc_html__('Gutters 3', 'medixare-core'),
					'g-4' => esc_html__('Gutters 4', 'medixare-core'),
					'g-5' => esc_html__('Gutters 5', 'medixare-core'),
				),
				'default' => 'g-4',
				'condition'   => array('style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => esc_html__('Categories', 'medixare-core'),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => esc_html__('Order By', 'medixare-core'),
				'options' => array(
					'date'        => esc_html__('Date (Recents comes first)', 'medixare-core'),
					'title'       => esc_html__('Title', 'medixare-core'),
					'menu_order'  => esc_html__('Custom Order (Available via Order field inside Page Attributes box)', 'medixare-core'),
				),
				'default' => 'date',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'contype',
				'label'   => esc_html__('Content Type', 'medixare-core'),
				'options' => array(
					'content' => esc_html__('Conents', 'medixare-core'),
					'excerpt' => esc_html__('Excerpts', 'medixare-core'),
				),
				'default'     => 'content',
				'description' => esc_html__('Display contents from Editor or Excerpt field', 'medixare-core'),
				'condition'   => array('content_display' => 'yes'),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'count',
				'label'   => esc_html__('Word count', 'medixare-core'),
				'default' => 12,
				'description' => esc_html__('Maximum number of words', 'medixare-core'),
				'condition'   => array('content_display' => 'yes'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'designation_display',
				'label'       => esc_html__('Designation Display', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Designation. Default: On', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'social_display',
				'label'       => esc_html__('Social Media Display', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide Social Medias. Default: On', 'medixare-core'),
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'more_items_display',
				'label'       => esc_html__('Show More Items', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Show or Hide More Items. Default: On', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'more_button',
				'label'   => esc_html__('More Button', 'medixare-core'),
				'options' => array(
					'show'        => esc_html__('Show Read More', 'medixare-core'),
					'hide'        => esc_html__('Show Pagination', 'medixare-core'),
				),
				'default' => 'show',
				'condition'   => array('more_items_display' => array('yes'), 'style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_text',
				'label'   => esc_html__('Button Text', 'medixare-core'),
				'condition'   => array('more_button' => array('show')),
				'default' => esc_html__('More Teams', 'medixare-core'),
				'condition'   => array('more_items_display' => array('yes'), 'more_button' => array('show'), 'style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::TEXT,
				'id'      => 'see_button_link',
				'label'   => esc_html__('Button Link', 'medixare-core'),
				'condition'   => array('more_items_display' => array('yes'), 'more_button' => array('show'), 'style' => array('style1', 'style2', 'style3')),
			),
			array(
				'mode' => 'section_end',
			),

			// Style from here
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_shape_style',
				'label'   => esc_html__('Shapes', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_1_color',
				'label'   => esc_html__('Shape 1', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__content::before' => 'background-color: {{VALUE}} !important;',
				],
				'default' => '#ff4460',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape_2_color',
				'label'   => esc_html__('Shape 2', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__content::after' => 'background-color: {{VALUE}} !important;',
				],
				'default' => '#ff9b40',
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_background_style',
				'label'   => esc_html__('General', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'style_1_bg',
				'label'   => esc_html__('Background', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team__content.white-bg' => 'background-color: {{VALUE}} !important;',
				],
				'default' => '#fff',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'background_padding',
				'label'   => __('Padding', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-team__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'mode' => 'section_end',
			),
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_icon_style',
				'label'   => esc_html__('Social Icons', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition'   => ['style' => 'style2'],
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_abs-1',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
			),
			array(
				'mode'    => 'responsive',
				'id'      => 'social-icon-size',
				'type'    => Controls_Manager::SLIDER,
				'label'   => esc_html__('Size', 'medixare-core'),
				'size_units' => array('px', '%'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-2__btns a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'social_icon_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-2__btns a i' => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'social_icon_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-2__btns a i' => 'background-color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'icon_padding',
				'label'   => __('Padding', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .amt-team-2__btns a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
			),
			array(
				'mode' => 'tab_end',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tab_start_abs_icon_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'social_icon_color_hover',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-2__btns a i:hover' => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'social_icon_bg_color_hover',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-2__btns a i:hover' => 'background-color: {{VALUE}};',
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
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_content_style',
				'label'   => esc_html__('Content', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
			),
			array(
				'mode'    => 'tabs_start',
				'id'      => 'tabs_start_content',
			),
			array(
				'mode'    => 'tab_start',
				'id'      => 'tabs_start_content_normal',
				'label'   => esc_html__('Normal', 'medixare-core'),
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
				'name'    => 'title_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-team-3__title a',
				'condition' => ['style' => 'style2'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'title_typo2',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-team__title',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__title a' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color2',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team__title' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type' => Controls_Manager::HEADING,
				'id'      => 'sub_title_heading',
				'label' => esc_html__('Designation', 'medixare-core'),
				'separator' => 'before',
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub-title_typo',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-team-3__content .cat',
				'condition' => ['style' => 'style2'],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Typography::get_type(),
				'name'    => 'sub-title_typo2',
				'label'   => esc_html__('Style', 'medixare-core'),
				'selector' => '{{WRAPPER}} .amt-team__content .team-designation',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub-title_color',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__content .cat' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub-title_color2',
				'label'   => esc_html__('Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team__content .team-designation' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape1_color_1',
				'label'   => esc_html__('Circle shape', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}}  .amt-team__btn a svg circle' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition' => ['style' => 'style1'],

			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape2_color_1',
				'label'   => esc_html__('Arrow shape', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}}   .amt-team__btn a svg path ' => 'color: {{VALUE}};',
				],
				'condition' => ['style' => 'style1'],
				'default' => '#000',
			),
			array(
				'mode' => 'tab_end',
			),

			array(
				'mode'    => 'tab_start',
				'id'      => 'tabs_start_content_hover',
				'label'   => esc_html__('Hover', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color_hover',
				'label'   => esc_html__('Title Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__title a:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'title_color2_hover',
				'label'   => esc_html__('Title Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team__title:hover' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub-title_color_hover',
				'label'   => esc_html__('Designation Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team-3__content .cat:hover' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
				'condition' => ['style' => 'style2'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'sub-title_color2_hover',
				'label'   => esc_html__('Designation Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .amt-team__content .team-designation:hover' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape1_color_hover',
				'label'   => esc_html__('Circle shape', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}}  .amt-team__btn a:hover svg circle' => 'color: {{VALUE}};',
				],
				'default' => '#000',
				'condition' => ['style' => 'style1'],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'shape2_color_hover',
				'label'   => esc_html__('Arrow shape', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}}   .amt-team__btn a:hover svg path ' => 'color: {{VALUE}};',
				],
				'default' => '#ff4460',
				'condition' => ['style' => 'style1'],
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
				'type'    => Group_Control_Css_Filter::get_type(),
				'mode'    => 'group',
				'label'   => esc_html__('Image Blend', 'medixare-core'),
				'name' => 'blend',
				'selector' => '{{WRAPPER}} .team-item .team-thums img',
			),
			array(
				'mode' => 'section_end',
			),
			//Load more button style
			array(
				'mode'    => 'section_start',
				'id'      => 'btn_style',
				'label'   => esc_html__('More Items Button', 'medixare-core'),
				'tab'     => Controls_Manager::TAB_STYLE,
				'condition' => array('more_items_display' => array('yes')),
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
				'selector' => '{{WRAPPER}} .team-button .button-style-1',
				'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_text_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1'  => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1' => 'background-color: {{VALUE}};',
				],
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
					'{{WRAPPER}} .team-button .button-style-1' => 'border-style: {{VALUE}};',
				],
				'default' => 'none',
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_border_radius',
				'label' => esc_html__('Border Radius', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'responsive',
				'type' => Controls_Manager::DIMENSIONS,
				'id'      => 'btn_padding',
				'label' => esc_html__('Padding', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .team-button .button-style-1',
			),
			array(
				'type'    => Controls_Manager::DIMENSIONS,
				'mode'          => 'responsive',
				'size_units' => ['px', '%', 'em'],
				'id'      => 'load_more_margin',
				'label'   => __('Margin', 'medixare-core'),
				'selectors' => array(
					'{{WRAPPER}} .team-button .button-style-1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				),
				'separator' => 'before',
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
				'type'    => Controls_Manager::COLOR,
				'id'      => 'text-hover_color',
				'label'   => esc_html__('Text Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1:hover'  => 'color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_bg_hover-color',
				'label'   => esc_html__('Background Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1:hover' => 'background-color: {{VALUE}};',
				],
			),
			array(
				'type'    => Controls_Manager::COLOR,
				'id'      => 'btn_border_color_hover',
				'label'   => esc_html__('Border Color', 'medixare-core'),
				'selectors' => [
					'{{WRAPPER}} .team-button .button-style-1:hover' => 'border-color: {{VALUE}};',
				],
			),
			array(
				'mode'    => 'group',
				'type'    => Group_Control_Box_Shadow::get_type(),
				'name'    => 'hover-box_shadow',
				'label'   => esc_html__('Box Shadow', 'medixare-core'),
				'selector' => '{{WRAPPER}} .team-button .button-style-1:hover',
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

			// Responsive Grid Columns
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_responsive',
				'label'   => esc_html__('Number of Responsive Columns', 'medixare-core'),
				'condition'   => array('style' => array('style1', 'style2', 'style3')),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_lg',
				'label'   => esc_html__('Desktops: > 1199px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '3',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_md',
				'label'   => esc_html__('Desktops: > 991px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '4',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_sm',
				'label'   => esc_html__('Tablets: > 767px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '6',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_xs',
				'label'   => esc_html__('Phones: < 768px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'col_mobile',
				'label'   => esc_html__('Small Phones: < 480px', 'medixare-core'),
				'options' => $this->amt_translate['cols'],
				'default' => '12',
			),
			array(
				'mode' => 'section_end',
			),

			// Responsive Slider Columns
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider_pervice',
				'label'       => esc_html__('PerView Options', 'medixare-core'),
				'condition'   => array('style' => array('style4', 'style5')),
			),

			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'desktop',
				'label'   => esc_html__('Desktops: > 1600px', 'medixare-core'),
				'default' => '4',
				'options' => array(
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3',  'medixare-core'),
					'4' => esc_html__('4',  'medixare-core'),
				),
			),

			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'md_desktop',
				'label'   => esc_html__('Desktops: > 1200px', 'medixare-core'),
				'default' => '3',
				'options' => array(
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3',  'medixare-core'),
					'4' => esc_html__('4',  'medixare-core'),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'sm_desktop',
				'label'   => esc_html__('Desktops: > 992px', 'medixare-core'),
				'default' => '2',
				'options' => array(
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3',  'medixare-core'),
					'4' => esc_html__('4',  'medixare-core'),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'tablet',
				'label'   => esc_html__('Tablets: > 768px', 'medixare-core'),
				'default' => '2',
				'options' => array(
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3',  'medixare-core'),
				),
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'mobile',
				'label'   => esc_html__('Phones: > 576px', 'medixare-core'),
				'default' => '1',
				'options' => array(
					'1' => esc_html__('1', 'medixare-core'),
					'2' => esc_html__('2', 'medixare-core'),
					'3' => esc_html__('3',  'medixare-core'),
					'4' => esc_html__('4',  'medixare-core'),
				),
			),
			array(
				'mode' => 'section_end',
			),

			// Slider options
			array(
				'mode'        => 'section_start',
				'id'          => 'sec_slider',
				'label'       => esc_html__('Slider Options', 'medixare-core'),
				'condition'   => array('style' => array('style4', 'style5')),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_autoplay',
				'label'       => esc_html__('Autoplay', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Enable or disable autoplay. Default: On', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_arrow',
				'label'       => esc_html__('Navigation Arrow', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Navigation Arrow. Default: On', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'display_buttet',
				'label'       => esc_html__('Pagination', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Pagination Arrow. Default: On', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::SLIDER,
				'mode' 			=> 'responsive',
				'id'      => 'slides_per_group',
				'label'   => esc_html__('slides Per Group', 'medixare-core'),
				'default' => array(
					'size' => 1,
				),
				'description' => esc_html__('slides Per Group. Default: 1', 'medixare-core'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'centered_slides',
				'label'       => esc_html__('Centered Slides', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Centered Slides. Default: On', 'medixare-core'),

			),
			array(
				'type'        => Controls_Manager::NUMBER,
				'id'          => 'slides_space',
				'label'       => esc_html__('Slides Space', 'medixare-core'),
				'default'     => 10,
				'description' => esc_html__('Slides Space. Default: 10', 'medixare-core'),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_delay',
				'label'   => esc_html__('Autoplay Slide Delay', 'medixare-core'),
				'default' => 5000,
				'description' => esc_html__('Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds', 'medixare-core'),
				'condition'   => array('slider_autoplay' => 'yes'),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'slider_autoplay_speed',
				'label'   => esc_html__('Autoplay Slide Speed', 'medixare-core'),
				'default' => 1000,
				'description' => esc_html__('Set any value for example .8 seconds to play it in every 2 seconds. Default: .8 Seconds', 'medixare-core'),
				'condition'   => array('slider_autoplay' => 'yes'),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'slider_loop',
				'label'       => esc_html__('Loop', 'medixare-core'),
				'label_on'    => esc_html__('On', 'medixare-core'),
				'label_off'   => esc_html__('Off', 'medixare-core'),
				'default'     => 'yes',
				'description' => esc_html__('Loop to first item. Default: On', 'medixare-core'),
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
		if ($data['slider_autoplay'] == 'yes') {
			$data['slider_autoplay'] = true;
		} else {
			$data['slider_autoplay'] = false;
		}

		$swiper_data = array(
			'slidesPerView' 	=> 2,
			'centeredSlides'	=> $data['centered_slides'] == 'yes' ? true : false,
			'loop'				=> $data['slider_loop'] == 'yes' ? true : false,
			'spaceBetween'		=> $data['slides_space'],
			'slidesPerGroup'	=> $data['slides_per_group']['size'],
			'slideToClickedSlide' => true,
			'autoplay'				=> array(
				'delay'  => $data['slider_autoplay_delay'],
			),
			'speed'      => $data['slider_autoplay_speed'],
			'breakpoints' => array(
				'0'    => array('slidesPerView' => 1),
				'576'    => array('slidesPerView' => $data['mobile']),
				'768'    => array('slidesPerView' => $data['tablet']),
				'992'    => array('slidesPerView' => $data['sm_desktop']),
				'1200'    => array('slidesPerView' => $data['md_desktop']),
				'1600'    => array('slidesPerView' => $data['desktop'])
			),
			'auto'   => $data['slider_autoplay']
		);

		switch ($data['style']) {
			case 'style2':
				$template = 'team-grid-2';
				break;
			default:
				$template = 'team-grid-1';
				break;
		}

		$data['swiper_data'] = json_encode($swiper_data);

		return $this->amt_template($template, $data);
	}
}
