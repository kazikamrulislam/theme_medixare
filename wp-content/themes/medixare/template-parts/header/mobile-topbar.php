<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$medixare_socials = MedixareTheme_Helper::socials();

$medixare_mobile_meta  = ( MedixareTheme::$options['mobile_date'] || MedixareTheme::$options['mobile_phone'] || MedixareTheme::$options['mobile_email'] || MedixareTheme::$options['mobile_address'] || MedixareTheme::$options['mobile_social'] && $medixare_socials ) ? true : false;

?>
<?php if ( $medixare_mobile_meta ) { ?>
<div class="mobile-top-bar" id="mobile-top-fix">
	<div class="header-top">
		<?php if ( MedixareTheme::$options['mobile_date'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-calendar-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo date_i18n( get_option('date_format') ); ?></span></div>
		</div>
		<?php } ?>

		<?php if ( MedixareTheme::$options['mobile_phone'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-phone-alt"></i>
			</div>
			<div class="info"><span class="info-text"><a href="tel:<?php echo esc_attr( MedixareTheme::$options['phone'] );?>"><?php echo wp_kses( MedixareTheme::$options['phone'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>			
		<?php if ( MedixareTheme::$options['mobile_email'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="far fa-envelope"></i>
			</div>
			<div class="info"><span class="info-text"><a href="mailto:<?php echo esc_attr( MedixareTheme::$options['email'] );?>"><?php echo wp_kses( MedixareTheme::$options['email'] , 'alltext_allow' );?></a></span></div>
		</div>
		<?php } ?>
		<?php if ( MedixareTheme::$options['mobile_address'] ) { ?>
		<div>
			<div class="icon-left">
			<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="info"><span class="info-text"><?php echo wp_kses( MedixareTheme::$options['address'] , 'alltext_allow' );?></span></div>
		</div>
		<?php } ?>
	</div>
	<?php if ( MedixareTheme::$options['mobile_social'] && $medixare_socials ) { ?>
		<ul class="header-social">
			<?php foreach ( $medixare_socials as $medixare_social ): ?>
				<li><a target="_blank" href="<?php echo esc_url( $medixare_social['url'] );?>"><i class="fab <?php echo esc_attr( $medixare_social['icon'] );?>"></i></a></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>
<?php } ?>