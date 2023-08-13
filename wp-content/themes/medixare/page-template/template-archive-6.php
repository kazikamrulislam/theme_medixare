<?php
/**
 * Template Name: Archive style 6
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

$args = array(
	'post_type' => "post",
);

if ( get_query_var('paged') ) {
	$args['paged'] = get_query_var('paged');
}
elseif ( get_query_var('page') ) {
	$args['paged'] = get_query_var('page');
}
else {
	$args['paged'] = 1;
}

$query = new WP_Query( $args );

global $wp_query;
$wp_query = NULL;
$wp_query = $query;
 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<?php if ( MedixareTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<div class="<?php echo esc_attr( $medixare_layout_class );?>">
				<main id="main" class="site-main">
					<div class="rt-sidebar-space">
					<?php if ( have_posts() ) :?>
						<?php
							echo '<div class="row loadmore-items">';
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-6', get_post_format() );
							endwhile;
							echo '</div>';
						?>
						<?php if( MedixareTheme::$options['blog_loadmore'] == 'loadmore' ) { ?>
							<div class="text-center blog-loadmore">
						      	<a href="#" id="loadMore6" class="loadMore"><?php esc_html_e( 'Load More', 'medixare' ) ?><i class="fas fa-redo-alt"></i></a>
						    </div> 
						<?php } else { ?>
							<?php MedixareTheme_Helper::pagination(); ?>
						<?php } ?>
					<?php else:?>
						<?php get_template_part( 'template-parts/content', 'none' );?>
					<?php endif;?>
					</div>
				</main>
			</div>
			<?php if ( MedixareTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
