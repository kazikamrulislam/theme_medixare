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
					echo '<a '.$target.'  href="'.esc_url( MedixareTheme::$options['before_ad_img_link'] ).'">'.wp_get_attachment_image( MedixareTheme::$options['before_adimage'], 'full' ).'</a>';

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
	<div class="container">
		<div class="menu-full-wrap">
			<?php if ( MedixareTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="header-icon-area">	
				<?php if ( MedixareTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="menu-wrap">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>
			<?php if ( MedixareTheme::$options['cart_icon'] || MedixareTheme::$options['search_icon'] ) { ?>
			<div class="header-icon-area">
				<?php if ( MedixareTheme::$options['search_icon'] ) { ?>
				<div class="header-search-six">
					<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) )  ?>" class="search-form">
						<input required="" type="text" id="search-form-5f51fb188e3b0" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'medixare');?>" value="" name="s">
						<button class="search-button" type="submit">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</form>
				</div>	
				<?php } ?>	
				<?php if ( MedixareTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part('template-parts/header/icon', 'cart');?>
				<?php } ?>
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