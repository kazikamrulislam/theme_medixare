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

if ( MedixareTheme::$options['team_archive_style'] == 'style1' ){
	$team_archive_layout 		= "team-default team-multi-layout-1 team-grid-style1";
	$template 				 	= 'team-1';
}elseif( MedixareTheme::$options['team_archive_style'] == 'style2' ){
	$team_archive_layout 		= "team-default team-multi-layout-2 team-grid-style2";
	$template 				 	= 'team-2';
}else{
	$team_archive_layout 		= "team-default team-multi-layout-1 team-grid-style1";
	$template 				 	= 'team-1';
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area team_archive_wrap">
	<div class="container">	
		<div class="row">
			<?php
				if ( MedixareTheme::$layout == 'left-sidebar' ) {
					get_sidebar();
				}
			?>
			<div class="<?php echo esc_attr( $team_archive_layout );?> <?php echo esc_attr( $medixare_layout_class );?>">
				<main id="main" class="site-main">	
					<?php if ( have_posts() ) :?>
						<div class="row <?php echo esc_attr( $iso );?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="col-xl-4 col-lg-4 col-sm-6 col-12">
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
