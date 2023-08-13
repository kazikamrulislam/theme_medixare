<?php
/*
Plugin Name: AMT Framework
Plugin URI: http://addonmonster.com
Description: Theme Framework by AddonMonster
Version: 2.4
Author: AddonMonster
Author URI: http://addonmonster.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( defined( 'AMT_FRAMEWORK_VERSION' ) ) exit;

define( 'AMT_FRAMEWORK_VERSION', ( WP_DEBUG ) ? time() : '2.4' );

// Text Domain
add_action( 'plugins_loaded', 'amt_fw_load_textdomain' );
function amt_fw_load_textdomain() {
	load_plugin_textdomain( 'amt-framework' , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

// Load Framework
add_action( 'setup_theme', 'amt_fw_load_files' );
function amt_fw_load_files(){
	require_once 'inc/amt-posts.php';
	require_once 'inc/amt-postmeta.php';
	require_once 'inc/amt-taxmeta.php';
	require_once 'inc/amt-widget-fields.php';
}