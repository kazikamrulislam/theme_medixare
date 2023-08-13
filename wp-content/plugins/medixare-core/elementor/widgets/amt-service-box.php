<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Core\Schemes\Typography as Scheme_Typography;


if (!defined('ABSPATH')) exit;

class AMT_Service_Box extends Custom_Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        $this->amt_name = esc_html__('AMT Service Box', 'medixare-core');
        $this->amt_base = 'amt-service-box';
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
            array(
                'type'    => Controls_Manager::SELECT,
                'id'      => 'style',
                'label'   => esc_html__('Service Style', 'medixare-core'),
                'options' => array(
                    'style1' => esc_html__('Service Style 1', 'medixare-core'),
                    'style2' => esc_html__('Service Style 2', 'medixare-core'),
                    'style3' => esc_html__('Service Style 3', 'medixare-core'),
                    'style4' => esc_html__('Service Style 4', 'medixare-core'),
                ),
                'default' => 'style1',
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'number',
                'label'   => esc_html__('Total number of items', 'medixare-core'),
                'default' => 3,
                'description' => esc_html__('Write -1 to show all', 'medixare-core'),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'amt-service_thumb_display',
                'label'       => esc_html__('Service Thumb Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
                'condition'   => array('style' => array('style1', 'style2')),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'amt-service_title_display',
                'label'       => esc_html__('Service Title Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'amt-service_excerpt_display',
                'label'       => esc_html__('Service Excerpt Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'amt-service_icon_display',
                'label'       => esc_html__('Service Icon Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'amt-service_loadmore_display',
                'label'       => esc_html__('Service loadmore Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'count',
                'label'   => esc_html__('Word count', 'medixare-core'),
                'default' => 20,
                'condition'   => array('style' => array('style1', 'style2', 'style3', 'style4')),
                'description' => esc_html__('Maximum number of words', 'medixare-core'),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_title',
                'label'   => esc_html__('Title', 'medixare-core'),
                'condition' => ['style' => ['style3']],
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'amt-section_3_sub_title',
                'label'   => esc_html__('Section Title part 1', 'medixare-core'),
                'default' => 'Our Service',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'amt-section_3_title_part-1',
                'label'   => esc_html__('Section Title part 1', 'medixare-core'),
                'default' => 'You deserves our',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'amt-section_3_title_part-2',
                'label'   => esc_html__('Section Title part 2', 'medixare-core'),
                'default' => 'Best services',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'amt-section_3_title_btn_text',
                'label'   => esc_html__('Button Text', 'medixare-core'),
                'default' => 'See All Services',
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
                    'DESC'    => esc_html__('Desecending', 'medixare-core'),
                    'ASC'    => esc_html__('Ascending', 'medixare-core'),
                ),
                'default' => 'DESC',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'post_orderby',
                'label'   => esc_html__('Post Sorting', 'medixare-core'),
                'options' => array(
                    'recent'         => esc_html__('Recent Post', 'medixare-core'),
                    'rand'             => esc_html__('Random Post', 'medixare-core'),
                    'menu_order'     => esc_html__('Custom Order', 'medixare-core'),
                    'title'         => esc_html__('By Name', 'medixare-core'),
                ),
                'default' => 'recent',
            ),
            /*Start category*/
            array(
                'id'      => 'query_type',
                'label' => esc_html__('Query type', 'medixare-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'medixare_service',
                'options' => array(
                    'category'  => esc_html__('Category', 'medixare-core'),
                    'medixare_service' => esc_html__('Service', 'medixare-core'),
                ),
            ),
            array(
                'id'      => 'postid',
                'label' => esc_html__('Selects posts', 'medixare-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_all_posts('medixare_service'),
                'label_block' => true,
                'multiple' => true,
                'condition' => array(
                    'query_type' => 'medixare_service',
                ),
            ),
            array(
                'id'      => 'catid',
                'label' => esc_html__('Categories', 'medixare-core'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_taxonomy_drops('medixare_service_category'),
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
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_responsive',
                'label'   => esc_html__('Number of Responsive Columns', 'medixare-core'),
                'condition'   => array('style' => array('style4')),
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_lg',
                'label'   => esc_html__('Desktops: > 1199px', 'medixare-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '6',
            ),
            array(
                'type'    => Controls_Manager::SELECT2,
                'id'      => 'col_md',
                'label'   => esc_html__('Desktops: > 991px', 'medixare-core'),
                'options' => $this->amt_translate['cols'],
                'default' => '6',
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
            // Style start
            array(
                'tab'     => Controls_Manager::TAB_STYLE,
                'mode'    => 'section_start',
                'id'      => 'amt-section_general',
                'label'   => esc_html__('General', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-section_single-item-bg',
                'label'   => esc_html__('Background', 'medixare-core'),
                'default' => '#fff',
                'selectors' => array(
                    '{{WRAPPER}} .amt-service__info-box .amt-service-content-holder' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .amt-about__info-box-3 .amt-service__box-item-3' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .amt-about__info-box-4 .amt-service__box-item-4' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'mode'    => 'responsive',
                'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'amt-section_box_1_2_padding',
                'label'   => esc_html__('Padding', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .amt-service-content-holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about__info-box-3 .amt-service__box-item-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about__info-box-4 .amt-service__box-item-4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'amt-section_box_1_2_br',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item .amt-service_thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => array('style' => array('style1', 'style2')),
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'amt-section_box_radius',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-about__info-box-3 .amt-service__box-item-3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .amt-about__info-box-4 .amt-service__box-item-4' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'   => array('style' => array('style3', 'style4')),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'box_shadow',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-about__info-box-3 .amt-service__box-item-3',
                'condition'   => array('style' => array('style3')),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'tab'     => Controls_Manager::TAB_STYLE,
                'mode'    => 'section_start',
                'id'      => 'amt-section_title',
                'label'   => esc_html__('Title Design', 'medixare-core'),
                'condition' => ['style' => ['style3']],
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'sub_title_heading',
                'label' => esc_html__('Sub-title', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'amt-section_subtitle_typo',
                'label'   => esc_html__('Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__subtitle',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-section_subtitle',
                'label'   => esc_html__('Color', 'medixare-core'),
                'default' => '--accent_dark_color',
                'selectors' => array(
                    '{{WRAPPER}} .amt-section__subtitle' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'main_title_heading',
                'label' => esc_html__('Title', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'amt-section_title_part-1_typo',
                'label'   => esc_html__('Part-1', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__title',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-section_title_part-1',
                'label'   => esc_html__('Color 1', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-section__title' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'amt-section_title_part-2_typo',
                'label'   => esc_html__('Part 2', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__title span',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-section_title_part-2',
                'label'   => esc_html__('Color 2', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-section__title span' => 'color: {{VALUE}}',
                ),
            ),

            //3rd style button
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'main_title_btn_heading',
                'label' => esc_html__('Button', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'tabs_start',
                'id'      => 'tabs_start_icon3',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_button_normal3',
                'label'   => esc_html__('Normal', 'medixare-core'),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'button-text-size3',
                'label'   => esc_html__('Text', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section-bnt-wrapper a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color3',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a'  => 'color: {{VALUE}};',
                ],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color3',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a' => 'background-color: {{VALUE}};',
                ],
            ),
            array(
                'type' => Controls_Manager::SELECT,
                'id'      => 'btn_border_style3',
                'label' => esc_html__('Border Type', 'medixare-core'),
                'options' => [
                    'solid'  => esc_html__('Solid', 'medixare-core'),
                    'dashed' => esc_html__('Dashed', 'medixare-core'),
                    'dotted' => esc_html__('Dotted', 'medixare-core'),
                    'double' => esc_html__('Double', 'medixare-core'),
                    'none' => esc_html__('None', 'medixare-core'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a' => 'border-style: {{VALUE}};',
                ],
                'default' => 'none',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color3',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius3',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding3',
                'label' => esc_html__('Padding', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'box_shadow3',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section-bnt-wrapper a ',
            ),
            array(
                'mode' => 'tab_end',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_button_hover3',
                'label'   => esc_html__('Hover', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'text-hover_color3',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a:hover'  => 'color: {{VALUE}};',
                ],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_hover-color3',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a:hover' => 'background-color: {{VALUE}};',
                ],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color_hover3',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-bnt-wrapper a:hover' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'hover-box_shadow3',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section-bnt-wrapper a:hover',
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
            // Post Style
            array(
                'tab'     => Controls_Manager::TAB_STYLE,
                'mode'    => 'section_start',
                'id'      => 'amt-post_style',
                'label'   => esc_html__('Service Post Design', 'medixare-core'),
            ),
            array(
                'type' => Controls_Manager::CHOOSE,
                'id'      => 'icon_align',
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
                'default' => 'left',
                'selectors' => array(
                    '{{WRAPPER}} .amt-about__info-box-3 .service_icon' => 'text-align : {{VALUE}};',
                ),
                'condition'   => array('style' => array('style3')),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'amt-service_post_heading',
                'label' => esc_html__('Title', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'amt-service_post_title_typo',
                'label'   => esc_html__('Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-service_title',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-service_post_title',
                'label'   => esc_html__('Color', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-service_title' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-service_post_title_hover',
                'label'   => esc_html__('Hover Color', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-service_title:hover' => 'color: {{VALUE}}',
                ),
            ),
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'mode'          => 'responsive',
                'size_units' => ['px', '%', 'em'],
                'id'      => 'amt-service_post_title_margin',
                'label'   => __('Margin', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-service_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'amt-service_post_excerpt_heading',
                'label' => esc_html__('Excerpt', 'medixare-core'),
                'separator' => 'before',
                'condition' => ['style' => ['style1', 'style2', 'style3']],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'amt-service_post_excrpt_typo',
                'label'   => esc_html__('Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-service_excerpt',
                'condition' => ['style' => ['style1', 'style2', 'style3']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'amt-service_post_excrpt',
                'label'   => esc_html__('Color', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-service_excerpt' => 'color: {{VALUE}}',
                ),
                'condition' => ['style' => ['style1', 'style2', 'style3']],
            ),
            array(
                'type'    => Controls_Manager::DIMENSIONS,
                'mode'          => 'responsive',
                'size_units' => ['px', '%', 'em'],
                'id'      => 'amt-service_post_exp_margin',
                'label'   => __('Margin', 'medixare-core'),
                'selectors' => array(
                    '{{WRAPPER}} .amt-service_excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ),
                'condition' => ['style' => ['style1', 'style2', 'style3']],
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'loadmore_btn_style',
                'label'   => esc_html__('Load More Button', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
                'condition' => ['amt-service_loadmore_display' => 'yes'],
            ),
            array(
                'mode'    => 'tabs_start',
                'id'      => 'tabs_start_icon1',
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
                'selector' => '{{WRAPPER}} .amt-service_loadmore a',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a'  => 'color: {{VALUE}};',
                ],
                'condition' => ['style' => ['style3', 'style4']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color1',
                'label'   => esc_html__('Color 1', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(n+0) .amt-service_loadmore a'  => 'color: {{VALUE}};',
                ],
                'default' => '#ff4460',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color1',
                'label'   => esc_html__('Background Color 1', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(n+0) .amt-service_loadmore a'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#ff446026',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color2',
                'label'   => esc_html__('Color 2', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(2n+0) .amt-service_loadmore a'  => 'color: {{VALUE}};',
                ],
                'default' => '#5bb286',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color2',
                'label'   => esc_html__('Background Color 2', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(2n+0) .amt-service_loadmore a'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#5bb28626',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color4',
                'label'   => esc_html__('Color 3', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(3n+0) .amt-service_loadmore a'  => 'color: {{VALUE}};',
                ],
                'default' => '#ff9b40',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color4',
                'label'   => esc_html__('Background Color 3', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(3n+0) .amt-service_loadmore a'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#ff9b4026',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['style' => ['style3', 'style4']],
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
                    '{{WRAPPER}} .amt-service_loadmore a' => 'border-style: {{VALUE}};',
                ],
                'default' => 'none',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding',
                'label' => esc_html__('Padding', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'box_shadow2',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-service_loadmore a ',
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
                    '{{WRAPPER}} .amt-service_loadmore a:hover'  => 'color: {{VALUE}};',
                ],
                'condition' => ['style' => ['style3', 'style4']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_hover-color',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a:hover' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['style' => ['style3', 'style4']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color1_hover',
                'label'   => esc_html__('Color 1', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(n+0) .amt-service_loadmore a:hover'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color1_hover',
                'label'   => esc_html__('Background Color 1', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(n+0) .amt-service_loadmore a:hover'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#ff4460',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color2_hover',
                'label'   => esc_html__('Color 2', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(2n+0) .amt-service_loadmore a:hover'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color2_hover',
                'label'   => esc_html__('Background Color 2', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(2n+0) .amt-service_loadmore a:hover'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#5bb286',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color4_hover',
                'label'   => esc_html__('Color 3', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(3n+0) .amt-service_loadmore a:hover'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color4_hover',
                'label'   => esc_html__('Background Color 3', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service__info-box .service_item:nth-child(3n+0) .amt-service_loadmore a:hover'  =>  'background-color: {{VALUE}};',
                ],
                'default' => '#ff9b40',
                'condition' => ['style' => ['style1', 'style2']],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color_hover',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-service_loadmore a:hover' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'hover-box_shadow',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-service_loadmore a:hover',
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
        );
        return $fields;
    }

    protected function render()
    {
        $data = $this->get_settings();

        switch ($data['style']) {
            case 'style4':
                $template = 'mx-service-box-4';
                break;
            case 'style3':
                $template = 'mx-service-box-3';
                break;
            case 'style2':
                $template = 'mx-service-box-2';
                break;
            default:
                $template = 'mx-service-box-1';
                break;
        }

        return $this->amt_template($template, $data);
    }
}
