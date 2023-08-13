<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

/*-------------------------------------
INDEX
=======================================
#. Container
#. Typography
#. Top Bar
#. Header
#. Banner
#. Footer
#. Widgets
#. Error 404
#. comment
#. Buttons
#. Single Content
#. Archive Contents
#. Pagination
#. Fluent form
#. Miscellaneous
#. Dark mode
-------------------------------------*/

$primary_color          	= MedixareTheme::$options['primary_color'];
$primary_rgb            	= MedixareTheme_Helper::hex2rgb( $primary_color );
$secondary_color        	= MedixareTheme::$options['secondary_color'];
$secondary_rgb          	= MedixareTheme_Helper::hex2rgb( $secondary_color );
$body_color          		= MedixareTheme::$options['body_color'];
$container_width	    	= MedixareTheme::$options['container_width']; 
$logo_width	   		    	= MedixareTheme::$options['logo_width']; 
$mobile_logo_width	    	= MedixareTheme::$options['mobile_logo_width'];
$topbar_bg_color        	= MedixareTheme::$options['topbar_bg_color'];
$topbar_link_color      	= MedixareTheme::$options['topbar_link_color'];
$topbar_link_hover_color	= MedixareTheme::$options['topbar_link_hover_color'];
$topbar_text_color	        = MedixareTheme::$options['topbar_text_color'];
$topbar_icon_color      	= MedixareTheme::$options['topbar_icon_color'];
$copyright_bg_color      	= MedixareTheme::$options['copyright_bg_color'];
$copyright_text_color      	= MedixareTheme::$options['copyright_text_color'];
$copyright_link_color      	= MedixareTheme::$options['copyright_link_color'];
$copyright_link_hover_color = MedixareTheme::$options['copyright_link_hover_color'];
$footer1_title_color        = MedixareTheme::$options['footer1_title_color'];
$footer1_title_shape_color  = MedixareTheme::$options['footer1_title_shape_color'];
$footer1_text_color         = MedixareTheme::$options['footer1_text_color'];
$footer1_link_color   		= MedixareTheme::$options['footer1_link_color'];
$footer1_link_hover_color   = MedixareTheme::$options['footer1_link_hover_color'];
$footer1_link_hover_bg_color= MedixareTheme::$options['footer1_link_hover_bg_color'];
$footer1_overlay_opacity    = MedixareTheme::$options['footer1_overlay_opacity'];
$footer2_title_color        = MedixareTheme::$options['footer2_title_color'];
$footer2_title_shape_color  = MedixareTheme::$options['footer2_title_shape_color'];
$footer2_text_color         = MedixareTheme::$options['footer2_text_color'];
$footer2_link_color   		= MedixareTheme::$options['footer2_link_color'];
$footer2_link_hover_color   = MedixareTheme::$options['footer2_link_hover_color'];
$footer2_link_hover_bg_color= MedixareTheme::$options['footer2_link_hover_bg_color'];
$footer2_overlay_opacity    = MedixareTheme::$options['footer2_overlay_opacity'];
$footer3_title_color        = MedixareTheme::$options['footer3_title_color'];
$footer3_title_shape_color  = MedixareTheme::$options['footer3_title_shape_color'];
$footer3_link_color   		= MedixareTheme::$options['footer3_link_color'];
$footer3_text_color         = MedixareTheme::$options['footer3_text_color'];
$footer3_link_hover_color   = MedixareTheme::$options['footer3_link_hover_color'];
$footer3_overlay_opacity    = MedixareTheme::$options['footer3_overlay_opacity'];

$menu_dark_color       		= MedixareTheme::$options['menu_dark_color'];
$menu_light_color       	= MedixareTheme::$options['menu_light_color'];
$menu_hover_color      		= MedixareTheme::$options['menu_hover_color'];
$submenu_color         		= MedixareTheme::$options['submenu_color'];
$submenu_bgcolor       		= MedixareTheme::$options['submenu_bgcolor'];
$submenu_hover_color   		= MedixareTheme::$options['submenu_hover_color'];
$submenu_hover_bgcolor 		= MedixareTheme::$options['submenu_hover_bgcolor'];
$medixare_typo_body     		= MedixareTheme::$options['typo_body'];
$medixare_typo_h1       		= MedixareTheme::$options['typo_h1'];
$medixare_typo_h2       		= MedixareTheme::$options['typo_h2'];
$medixare_typo_h3       		= MedixareTheme::$options['typo_h3'];
$medixare_typo_h4       		= MedixareTheme::$options['typo_h4'];
$medixare_typo_h5       		= MedixareTheme::$options['typo_h5'];
$medixare_typo_h6       		= MedixareTheme::$options['typo_h6'];
$dark_mode_border_color     = MedixareTheme::$options['dark_mode_border_color'];
$dark_mode_color     		= MedixareTheme::$options['dark_mode_color'];
$dark_mode_bgcolor     		= MedixareTheme::$options['dark_mode_bgcolor'];
$dark_mode_light_bgcolor    = MedixareTheme::$options['dark_mode_light_bgcolor'];
$error_text1_color          = MedixareTheme::$options['error_text1_color'];
$error_text2_color          = MedixareTheme::$options['error_text2_color'];
$scroll_indicator_bgcolor   = MedixareTheme::$options['scroll_indicator_bgcolor'];
$ticker_swiper_bg_color     = MedixareTheme::$options['ticker_swiper_bg_color'];
$ticker_text_color          = MedixareTheme::$options['ticker_text_color'];
$ticker_text_hover_color    = MedixareTheme::$options['ticker_text_hover_color'];
$preloader_bg_color         = MedixareTheme::$options['preloader_bg_color'];
$breadcrumb_link_color      = MedixareTheme::$options['breadcrumb_link_color'];
$breadcrumb_link_hover_color= MedixareTheme::$options['breadcrumb_link_hover_color'];
$breadcrumb_seperator_color = MedixareTheme::$options['breadcrumb_seperator_color'];
$header_menu_color 			= MedixareTheme::$options['header_menu_color'];
$header_menu_hover_color 	= MedixareTheme::$options['header_menu_hover_color'];

/* = Body Typo Area
=======================================================*/
$typo_body = json_decode( MedixareTheme::$options['typo_body'], true );
if ($typo_body['font'] == 'Inherit') {
	$typo_body['font'] = 'Rubik';
} else {
	$typo_body['font'] = $typo_body['font'];
}

