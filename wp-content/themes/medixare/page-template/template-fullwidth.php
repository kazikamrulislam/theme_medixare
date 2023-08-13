<?php
/*
Template Name: Fullwidth Template
 */
// Layout class
if ( MedixareTheme::$layout == 'full-width' ) {
	$medixare_layout_class = 'col-12';
} else {
	$medixare_layout_class = 'col-xl-9';
}
?>
<?php get_header(); ?>
<div id="primary" class="content-area">
	<div class="container-fluid px-0"> 
		<div class="row">
			<?php
			if ( MedixareTheme::$layout == 'left-sidebar' ) {
				get_sidebar();
			}
			?>
			<div class="<?php echo esc_attr( $medixare_layout_class );?>">
				<main id="main" class="site-main">
					<?php while ( have_posts() ) : the_post(); ?>					
						<?php get_template_part( 'template-parts/content', 'page' ); ?>
						<?php
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
						?>
					<?php endwhile; ?>
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