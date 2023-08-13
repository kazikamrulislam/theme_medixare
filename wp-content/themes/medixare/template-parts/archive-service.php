<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

// Layout class
if ( MedixareTheme::$layout == 'full-width' ) {
	$medixare_layout_class 	= 'col-12';
}
else{
	$medixare_layout_class 	= MedixareTheme_Helper::has_active_widget();
}

$iso						= 'g-4 no-equal-gallery';

if ( MedixareTheme::$options['service_archive_style'] == 'style1' ){
	$service_archive_layout 		= "service-default service-multi-layout-1 service-grid-style1";
	$template 				 		= 'service-1';
}elseif( MedixareTheme::$options['service_archive_style'] == 'style2' ){
	$service_archive_layout 		= "service-default service-multi-layout-2 service-grid-style2";
	$template 				 		= 'service-2';
}else{
	$service_archive_layout 		= "service-default service-multi-layout-1 service-grid-style1";
	$template 				 		= 'service-1';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area service_archive_wrap">
	<div class="container">	
		<div class="row">
			<?php
				if ( MedixareTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $service_archive_layout );?> <?php echo esc_attr( $medixare_layout_class );?>">
				<main id="main" class="site-main">	
					<?php if ( have_posts() ) :?>
						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="col-xl-4 col-lg-4 col-sm-6 col-12 service_items">
									<?php get_template_part( 'template-parts/content', $template ); ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php MedixareTheme_Helper::pagination(); ?>	
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
				</main>
			</div>
			<?php
				if( MedixareTheme::$layout == 'right-sidebar' ){				
					get_sidebar();
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
