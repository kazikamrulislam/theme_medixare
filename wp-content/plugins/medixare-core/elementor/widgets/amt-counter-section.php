<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme_Helper;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Utils;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Background;


if (!defined('ABSPATH')) exit;

class AMT_Counter_Section extends Custom_Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        $this->amt_name = esc_html__('AMT Counter Section', 'medixare-core');
        $this->amt_base = 'amt-counter-section';
        parent::__construct($data, $args);
    }

    public function amt_fields()
    {
        $fields = array(
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_general',
                'label'   => esc_html__('Description', 'medixare-core'),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'subtitle_display',
                'label'       => esc_html__('Sub-title Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'sub_title',
                'label'   => esc_html__('Sub Title', 'medixare-core'),
                'default' => 'Medixare services',
                'condition'   => array(
                    'subtitle_display' => 'yes',
                ),
            ),
            array(
                'type'        => Controls_Manager::SWITCHER,
                'id'          => 'title_display',
                'label'       => esc_html__('Title Display', 'medixare-core'),
                'label_on'    => esc_html__('Show', 'medixare-core'),
                'label_off'   => esc_html__('Hide', 'medixare-core'),
                'default'     => 'yes',
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-1',
                'label'   => esc_html__('Title part 1', 'medixare-core'),
                'default' => "Best home care",
                'condition'   => array(
                    'title_display' => 'yes',
                ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-2',
                'label'   => esc_html__('Title part 2', 'medixare-core'),
                'default' => 'center with Love',
                'condition'   => array(
                    'title_display' => 'yes',
                ),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'title-3',
                'label'   => esc_html__('Title part 3', 'medixare-core'),
                'condition'   => array(
                    'title_display' => 'yes',
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
                'default' => 'See More',
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
                'label'   => esc_html__('Experience Period', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'period',
                'label'   => esc_html__('Period', 'medixare-core'),
                'default' => 20,
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'period-number',
                'label'   => esc_html__('Content', 'medixare-core'),
                'default' => 'Years of Experience',
            ),
            array(
                'mode' => 'section_end',
            ),

            //styles

            array(
                'mode'    => 'section_start',
                'id'      => 'sec_total_bg',
                'label'   => esc_html__('General', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'type'    => Group_Control_Background::get_type(),
                'mode'    => 'group',
                'types'   => array('classic', 'gradient'),
                'name'    => 'title_color',
                'label'   => esc_html__('Title Color', 'medixare-core'),
                'fields_options' => [
                    'background' => [
                        'label' => esc_html('Custom Background', 'medixare-core'),
                        'default' => 'classic',
                    ],
                    'image' => [
                        'label' => esc_html('Custom image', 'medixare-core'),
                    ],
                ],
                'selector' => '{{WRAPPER}} .tp-about-2__section',
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_title_style_1',
                'label'   => esc_html__('Counter', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_top_bg_color',
                'label'   => esc_html__('Background', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-box-top' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'number_heading',
                'label' => esc_html__('Number', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'number_typo',
                'label'   => esc_html__('Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__info-box-top .tp-about-2__info-number .counter',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'number_color',
                'label'   => esc_html__('Color', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-box-top .tp-about-2__info-number .counter' => 'color: {{VALUE}}',
                ),
                'default' => '#fff',
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'speed',
                'label'   => esc_html__('Animation Speed', 'medixare-core'),
                'default' => 2000,
                'description' => esc_html__('The total duration of the count animation in milisecond eg. 5000', 'medixare-core'),
            ),
            array(
                'type'    => Controls_Manager::NUMBER,
                'id'      => 'steps',
                'label'   => esc_html__('Animation Steps', 'medixare-core'),
                'default' => 50,
                'description' => esc_html__('Counter steps eg. 10', 'medixare-core'),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'experience_heading',
                'label' => esc_html__('Experience', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'experience_typo',
                'label'   => esc_html__('Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__info-box-top .tp-about-2__info-number .tp-about-2__info-text',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'experience_color',
                'label'   => esc_html__('Color', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-box-top .tp-about-2__info-number .tp-about-2__info-text' => 'color: {{VALUE}}',
                ),
                'default' => '#fff',
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'sec_title_style',
                'label'   => esc_html__('Details', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'box_2_top_bg_color',
                'label'   => esc_html__('Background', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-box' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'type' => Controls_Manager::HEADING,
                'id'      => 'sub_title_heading',
                'label' => esc_html__('Sub-title', 'medixare-core'),
                'separator' => 'before',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'sub_title_shape_color',
                'label'   => esc_html__('Shape Color', 'medixare-core'),
                'default' => '#fff',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-subtitle.has-circle:before' => 'background-color: {{VALUE}}',
                ),
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'sub_title_typo',
                'label'   => esc_html__('Sub Title Style', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-subtitle',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'sub_title_color',
                'label'   => esc_html__('Sub Title Color', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-subtitle' => 'color: {{VALUE}}',
                ),
                'default' => '#fff',
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
                'label'   => esc_html__('Bold part', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-title',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color-1',
                'label'   => esc_html__('Color', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-title' => 'color: {{VALUE}}',
                ),
                'default' => '#fff',
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Typography::get_type(),
                'name'    => 'title_typo_2',
                'label'   => esc_html__(' Normal part', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-title span',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'title_color-2',
                'label'   => esc_html__('Color', 'medixare-core'),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .tp-about-2__info-content .tp-about-2__info-title span' => 'color: {{VALUE}}',
                ),
                'default' => '#fff',
            ),
            array(
                'mode' => 'section_end',
            ),
            array(
                'mode'    => 'section_start',
                'id'      => 'btn_style',
                'label'   => esc_html__('Button Style', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
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
                'selector' => '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn',
                'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_text_color',
                'label'   => esc_html__('Text Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn'  => 'color: {{VALUE}};',
                ],
                'default' => '#000',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_color',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn' => 'background-color: {{VALUE}};',
                ],
                'default' => '#fff',
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
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn' => 'border-style: {{VALUE}};',
                ],
                'default' => 'none',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn' => 'border-color: {{VALUE}};',
                ],
            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_border_radius',
                'label' => esc_html__('Border Radius', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ),
            array(
                'mode'    => 'responsive',
                'type' => Controls_Manager::DIMENSIONS,
                'id'      => 'btn_padding',
                'label' => esc_html__('Padding', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ),
            array(
                'mode'    => 'group',
                'type'    => Group_Control_Box_Shadow::get_type(),
                'name'    => 'box_shadow',
                'label'   => esc_html__('Box Shadow', 'medixare-core'),
                'selector' => '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn ',
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
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn:hover'  => 'color: {{VALUE}};',
                ],
                'default' => '#fff',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_bg_hover-color',
                'label'   => esc_html__('Background Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn:hover' => 'background-color: {{VALUE}};',
                ],
                'default' => '#000',
            ),
            array(
                'type'    => Controls_Manager::COLOR,
                'id'      => 'btn_border_color_hover',
                'label'   => esc_html__('Border Color', 'medixare-core'),
                'selectors' => [
                    '{{WRAPPER}} .tp-about-2__inf-btn-wrapper .tp-white-btn:hover' => 'border-color: {{VALUE}};',
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
                'label'   => esc_html__('Button Animation', 'medixare-core'),
                'tab'     => Controls_Manager::TAB_STYLE,
            ),
            array(
                'type'    => Controls_Manager::SELECT,
                'id'      => 'animation',
                'label'   => esc_html__('Animation', 'medixare-core'),
                'options' => array(
                    'wow'        => esc_html__('On', 'medixare-core'),
                    'hide'        => esc_html__('Off', 'medixare-core'),
                ),
                'default' => 'hide',
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
                'id'      => 'animation_delay',
                'label'   => esc_html__('Delay', 'medixare-core'),
                'default' => '0.5',
                'condition'   => array('animation' => array('wow')),
            ),
            array(
                'type'    => Controls_Manager::TEXT,
                'id'      => 'ani_duration',
                'label'   => esc_html__('Animation Duration', 'medixare-core'),
                'default' => '1',
                'condition'   => array('animation' => array('wow')),
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
        $template = 'amt-counter-section';
        return $this->amt_template($template, $data);
    }
}
