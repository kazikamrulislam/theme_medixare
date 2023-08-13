<?php
$f2_wc1 = MedixareTheme::$options['f2_wc1'];
$f2_wc2 = MedixareTheme::$options['f2_wc2'];
$f2_wc3 = MedixareTheme::$options['f2_wc3'];
$f2_wc4 = MedixareTheme::$options['f2_wc4'];

$medixare_socials = MedixareTheme_Helper::socials();

if( !empty( MedixareTheme::$options['footer2_bg_img'] ) ) {
	$f2_bg = wp_get_attachment_image_src( MedixareTheme::$options['footer2_bg_img'], 'full', true );
	$footer2_bg_img = $f2_bg[0];
}else {
	$footer2_bg_img = MEDIXARE_IMG_URL . 'footer_bg.jpg';
}

if ( MedixareTheme::$options['footer2_bg_type'] == 'footer2_bg_color' ) {
	if (!empty ( MedixareTheme::$options['footer2_bg_color'] )) {
		$medixare_bg = 'background:' . MedixareTheme::$options['footer2_bg_color'];
	} else {
		$medixare_bg = '';
	}
} else {
	$medixare_bg = 'background:' . 'url(' . $footer2_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( MedixareTheme::$options['footer2_bg_type'] == 'footer2_bg_img' ) {
	$bgc = 'footer-bg-opacity footer-2';
}
?>

<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="<?php echo esc_html( $medixare_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-2-1' ) && MedixareTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php if ( is_active_sidebar( 'footer-style-2-1' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f2_wc1 ); ?>">
					<?php dynamic_sidebar( 'footer-style-2-1' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-2-2' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f2_wc2 ); ?>">
					<?php dynamic_sidebar( 'footer-style-2-2' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-2-3' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f2_wc3 ); ?>">
					<?php dynamic_sidebar( 'footer-style-2-3' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-2-4' ) ) { ?>
				<div class="col-lg-<?php echo esc_attr( $f2_wc4 ); ?>">
					<?php dynamic_sidebar( 'footer-style-2-4' ); ?>
				</div>
				<?php } ?>			
			</div>			
		</div>
	</div>
	<?php } ?>
	<?php if ( MedixareTheme::$copyright_area == 1 ) { ?>
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright"><?php echo wp_kses( MedixareTheme::$options['copyright_text'] , 'allow_link' );?></div>
		</div>
	</div>
	<?php } ?>
</div>

