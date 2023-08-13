<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme;
use MedixareTheme_Helper;
use \AMT_Postmeta;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'AMT_Postmeta' ) ) {
	return;
}

$Postmeta = AMT_Postmeta::getInstance();

$prefix = MEDIXARE_CORE_CPT_PREFIX;

/*-------------------------------------
#. Layout Settings
---------------------------------------*/
$nav_menus = wp_get_nav_menus( array( 'fields' => 'id=>name' ) );
$nav_menus = array( 'default' => __( 'Default', 'medixare-core' ) ) + $nav_menus;
$sidebars  = array( 'default' => __( 'Default', 'medixare-core' ) ) + MedixareTheme_Helper::custom_sidebar_fields();

$Postmeta->add_meta_box( "{$prefix}_page_settings", __( 'Layout Settings', 'medixare-core' ), array( 'page', 'post', 'medixare_team', 'medixare_service', 'medixare_news', 'medixare_case', 'medixare_testim' ), '', '', 'high', array(
	'fields' => array(
	
		"{$prefix}_layout_settings" => array(
			'label'   => __( 'Layouts', 'medixare-core' ),
			'type'    => 'group',
			'value'  => array(	
			
				"{$prefix}_layout" => array(
					'label'   => __( 'Layout', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default'       => __( 'Default', 'medixare-core' ),
						'full-width'    => __( 'Full Width', 'medixare-core' ),
						'left-sidebar'  => __( 'Left Sidebar', 'medixare-core' ),
						'right-sidebar' => __( 'Right Sidebar', 'medixare-core' ),
					),
					'default'  => 'default',
				),		
				'medixare_sidebar' => array(
					'label'    => __( 'Custom Sidebar', 'medixare-core' ),
					'type'     => 'select',
					'options'  => $sidebars,
					'default'  => 'default',
				),
				"{$prefix}_page_menu" => array(
					'label'    => __( 'Main Menu', 'medixare-core' ),
					'type'     => 'select',
					'options'  => $nav_menus,
					'default'  => 'default',
				),
				"{$prefix}_top_bar" => array(
					'label' 	  => __( 'Top Bar', 'medixare-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'      => __( 'Enabled', 'medixare-core' ),
						'off'     => __( 'Disabled', 'medixare-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_bar_style" => array(
					'label' 	=> __( 'Top Bar Layout', 'medixare-core' ),
					'type'  	=> 'select',
					'options'	=> array(
						'default' => __( 'Default', 'medixare-core' ),
						'1'       => __( 'Layout 1', 'medixare-core' ),
						'2'       => __( 'Layout 2', 'medixare-core' ),
						'3'       => __( 'Layout 3', 'medixare-core' ),
						'4'       => __( 'Layout 4', 'medixare-core' ),
					),
					'default'   => 'default',
				),
				"{$prefix}_header_opt" => array(
					'label' 	  => __( 'Header On/Off', 'medixare-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'      => __( 'Enabled', 'medixare-core' ),
						'off'     => __( 'Disabled', 'medixare-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_header" => array(
					'label'   => __( 'Header Layout', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'1'       => __( 'Layout 1', 'medixare-core' ),
						'2'       => __( 'Layout 2', 'medixare-core' ),
						'3'       => __( 'Layout 3', 'medixare-core' ),
						'4'       => __( 'Layout 4', 'medixare-core' ),
						'5'       => __( 'Layout 5', 'medixare-core' ),
						'6'       => __( 'Layout 6', 'medixare-core' ),
						'7'       => __( 'Layout 7', 'medixare-core' ),
						'8'       => __( 'Layout 8', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer" => array(
					'label'   => __( 'Footer Layout', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'1'       => __( 'Layout 1', 'medixare-core' ),
						'2'       => __( 'Layout 2', 'medixare-core' ),
						'3'       => __( 'Layout 3', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_footer_area" => array(
					'label' 	  => __( 'Footer Area', 'medixare-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'      => __( 'Enabled', 'medixare-core' ),
						'off'     => __( 'Disabled', 'medixare-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_copyright_area" => array(
					'label' 	  => __( 'Copyright Area', 'medixare-core' ),
					'type'  	  => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'      => __( 'Enabled', 'medixare-core' ),
						'off'     => __( 'Disabled', 'medixare-core' ),
					),
					'default'  	  => 'default',
				),
				"{$prefix}_top_padding" => array(
					'label'   => __( 'Content Padding Top', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'0px'     => __( '0px', 'medixare-core' ),
						'10px'    => __( '10px', 'medixare-core' ),
						'20px'    => __( '20px', 'medixare-core' ),
						'30px'    => __( '30px', 'medixare-core' ),
						'40px'    => __( '40px', 'medixare-core' ),
						'50px'    => __( '50px', 'medixare-core' ),
						'60px'    => __( '60px', 'medixare-core' ),
						'70px'    => __( '70px', 'medixare-core' ),
						'80px'    => __( '80px', 'medixare-core' ),
						'90px'    => __( '90px', 'medixare-core' ),
						'100px'   => __( '100px', 'medixare-core' ),
						'110px'   => __( '110px', 'medixare-core' ),
						'120px'   => __( '120px', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_bottom_padding" => array(
					'label'   => __( 'Content Padding Bottom', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'0px'     => __( '0px', 'medixare-core' ),
						'10px'    => __( '10px', 'medixare-core' ),
						'20px'    => __( '20px', 'medixare-core' ),
						'30px'    => __( '30px', 'medixare-core' ),
						'40px'    => __( '40px', 'medixare-core' ),
						'50px'    => __( '50px', 'medixare-core' ),
						'60px'    => __( '60px', 'medixare-core' ),
						'70px'    => __( '70px', 'medixare-core' ),
						'80px'    => __( '80px', 'medixare-core' ),
						'90px'    => __( '90px', 'medixare-core' ),
						'100px'   => __( '100px', 'medixare-core' ),
						'110px'   => __( '110px', 'medixare-core' ),
						'120px'   => __( '120px', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner" => array(
					'label'   => __( 'Banner', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'	  => __( 'Enable', 'medixare-core' ),
						'off'	  => __( 'Disable', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_breadcrumb" => array(
					'label'   => __( 'Breadcrumb', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'on'      => __( 'Enable', 'medixare-core' ),
						'off'	  => __( 'Disable', 'medixare-core' ),
					),
					'default'  => 'default',
				),
				"{$prefix}_banner_type" => array(
					'label'   => __( 'Banner Background Type', 'medixare-core' ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'Default', 'medixare-core' ),
						'bgimg'   => __( 'Background Image', 'medixare-core' ),
						'bgcolor' => __( 'Background Color', 'medixare-core' ),
					),
					'default' => 'default',
				),
				"{$prefix}_banner_bgimg" => array(
					'label' => __( 'Banner Background Image', 'medixare-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'medixare-core' ),
				),
				"{$prefix}_banner_bgcolor" => array(
					'label' => __( 'Banner Background Color', 'medixare-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'medixare-core' ),
				),		
				"{$prefix}_page_bgimg" => array(
					'label' => __( 'Page/Post Background Image', 'medixare-core' ),
					'type'  => 'image',
					'desc'  => __( 'If not selected, default will be used', 'medixare-core' ),
				),
				"{$prefix}_page_bgcolor" => array(
					'label' => __( 'Page/Post Background Color', 'medixare-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, default will be used', 'medixare-core' ),
				),
			)
		)
	),
) );

/*-------------------------------------
#. Single Post Gallery
---------------------------------------*/

$Postmeta->add_meta_box( 'medixare_post_info', __( 'Post Info', 'medixare-core' ), array( 'post' ), '', '', 'high', array(
	'fields' => array(	
		"medixare_post_layout" => array(
			'label'   => __( 'Post Template', 'medixare-core' ),
			'type'    => 'select',
			'options' => array(
				'default'  => __( 'Default', 'medixare-core' ),
				'post-detail-style1'  => __( 'Layout 1', 'medixare-core' ),
				'post-detail-style2'  => __( 'Layout 2', 'medixare-core' ),
				'post-detail-style3'  => __( 'Layout 3', 'medixare-core' ),
			),
			'default'  => 'default',
		),
		"medixare_youtube_link" => array(
			'label'   => __( 'Youtube Link', 'medixare-core' ),
			'type'    => 'text',
			'default'  => '',
			'desc'  => __( 'Only work for the video post format', 'medixare-core' ),
		),	
	),
) );

/*-------------------------------------
#. Team
---------------------------------------*/
$Postmeta->add_meta_box( 'medixare_team_settings', __( 'Team Member Settings', 'medixare-core' ), array( 'medixare_team' ), '', '', 'high', array(
	'fields' => array(
		'medixare_team_position' => array(
			'label' => __( 'Position', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_website' => array(
			'label' => __( 'Website', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_expertise' => array(
			'label' => __( 'Expertise', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_experience' => array(
			'label' => __( 'Experience', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_email' => array(
			'label' => __( 'Email', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_phone' => array(
			'label' => __( 'Phone', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_address' => array(
			'label' => __( 'Address', 'medixare-core' ),
			'type'  => 'text',
		),
		'medixare_team_socials_header' => array(
			'label' => __( 'Socials', 'medixare-core' ),
			'type'  => 'header',
			'desc'  => __( 'Enter your social links here', 'medixare-core' ),
		),
		'medixare_team_socials' => array(
			'type'  => 'group',
			'value'  => MedixareTheme_Helper::team_socials()
		),
	)
) );

$Postmeta->add_meta_box( 'medixare_team_skills', __( 'Team Member Skills', 'medixare-core' ), array( 'medixare_team' ), '', '', 'high', array(
	'fields' => array(
		'medixare_team_skill' => array(
			'type'  => 'repeater',
			'button' => __( 'Add New Skill', 'medixare-core' ),
			'value'  => array(
				'skill_name' => array(
					'label' => __( 'Skill Name', 'medixare-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. Marketing', 'medixare-core' ),
				),
				'skill_value' => array(
					'label' => __( 'Skill Percentage (%)', 'medixare-core' ),
					'type'  => 'text',
					'desc'  => __( 'eg. 75', 'medixare-core' ),
				),
				'skill_color' => array(
					'label' => __( 'Skill Color', 'medixare-core' ),
					'type'  => 'color_picker',
					'desc'  => __( 'If not selected, primary color will be used', 'medixare-core' ),
				),
			)
		),
	)
) );
$Postmeta->add_meta_box( 'medixare_team_education', __( 'Team Member Education', 'medixare-core' ), array( 'medixare_team' ), '', '', 'high', array(
	'fields' => array(
		'medixare_team_education' => array(
			'label' => __( 'Education', 'medixare-core' ),
			'type'  => 'textarea',
		),
	)
) );
$Postmeta->add_meta_box( 'medixare_team_awards', __( 'Team Member Awards', 'medixare-core' ), array( 'medixare_team' ), '', '', 'high', array(
	'fields' => array(
		'medixare_team_awards' => array(
			'label' => __( 'Awards', 'medixare-core' ),
			'type'  => 'textarea',
		),
	)
) );
$Postmeta->add_meta_box( 'medixare_team_contact', __( 'Team Member Contact', 'medixare-core' ), array( 'medixare_team' ), '', '', 'high', array(
	'fields' => array(
		'medixare_team_contact_form' => array(
			'label' => __( 'Contct Shortcode', 'medixare-core' ),
			'type'  => 'text',
		),
	)
) );

/*-------------------------------------
#. Services
---------------------------------------*/
$Postmeta->add_meta_box( 'medixare_service_settings', __( 'Service Member Settings', 'medixare-core' ), array( 'medixare_service' ), '', '', 'high', array(
	'fields' => array(
		'medixare_service_img' => array(
			'label' => __( 'Upload icon', 'ogo-core' ),
			'type'  => 'image',
			'url' => true,
			'desc'  => __( 'Icon', 'ogo-core' ),
		),
	)
) );

$Postmeta->add_meta_box( 'medixare_service_contact', __( 'Service Member Contact', 'medixare-core' ), array( 'medixare_service' ), '', '', 'high', array(
	'fields' => array(
		'medixare_service_contact_form' => array(
			'label' => __( 'Contact Shortcode', 'medixare-core' ),
			'type'  => 'text',
		),
	)
) );