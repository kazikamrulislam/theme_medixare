<?php
$f1_wc1 = MedixareTheme::$options['f1_wc1'];
$f1_wc2 = MedixareTheme::$options['f1_wc2'];
$f1_wc3 = MedixareTheme::$options['f1_wc3'];
$f1_wc4 = MedixareTheme::$options['f1_wc4'];

$medixare_socials = MedixareTheme_Helper::socials();

if( !empty( MedixareTheme::$options['footer1_bg_img'] ) ) {
	$f1_bg = wp_get_attachment_image_src( MedixareTheme::$options['footer1_bg_img'], 'full', true );
	$footer1_bg_img = $f1_bg[0];
}else {
	$footer1_bg_img = MEDIXARE_IMG_URL . 'footer_bg.jpg';
}

if ( MedixareTheme::$options['footer1_bg_type'] == 'footer1_bg_color' ) {
	if (!empty ( MedixareTheme::$options['footer1_bg_color'] )) {
		$medixare_bg = 'background:' . MedixareTheme::$options['footer1_bg_color'];
	} else {
		$medixare_bg = '';
	}
} else {
	$medixare_bg = 'background:' . 'url(' . $footer1_bg_img . ') no-repeat center bottom / cover';
}
$bgc = '';
if ( MedixareTheme::$options['footer1_bg_type'] == 'footer1_bg_img' ) {
	$bgc = 'footer-bg-opacity footer-1';
}
?>

<div class="footer-top-area <?php echo esc_attr( $bgc ); ?>" style="<?php echo esc_html( $medixare_bg ); ?>">
	<?php if ( is_active_sidebar( 'footer-style-1-1' ) && MedixareTheme::$footer_area == 1 ) { ?>
	<div class="footer-content-area">
		<div class="container">			
			<div class="row">
				<?php if ( is_active_sidebar( 'footer-style-1-1' ) ) { ?>
				<div class="col-xl-<?php echo esc_attr( $f1_wc1 ); ?> col-lg-6 col-12">
					<?php dynamic_sidebar( 'footer-style-1-1' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-2' ) ) { ?>
				<div class="col-xl-<?php echo esc_attr( $f1_wc2 ); ?> col-lg-6 col-12">
					<?php dynamic_sidebar( 'footer-style-1-2' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-3' ) ) { ?>
				<div class="col-xl-<?php echo esc_attr( $f1_wc3 ); ?> col-lg-6 col-12">
					<?php dynamic_sidebar( 'footer-style-1-3' ); ?>
				</div>
				<?php } if ( is_active_sidebar( 'footer-style-1-4' ) ) { ?>
				<div class="col-xl-<?php echo esc_attr( $f1_wc4 ); ?> col-lg-6 col-12">
					<?php dynamic_sidebar( 'footer-style-1-4' ); ?>
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