/* = Menu Typo Area
=======================================================*/
$typo_menu = json_decode( MedixareTheme::$options['typo_menu'], true );
if ($typo_menu['font'] == 'Inherit') {
	$typo_menu['font'] = 'Rubik';
} else {
	$typo_menu['font'] = $typo_menu['font'];
}

$typo_sub_menu = json_decode( MedixareTheme::$options['typo_sub_menu'], true );
if ($typo_sub_menu['font'] == 'Inherit') {
	$typo_sub_menu['font'] = 'Rubik';
} else {
	$typo_sub_menu['font'] = $typo_sub_menu['font'];
}

/* = Heading Typo Area
=======================================================*/
$typo_heading = json_decode( MedixareTheme::$options['typo_heading'], true );
if ($typo_heading['font'] == 'Inherit') {
	$typo_heading['font'] = 'Rubik';
} else {
	$typo_heading['font'] = $typo_heading['font'];
}

$typo_h1 = json_decode( MedixareTheme::$options['typo_h1'], true );
if ($typo_h1['font'] == 'Inherit') {
	$typo_h1['font'] = 'Rubik';
} else {
	$typo_h1['font'] = $typo_h1['font'];
}

$typo_h2 = json_decode( MedixareTheme::$options['typo_h2'], true );
if ($typo_h2['font'] == 'Inherit') {
	$typo_h2['font'] = 'Rubik';
} else {
	$typo_h2['font'] = $typo_h2['font'];
}

$typo_h3 = json_decode( MedixareTheme::$options['typo_h3'], true );
if ($typo_h3['font'] == 'Inherit') {
	$typo_h3['font'] = 'Rubik';
} else {
	$typo_h3['font'] = $typo_h3['font'];
}
$typo_h4 = json_decode( MedixareTheme::$options['typo_h4'], true );
if ($typo_h4['font'] == 'Inherit') {
	$typo_h4['font'] = 'Rubik';
} else {
	$typo_h4['font'] = $typo_h4['font'];
}
$typo_h5 = json_decode( MedixareTheme::$options['typo_h5'], true );
if ($typo_h5['font'] == 'Inherit') {
	$typo_h5['font'] = 'Rubik';
} else {
	$typo_h5['font'] = $typo_h5['font'];
}
$typo_h6 = json_decode( MedixareTheme::$options['typo_h6'], true );
if ($typo_h6['font'] == 'Inherit') {
	$typo_h6['font'] = 'Rubik';
} else {
	$typo_h6['font'] = $typo_h6['font'];
}

