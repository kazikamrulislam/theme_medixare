<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$primary_color     = MedixareTheme::$options['primary_color'];
$primary_rgb       = MedixareTheme_Helper::hex2rgb( $primary_color ); 
$secondary_color   = MedixareTheme::$options['secondary_color'];
$secondary_rgb     = MedixareTheme_Helper::hex2rgb( $secondary_color );

/*---------------------------------    
INDEX
===================================
#. EL: Section Title
#. EL: Nav and Dot
#. EL: Slider
#. EL: Text/image With Button
#. EL: Post addon
#. EL: Team Layout
#. EL: Widget
#. EL: Others
----------------------------------*/

/*-----------------------
#. EL: Section Title
------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-section-title.style1 {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-section-title.style1:after {
		border-top: 10px solid <?php echo esc_html($primary_color); ?>;
	}
	.amt-section-title.style2:after {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-section-title.style3 .entry-sub-title {
		color: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>

<?php
/*-----------------------
#. EL: Slider Nav
------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-swiper-nav-2 .swiper-navigation > div,
	.amt-swiper-nav-1 .swiper-navigation > div:hover,
	.amt-swiper-nav-3 .swiper-navigation > div:hover {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-swiper-nav-4 .swiper-navigation > div:hover {
		background-color: <?php echo esc_html($primary_color); ?>;
		border: 2px solid <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>
<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-swiper-nav-5 .swiper-navigation > div:hover {
		background-color: <?php echo esc_html($primary_color); ?>;
    	border: 1px solid <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>
	.amt-swiper-nav-2 .swiper-navigation > div:hover {
		background-color: <?php echo esc_html($secondary_color); ?>;
	}
<?php } ?>

<?php
/*-----------------------
#. EL: Slider
------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-swiper-nav-2 .swiper-pagination .swiper-pagination-bullet,
	.amt-swiper-nav-1 .swiper-pagination .swiper-pagination-bullet-active,
	.amt-thumb-slider-vertical .amt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill,
	.amt-thumb-slider-horizontal-4 .amt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill {
		background: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>
<?php if ( !empty ( $secondary_color ) ) { ?>
	.amt-swiper-nav-2 .swiper-pagination .swiper-pagination-bullet-active {
		background: <?php echo esc_html($secondary_color); ?>;
	}
<?php } ?>

<?php
/*------------------------------
#. EL: Contact
-------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-contact-info .amt-icon {
		color: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>

<?php
/*------------------------------
#. EL: Text/image With Button
-------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-video-layout .amt-video .amt-icon .amt-play,
	.title-text-button ul.single-list li:after,
	.title-text-button ul.dubble-list li:after,
	.title-text-button .subtitle,
	.amt-title-text-button .entry-subtitle,
	.about-image-text .about-content .sub-amtin-title,
	.about-image-text ul li:before,
	.about-image-text ul li:after {
		color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-video-layout .amt-video .amt-icon .amt-play:hover,
	.image-style1 .image-content,
	.amt-title-text-button.barshow .entry-subtitle::before,
	.amt-progress-bar .progress .progress-bar {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) ) { ?>
	.title-text-button.text-style1 .subtitle:after {
		background: <?php echo esc_html($secondary_color); ?>;
	}
<?php } ?>
<?php
/*------------------------------
#. EL: Post addon
--------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amt-category .amt-item .amt-cat-name a:hover,
	.amt-post-tab-style3 .amt-item-list .amt-image::after,
	.amt-post-grid-default .amt-item .post-terms a:hover,
	.amt-post-list-default .amt-item .post-terms a:hover,
	.amt-post-overlay-default .amt-item .post-terms a:hover,
	.amt-post-tab-default .post-terms a:hover,
	.amt-post-slider-default .amt-item .post-terms a:hover,
	.amt-post-grid-default ul.entry-meta li a:hover,
	.amt-post-list-default ul.entry-meta li a:hover,
	.amt-post-tab-default .amt-item-left ul.entry-meta li a:hover,
	.amt-post-tab-default .amt-item-list ul.entry-meta li a:hover,
	.amt-post-tab-default .amt-item-box ul.entry-meta li a:hover,
	.amt-post-slider-default ul.entry-meta li a:hover,
	.amt-post-overlay-default ul.entry-meta li a:hover {
		color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-post-grid-style3 .amt-item:hover .amt-image::after,
	.amt-post-list-style3 .amt-item:hover .amt-image::after,
	.amt-post-tab .post-cat-tab a.current,
	.amt-post-tab .post-cat-tab a:hover {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
	.amt-thumb-slider-horizontal .amt-thumnail-area .swiper-pagination .swiper-pagination-progressbar-fill {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>

<?php
/*------------------------------
#. EL: Team Layout
--------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.team-multi-layout-3 .team-item .mask-wrap .team-social li a:hover,
	.team-multi-layout-3 .team-item .mask-wrap .team-title a:hover,
	.team-single .team-info a:hover,
	.team-default .team-content .team-title a:hover,
	.team-multi-layout-2 .team-social li a {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.team-multi-layout-3 .team-item .mask-wrap .top-content:after,
	.team-multi-layout-1 .team-item .team-social li a:hover,
	.team-multi-layout-2 .team-social li a:hover,
	.team-single .team-single-content .team-content ul.team-social li a:hover,
	.amt-skills .amt-skill-each .progress .progress-bar {
		background-color: <?php echo esc_html($primary_color); ?>;
	}
<?php } ?>

<?php
/*------------------------------
#. EL: Widget
--------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.fixed-sidebar-left .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
	.fix-bar-bottom-copyright .amt-about-widget ul li a:hover,
	.fixed-sidebar-left .amt-about-widget ul li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>

<?php if ( !empty ( $secondary_color ) ) { ?>
	.element-side-title h5:after {
	    background: <?php echo esc_html( $secondary_color );?>;
	}
<?php } ?>
<?php
/*------------------------------
#. EL: Others
--------------------------------*/
?>

<?php if ( !empty ( $primary_color ) ) { ?>
	.amtin-address-default .amtin-item .amtin-icon,
	.amtin-story .story-layout .story-box-layout .amtin-year,
	.apply-item .apply-footer .job-meta .item .primary-text-color,
	.apply-item .job-button .button-style-2 {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.img-content-left .title-small,
	.img-content-right .title-small,
	.multiscroll-wrapper .ms-social-link li a:hover,
	.multiscroll-wrapper .ms-copyright a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.ms-menu-list li.active {
		background: <?php echo esc_html( $primary_color );?>;
	}
	.amtin-contact-info .amtin-text a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.amt-image-style1 .entry-content .author-social li a:hover {
		color: <?php echo esc_html( $primary_color );?>;
	}
	.amt-counter .amt-item .amt-title:after {
		background-color: <?php echo esc_html( $primary_color );?>;
	}
<?php } ?>



