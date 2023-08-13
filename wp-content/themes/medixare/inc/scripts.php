<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

use Elementor\Plugin; 


function medixare_get_maybe_rtl( $filename ){
	$file = get_template_directory_uri() . '/assets/';
	if ( is_rtl() ) {
		return $file . 'rtl-css/' . $filename;
	}
	else {
		return $file . 'css/' . $filename;
	}
}
add_action( 'wp_enqueue_scripts','medixare_enqueue_high_priority_scripts', 1500 );
function medixare_enqueue_high_priority_scripts() {
	if ( is_rtl() ) {
		wp_enqueue_style( 'rtlcss', MEDIXARE_CSS_URL . 'rtl.css', array(), MEDIXARE_VERSION );
	}
}
//elementor animation dequeue
add_action('elementor/frontend/after_enqueue_scripts', function(){
    wp_deregister_style( 'e-animations' );
    wp_dequeue_style( 'e-animations' );
});

add_action( 'wp_enqueue_scripts', 'medixare_register_scripts', 12 );
if ( !function_exists( 'medixare_register_scripts' ) ) {
	function medixare_register_scripts(){
		wp_deregister_style( 'font-awesome' );
        wp_deregister_style( 'layerslider-font-awesome' );
        wp_deregister_style( 'yith-wcwl-font-awesome' );

		/*CSS*/
		// animate CSS	
		wp_register_style( 'magnific-popup',     medixare_get_maybe_rtl('magnific-popup.css'), array(), MEDIXARE_VERSION );
		wp_register_style( 'animate',        	 medixare_get_maybe_rtl('animate.min.css'), array(), MEDIXARE_VERSION );
		wp_enqueue_style( 'swiper-bundle',   medixare_get_maybe_rtl('swiper-bundle.min.css'), array(), MEDIXARE_VERSION );

		/*JS*/
		// magnific popup
		wp_register_script( 'magnific-popup',    MEDIXARE_JS_URL . 'jquery.magnific-popup.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// theia sticky
		wp_register_script( 'theia-sticky',    	 MEDIXARE_JS_URL . 'theia-sticky-sidebar.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		// tween max
		wp_register_script( 'tween-max',         MEDIXARE_JS_URL . 'tween-max.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		// parallax scroll js
		wp_register_script( 'parallax',   	 MEDIXARE_JS_URL . 'parallax.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// parallax effect js
		wp_register_script( 'parallax-effect',   	 MEDIXARE_JS_URL . 'parallax-effect.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// parallax effect js
		wp_register_script( 'waypoints-new',   	 MEDIXARE_JS_URL . 'waypoints.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// counterup js
		wp_register_script( 'counterup',   	 MEDIXARE_JS_URL . 'counterup.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// nice select js
		wp_register_script( 'nice-select',   	 MEDIXARE_JS_URL . 'nice-select.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		// meanmenu js
		wp_register_script( 'meanmenu',   	 MEDIXARE_JS_URL . 'meanmenu.js', array( 'jquery' ), MEDIXARE_VERSION, true );		

		// imagesloaded-pkgd js
		wp_register_script( 'imagesloaded-pkgd',   	 MEDIXARE_JS_URL . 'imagesloaded-pkgd.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// wow js
		wp_register_script( 'wow',   		 MEDIXARE_JS_URL . 'wow.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// isotope js
		wp_register_script( 'isotope-pkgd',      MEDIXARE_JS_URL . 'isotope.pkgd.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		wp_register_script( 'swiper',        MEDIXARE_JS_URL . 'swiper.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		wp_register_script( 'swiper-bundle',        MEDIXARE_JS_URL . 'swiper-bundle.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );

		// color mode js
		wp_register_script( 'color-mode',        MEDIXARE_JS_URL . 'color-mode.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		// counterup js
		wp_register_script( 'waypoints',        MEDIXARE_JS_URL . 'waypoints.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		wp_register_script( 'counterup',        MEDIXARE_JS_URL . 'jquery.counterup.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
	}
}

add_action( 'wp_enqueue_scripts', 'medixare_enqueue_scripts', 15 );
if ( !function_exists( 'medixare_enqueue_scripts' ) ) {
	function medixare_enqueue_scripts() {
		$dep = array( 'jquery' );
		/*CSS*/
		// Google fonts
		wp_enqueue_style( 'medixare-gfonts', 	MedixareTheme_Helper::fonts_url(), array(), MEDIXARE_VERSION );
		// Bootstrap CSS  //@rtl
		wp_enqueue_style( 'bootstrap', 			medixare_get_maybe_rtl('bootstrap.min.css'), array(), MEDIXARE_VERSION );
		
		// Flaticon CSS
		wp_enqueue_style( 'flaticon-medixare',    MEDIXARE_ASSETS_URL . 'fonts/flaticon-medixare/flaticon.css', array(), MEDIXARE_VERSION );
		
		elementor_scripts();
		//Video popup
		wp_enqueue_style( 'magnific-popup' );
		// font-awesome CSS
		wp_enqueue_style( 'font-awesome',       MEDIXARE_CSS_URL . 'font-awesome.min.css', array(), MEDIXARE_VERSION );
		// animate CSS
		wp_enqueue_style( 'animate',            medixare_get_maybe_rtl('animate.min.css'), array(), MEDIXARE_VERSION );
		// main CSS // @rtl
		wp_enqueue_style( 'medixare-default',    	medixare_get_maybe_rtl('default.css'), array(), MEDIXARE_VERSION );
		// vc modules css
		wp_enqueue_style( 'medixare-elementor',   medixare_get_maybe_rtl('elementor.css'), array(), MEDIXARE_VERSION );
			
		// Style CSS
		wp_enqueue_style( 'medixare-style',     	medixare_get_maybe_rtl('style.css'), array(), MEDIXARE_VERSION );
		
		// Template Style
		wp_add_inline_style( 'medixare-style',   	medixare_template_style() );

		/*JS*/
		// bootstrap js
		wp_enqueue_script( 'bootstrap',         MEDIXARE_JS_URL . 'bootstrap.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		// wp_enqueue_script( 'cloudflare',         MEDIXARE_JS_URL . 'cloudflare.min.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// color mode
		if ( MedixareTheme::$options['color_mode'] ) {
            wp_enqueue_script('color-mode');
        }

		// isotope js
		wp_enqueue_script( 'news-ticker',       MEDIXARE_JS_URL . 'jquery.ticker.js', array( 'jquery' ), MEDIXARE_VERSION, true );
		
		wp_enqueue_script( 'theia-sticky' );
		wp_enqueue_script( 'wow' );
		wp_enqueue_script( 'parallax' );
		wp_enqueue_script( 'parallax-effect' );
		wp_enqueue_script( 'nice-select' );
		wp_enqueue_script( 'meanmenu' );
		wp_enqueue_script( 'imagesloaded-pkgd' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints-new' );
		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'swiper' );
		wp_enqueue_script( 'swiper-bundle' );
		wp_enqueue_script( 'magnific-popup' );
		wp_enqueue_script( 'masonry' );
		wp_enqueue_script( 'medixare-main',    	MEDIXARE_JS_URL . 'main.js', $dep , MEDIXARE_VERSION, true );
		
		// localize script
		$medixare_localize_data = array(
			'stickyMenu' 	=> MedixareTheme::$options['sticky_menu'],
			'siteLogo'   	=> '<a href="' . esc_url( home_url( '/' ) ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">' . '</a>',
			'extraOffset' => MedixareTheme::$options['sticky_menu'] ? 70 : 0,
			'extraOffsetMobile' => MedixareTheme::$options['sticky_menu'] ? 52 : 0,

			//ticker control
			'tickerTitleText' => MedixareTheme::$options['ticker_title_text'] ? MedixareTheme::$options['ticker_title_text'] : 'TRENDING',
			'tickerDelay' => MedixareTheme::$options['ticker_delay'] ? MedixareTheme::$options['ticker_delay'] : 2000,
			'tickerSpeed' => MedixareTheme::$options['ticker_speed'] ? MedixareTheme::$options['ticker_speed'] : 0.10,
			'tickerStyle' => MedixareTheme::$options['ticker_style'] ? MedixareTheme::$options['ticker_style'] : 'reveal',
			'rtl' => is_rtl()?'rtl':'ltr',
			'loadmoretxt' => __('No More Blog Post', 'medixare'),
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'post_scroll_limit' => MedixareTheme::$options['post_scroll_limit'],
			'nonce' => wp_create_nonce( 'medixare-nonce' )
		);
		wp_localize_script( 'medixare-main', 'medixareObj', $medixare_localize_data );
	}	
}

function elementor_scripts() {
	
	if ( !did_action( 'elementor/loaded' ) ) {
		return;
	}
	
	if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		// do stuff for preview		
		wp_enqueue_script( 'wow' );
		wp_enqueue_script( 'tween-max' );
		wp_enqueue_script( 'counterup' );
		wp_enqueue_script( 'waypoints' );
	} 
}

add_action( 'wp_enqueue_scripts', 'medixare_high_priority_scripts', 1500 );
if ( !function_exists( 'medixare_high_priority_scripts' ) ) {
	function medixare_high_priority_scripts() {
		// Dynamic style
		MedixareTheme_Helper::dynamic_internal_style();
	}
}

function medixare_template_style(){
	ob_start();
	?>
	
	.entry-banner {
		<?php if ( MedixareTheme::$bgtype == 'page_bgcolor' || MedixareTheme::$bgtype == 'blog_bgcolor' || MedixareTheme::$bgtype == 'single_post_bgcolor' || MedixareTheme::$bgtype == 'team_archive_bgcolor' || MedixareTheme::$bgtype == 'team_bgcolor' || MedixareTheme::$bgtype == 'service_archive_bgcolor' || MedixareTheme::$bgtype == 'service_bgcolor' ): ?>
			background: <?php echo esc_html( MedixareTheme::$bgcolor );?>;
		<?php else: ?>
			background: url(<?php echo esc_url( MedixareTheme::$bgimg );?>) no-repeat scroll center bottom / cover;
		<?php endif; ?>
	}

	.content-area {
		padding-top: <?php echo esc_html( MedixareTheme::$padding_top );?>px; 
		padding-bottom: <?php echo esc_html( MedixareTheme::$padding_bottom );?>px;
	}

	<?php if( isset( MedixareTheme::$pagebgcolor ) || isset( MedixareTheme::$pagebgimg ) ) { ?>
	#page .content-area {
		background-image: url( <?php echo MedixareTheme::$pagebgimg; ?> );
		background-color: <?php echo MedixareTheme::$pagebgcolor; ?>;
	}
	<?php } ?>

	.error-page-area {		 
		background-color: <?php echo esc_html( MedixareTheme::$options['error_bodybg_color'] );?>;
	}
	
	<?php
	return ob_get_clean();
}

function load_custom_wp_admin_script_gutenberg() {
	wp_enqueue_style( 'medixare-gfonts', MedixareTheme_Helper::fonts_url(), array(), MEDIXARE_VERSION );
	// font-awesome CSS
	wp_enqueue_style( 'font-awesome',       MEDIXARE_CSS_URL . 'font-awesome.min.css', array(), MEDIXARE_VERSION );
	// Flaticon CSS
	wp_enqueue_style( 'flaticon-medixare',    MEDIXARE_ASSETS_URL . 'fonts/flaticon-medixare/flaticon.css', array(), MEDIXARE_VERSION );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script_gutenberg', 1 );

function load_custom_wp_admin_script() {
	wp_enqueue_style( 'medixare-admin-style',  MEDIXARE_CSS_URL . 'admin-style.css', false, MEDIXARE_VERSION );
	wp_enqueue_script( 'medixare-admin-main',  MEDIXARE_JS_URL . 'admin.main.js', false, MEDIXARE_VERSION, true );
	
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_script' );

/*Topbar menu function*/
if ( !function_exists( 'medixare_top_menu' ) ) {
	function medixare_top_menu() {
	    $menus = wp_get_nav_menus();
	    if(!empty($menus)){
	      	$menu_links = array();
	      	foreach ($menus as $key => $value) {
	        	$menu_links[$value->slug] = $value->name;  
	      	}
	      	return $menu_links;
	    }
	}
}
