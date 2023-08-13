<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
$ul_class = $post_classes = '';

$thumb_size = 'medixare-size6';

$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

$medixare_time_html = sprintf( '<span>%s</span> <span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

$medixare_comments_number = number_format_i18n( get_comments_number() );
$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

$thumbnail = false;

$wow = MedixareTheme::$options['blog_animation'];
$effect = MedixareTheme::$options['blog_animation_effect'];

if (  MedixareTheme::$layout == 'right-sidebar' || MedixareTheme::$layout == 'left-sidebar' ){
	$post_classes = array( 'col-xl-6 col-lg-12 col-md-6 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
	$ul_class = 'side_bar';
} else {
	$post_classes = array( 'col-xl-4 col-md-6 col-12 blog-layout-3 ' . $wow . ' ' . $effect );
	$ul_class = '';
}

if ( empty( has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

if( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
	$preview = 'show-preview';
}else {
	$preview = 'no-preview';
}

if( MedixareTheme::$options['image_blend'] == 'normal' ) {
	$blend = 'normal';
}else {
	$blend = 'blend';
}

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '.' );
$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?> data-wow-duration="1.5s">
	<div class="blog-box <?php echo esc_attr($img_class); ?> <?php echo esc_attr($preview); ?>">
		<div class="blog-img-holder <?php echo esc_attr($blend); ?>">
			<?php if ( ( 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
				<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn size-md amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
			<?php } ?>
			<a href="<?php the_permalink(); ?>" class="figure-overlay"><?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( $thumb_size, ['class' => ''] ); ?>
					<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
						echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_560X680.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
					}
				?>
			</a>
		</div>
		<div class="entry-content">
			<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
				<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
			<?php } ?>	
			<?php if ( $medixare_has_entry_meta ) { ?>			
			<ul class="entry-meta meta-light-color">
				<?php if ( MedixareTheme::$options['blog_date'] ) { ?>	
				<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
				<?php } if ( MedixareTheme::$options['blog_author_name'] ) { ?>
				<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>								
				<?php } if ( MedixareTheme::$options['blog_comment_num'] ) { ?>
				<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
				<?php } if ( MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) ) { ?>
				<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
				<?php } if ( MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) { ?>
				<li><span class="post-views meta-item "><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
				<?php } ?>
			</ul>
			<?php } ?>
			<h3 class="entry-title title-size-lg title-light-color"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>		
		</div>
	</div>
</div> 
