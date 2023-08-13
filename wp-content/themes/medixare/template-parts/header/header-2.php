<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = MedixareTheme_Helper::nav_menu_args();
$medixare_socials = MedixareTheme_Helper::socials();

// Logo
if( !empty( MedixareTheme::$options['logo'] ) ) {
	$logo_dark = wp_get_attachment_image( MedixareTheme::$options['logo'], 'full' );
	$medixare_dark_logo = $logo_dark;
}else {
	$medixare_dark_logo = get_bloginfo( 'name' ); 
}

if( !empty( MedixareTheme::$options['logo_light'] ) ) {
	$logo_lights = wp_get_attachment_image( MedixareTheme::$options['logo_light'], 'full' );
	$medixare_light_logo = $logo_lights;
}else {
	$medixare_light_logo = get_bloginfo( 'name' );
}

?>
<div id="sticky-placeholder"></div>
<div class="header-menu" id="header-menu">
	<div class="container">		
		<div class="menu-full-wrap">
			<div class="site-branding">
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_light_logo, 'allow_link' ); ?></a>
			</div>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php if ( has_nav_menu( 'primary' ) ) { 
		             	wp_nav_menu( $nav_menu_args );
		            } else {
		              	if ( is_user_logged_in() ) {
		                	echo '<ul id="menu" class="nav fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'medixare' ) . '</a></li></ul>';
		              	}
		            } ?>
				</div>
			</div>
			<?php if (MedixareTheme::$options['nav_button_txt'] || MedixareTheme::$options['nav_button'] || MedixareTheme::$options['cart_icon'] || MedixareTheme::$options['search_icon'] || MedixareTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">	
				<?php if ( MedixareTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part('template-parts/header/icon', 'cart');?>			
				<?php } if ( MedixareTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>
				<?php } if ( MedixareTheme::$options['nav_button'] ) { ?>
					<?php //get_template_part( 'template-parts/header/icon', 'nav_btn' );?>
					<div class="amt-nav-buttons">
						<a href="#" class="amt-nav-contact">
							<div href="#"><?php echo MedixareTheme::$options['nav_button_txt']; ?></div>
						</a>
					</div>
				<?php } //if ( MedixareTheme::$options['vertical_menu_icon'] ) { ?>
					<?php //get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
					<?php //get_template_part( 'template-parts/header/icon', 'menu' );?>
				<?php //} ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="container">
	<?php if ( MedixareTheme::$options['head_ad_option'] ) { ?>
	<div class="header-after-ad">
		<?php if ( MedixareTheme::$options['ad_type'] == 'adimage' ) { ?>
		<?php if (MedixareTheme::$options['ad_img_link']){
			$target = MedixareTheme::$options['ad_img_target']? 'target="_blank"':'';
			echo '<a '.$target.'  href="'.esc_url( MedixareTheme::$options['ad_img_link'] ).'">'.wp_get_attachment_image( MedixareTheme::$options['adimage'], 'full' ) . '</a>';

		} else {
			echo wp_get_attachment_image( MedixareTheme::$options['adimage'], 'full' );
		} ?>
		<?php } else {
			echo MedixareTheme::$options['adcustom'];
		} ?>		
	</div>
	<?php } ?>
</div>