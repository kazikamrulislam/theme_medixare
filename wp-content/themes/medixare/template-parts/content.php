<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'medixare-size2';

$medixare_has_entry_meta  = ( MedixareTheme::$options['blog_date'] || MedixareTheme::$options['blog_author_name'] || MedixareTheme::$options['blog_comment_num'] || MedixareTheme::$options['blog_length'] && function_exists( 'medixare_reading_time' ) || MedixareTheme::$options['blog_view'] && function_exists( 'medixare_views' ) ) ? true : false;

$medixare_time_html       = sprintf( '<span>%s</span><span>%s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );
$medixare_time_html       = apply_filters( 'medixare_single_time', $medixare_time_html );

$medixare_comments_number = number_format_i18n( get_comments_number() );
$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare' ) : esc_html__( 'Comments' , 'medixare' );
$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number .'</span> ' . $medixare_comments_html;

$id = get_the_ID();
$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['post_content_limit'], '' );

if ( empty(has_post_thumbnail() ) ) {
	$img_class ='no-image';
}else {
	$img_class ='show-image';
}

?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>
	<div class="blog-box <?php echo esc_attr($img_class); ?>">
		<?php if ( has_post_thumbnail() || MedixareTheme::$options['display_no_preview_image'] == '1'  ) { ?>
			<div class="blog-img-holder">
				<div class="blog-img">
					<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail( $thumb_size, ['class' => 'img-responsive'] ); ?>
						<?php } elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
							echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_1096X600.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
						} ?>
					</a>
				</div>				
			</div>
		<?php } ?>
		<div class="entry-content">
			<?php if ( MedixareTheme::$options['blog_cats'] ) { ?>
				<span class="entry-categories style-1"><?php echo the_category( ', ' );?></span>
			<?php } ?>
			<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			<?php if ( $medixare_has_entry_meta ) { ?>
			<ul class="entry-meta">
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
			<?php the_excerpt();?>
			<div class="post-read-more"><a class="button-style-1" href="<?php the_permalink();?>"><?php echo esc_html( MedixareTheme::$options['button_text'] );?><i class="fas fa-arrow-right"></i></a>
	        </div>		
		</div>
	</div>
</div>