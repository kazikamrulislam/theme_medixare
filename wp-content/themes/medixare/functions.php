<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$medixare_theme_data = wp_get_theme();
	$action  = 'medixare_theme_init';
	do_action( $action );

	define( 'MEDIXARE_VERSION', ( WP_DEBUG ) ? time() : $medixare_theme_data->get( 'Version' ) );
	define( 'MEDIXARE_AUTHOR_URI', $medixare_theme_data->get( 'AuthorURI' ) );
	define( 'MEDIXARE_NAME', 'medixare' );

	// DIR
	define( 'MEDIXARE_BASE_DIR',    get_template_directory(). '/' );
	define( 'MEDIXARE_INC_DIR',     MEDIXARE_BASE_DIR . 'inc/' );
	define( 'MEDIXARE_VIEW_DIR',    MEDIXARE_INC_DIR . 'views/' );
	define( 'MEDIXARE_LIB_DIR',     MEDIXARE_BASE_DIR . 'lib/' );
	define( 'MEDIXARE_WID_DIR',     MEDIXARE_INC_DIR . 'widgets/' );
	define( 'MEDIXARE_PLUGINS_DIR', MEDIXARE_INC_DIR . 'plugins/' );
	define( 'MEDIXARE_MODULES_DIR', MEDIXARE_INC_DIR . 'modules/' );
	define( 'MEDIXARE_ASSETS_DIR',  MEDIXARE_BASE_DIR . 'assets/' );
	define( 'MEDIXARE_CSS_DIR',     MEDIXARE_ASSETS_DIR . 'css/' );
	define( 'MEDIXARE_JS_DIR',      MEDIXARE_ASSETS_DIR . 'js/' );
	define( 'MEDIXARE_WOO_DIR',   MEDIXARE_BASE_DIR . 'woocommerce/' );

	// URL
	define( 'MEDIXARE_BASE_URL',    get_template_directory_uri(). '/' );
	define( 'MEDIXARE_ASSETS_URL',  MEDIXARE_BASE_URL . 'assets/' );
	define( 'MEDIXARE_CSS_URL',     MEDIXARE_ASSETS_URL . 'css/' );
	define( 'MEDIXARE_JS_URL',      MEDIXARE_ASSETS_URL . 'js/' );
	define( 'MEDIXARE_IMG_URL',     MEDIXARE_ASSETS_URL . 'img/' );
	define( 'MEDIXARE_ELEMENT_URL', MEDIXARE_ASSETS_URL . 'element/' );
	define( 'MEDIXARE_LIB_URL',     MEDIXARE_BASE_URL . 'lib/' );


	// icon trait Plugin Activation
	require_once MEDIXARE_INC_DIR . 'icon-trait.php';
	// Includes
	require_once MEDIXARE_INC_DIR . 'helper-functions.php';
	require_once MEDIXARE_INC_DIR . 'medixare.php';
	require_once MEDIXARE_INC_DIR . 'general.php';
	require_once MEDIXARE_INC_DIR . 'ajax-tab.php';
	require_once MEDIXARE_INC_DIR . 'ajax-loadmore.php';
	require_once MEDIXARE_INC_DIR . 'scripts.php';
	require_once MEDIXARE_INC_DIR . 'template-vars.php';
	require_once MEDIXARE_INC_DIR . 'includes.php';

	// Includes Modules
	require_once MEDIXARE_MODULES_DIR . 'amt-post-related.php';
	require_once MEDIXARE_MODULES_DIR . 'amt-team-related.php';
	require_once MEDIXARE_MODULES_DIR . 'amt-news-ticker.php';
	require_once MEDIXARE_MODULES_DIR . 'amt-breadcrumbs.php';

	// TGM Plugin Activation
	require_once MEDIXARE_LIB_DIR . 'class-tgm-plugin-activation.php';
	require_once MEDIXARE_INC_DIR . 'tgm-config.php';

	add_editor_style( 'style-editor.css' );

	// Update Breadcrumb Separator
	add_action('bcn_after_fill', 'medixare_hseparator_breadcrumb_trail', 1);
	function medixare_hseparator_breadcrumb_trail($object){
		$object->opt['hseparator'] = '<span class="dvdr"> <i class="fas fa-angle-right"></i> </span>';
		return $object;
	}