<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$medixare_socials = MedixareTheme_Helper::socials();
$topbar_menu = MedixareTheme::$options['topbar_menu'];
$nav_topmenu_args = array( 'menu' => $topbar_menu, 'container' => 'nav', 'depth' => 1 );

?>

<div id="tophead" class="header-top-bar d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<?php  if ( !empty( MedixareTheme::$options['phone_show'] || MedixareTheme::$options['menu_show'] ) ) { ?>
			<div class="tophead-left">
				<?php if ( ( MedixareTheme::$options['phone_show'] == 1 ) && !empty( MedixareTheme::$options['phone'] ) ) { ?>
				<div class="tophead-item header-link-item">
					<div class="header-icon-box"><i class="fas fa-phone-alt"></i></div>
					<div class="phone-label header-plain-text">
						<?php if ( !empty ( MedixareTheme::$options['phone_label'] ) ) { ?>
						<?php echo wp_kses( MedixareTheme::$options['phone_label'] , 'alltext_allow' );?> :
						<?php } ?>
					</div>
					<a href="tel:<?php echo esc_attr( MedixareTheme::$options['phone'] );?>"><?php echo esc_html( MedixareTheme::$options['phone'] );?></a>
				</div>
				<?php } ?>
				<?php if ( (MedixareTheme::$options['menu_show'] == 1 ) && !empty( MedixareTheme::$options['topbar_menu'] ) ) { ?>
				<div class="tophead-item header-link-item"><div class="header-icon-box"><i class="far fa-user"></i></div><?php wp_nav_menu( $nav_topmenu_args );?></div>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if ( MedixareTheme::$options['social_show'] ) { ?>
			<div class="tophead-right">
				<div class="tophead-item header-link-item">									
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