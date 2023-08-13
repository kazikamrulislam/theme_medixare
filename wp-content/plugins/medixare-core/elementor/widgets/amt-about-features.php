<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Base;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use \WP_Query;
use Elementor\Icons_Manager;
use MedixareTheme;
use MedixareTheme_Helper;


if (!defined('ABSPATH')) exit;

class Amt_About_Features extends Custom_Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        $this->amt_name = esc_html__('AMT About Features', 'medixare-core');
        $this->amt_base = 'amt-about-features';
        parent::__construct($data, $args);
    }

    public function amt_fields()
    {
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'selected_icon',
            [
                'label' => esc_html__('Icon', 'medixare-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fa fa-check',
                    'library' => 'fa-solid',
                ],
                'fa4compatibility' => 'icon',
            ]
        );
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__('Text', 'medixare-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('List Item', 'medixare-core'),
                'default' => esc_html__('About Features item', 'medixare-core'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $fields = array(
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general',
                'label'   => esc_html__('General', 'medixare-core'),
            ),
            array(
                'type' => Controls_Manager::CHOOSE,
                'id'      => 'content_align',
                'mode'    => 'responsive',
                'label'   => esc_html__('Align Items', 'medixare-core'),
                'options' => array(
                    'flex-start' => array(
                        'title' => __('Top', 'elementor'),
                        'icon' => 'eicon-align-start-v',
                    ),
                    'center' => array(
                        'title' => __('Middle', 'elementor'),
                        'icon' => 'eicon-align-center-v',
                    ),
                    'flex-end' => array(
                        'title' => __('Bottom', 'elementor'),
                        'icon' => 'eicon-align-end-v',
                    ),
                ),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .amt-features-row' => 'align-items : {{VALUE}};',
                ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-1',
                'label'   => esc_html__('Title part 1', 'medixare-core'),
                'default' => "We'll ensure always get",
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-2',
                'label'   => esc_html__('Title part 2', 'medixare-core'),
                'default' => 'best results.',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-3',
                'label'   => esc_html__('Title part 3', 'medixare-core'),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'content_display',
                'label'       => esc_html__('Content Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'    => Controls_Manager::TEXTAREA,
                'id'      => 'text',
                'label'   => esc_html__('Text', 'medixare-core'),
                'default' => 'Exerci tation ullamcorper suscipit lobortis nisl aliquip ex ea commodo claritatem insitamconse quat.Exerci tation ullamcorper suscipit loborti excommodo habent claritatem insitamconse quat.Exerci tationlobortis nisl aliquip ex ea commodo',
                'condition'   => array(
                    'content_display' => 'yes',
                ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'button_display',
                'label'       => esc_html__('Button Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'amt-button',
                'label'   => esc_html__('Button Text', 'medixare-core'),
                'default' => 'BOOK AN APPOINMENT',
                'condition' => array('button_display' => array('yes')),
            ),
            array(
                'type'    => Controls_Manager::URL,
                'id'      => 'link_url',
                'label'   => esc_html__('Button URL', 'medixare-core'),
                'placeholder' => 'https://your-link.com',
                'condition' => array('button_display' => array('yes')),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_2',
                'label'   => esc_html__('Images', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-1',
                'label' => esc_html__('Image 1', 'medixare-core'),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-2',
                'label' => esc_html__('Image 2', 'medixare-core'),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-3',
                'label' => esc_html__('Image 3', 'medixare-core'),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'type'    => Controls_Manager::MEDIA,
                'id'      => 'image-4',
                'label' => esc_html__('Image 4', 'medixare-core'),
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general_3',
                'label'   => esc_html__('Features Lists', 'medixare-core'),
            ),
            array(
                'label' => esc_html__('Items', 'medixare-core'),
                'id'    => 'icon_list',
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'text' => esc_html__('Extramural Funding', 'medixare-core'),
                        'selected_icon' => [
                            'value' => 'fa fa-check',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'text' => esc_html__('Bacteria Markers', 'medixare-core'),
                        'selected_icon' => [
                            'value' => 'fa fa-check',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'text' => esc_html__('In aliquet dui nec lectus', 'medixare-core'),
                        'selected_icon' => [
                            'value' => 'fa fa-check',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'text' => esc_html__('In aliquet dui nec lectus', 'medixare-core'),
                        'selected_icon' => [
                            'value' => 'fa fa-check',
                            'library' => 'fa-solid',
                        ],
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ),
            array(
                'mode' => 'section_end',
            ),
            // Style

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_style',
                'label'   => esc_html__('Content', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'id'      => 'space_between1',
                'label' => esc_html__('Space Between', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title_wrapper' => 'padding-left: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'title_style',
                'label' => esc_html__('Title', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'title_typo',
                'label'   => esc_html__('part 1', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__title',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color',
                'label'   => esc_html__('Color 1', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title'  => 'color: {{VALUE}};',
                ],
                'default' => '#1F0D3C',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'title_typo_2',
                'label'   => esc_html__('Part 2', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__title span',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color2',
                'label'   => esc_html__('Color 2', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title span'  => 'color: {{VALUE}};',
                ],
                'default' => '#1F0D3C',
            ),
            array(
                'mode'    => 'responsive',
                'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'title_space',
                'label'   => esc_html__('Title Spacing', 'medixare-core'),
                'size_units' => array('px', '%'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'left' => 'auto',
                    'bottom' => '',
                    'right' => 'auto',
                ],
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'content_style',
                'label' => esc_html__('Description', 'medixare-core'),
                'separator' => 'before',
                'condition'   => array(
                    'content_display' => 'yes',
                ),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'content_typo',
                'label'   => esc_html__('Typography', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__title_wrapper p',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
                'condition'   => array(
                    'content_display' => 'yes',
                ),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'content_color',
                'label'   => esc_html__('Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title_wrapper p' => 'color: {{VALUE}};',
                ],
                'default' => '#676E89',
                'condition'   => array(
                    'content_display' => 'yes',
                ),
            ),
            array(
                'mode'    => 'responsive',
                'type'    => Controls_Manager::DIMENSIONS,
                'id'      => 'content_space',
                'label'   => esc_html__('Content Spacing', 'medixare-core'),
                'size_units' => array('px', '%'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__title_wrapper p' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto ;',
                ],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'left' => 'auto',
                    'bottom' => '',
                    'right' => 'auto',
                ],
                'condition'   => array(
                    'content_display' => 'yes',
                ),
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'item_style',
                'label'   => esc_html__('Features List', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'mode'    => 'tabs_start',
                'id'      => 'tabs_start_item',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_item_normal',
                'label'   => esc_html__('Normal', 'medixare-core'),
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'id' => 'space_between',
                'label' => esc_html__('Space Between', 'medixare-core'),
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li' => 'padding-bottom: calc({{SIZE}}{{UNIT}})',
                ],
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'icon-color',
                'label' => esc_html__('Icon Color', 'medixare-core'),
                'default' => '#ff9b40',
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .amt-section__list ul li svg' => 'fill: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'label' => esc_html__('Icon Size', 'medixare-core'),
                'id' => 'icon-size',
                'range' => [
                    'px' => [
                        'min' => 6,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .amt-section__list ul li svg' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'text_typo',
                'label'   => esc_html__('Typography', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section__list ul li',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'text-color',
                'label' => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::SLIDER,
                'label' => esc_html__('Text Indent', 'medixare-core'),
                'id' => 'text-indent',
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li i' =>  'padding-right: {{SIZE}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'list_margin',
                'label' => esc_html__('Margin', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-about-features .mb-40' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'tab_end',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_item_hover',
                'label'   => esc_html__('Hover', 'medixare-core'),
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'text-color-hover',
                'label' => esc_html__('Text Color', 'medixare-core'),
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .amt-about-features .amt-section__list ul li:hover' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'type' => Controls_Manager::COLOR,
                'id' => 'icon-color-hover',
                'label' => esc_html__('Icon Color', 'medixare-core'),
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .amt-section__list ul li i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .amt-section__list ul li svg:hover' => 'fill: {{VALUE}};',
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
                'id'      => 'btn_style',
                'label'   => esc_html__('Button Style', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
                'condition' => array('button_display' => array('yes')),
            ),
            array(
                'mode'    => 'tabs_start',
                'id'      => 'tabs_start_btn',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_btn_normal',
                'label'   => esc_html__('Normal', 'medixare-core'),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'button-text-size',
                'label'   => esc_html__('Text', 'medixare-core'),
                'selector' => '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'text_color',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'background-color: {{VALUE}};',
                ],
                'default' => '#ff4460',
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
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'border-style: {{VALUE}};',
                ],
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_width',
                'label' => esc_html__('Border width', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding',
                'label' => esc_html__('Padding', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_margin',
                'label' => esc_html__('Margin', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode' => 'tab_end',
            ),
            array(
                'mode'    => 'tab_start',
                'id'      => 'tab_start_btn_hover',
                'label'   => esc_html__('Hover', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'text_hover_color',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn:hover'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_hover_color',
                'label'   => esc_html__(' Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn:hover' => 'background-color: {{VALUE}};',
                ],
                'default' => '#ff9b40',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_hover_color',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .amt-section-btn-wrapper .tp-btn:hover' => 'border-color: {{VALUE}};',
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

        );
        return $fields;
    }
    protected function render()
    {
        $data = $this->get_settings();

        $template = 'amt-about-features';

        return $this->amt_template($template, $data);
    }
}
