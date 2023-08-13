<?php
/**
 * Template Name: Post Layout 1
 * Template Post Type: post
 * 
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( MedixareTheme::$layout == 'full-width' ) {
	$medixare_layout_class = 'col-12';
}
else{
	$medixare_layout_class = MedixareTheme_Helper::has_active_widget();
}

if( MedixareTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

if ( MedixareTheme::$layout == 'left-sidebar' ) {
	$sidebar_order = 'order-lg-2 order-md-1 order-1';
} else {
	$sidebar_order = 'no-order';
}

?>
<?php get_header(); ?>

<div id="primary" class="content-area <?php echo esc_attr($blend); ?>">
	<div id="contentHolder">
		<div class="container">
			<div class="row">
				<?php if ( MedixareTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $medixare_layout_class );?> <?php echo esc_attr( $sidebar_order ) ?>">
						<main id="main" class="site-main">
							<div class="rt-sidebar-space <?php echo ( MedixareTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>
					</div>
				<?php if ( MedixareTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>