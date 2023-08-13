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
$medixare_has_entry_meta  = ( MedixareTheme::$options['post_date'] || MedixareTheme::$options['post_author_name'] || MedixareTheme::$options['post_comment_num'] || ( MedixareTheme::$options['post_length'] && function_exists( 'medixare_reading_time' ) ) || MedixareTheme::$options['post_published'] && function_exists( 'medixare_get_time' ) || ( MedixareTheme::$options['post_view'] && function_exists( 'medixare_views' ) ) ) ? true : false;

$medixare_comments_number = number_format_i18n( get_comments_number() );
$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> '. $medixare_comments_html;
$medixare_author_bio = get_the_author_meta( 'description' );

$medixare_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$medixare_time_html       = apply_filters( 'medixare_single_time', $medixare_time_html );
$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
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
	<?php if ( MedixareTheme::$options['before_post_ad_option'] ) { ?>
	<div class="content-top-ad">
		<div class="container">
			<div class="content-top-ad-item">
				<?php if ( MedixareTheme::$options['ad_before_post_type'] == 'post_before_adimage' ) { ?>
				<?php if (MedixareTheme::$options['post_before_ad_img_link']){
					$target = MedixareTheme::$options['post_before_ad_img_target']? 'target="_blank"':'';
					echo '<a '.$target.'  href="'.esc_url( MedixareTheme::$options['post_before_ad_img_link'] ).'">'.wp_get_attachment_image( MedixareTheme::$options['post_before_adimage'], 'full' ).'</a>';

				} else {
					echo wp_get_attachment_image( MedixareTheme::$options['post_before_adimage'], 'full' );
				}?>	

				<?php } else {
					echo MedixareTheme::$options['post_before_adcustom'];
				} ?>		
			</div>
		</div>
	</div>
	<?php } ?>

	<input type="hidden" id="medixare-cat-ids" value="<?php echo implode(',', wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) ) ); ?>">

	<?php if ( MedixareTheme::$options['post_style'] == 'style1' ) { ?>
		<div id="contentHolder">
			<div class="container">
				<div class="row">				
					<?php if ( MedixareTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
						<div class="<?php echo esc_attr( $medixare_layout_class );?> <?php echo esc_attr( $sidebar_order ) ?>">
							<main id="main" class="site-main"> 
								<div class="amt-sidebar-space <?php echo ( MedixareTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
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
	<?php } else if ( MedixareTheme::$options['post_style'] == 'style2' ) { ?>
		<div id="contentHolder">
		<div class="post-detail-style2">
			<div class="container">
				<div class="entry-thumbnail-area <?php echo esc_attr($img_class); ?>">
					<?php if ( MedixareTheme::$options['post_featured_image'] == true ) { ?>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( 'full' ); ?><?php } ?><?php } ?>
					<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
						<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
					<?php } ?>
					<div class="entry-header">						
						<?php if ( MedixareTheme::$options['post_cats'] ) { ?>
							<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
						<?php } ?>
						<h1 class="entry-title title-size-xl title-light-color"><?php the_title();?></h1>
						<?php if ( $medixare_has_entry_meta ) { ?>
						<ul class="entry-meta meta-light-color">				
							<?php if ( MedixareTheme::$options['post_date'] ) { ?>
							<li><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>	
							<?php } if ( MedixareTheme::$options['post_author_name'] ) { ?>
							<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>
							<?php } if ( MedixareTheme::$options['post_comment_num'] ) { ?>
							<li><i class="far fa-comments"></i><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' ); ?></li>
							<?php } if ( MedixareTheme::$options['post_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
							<li class="meta-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
							<?php } if ( MedixareTheme::$options['post_view'] && function_exists( 'medixare_views' ) ) { ?>
							<li><i class="fas fa-signal"></i><span class="meta-views meta-item "><?php echo medixare_views(); ?></span></li>
							<?php } if ( MedixareTheme::$options['post_published'] && function_exists( 'medixare_get_time' ) ) { ?>
							<li><i class="fas fa-clock"></i><?php echo medixare_get_time(); ?></li>
							<?php } ?>
						</ul>
						<?php } ?>	
					</div>		
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<?php if ( MedixareTheme::$layout == 'left-sidebar' ) { get_sidebar(); } ?>
					<div class="<?php echo esc_attr( $medixare_layout_class );?> <?php echo esc_attr( $sidebar_order ) ?>">
						<main id="main" class="site-main">
							<div class="amt-sidebar-space <?php echo ( MedixareTheme::$options['scroll_post_enable'] == 1 ) ? esc_attr( 'ajax-scroll-post' ) : ''; ?>">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'template-parts/content-single-2', get_post_format() );?>						
							<?php endwhile; ?>
							</div>
						</main>
					</div>
				<?php if ( MedixareTheme::$layout == 'right-sidebar' ) { get_sidebar(); }	?>
			</div>
		</div>
			</div>
	<?php } ?>
</div>
<?php get_footer(); ?>