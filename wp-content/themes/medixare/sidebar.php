<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

if( is_active_sidebar( 'sidebar' )) {
	$fixedbar = 'fixed-bar-coloum';
}else {
	$fixedbar = '';
}

if( MedixareTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

if ( MedixareTheme::$layout == 'left-sidebar' ) {
	$sidebar_order = 'order-lg-1 order-md-2 order-2';
} else {
	$sidebar_order = 'no-order';
}

?>
<div class="col-xl-4 col-lg-4 col-12 mx-auto <?php echo esc_attr( $sidebar_order ) ?> <?php echo esc_attr( $fixedbar ); ?>">
	<aside class="sidebar-widget-area <?php echo esc_attr($blend); ?>">
		<?php
			if ( MedixareTheme::$sidebar ) {
				if ( is_active_sidebar( MedixareTheme::$sidebar ) ) dynamic_sidebar( MedixareTheme::$sidebar );
			}
			else {
				if ( is_active_sidebar( 'sidebar' ) ) dynamic_sidebar( 'sidebar' );
			}
		?>
	</aside>
</div>