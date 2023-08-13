<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$medixare_socials = MedixareTheme_Helper::socials();

?>

<div id="tophead" class="header-top-bar d-flex align-items-center">
	<div class="container">
		<div class="top-bar-wrap">
			<?php  if ( !empty( MedixareTheme::$options['phone_show'] || MedixareTheme::$options['email_show'] || MedixareTheme::$options['address_show'] ) ) { ?>	
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
				<?php if ( (MedixareTheme::$options['email_show'] == 1 ) && !empty( MedixareTheme::$options['email'] ) ) { ?>
				<div class="tophead-item header-link-item"><div class="header-icon-box"><i class="fas fa-envelope"></i></div><a href="mailto:<?php echo esc_attr( MedixareTheme::$options['email'] );?>"><?php echo esc_html( MedixareTheme::$options['email'] );?></a></div>
				<?php } ?>
				<?php if ( MedixareTheme::$options['address_show'] ) { ?>
				<div class="tophead-item"><div class="header-icon-box"><i class="fas fa-map-marker-alt"></i></div><div class="header-plain-text"><?php echo wp_kses( MedixareTheme::$options['address'] , 'alltext_allow' );?>
				</div>
				</div>
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