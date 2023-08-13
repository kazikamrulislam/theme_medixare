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
<div class="header-middle-bar" id="header-middlebar">	
	<div class="container">
		<div class="d-flex align-items-center justify-content-between">			
			<?php  if ( !empty( MedixareTheme::$options['phone_show'] ) ) { ?>
				<?php if ( ( MedixareTheme::$options['phone_show'] == 1 ) && !empty( MedixareTheme::$options['phone'] ) ) { ?>
				<div class="midhead-item header-link-item">
					<div class="header-icon-box"><i class="fas fa-phone-alt"></i></div>
					<div class="phone-label header-plain-text">
						<?php if ( !empty ( MedixareTheme::$options['phone_label'] ) ) { ?>
						<?php echo wp_kses( MedixareTheme::$options['phone_label'] , 'alltext_allow' );?> :
						<?php } ?>
					</div>
					<a href="tel:<?php echo esc_attr( MedixareTheme::$options['phone'] );?>"><?php echo esc_html( MedixareTheme::$options['phone'] );?></a>
				</div>
				<?php } ?>
			<?php } ?>
			<div class="logo-menu-wrap">
				<div class="site-branding">
					<a class="dark-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_dark_logo, 'allow_link' ); ?></a>
					<a class="light-logo" href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $medixare_light_logo, 'allow_link' ); ?></a>
				</div>				
			</div>	
			<?php if ( MedixareTheme::$options['social_show'] ) { ?>
			<div class="tophead-right">
				<div class="midhead-item header-link-item">									
					<ul class="tophead-social">
						<?php foreach ( $medixare_socials as $medixare_social ): ?>
						<li><a target="_blank" href="<?php echo esc_url( $medixare_social['url'] );?>"><i class="fab <?php echo esc_attr( $medixare_social['icon'] );?>"></i></a></li>
						<?php endforeach; ?>
					</ul>					
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="header-menu" id="header-menu">
	<div class="container">
		<div class="menu-full-wrap">
			<?php if ( MedixareTheme::$options['vertical_menu_icon'] ) { ?>
			<div class="menu-user">
				<?php if ( MedixareTheme::$options['vertical_menu_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'offcanvas' );?>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="menu-wrap" id="header-menu">
				<div id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( $nav_menu_args );?>
				</div>
			</div>		
			<?php if ( MedixareTheme::$options['cart_icon'] || MedixareTheme::$options['search_icon'] ) { ?>
			<div class="header-icon-area">	
				<?php if ( MedixareTheme::$options['search_icon'] ) { ?>
					<?php get_template_part( 'template-parts/header/icon', 'search' );?>	
				<?php } if ( MedixareTheme::$options['cart_icon'] ) { ?>
					<?php get_template_part('template-parts/header/icon', 'cart');?>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php if ( MedixareTheme::$options['head_ad_option'] ) { ?>
	<div class="container">
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
	</div>
<?php } ?>