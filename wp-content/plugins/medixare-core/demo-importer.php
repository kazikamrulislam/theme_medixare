<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use \FW_Ext_Backups_Demo;
use \WPCF7_ContactFormTemplate;

if ( ! defined( 'ABSPATH' ) ) exit;

class Demo_Importer {

	public function __construct() {
		add_filter( 'plugin_action_links_amt-demo-importer/amt-demo-importer.php', array( $this, 'add_action_links' ) ); // Link from plugins page
		add_filter( 'rt_demo_installer_warning', array( $this, 'data_loss_warning' ) );
		add_filter( 'fw:ext:backups-demo:demos', array( $this, 'demo_config' ) );
		add_action( 'fw:ext:backups:tasks:success:id:demo-content-install', array( $this, 'after_demo_install' ) );
	}

	public function add_action_links( $links ) {
		$mylinks = array(
			'<a href="' . esc_url( admin_url( 'tools.php?page=fw-backups-demo-content' ) ) . '">'.__( 'Install Demo Contents', 'medixare-core' ).'</a>',
		);
		return array_merge( $links, $mylinks );
	}

	public function data_loss_warning( $links ) {
		$html  = '<div style="margin-top:20px;color:#f00;font-size:20px;line-height:1.3;font-weight:600;margin-bottom:40px;border-color: #f00;border-style: dashed;border-width: 1px 0;padding:10px 0;">';
		$html .= __( 'Warning: All your old data will be lost if you install One Click demo data from here, so it is suitable only for a new website.', 'medixare-core');
		$html .= '</div>';
		return $html;
	}

	public function demo_config( $demos ) {
		$demos_array = array(
			'demo1' => array(
				'title' => __( 'Home 1', 'medixare-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot1.jpg', __FILE__ ),
				'preview_link' => 'https://addonmonster.com/demo/wordpress/themes/medixare/',
			),
			'demo2' => array(
				'title' => __( 'Home 2', 'medixare-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot2.jpg', __FILE__ ),
				'preview_link' => 'https://addonmonster.com/demo/wordpress/themes/medixare/home-02/',
			),
			'demo3' => array(
				'title' => __( 'Home 3', 'medixare-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot3.jpg', __FILE__ ),
				'preview_link' => 'https://addonmonster.com/demo/wordpress/themes/medixare/home-03/',
			),
			'demo4' => array(
				'title' => __( 'Home 4', 'medixare-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot4.jpg', __FILE__ ),
				'preview_link' => 'https://addonmonster.com/demo/wordpress/themes/medixare/home-04/',
			),			
			'demo5' => array(
				'title' => __( 'Home 5', 'medixare-core' ),
				'screenshot' => plugins_url( 'screenshots/screenshot5.jpg', __FILE__ ),
				'preview_link' => 'https://addonmonster.com/demo/wordpress/themes/medixare/home-05/',
			),
		);

		$download_url = 'http://demo.addonmonster.com/wordpress/demo-content/medixare/';

		foreach ($demos_array as $id => $data) {
			$demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
				'url' => $download_url,
				'file_id' => $id,
			));
			$demo->set_title($data['title']);
			$demo->set_screenshot($data['screenshot']);
			$demo->set_preview_link($data['preview_link']);

			$demos[ $demo->get_id() ] = $demo;

			unset($demo);
		}

		return $demos;
	}

	public function after_demo_install( $collection ){
		// Update front page id
		$demos = array(
			'demo1'  => 38,
			'demo2'  => 1278,
			'demo3'  => 1283,
			'demo4'  => 1289,
			'demo5'  => 5092,
		);

		$data = $collection->to_array();

		foreach( $data['tasks'] as $task ) {
			if( $task['id'] == 'demo:demo-download' ){
				$demo_id = $task['args']['demo_id'];
				$page_id = $demos[$demo_id];
				update_option( 'page_on_front', $page_id );
				flush_rewrite_rules();
				break;
			}
		}

	}
}

new Demo_Importer;