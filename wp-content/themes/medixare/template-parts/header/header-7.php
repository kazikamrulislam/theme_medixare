<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$nav_menu_args = MedixareTheme_Helper::nav_menu_args();
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

$topbar_menu2 = MedixareTheme::$options['topbar_menu2'];
$nav_topmenu_args = array( 'menu' => $topbar_menu2, 'container' => 'nav', 'depth' => 1 );

?>
<div id="sticky-placeholder"></div>
<div class="header-menu" id="header-middlebar">
	<div class="container">
		<div class="logo-ad-wrap d-flex align-items-center justify-content-between">
			<div class="site-branding">				
				<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_dark_logo, 'allow_link' ); ?></a>
				<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_light_logo, 'allow_link' ); ?></a>
			</div>
			<?php if ( MedixareTheme::$options['before_head_ad_option'] ) { ?>
			<div class="header-before-ad">
				<?php if ( MedixareTheme::$options['before_ad_type'] == 'before_adimage' ) { ?>
				<?php if (MedixareTheme::$options['before_ad_img_link']){
					$target = MedixareTheme::$options['before_ad_img_target']? 'target="_blank"':'';
					echo '<a '.$target.'  href="'.esc_url( MedixareTheme::$options['before_ad_img_link'] ).'">'.wp_get_attachment_image( MedixareTheme::$options['before_adimage'], 'full' ) . '</a>';

				} else {
					echo wp_get_attachment_image( MedixareTheme::$options['before_adimage'], 'full' );
				} ?>
				<?php } else {
					echo MedixareTheme::$options['before_adcustom'];
				} ?>		
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<div class="header-menu" id="header-menu">
	<div class="menu-full-wrap">
		<div class="container">
			<div class="d-flex align-items-center justify-content-between">
				<div class="menu-wrap">
					<div id="site-navigation" class="main-navigation">
						<?php wp_nav_menu( $nav_menu_args );?>
					</div>
				</div>
				<div class="d-flex align-items-center gap-4">
					<?php  if ( !empty( MedixareTheme::$options['phone_show'] || MedixareTheme::$options['menu_show2'] ) ) { ?>	
					<div class="d-lg-none d-xl-flex align-items-center">
						<?php if ( ( MedixareTheme::$options['phone_show'] == 1 ) && !empty( MedixareTheme::$options['phone'] ) ) { ?>
						<div class="ms-4 d-flex align-items-center tophead-item header-link-item">
							<div class="header-icon-box me-2"><i class="fas fa-phone-alt"></i></div>
							<div class="phone-label header-plain-text me-1">
								<?php if ( !empty ( MedixareTheme::$options['phone_label'] ) ) { ?>
								<?php echo wp_kses( MedixareTheme::$options['phone_label'] , 'alltext_allow' );?> :
								<?php } ?>
							</div>
							<a href="tel:<?php echo esc_attr( MedixareTheme::$options['phone'] );?>"><?php echo esc_html( MedixareTheme::$options['phone'] );?></a>
						</div>
						<?php } ?>
						<?php if ( (MedixareTheme::$options['menu_show2'] == 1 ) && !empty( MedixareTheme::$options['topbar_menu2'] ) ) { ?>
						<div class="ms-4 d-flex align-items-center tophead-item header-link-item"><div class="header-icon-box me-2"><i class="far fa-user"></i></div><?php wp_nav_menu( $nav_topmenu_args );?></div>
						<?php } ?>						
					</div>
					<?php } ?>
					<?php if ( MedixareTheme::$options['cart_icon'] || MedixareTheme::$options['search_icon'] || MedixareTheme::$options['vertical_menu_icon'] ) { ?>
					<div class="header-icon-area">	
						<?php if ( MedixareTheme::$options['cart_icon'] ) { ?>
							<?php get_template_part('template-parts/header/icon', 'cart');?>			
						<?php } if ( !empty( MedixareTheme::$options['search_icon'] ) ) { ?>
							<?php get_template_part( 'template-parts/header/icon', 'search' );?>
						<?php } if ( !empty(MedixareTheme::$options['vertical_menu_icon'] ) ) { ?>
							<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
			</div>			
		</div>
	</div>
</div>