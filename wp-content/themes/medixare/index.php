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
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style2' ) {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-2', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style3' ) {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-3', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style4' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-4', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style5' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-5', get_post_format() );
							endwhile;
							echo '</div>';
						} else if ( $medixare_is_post_archive && MedixareTheme::$options['blog_style'] == 'style6' ) {
							echo '<div class="loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-6', get_post_format() );
							endwhile;
							echo '</div>';
						} else {
							echo '<div class="row g-4 loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-1', get_post_format() );
							endwhile;
							echo '</div>';
						}

						?>

						<?php if( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style1' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore1" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } elseif( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style2' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore2" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } elseif( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style3' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore3" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } elseif( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style4' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore4" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } elseif( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style5' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore5" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } elseif( MedixareTheme::$options['blog_loadmore'] == 'loadmore' && MedixareTheme::$options['blog_style'] == 'style6' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore6" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } else { ?>
							<?php MedixareTheme_Helper::pagination(); ?>
						<?php } ?> 

					<?php } else {?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php } ?>
					</div>					
				</main>
			</div>
			<?php
			if( MedixareTheme::$layout == 'right-sidebar' ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>