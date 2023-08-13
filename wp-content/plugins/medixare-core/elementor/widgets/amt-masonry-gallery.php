<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme;
use MedixareTheme_Helper;
use Elementor\Utils;
use Elementor\Scheme_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Core\Schemes\Typography as Scheme_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) exit;
class AMT_MASONRY_GALLERY extends Custom_Widget_Base {

	public function __construct( $data = [], $args = null ){
		$this->amt_name = esc_html__( 'AMT MASONRY GALLERY', 'medixare-core' );
		$this->amt_base = 'amt-masonry-gallery';
		parent::__construct( $data, $args );
	}

    public function amt_fields(){
        $repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'masonry_image',
			array(
				'type' => Controls_Manager::MEDIA,
				'label'   => __('', 'medixare-core'),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
                ),
			)
		);
		$fields = array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'General', 'medixare-core' ),
			),
				array(
					'type'    => Controls_Manager::REPEATER,
					'id'      => 'masonry_gallery',
					'label'   => esc_html__('Masonry Image', 'medixare-core'),
					'fields'  => $repeater->get_controls(),
					'default' => array(
						'url' => Utils::get_placeholder_image_src(),
					),
				),
				array(
					'mode' => 'group',
					'type'    => Group_Control_Image_Size::get_type(),
					'name'      => 'image',
					'separator' => 'none',
					'default' => 'large',
					'selectors' => [
								// '{{WRAPPER}} .swiper.medixareswiper .swiper-slide img',
							],
				),
			array(
				'mode' => 'section_end',
        ),
		// Style Tab
		// array(
		// 	'mode'    => 'section_start',
		// 	'tab'     => Controls_Manager::TAB_STYLE,
		// 	'id'      => 'sec_style',
		// 	'label'   => esc_html__( 'FAQ Style', 'ogo-core' ),
		// ),
			
		// array(
        //     'mode' => 'section_end',
        // ),
    );
    return $fields;
}

protected function render() {
    $data = $this->get_settings();
    $template = 'amt-masonry-gallery';
    return $this->amt_template( $template, $data );
}
}
