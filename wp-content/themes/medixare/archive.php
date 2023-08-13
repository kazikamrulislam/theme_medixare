<?php
/**
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
$medixare_is_post_archive = is_home() || ( is_archive() && get_post_type() == 'post' ) ? true : false;

if ( is_post_type_archive( "medixare_team" ) || is_tax( "medixare_team_category" ) ) {
		get_template_part( 'template-parts/archive', 'team' );
	return;
}elseif ( is_post_type_archive( "medixare_service" ) || is_tax( "medixare_service_category" ) ) {
	get_template_part( 'template-parts/archive', 'service' );
	return;
}

?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php
			if ( MedixareTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $medixare_layout_class );?>">
				<main id="main" class="site-main">
					<div class="amt-sidebar-space">
					<?php
					if ( have_posts() ) { ?>
						<?php
						if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style1' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style2' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style3' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style4' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-4', get_post_format() );
							endwhile;
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style5' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-5', get_post_format() );
							endwhile;
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style6' ) {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-6', get_post_format() );
							endwhile;
						} else {
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
						}

						?>
						<?php MedixareTheme_Helper::pagination(); ?>

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>
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