?>
<?php
/*-------------------------------------
#. Default
---------------------------------------*/
?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.section-title {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.section-title:after {
		border-top: 10px solid <?php echo esc_html( $primary_color ); ?>;
	}
	a:hover,
	.section-title .swiper-button>div:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}	
	.primary-color {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	.loader .cssload-inner.cssload-one,
	.loader .cssload-inner.cssload-two,
	.loader .cssload-inner.cssload-three {
		border-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.scroll-wrap:after {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	.scroll-wrap svg.scroll-circle path {
	    stroke: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php if ( !empty( $container_width ) ) { ?>
	@media ( min-width:1400px ) {
		.container {
			max-width: <?php echo esc_html( $container_width ); ?>px;
		}
	}
<?php } ?>

<?php if (!empty( $secondary_color ) ) { ?>
	.secondary-color {
		color: <?php echo esc_html( $secondary_color ); ?>;
	}
<?php } ?>

<?php if (!empty( $preloader_bg_color ) ) { ?>
	#preloader {
		background-color: <?php echo esc_html( $preloader_bg_color ); ?>;
	}
<?php } ?>

<?php if ( $logo_width ) { ?>
	.site-header .site-branding a img {
		max-width: <?php echo esc_html( $logo_width ); ?>px;
	}
<?php } ?>
<?php if ( $mobile_logo_width ) { ?>
	.mean-container .mean-bar img {
		max-width: <?php echo esc_html( $mobile_logo_width ); ?>px;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Typography
---------------------------------------*/
?>

<?php if ( !empty( $body_color ) ) { ?>
	body {
		color: <?php echo esc_html( $body_color ); ?>;
	}
<?php } ?>
body {
	font-family: '<?php echo esc_html( $typo_body['font'] ); ?>', sans-serif !important;
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_body_size'] ) ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_body_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_body['regularweight'] ) ?>;
	font-style: normal;
}
h1,h2,h3,h4,h5,h6 {
	font-family: '<?php echo esc_html( $typo_heading['font'] ); ?>', sans-serif;
	font-weight : <?php echo esc_html( $typo_heading['regularweight'] ); ?>;
}

<?php if (!empty($typo_h1['font'])){ ?>
	h1 {
		font-family: '<?php echo esc_html( $typo_h1['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h1['regularweight'] ); ?>;
	}
<?php } ?>
h1 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h1_size'] ); ?>;
	line-height: <?php echo esc_html(  MedixareTheme::$options['typo_h1_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h2['font'])) { ?>
	h2 {
		font-family: '<?php echo esc_html( $typo_h2['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h2['regularweight'] ); ?>;
	}
<?php } ?>
h2 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h2_size'] ); ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_h2_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h3['font'])) { ?>
	h3 {
		font-family: '<?php echo esc_html( $typo_h3['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h3['regularweight'] ); ?>;
	}
<?php } ?>
h3 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h3_size'] ); ?>;
	line-height: <?php echo esc_html(  MedixareTheme::$options['typo_h3_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h4['font'])) { ?>
	h4 {
		font-family: '<?php echo esc_html( $typo_h4['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h4['regularweight'] ); ?>;
	}
<?php } ?>
h4 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h4_size'] ); ?>;
	line-height: <?php echo esc_html(  MedixareTheme::$options['typo_h4_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h5['font'])) { ?>
	h5 {
		font-family: '<?php echo esc_html( $typo_h5['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h5['regularweight'] ); ?>;
	}
<?php } ?>
h5 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h5_size'] ); ?>;
	line-height: <?php echo esc_html(  MedixareTheme::$options['typo_h5_height'] ); ?>;
	font-style: normal;
}
<?php if (!empty($typo_h6['font'])) { ?>
	h6 {
		font-family: '<?php echo esc_html( $typo_h6['font'] ); ?>', sans-serif;
		font-weight : <?php echo esc_html( $typo_h6['regularweight'] ); ?>;
	}
<?php } ?>
h6 {
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_h6_size'] ); ?>;
	line-height: <?php echo esc_html(  MedixareTheme::$options['typo_h6_height'] ); ?>;
	font-style: normal;
}

<?php
/*-------------------------------------
#. Top Bar
---------------------------------------*/
?>

<?php if ( !empty ( $topbar_bg_color )) { ?>
	.topbar-style-1 .header-top-bar,
	.topbar-style-2 .header-top-bar,
	.topbar-style-3 .header-top-bar,
	.topbar-style-4 .header-top-bar {
		background-color: <?php echo esc_html( $topbar_bg_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $topbar_link_color )) { ?>
	.topbar-style-1 .tophead-item.header-link-item a,
	.topbar-style-2 .tophead-item.header-link-item a,
	.topbar-style-3 .tophead-item.header-link-item a,
	.topbar-style-4 .tophead-item.header-link-item a {
		color: <?php echo esc_html( $topbar_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $topbar_link_hover_color )) { ?>
	.topbar-style-1 .tophead-item.header-link-item a:hover,
	.topbar-style-2 .tophead-item.header-link-item a:hover,
	.topbar-style-3 .tophead-item.header-link-item a:hover,
	.topbar-style-4 .tophead-item.header-link-item a:hover {
		color: <?php echo esc_html( $topbar_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $topbar_text_color )) { ?>
	.header-style-8 .header-middle-bar .header-plain-text,
	.topbar-style-1 .tophead-item .header-plain-text,
	.topbar-style-2 .tophead-item .header-plain-text,
	.topbar-style-3 .tophead-item .header-plain-text,
	.topbar-style-4 .tophead-item .header-plain-text {
		color: <?php echo esc_html( $topbar_text_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color )) { ?>
	.header-style-8 .midhead-item .header-icon-box,
	.topbar-style-1 .tophead-item .header-icon-box,
	.topbar-style-2 .tophead-item .header-icon-box,
	.topbar-style-3 .tophead-item .header-icon-box,
	.topbar-style-4 .tophead-item .header-icon-box {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $topbar_icon_color )) { ?>
	.header-style-8 .midhead-item .header-icon-box,
	.topbar-style-1 .tophead-item .header-icon-box,
	.topbar-style-2 .tophead-item .header-icon-box,
	.topbar-style-3 .tophead-item .header-icon-box,
	.topbar-style-4 .tophead-item .header-icon-box {
		color: <?php echo esc_html( $topbar_icon_color ); ?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Header
---------------------------------------*/
?>
<?php // Main Menu ?>

<?php if ( !empty ( $header_menu_color ) ) { ?>
	.header-style-1 .header-menu.amt-sticky .menu-wrap .main-navigation ul li  a {
		color: <?php echo esc_html( $header_menu_color ); ?> !important;
	}
<?php } ?>
<?php if ( !empty ( $header_menu_hover_color ) ) { ?>
	.header-style-1 .header-menu.amt-sticky .menu-wrap .main-navigation ul li  a:hover {
		color: <?php echo esc_html( $header_menu_hover_color ); ?> !important;
	}
<?php } ?>

<?php if ( !empty ( $menu_light_color ) ) { ?>
	.header-style-1 .site-header .main-navigation nav > ul > li > a {
		color: <?php echo esc_html( $menu_light_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.header-style-1 .site-header .main-navigation nav > ul > li > a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $menu_hover_color ) ) { ?>
	.header-style-1 .site-header .main-navigation nav > ul > li > a:hover {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
<?php } ?>

.site-header .main-navigation nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_menu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}
.site-header .main-navigation ul li ul li a {
	font-family: '<?php echo esc_html( $typo_sub_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_sub_menu['regularweight'] ) ?>;
	font-style: normal;
}

<?php if ( !empty ( $submenu_color ) ) { ?>
	.site-header .main-navigation ul li ul li a {
		color: <?php echo esc_html( $submenu_color ); ?>;
	}
<?php } ?>

.mean-container .mean-nav ul li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_submenu_size'] ) ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_submenu_height'] ); ?>;
	font-weight : <?php echo esc_html( $typo_menu['regularweight'] ) ?>;
	font-style: normal;
}
<?php // Topbar Menu ?>
.rt-topbar-menu .menu li a {
	font-family: '<?php echo esc_html( $typo_menu['font'] ); ?>', sans-serif;
	font-size: <?php echo esc_html( MedixareTheme::$options['typo_menu_size'] ) ?>;
	line-height: <?php echo esc_html( MedixareTheme::$options['typo_menu_height'] ); ?>;
	font-style: normal;
}

<?php if ( MedixareTheme::$options['header_bg_color'] ) { ?>
	.header-area {
		background-color: <?php echo esc_html( MedixareTheme::$options['header_bg_color'] ); ?> !important;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.site-header .main-navigation ul.menu li ul.sub-menu li a:hover,
	.site-header .main-navigation ul.menu>li>a:hover,
	.site-header .main-navigation ul.menu li.current-menu-ancestor > a {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.site-header .main-navigation ul li ul.sub-menu li:hover>a:before,
	.site-header .main-navigation nav>ul>li>a::before {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $menu_hover_color ) ) { ?>
	.site-header .main-navigation > ul.menu li.current-menu-item > a,
	.site-header .main-navigation ul.menu > li.current > a {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.site-header .main-navigation ul.menu > li > a:hover {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.site-header .main-navigation ul.menu li.current-menu-ancestor > a {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.site-header .main-navigation nav ul li a.active {
		color: <?php echo esc_html( $menu_hover_color );?>;
	}
	.site-header .main-navigation nav > ul > li > a::before {
		background-color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.header-style-1 .site-header .main-navigation ul.menu > li.current > a:hover,
	.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a:hover,
	.header-style-1 .site-header .main-navigation  ul li a.active,
	.header-style-1 .site-header .main-navigation ul.menu > li.current-menu-item > a,
	.header-style-1 .site-header .main-navigation ul.menu > li.current > a  {
		color: <?php echo esc_html( $menu_hover_color );?>;
	}
	.additional-menu-area .sidenav ul li a:hover {
		color: <?php echo esc_html( $menu_hover_color );?>;
	}
	.rt-slide-nav .offscreen-navigation li.current-menu-item > a, 
	.rt-slide-nav .offscreen-navigation li.current-menu-parent > a {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.rt-slide-nav .offscreen-navigation ul li > a:hover:before {
		background-color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
	.mean-container .mean-nav ul li a:hover,
	.mean-container .mean-nav > ul > li.current-menu-item > a {
		color: <?php echo esc_html( $menu_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $menu_dark_color ) ) { ?>
	.site-header .main-navigation nav > ul > li > a {
		color: <?php echo esc_html( $menu_dark_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.header-search-field .search-form .search-button:hover {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.additional-menu-area .sidenav-social span a:hover {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $submenu_bgcolor ) ) { ?>
	.site-header .main-navigation ul li ul {
		background-color: <?php echo esc_html( $submenu_bgcolor ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.header-search .header-search-form .search-btn:hover,
	.site-header .main-navigation ul.menu li.current-menu-item > a,
	.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	} 
	.site-header .main-navigation ul li ul.sub-menu li:hover > a:before {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:hover:before {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.header-search .header-search-form input[type=search] {
		border-bottom: 1px solid <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $submenu_hover_color ) ) { ?>
	.site-header .main-navigation ul.menu li.current-menu-item > a,
	.site-header .main-navigation ul.menu li ul.sub-menu li a:hover {
		color: <?php echo esc_html( $submenu_hover_color );?>;
	} 
	.site-header .main-navigation ul li ul.sub-menu li:hover > a:before {
		background-color: <?php echo esc_html( $submenu_hover_color ); ?>;
	}
	.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:hover:before {
		color: <?php echo esc_html( $submenu_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $submenu_hover_bgcolor ) ) { ?>
	.site-header .main-navigation ul li ul li:hover {
		background-color: <?php echo esc_html( $submenu_hover_bgcolor ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $submenu_bgcolor ) ) { ?>
	.site-header .main-navigation ul li.mega-menu > ul.sub-menu {
		background-color: <?php echo esc_html( $submenu_bgcolor ); ?>
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.site-header .main-navigation ul li.mega-menu > ul.sub-menu li:before {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $submenu_color ) ) { ?>
	.site-header .main-navigation ul li ul.sub-menu li.menu-item-has-children:before {
		color: <?php echo esc_html( $submenu_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.mean-container a.meanmenu-reveal,
	.mean-container .mean-nav ul li a.mean-expand {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	.mean-container a.meanmenu-reveal span {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.mean-container .mean-nav ul li.current_page_item > a,
	.mean-container .mean-nav ul li.current-menu-item > a,
	.mean-container .mean-nav ul li.current-menu-parent > a {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.site-header .search-box .search-text {
		border-color: <?php echo esc_html( $primary_color );?>;
	}
	.header-style-1 .rt-sticky .cart-area .cart-trigger-icon:hover,	
	.header-style-1 .rt-sticky .header-icon-area .search-icon a:hover,
	.header-style-1 .site-header .header-top .icon-left,
	.header-style-1 .site-header .header-top .info-text a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}

	.header-style-2 .header-icon-area .header-search-box a:hover i {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}

	.header-style-3 .site-header .info-wrap .info i {
		color: <?php echo esc_html( $primary_color ); ?>;
	}


	.header-style-8 .site-header .rt-sticky .main-navigation nav > ul > li > a:hover,
	.header-style-6 .header-search-six .search-form button:hover,
	.header-style-8 .header-search-six .search-form button:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}

	.header-style-1 .header-icon-area .search-icon a:hover,
	.header-icon-area .search-icon a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	.header__switch,
	.additional-menu-area .sidenav .closebtn {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
	.additional-menu-area .sidenav .closebtn {
		border: 1px solid <?php echo esc_html( $primary_color ); ?>;
	}
	.additional-menu-area .sidenav nav ul li a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
	.mobile-top-bar .header-top .icon-left,
	.mobile-top-bar .header-top .info-text a:hover,
	.additional-menu-area .sidenav-address span a:hover,
	.additional-menu-area .sidenav-address span i {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) ) { ?>	
	.header__switch__main {
	    background: <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>	
	.additional-menu-area .sidenav .closebtn:hover {
	    background-color: <?php echo esc_html( $secondary_color );?>;
	    border: 1px solid <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>	
	.search-form button:hover {
	    color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Title
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.entry-header .entry-title.title-light-color,
	.entry-content .entry-title.title-light-color,
	.entry-content .entry-title.title-light-color a {
		background-image: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?> 50%, #ffffff 50%);
	}

	.entry-header .entry-title.title-dark-color, 
	.entry-content .entry-title.title-dark-color, 
	.entry-content .entry-title.title-dark-color a {
		background-image: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?> 50%, #111111 50%);
	}
<?php } ?>

<?php
/*-------------------------------------
#. Banner
---------------------------------------*/
?>
<?php if ( !empty ( $breadcrumb_link_color ) ) { ?>
	.breadcrumb-area .entry-breadcrumb span a {
		color: <?php echo esc_html( $breadcrumb_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $breadcrumb_link_hover_color ) ) { ?>
	.breadcrumb-area .entry-breadcrumb span a:hover {
		color: <?php echo esc_html( $breadcrumb_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty (MedixareTheme::$options['breadcrumb_active_color'])) { ?>
	.breadcrumb-area .entry-breadcrumb .current-item {
		color: <?php echo esc_html( MedixareTheme::$options['breadcrumb_active_color'] );?>;
	}
<?php } ?>

<?php if ( !empty ( $breadcrumb_link_color ) ) { ?>
	.breadcrumb-trail ul.trail-items li a {
		color: <?php echo esc_html( $breadcrumb_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $breadcrumb_link_hover_color ) ) { ?>
	.breadcrumb-trail ul.trail-items li a:hover {
		color: <?php echo esc_html( $breadcrumb_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $breadcrumb_seperator_color ) ) { ?>
	.entry-banner .entry-breadcrumb .dvdr {
		color: <?php echo esc_html( $breadcrumb_seperator_color ); ?>;
	}
	.breadcrumb-trail ul.trail-items li,
	.entry-banner .entry-breadcrumb .delimiter {
		color: <?php echo esc_html( $breadcrumb_seperator_color ); ?>;
	}
<?php } ?>

<?php if (MedixareTheme::$options['page_bgtype'] == 'page_bgimg'){ ?>
	.entry-banner:after {
		position: absolute;
		content: '';
		left: 0;
		top: 0;
		height: 100%;
		width: 100%;
		background-image: linear-gradient(90.1deg, rgba(36, 31, 27, 0.99) 9.35%, rgba(36, 31, 27, 0.51) 51.74%, rgba(36, 31, 27, 0) 62.35%);
		z-index: 1;

}
<?php } ?>

.entry-banner .entry-banner-content {
	padding-top: <?php  echo esc_html( MedixareTheme::$options['banner_top_padding'] ); ?>px;
	padding-bottom: <?php  echo esc_html( MedixareTheme::$options['banner_bottom_padding'] ); ?>px;
}

<?php
/*-------------------------------------
#. Footer
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.footer-top-area .widget_nav_menu ul li a::before, 
	.footer-top-area .widget_meta ul li a::before,
	.menu-footer-menu-container ul li.menu-item a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>
	.frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:hover {
		background-color: <?php echo esc_html( $secondary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $copyright_bg_color ) ) { ?>
	.footer-area .footer-copyright-area {
		background-color: <?php echo esc_html( $copyright_bg_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $copyright_text_color ) ) { ?>
	.footer-area .copyright {
		color: <?php echo esc_html( $copyright_text_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $copyright_link_color ) ) { ?>
	.footer-area .copyright a {
		color: <?php echo esc_html( $copyright_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $copyright_link_hover_color ) ) { ?>
	.footer-area .copyright a:hover {
		color: <?php echo esc_html( $copyright_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer1_title_color ) ) { ?>
	.footer-style-1 .footer-area .widgettitle {
		color: <?php echo esc_html( $footer1_title_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.apsc-theme-3 .apsc-inner-block:after,
	.footer-area .footer-social li a:hover,
	.footer-area .widgettitle:after {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.widget ul li a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer1_title_shape_color ) ) { ?>
	.footer-style-1 .footer-area .widgettitle:after {
		background-color: <?php echo esc_html( $footer1_title_shape_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer1_text_color ) ) { ?>
	.footer-style-1 .footer-top-area .corporate-address li,
	.footer-style-1 .footer-about .content-box p {
		color: <?php echo esc_html( $footer1_text_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer1_link_color ) ) { ?>
	.footer-style-1 .frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:after,
	.footer-style-1 .footer-top-area .post-box-style .post-content .entry-title a,
	.footer-style-1 footer .widget ul li a,
	.footer-style-1 .footer-area .footer-social li a,
	.footer-style-1 .menu-footer-menu-container ul li.menu-item a {
		color: <?php echo esc_html( $footer1_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer1_link_hover_color ) ) { ?>
	.footer-style-1 .frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:after,
	.footer-style-1 .footer-top-area .post-box-style .post-content .entry-title a:hover,
	.footer-style-1 footer .widget ul li a:hover,
	.footer-style-1 .footer-area .footer-social li a:hover,
	.footer-style-1 .menu-footer-menu-container ul li.menu-item a:hover {
		color: <?php echo esc_html( $footer1_link_hover_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer1_link_hover_bg_color ) ) { ?>
	.footer-area .footer-social li a:hover,
	.footer-style-1 .frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:hover {
		background-color: <?php echo esc_html( $footer1_link_hover_bg_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer1_bg_color ) ) { ?>
	.footer-style-1 .footer-area .footer-top-area {
		background: <?php echo esc_html( $footer1_bg_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer1_overlay_opacity ) ) { ?>
	.footer-bg-opacity.footer-1:after {
		background-color: rgba(0, 0, 0, <?php echo esc_html( $footer1_overlay_opacity ); ?>);
	}
<?php } ?>

<?php if ( !empty ( $footer2_title_color ) ) { ?>
	.footer-style-2 .footer-area .widgettitle {
		color: <?php echo esc_html( $footer2_title_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer2_title_shape_color ) ) { ?>
	.footer-style-2 .footer-area .widgettitle:after {
		background-color: <?php echo esc_html( $footer2_title_shape_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer2_text_color ) ) { ?>
	.footer-style-2 .footer-top-area .corporate-address li,
	.footer-style-2 .footer-about .content-box p {
		color: <?php echo esc_html( $footer2_text_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer2_link_color ) ) { ?>
	.frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:after,
	.footer-style-2 .footer-top-area .post-box-style .post-content .entry-title a,
	.footer-style-2 footer .widget ul li a,
	.footer-style-2 .footer-area .footer-social li a,
	.footer-style-2 .menu-footer-menu-container ul li.menu-item a:before,
	.footer-style-2 .menu-footer-menu-container ul li.menu-item a {
		color: <?php echo esc_html( $footer2_link_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer2_link_hover_color ) ) { ?>
	.frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:hover:after,
	.footer-style-2 .footer-top-area .post-box-style .post-content .entry-title a:hover,
	.footer-style-2 footer .widget ul li a:hover,
	.footer-style-2 .footer-area .footer-social li a:hover,
	.footer-style-2 .menu-footer-menu-container ul li.menu-item a:hover:before,
	.footer-style-2 .menu-footer-menu-container ul li.menu-item a:hover {
		color: <?php echo esc_html( $footer2_link_hover_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer2_link_hover_bg_color ) ) { ?>
	.frm-fluent-form.fluent_form_2 .ff-form-style-1 .ff-t-cell button:hover,
	.footer-style-2 .footer-area .footer-social li a:hover {
		background-color: <?php echo esc_html( $footer2_link_hover_bg_color ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $footer2_bg_color ) ) { ?>
	.footer-style-2 .footer-area .footer-top-area {
		background: <?php echo esc_html( $footer2_bg_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer2_overlay_opacity ) ) { ?>
	.footer-bg-opacity.footer-2:after {
		background-color: rgba(0, 0, 0, <?php echo esc_html( $footer2_overlay_opacity ); ?>);
	}
<?php } ?>
<?php if ( !empty ( $footer3_title_color ) ) { ?>
	.footer-style-3 .footer-area .widgettitle {
		color: <?php echo esc_html( $footer3_title_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer3_title_shape_color ) ) { ?>
	.footer-style-3 .footer-area .widgettitle:after {
		background-color: <?php echo esc_html( $footer3_title_shape_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer3_link_color ) ) { ?>
	.footer-style-3 .apsc-theme-3 .apsc-each-profile>a,
	.footer-style-3 .rt-category-widget.box-style-3 .amt-item a .rt-cat-name,
	.footer-style-3 .rt-category-widget.box-style-3 .amt-item a:before,
	.footer-style-3 footer .widget ul li a {
		color: <?php echo esc_html( $footer3_link_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer3_link_hover_color ) ) { ?>
	.footer-style-3 .apsc-theme-3 .apsc-each-profile a:hover .apsc-inner-block .apsc-media-type,
	.footer-style-3 .apsc-theme-3 .apsc-each-profile a:hover .social-icon i,
	.footer-style-3 .rt-category-widget.box-style-3 .amt-item a:hover .rt-cat-name,
	.footer-style-3 .rt-category-widget.box-style-3 .amt-item a:hover:before,
	.footer-style-3 footer .widget ul li a:hover {
		color: <?php echo esc_html( $footer3_link_hover_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer3_text_color ) ) { ?>
	.footer-style-3 .footer-top-area .corporate-address li,
	.footer-style-3 .footer-about .content-box p {
		color: <?php echo esc_html( $footer3_text_color ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $footer3_overlay_opacity ) ) { ?>
	.footer-bg-opacity.footer-3:after {
		background-color: rgba(0, 0, 0, <?php echo esc_html( $footer3_overlay_opacity ); ?>);
	}
<?php } ?>

<?php
/*-------------------------------------
#. Widgets
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.post-tab-layout ul.btn-tab li .active, 
	.post-tab-layout ul.btn-tab li a:hover {
		background-color: <?php echo esc_html( $primary_color ); ?>;
		border: 1px solid <?php echo esc_html( $primary_color ); ?>;
	}
	.post-tab-layout ul.btn-tab li a:before {
		border-top: 10px solid <?php echo esc_html( $primary_color ); ?>;
	}
	.rt-category-widget.box-style-3 .amt-item a:before,
	.rt-category-widget.box-style-3 .amt-item a:hover .rt-cat-name,
	.rt-category-widget.box-style-1 .amt-item .rt-cat-name::before,
	.rt-category-widget.box-style-2 .amt-item a:before,
	.rt-category-widget.box-style-2 .amt-item a:hover .rt-cat-name,
	.post-box-style .entry-cat a:hover,
	.post-tab-layout .post-tab-cat a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.rt-category-widget.box-style-1 .rt-item:hover .rt-cat-count,
	.sidebar-widget-area .widget .rt-widget-title-holder,
	.rt-category-style2 .rt-item:hover .rt-cat-count,
	.sidebar-widget-area .widget_tag_cloud a:hover, 
	.sidebar-widget-area .widget_product_tag_cloud a:hover,
	.post-box-style .item-list:hover .post-box-img .post-img::after,
	.post-tab-layout ul.btn-tab li a:hover {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	.rt-image-style3 .rt-image:after {
		background-image: linear-gradient(38deg, #512da8 0%, <?php echo esc_html( $primary_color );?> 100%);
	}
	.sidebar-widget-area .widget .rt-widget-title-holder:after {
		border-top: 10px solid <?php echo esc_html( $primary_color );?>;
	}

<?php } ?>

<?php
/*-------------------------------------
#. Error 404
---------------------------------------*/
?>

<?php if ( !empty ( $error_text1_color )) { ?>
	.error-page-content .error-title {
		color: <?php echo esc_html( $error_text1_color ); ?>;
	}
<?php } ?> 
<?php if ( !empty ( $error_text2_color )) { ?>
	.error-page-content p {
		color: <?php echo esc_html( $error_text2_color ); ?>;
	}
<?php } ?> 

<?php
/*------------------------------------
#. Buttons
------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) && !empty ( $secondary_color )) { ?>
	.button-style-1 {
		border-image-source: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $secondary_color ); ?>, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $secondary_color ); ?>);
	}
	.frm-fluent-form.fluent_form_8 .ff-form-style-1 .ff-t-cell button:before,
	.fluentform .ff-btn-lg:after,
	a.loadMore:after,
	.button-style-1:before {
		background-image: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $secondary_color ); ?>, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $secondary_color ); ?>);
	}
<?php } ?> 
<?php if ( !empty ( $primary_color )) { ?>
	.play-btn:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
		border-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?> 
<?php if ( !empty ( $primary_color )) { ?>
	.play-btn-2:hover {
		background-color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?> 

<?php
/*-------------------------------------
#. Single Content
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	blockquote p:before,
	ul.entry-meta li a:hover,
	.entry-header ul.entry-meta li a:hover,
	.entry-footer ul.item-tags li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.rt-related-post-info .post-title a:hover,
	.rt-related-post-info .post-date ul li.post-relate-date,
	.post-detail-style2 .show-image .entry-header ul.entry-meta li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.about-author ul.author-box-social li a:hover,
	.rt-related-post .entry-content .entry-categories a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.post-navigation a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.entry-header .entry-meta ul li i,
	.entry-header .entry-meta ul li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.comment-respond>h4:after,
	.single-post .entry-content ol li:before,
	.entry-content ol li:before,
	.meta-tags a:hover {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	.rt-related-post .title-section h2:after,
	.single-post .ajax-scroll-post > .type-post:after {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	.entry-footer .item-tags a:hover {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	.entry-meta-tags a:hover {
		background: <?php echo esc_html( $primary_color );?>;
		border-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.single .medixare-progress-bar {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $scroll_indicator_bgcolor ) ) { ?>
	.single .medixare-progress-bar {
		background-color: <?php echo esc_html( $scroll_indicator_bgcolor );?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Archive Contents
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.entry-categories.style-2.meta-light-color a:hover, 
	.entry-categories.style-2.meta-dark-color a:hover,
	ul.entry-meta li i,
	ul.entry-meta.meta-dark-color li.post-comment a:hover, 
	ul.entry-meta.meta-light-color li.post-comment a:hover,
	ul.entry-meta.meta-dark-color li.post-author a:hover, 
	ul.entry-meta.meta-light-color li.post-author a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.rt-category-style5 .rt-item:hover .rt-content {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>
<?php //if ( !empty ( $primary_color ) ) { ?>
	<!-- .blog-layout-5 .blog-box .entry-content {
		background-color: rgba(<?php //echo esc_html( $primary_rgb );?>, 0.05);
	} -->
<?php //} ?>

<?php
/*-------------------------------------
#. Comment
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.comments-area .main-comments .replay-area a:hover,
	.comments-area>h4:after,
	#respond form .btn-send,
	.item-comments .item-comments-list ul.comments-list li .comment-reply {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	form.post-password-form input[type="submit"] {
	    background: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>
	#respond form .btn-send:hover {
	    background: <?php echo esc_html( $secondary_color );?>;
	}
	form.post-password-form input[type="submit"]:hover {
	    background: <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Pagination
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.pagination-area li.active a:hover,
	.pagination-area ul li.active a,
	.pagination-area ul li a:hover,
	.pagination-area ul li span.current {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php
/*-------------------------------------
#. Fluent form
---------------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.frm-fluent-form.fluent_form_6,
	.fluentform .subscribe-form h4::after, 
	.fluentform .subscribe-form h4::before,
	.fluentform .contact-form .ff_btn_style,
	.fluentform .subscribe-form .ff_btn_style,
	.fluentform .subscribe-form-2 .ff_btn_style,
	.fluentform .contact-form .ff_btn_style:hover,
	.fluentform .subscribe-form .ff_btn_style:hover,
	.fluentform .subscribe-form-2 .ff_btn_style:hover {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
	.fluentform .contact-form .ff-el-form-control:focus,
	.fluentform .subscribe-form .ff-el-form-control:focus,
	.fluentform .subscribe-form-2 .ff-el-form-control:focus {
		border-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) ) { ?>
	.fluentform .contact-form .ff_btn_style:hover:before,
	.fluentform .subscribe-form .ff_btn_style:hover:before,
	.fluentform .subscribe-form-2 .ff_btn_style:hover:before {
		background-color: <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>

<?php
/*----------------------
#. Miscellaneous
----------------------*/
?>

<?php if ( !empty ( $ticker_swiper_bg_color )) { ?>
	.ticker-wrapper .ticker-swipe {
		background-color: <?php echo esc_html( MedixareTheme::$options['ticker_swiper_bg_color'] ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $ticker_text_color )) { ?>
	.ticker-content a {
		color: <?php echo esc_html( MedixareTheme::$options['ticker_text_color'] ); ?>;
	}
<?php } ?>

<?php if ( $ticker_text_hover_color ) { ?>
	.ticker-content a:hover {
		color: <?php echo esc_html( MedixareTheme::$options['ticker_text_hover_color'] ); ?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) && !empty ( $primary_color ) ) { ?>
	.rt-news-ticker-holder i {
		background-image: linear-gradient(45deg, <?php echo esc_html( $secondary_color );?>, <?php echo esc_html( $primary_color );?>);
	}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
	#wpuf-login-form input[type="submit"],
	body .wpuf-dashboard-container .wpuf-pagination .page-numbers.current,
	body .wpuf-dashboard-container .wpuf-pagination .page-numbers:hover,
	body .wpuf-dashboard-container .wpuf-dashboard-navigation .wpuf-menu-item.active a, 
	body .wpuf-dashboard-container .wpuf-dashboard-navigation .wpuf-menu-item:hover a,
	.wpuf-login-form .submit > input,
	.wpuf-submit > input,
	.wpuf-submit > button {
	    background: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) ) { ?>
	#wpuf-login-form input[type="submit"]:hover,
	.wpuf-login-form .submit > input:hover,
	.wpuf-submit > input:hover,
	.wpuf-submit > button:hover {
	    background: <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>

<?php
/*----------------------
#. Dark mode
----------------------*/
?>
<?php if ( !empty ( $dark_mode_border_color ) ) { ?>
	[data-theme="dark-mode"] .dark-border,
	[data-theme="dark-mode"] .dark-border .elementor-element-populated,
	[data-theme="dark-mode"] .header-style-4 .header-menu,
	[data-theme="dark-mode"] .post-tab-layout ul.btn-tab li a,
	[data-theme="dark-mode"] .rt-post-tab .post-cat-tab a,
	[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 ul.entry-meta,
	[data-theme="dark-mode"] .dark-section2 .fluentform-widget-wrapper,
	[data-theme="dark-mode"] .rt-post-slider-style4 .swiper-slide,
	[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-list .list-content,
	[data-theme="dark-mode"] .rt-post-box-style1 .rt-item-wrap .entry-content,
	[data-theme="dark-mode"] .apsc-theme-2 .apsc-each-profile a,
	[data-theme="dark-mode"] .apsc-theme-3 .apsc-each-profile>a,
	[data-theme="dark-mode"] .apsc-theme-3 .social-icon,
	[data-theme="dark-mode"] .apsc-theme-3 span.apsc-count,
	[data-theme="dark-mode"] .post-detail-style1 .entry-header,
	[data-theme="dark-mode"] .feature-post-layout .list-item,
	[data-theme="dark-mode"] .sidebar-widget-area .widget > ul > li,
	[data-theme="dark-mode"] .post-tab-layout .tab-item,
	[data-theme="dark-mode"] .dark-border-color .elementor-widget .elementor-widget-container,
	[data-theme="dark-mode"] .additional-menu-area .sidenav .sub-menu,
	[data-theme="dark-mode"] .additional-menu-area .sidenav ul li,
	[data-theme="dark-mode"] .rt-post-list-style4,
	[data-theme="dark-mode"] .rt-post-list-default .rt-item,
	[data-theme="dark-mode"] .post-box-style .rt-news-box-widget,
	[data-theme="dark-mode"] .sidebar-widget-area .widget .widgettitle .titleline,
	[data-theme="dark-mode"] .section-title .related-title .titleline,
	[data-theme="dark-mode"] .meta-tags a,
	[data-theme="dark-mode"] .search-form .input-group,
	[data-theme="dark-mode"] .post-navigation .text-left,
	[data-theme="dark-mode"] .post-navigation .text-right,
	[data-theme="dark-mode"] .post-detail-style1 .share-box-area .post-share .share-links .email-share-button,
	[data-theme="dark-mode"] .post-detail-style1 .share-box-area .post-share .share-links .print-share-button,
	[data-theme="dark-mode"] .header-style-6 .logo-ad-wrap,
	[data-theme="dark-mode"] .rt-thumb-slider-horizontal-4 .rt-thumnail-area .swiper-pagination,
	[data-theme="dark-mode"] .elementor-category .rt-category-style2 .amt-item {
		border-color: <?php echo esc_html( $dark_mode_border_color ); ?> !important;
	}
<?php } ?>

<?php if ( !empty ( $dark_mode_color ) ) { ?>
	[data-theme="dark-mode"] body,
	[data-theme="dark-mode"] p {
		color: <?php echo esc_html( $dark_mode_color ); ?> !important;
	}
<?php } ?>

<?php if ( !empty ( $dark_mode_bgcolor ) ) { ?>
	[data-theme="dark-mode"] body,
	[data-theme="dark-mode"] .site-content,
	[data-theme="dark-mode"] .error-page-area,
	[data-theme="dark-mode"] #page .content-area {
	    background-color: <?php echo esc_html( $dark_mode_bgcolor ); ?> !important;
	}
<?php } ?>

<?php if ( !empty ( $dark_mode_light_bgcolor ) ) { ?>
	[data-theme="dark-mode"] .fluentform.fluentform_wrapper_1 .ff-el-form-control,
	[data-theme="dark-mode"] #respond form .form-control {
		border-color: <?php echo esc_html( $dark_mode_light_bgcolor ); ?>;
		background-color: <?php echo esc_html( $dark_mode_light_bgcolor ); ?>;
	}
	[data-theme="dark-mode"] .rt-image-style1 .entry-content,
	[data-theme="dark-mode"] .team-single .team-info,
	[data-theme="dark-mode"] .team-single .rt-skill-wrap,
	[data-theme="dark-mode"] .team-single .team-single-content .team-content,
	[data-theme="dark-mode"] .about-author,
	[data-theme="dark-mode"] blockquote,
	[data-theme="dark-mode"] .rt-post-slider-default.rt-post-slider-style4 .amt-item .entry-content {
		background-color: <?php echo esc_html( $dark_mode_light_bgcolor ); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>	
	[data-theme="dark-mode"] .entry-content .entry-title.title-dark-color a {
		background-image: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?> 50%, #ffffff 50%);
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>	
	[data-theme="dark-mode"] .cart-area .cart-trigger-icon:hover,
	[data-theme="dark-mode"] .header-style-1 .site-header .rt-sticky .main-navigation nav > ul > li > a:hover,
	[data-theme="dark-mode"] .header-style-1 .rt-sticky .cart-area .cart-trigger-icon:hover,
	[data-theme="dark-mode"] .header-style-1 .rt-sticky .header-icon-area .search-icon a:hover {
		color: <?php echo esc_html( $primary_color ); ?>;
	}
<?php } ?>

<?php
/*----------------------
#. woocommerce
----------------------*/
?>
<?php if ( !empty ( $secondary_color ) ) { ?>
.cart-area .cart-trigger-icon>span {
	background-color: <?php echo esc_html( $secondary_color );?>;
}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.cart-area .minicart-title a:hover, 
	.cart-area .minicart-remove a:hover,
	.cart-area .cart-trigger-icon:hover,
	.cart-area .minicart-remove a:hover,
	.woocommerce .rt-product-block .price-title-box .rt-title a:hover,
	.woocommerce .rt-product-block .rt-buttons-area .btn-icons .inline-item a,
	.woocommerce-cart table.woocommerce-cart-form__contents .product-name a:hover,
	.woocommerce-MyAccount-navigation ul li a:hover,
	.wishlist_table td a:hover,
	.woocommerce .product-details-page .post-social-sharing ul.item-social li a:hover,
	.woocommerce-account .addresses .title .edit:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
.woocommerce .rt-product-block .rt-buttons-area .btn-icons .inline-item a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.select2-container--default .select2-results__option--highlighted[aria-selected], 
.select2-container--default .select2-results__option--highlighted[data-selected] {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
.woocommerce #respond input#submit.alt, 
.woocommerce #respond input#submit,
.woocommerce input.button.alt, 
.woocommerce input.button, 
.cart-btn a.button,
#yith-quick-view-close {
	background-color: <?php echo esc_html( $primary_color );?>;
}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>
.woocommerce #respond input#submit.alt:hover,
.woocommerce #respond input#submit:hover,
.woocommerce input.button.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce input.button:hover,
.woocommerce a.button:hover,
.cart-btn a.button:hover,
#yith-quick-view-close:hover {
    background-color: <?php echo esc_html( $secondary_color );?>;
}
.woocommerce-message, 
.woocommerce-info {
    border-top-color: <?php echo esc_html( $primary_color );?>;
}
<?php } ?>

<?php if ( !empty ( $primary_color ) ) { ?>
.woocommerce div.product form.cart .single-add-to-cart-wrapper div.quantity .quantity-btn:hover,
.woocommerce.single-product .product-details-page .rt-right .wistlist-compare-box a:hover,
.woocommerce-cart table.woocommerce-cart-form__contents .quantity .quantity-btn:hover {
    background-color: <?php echo esc_html( $primary_color );?>;
    border: 1px solid <?php echo esc_html( $primary_color );?>;
}
<?php } ?>

<?php if ( !empty ( $primary_color ) && !empty ( $secondary_color )) { ?>
.woocommerce .rt-product-block .rt-thumb-wrapper .rt-btn-cart a:after,
.woocommerce #respond input#submit.alt:after,
.woocommerce #respond input#submit:after,
.woocommerce input.button.alt:after,
.woocommerce input.button:after,
.woocommerce a.button:after,
.woocommerce a.button.alt:after, 
.woocommerce button.button.alt:after,
.woocommerce button.button:after,
.cart-btn a.button:after{
	background-image: linear-gradient(to right, <?php echo esc_html( $primary_color );?>, <?php echo esc_html( $secondary_color );?>, <?php echo esc_html( $primary_color );?>, <?php echo esc_html( $secondary_color );?>);
}
<?php } ?>