<?php
/*
Plugin Name: Medixare Core
Plugin URI: https://www.addonmonster.com
Description: Medixare Core Plugin for Medixare Theme
Version: 1.5
Author: AddonMonster
Author URI: https://www.addonmonster.com
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'MEDIXARE_CORE' ) ) {
	define( 'MEDIXARE_CORE',                   ( WP_DEBUG ) ? time() : '1.0' );
	define( 'MEDIXARE_CORE_THEME_PREFIX',      'medixare' );
	define( 'MEDIXARE_CORE_THEME_PREFIX_VAR',  'medixare' );
	define( 'MEDIXARE_CORE_CPT_PREFIX',        'medixare' );
	define( 'MEDIXARE_CORE_BASE_DIR',      plugin_dir_path( __FILE__ ) );

}

class Medixare_Core {

	public $plugin  = 'medixare-core';
	public $action  = 'medixare_theme_init';

	public function __construct() {
		$prefix = MEDIXARE_CORE_THEME_PREFIX_VAR;

		add_action( 'plugins_loaded', array( $this, 'demo_importer' ), 15 );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 16 );
		add_action( 'after_setup_theme', array( $this, 'post_meta' ), 15 );
		add_action( 'after_setup_theme', array( $this, 'elementor_widgets' ) );
		add_action( $this->action,       array( $this, 'after_theme_loaded' ) );
		add_shortcode('medixare-post-single-gallery', array( $this, 'medixare_post_single_gallery' ) );
		add_shortcode('medixare-single-event-info', array( $this, 'medixare_single_event_info' ) );

		add_action( 'init', array( $this, 'rewrite_flush_check' ) );
		add_action( 'plugins_loaded',       array( $this, 'php_version_check' ));
		add_action( 'wp_head', array( $this, 'insert_fb_in_head' ), 5 );

		require_once 'module/amt-post-share.php';
		require_once 'module/amt-post-views.php';
		require_once 'module/amt-post-length.php';

		// Widgets
		require_once 'widget/footer-about-widget.php';
		require_once 'widget/about-widget.php';
		require_once 'widget/address-widget.php';
		require_once 'widget/social-widget.php';
		require_once 'widget/amt-post-box.php';
		require_once 'widget/amt-post-tab.php';
		require_once 'widget/amt-feature-post.php';
		require_once 'widget/search-widget.php';
		require_once 'widget/amt-category.php';

		require_once 'widget/widget-settings.php';
		require_once 'lib/optimization/__init__.php';
	}

	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	*/
	public function php_version_check(){

		if ( version_compare(phpversion(), '7.2', '<') ){
			add_action( 'admin_notices', [ $this, 'php_version_message' ] );
		}

		if ( version_compare(phpversion(), '7.2', '>') ){
			require_once MEDIXARE_CORE_BASE_DIR . 'lib/optimization/__init__.php';
		}
		
	}

	public function php_version_message(){

		$class = 'notice notice-warning settings-error';
		/* translators: %s: html tags */
		$message = sprintf( __( 'The %1$sMedixare Optimization%2$s requires %1$sphp 7.2+%2$s. Please consider updating php version and know more about it <a href="https://wordpress.org/about/requirements/" target="_blank">here</a>.', 'medixare-core' ), '<strong>', '</strong>' );
		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses_post( $message ));

	}

	public function demo_importer() {
		require_once 'demo-importer.php';
	}
	public function load_textdomain() {
		load_plugin_textdomain( $this->plugin , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	public function post_meta(){
		if ( !did_action( $this->action ) || ! defined( 'AMT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-meta.php';
		require_once 'post-types.php';
	}
	public function elementor_widgets(){
		if ( did_action( $this->action ) && did_action( 'elementor/loaded' ) ) {

			require_once 'elementor/init.php';
		}
	}
	public function after_theme_loaded() {
		require_once MEDIXARE_CORE_BASE_DIR . 'lib/wp-svg/init.php'; // SVG support
		require_once 'widget/sidebar-generator.php'; // sidebar widget generator
	}

	public function get_base_url(){

		$file = dirname( dirname(__FILE__) );

		// Get correct URL and path to wp-content
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = untrailingslashit( WP_CONTENT_DIR );

		// Fix path on Windows
		$file = wp_normalize_path( $file );
		$content_dir = wp_normalize_path( $content_dir );

		$url = str_replace( $content_dir, $content_url, $file );

		return $url;

	}

	public function rewrite_flush_check() {
		$prefix = MEDIXARE_CORE_THEME_PREFIX_VAR;
		if ( get_option( "{$prefix}_rewrite_flash" ) == true ) {
			flush_rewrite_rules();
			update_option( "{$prefix}_rewrite_flash", false );
		}
	}

	/*Post Single Shortcode*/
	public function medixare_post_single_gallery() {
		ob_start();
		$medixare_post_gallerys_raw = get_post_meta( get_the_ID(), 'medixare_post_gallery', true );
		$medixare_post_gallerys = explode( "," , $medixare_post_gallerys_raw );
			if ( !empty( $medixare_post_gallerys ) ) { ?>
			<div class="amt-swiper-slider single-post-slider">
				<div class="amt-swiper-container" data-autoplay="false" data-autoplay-timeout="true" data-slides-per-view="1" data-centered-slides="true" data-space-between="30" data-r-x-small="1" data-r-small="1" data-r-medium="1" data-r-large="1" data-r-x-large="1">
					<div class="swiper-wrapper">
					<?php foreach( $medixare_post_gallerys as $medixare_post_gallery ) { ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $medixare_post_gallery, 'medixare-size2', "", array( "class" => "img-responsive" ) );
						?>
					</div>
					<?php } ?>
					</div>
					<div class="swiper-button">
						<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
						<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		<?php }
		return ob_get_clean();
	}

	public function insert_fb_in_head() {
	    global $post;
        echo '<meta property="og:site_name" content="'.get_bloginfo( 'name' ).'"/>';
	    if ( !is_singular()) //if it is not a post or a page
	        return;

        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	    if(has_post_thumbnail( $post->ID )) { 
	        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	    }
	}
}

new Medixare_Core;