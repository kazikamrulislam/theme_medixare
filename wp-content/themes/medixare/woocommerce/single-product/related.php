<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

// if ( MedixareTheme::$options['related_post_auto_play'] == 1 ) {
// 	$auto_play = true;
// } else {
// 	$auto_play = false;
// }

// $speed = intval(MedixareTheme::$options['related_post_auto_play_speed']);

// $swiper_data=array(
// 	'slidesPerView' 	=>1,
// 	'centeredSlides'	=>false,
// 	'loop'				=>true,
// 	'spaceBetween'		=>20,
// 	'slideToClickedSlide' =>true,
// 	'slidesPerGroup' => 1,
// 	'autoplay'				=>array(
// 		'delay'  => 1,
// 	),
// 	'speed'      => $speed,
// 	'breakpoints' =>array(
// 		'0'    =>array('slidesPerView' =>1),
// 		'576'    =>array('slidesPerView' =>2),
// 		'768'    =>array('slidesPerView' =>2),
// 		'992'    =>array('slidesPerView' =>3),
// 		'1200'    =>array('slidesPerView' =>4),				
// 		'1600'    =>array('slidesPerView' =>4)				
// 	),
// 	'auto'   => $auto_play
// );

if ( MedixareTheme::$options['related_shop_auto_play'] == 1 ) {
	$auto_play = true;
} else {
	$auto_play = false;
}

$speed = intval(MedixareTheme::$options['related_shop_auto_play_speed']);
$delay = intval(MedixareTheme::$options['related_shop_auto_play_delay']);

$swiper_data = array(
	'slidesPerView' 	=>1,
	'centeredSlides'	=>false,
	'loop'				=>true,
	'spaceBetween'		=>24,
	'slidesPerGroup'	=>1,
	'slideToClickedSlide' =>true,
	'autoplay'          => $auto_play,
	'pauseOnMouseEnter' => true,
	'autoplaydelay'     => $delay,
	'speed'             => $speed,
	'breakpoints' =>array(
		'0'    =>array('slidesPerView' =>1),
		'576'    =>array('slidesPerView' =>1),
		'768'    =>array('slidesPerView' =>2),
		'992'    =>array('slidesPerView' =>2),
		'1200'    =>array('slidesPerView' =>2),				
		'1600'    =>array('slidesPerView' =>3)
	),
);

$swiper_data = json_encode( $swiper_data );
$pro_no =  count($related_products);
?>
<?php if( MedixareTheme::$options['related_woo_product'] && $pro_no > 1 ) { ?>
<div class="rt-related-post">
	<div class="rt-swiper-slider-shop woo-related-product" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
		<div class="section-title">
			<h3 class="related-title"><?php echo wp_kses( MedixareTheme::$options['related_product_title'] , 'alltext_allow' );?>
				<span class="titledot"></span>
				<span class="titleline"></span>
			</h3>				
			<div class="swiper-button">
	            <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
	            <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
	        </div>
	    </div>
		<div class="swiper-wrapper">		
			<?php foreach ( $related_products as $related_product ) : ?>
			<div class="swiper-slide">
				<?php
				$post_object = get_post( $related_product->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

				wc_get_template_part( 'content', 'product' );
				?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php } ?>