<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;

$medixare_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

$medixare_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

$thumb_size1 = 'medixare-size7';
$thumb_size2 = 'medixare-size6';

$p_ids = array();
foreach ( $data['posts_not_in'] as $p_idsn ) {
	$p_ids[] = $p_idsn['post_not_in'];
}
$args = array(
	'posts_per_page' 	=> $data['itemlimit']['size'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'offset' 	 	 	=> $data['number_of_post_offset'],
	'post__not_in'   	=> $p_ids,
	'post_type'			=> 'post',
	'post_status'		=> 'publish'
);

if(!empty($data['catid'])){
	if( $data['query_type'] == 'category'){
	    $args['tax_query'] = [
	        [
	            'taxonomy' => 'category',
	            'field' => 'term_id',
	            'terms' => $data['catid'],                    
	        ],
	    ];

	}
}
if(!empty($data['postid'])){
	if( $data['query_type'] == 'posts'){
	    $args['post__in'] = $data['postid'];
	}
}

$query = new WP_Query( $args );
$temp = MedixareTheme_Helper::wp_set_temp_query( $query );

?>
<div class="rt-post-overlay-default rt-post-overlay-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
	<?php $count = 1; $i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
			<?php
			
			$title = wp_trim_words( get_the_title(), $data['title_count'], '' );
			$small_title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );			
			$medixare_comments_number = number_format_i18n( get_comments_number() );
			$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare-core' ) : esc_html__( 'Comments' , 'medixare-core' );
			$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number . '</span> ' . $medixare_comments_html;
			$medixare_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );

			?>

			<?php if ( $count == 1 ) { ?>
				<div class="col-xl-5 col-lg-6">
					<div class="rt-item-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="rt-item rt-item-single">
							<div class="rt-image">
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a class="figure-overlay" href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size1 );
										} else {
											echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X840.jpg' ) . '" alt="'.get_the_title().'">';
										}
									?>
								</a>										
							</div>
							<div class="entry-content">
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<span class="entry-categories style-2 meta-light-color"><?php echo the_category( ', ' );?></span>
									<?php } ?>
								<?php } ?>
								<?php if ( $medixare_has_entry_meta1 ) { ?>
								<ul class="entry-meta meta-light-color">
									<?php if ( $data['post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
									<?php } if ( $data['post_author'] == 'yes' ) { ?>
									<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['post_length'] == 'yes' ) && function_exists( 'medixare_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
									<?php } if ( ( $data['post_view'] == 'yes' ) && function_exists( 'medixare_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
								<h3 class="entry-title title-light-color mb-0"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php if ( $count == 2 ) { ?>
				<div class="col-xl-7 col-lg-6">
				<div class="row <?php echo esc_attr( $data['item_space'] );?>">
			<?php } ?>

				<?php if ( $count > 1 ) { ?>
					<div class="col-sm-6 col-12 <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
						<div class="rt-item rt-item-list">
							<div class="rt-image">
								<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="amt-video video-btn-wrap position-center"><a class="rt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
								<a class="figure-overlay" href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size2 );
										} else {
											echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
										}
									?>
								</a>										
							</div>
							<div class="entry-content">
								<?php if ( $data['small_post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<span class="entry-categories style-2 meta-light-color"><?php echo the_category( ', ' );?></span>
									<?php } ?>
								<?php } ?>
								<?php if ( $medixare_has_entry_meta2 ) { ?>
								<ul class="entry-meta meta-light-color">
									<?php if ( $data['small_post_date'] == 'yes' ) { ?>	
									<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
									<?php } if ( $data['small_post_author'] == 'yes' ) { ?>
									<li class="post-author"><i class="far fa-user"></i><?php esc_html_e( 'by ', 'medixare' );?><?php the_author_posts_link(); ?></li>
									<?php } if ( $data['small_post_comment'] == 'yes' ) { ?>
									<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link( get_the_ID() ); ?>"><?php echo wp_kses( $medixare_comments_html , 'alltext_allow' );?></a></li>
									<?php } if ( ( $data['small_post_length'] == 'yes' ) && function_exists( 'medixare_reading_time' ) ) { ?>
									<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
									<?php } if ( ( $data['small_post_view'] == 'yes' ) && function_exists( 'medixare_views' ) ) { ?>
									<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
									<?php } ?>
								</ul>
								<?php } ?>
								<h3 class="entry-title title-light-color title-size-sm mb-0"><a href="<?php the_permalink();?>"><?php echo esc_html( $small_title );?></a></h3>								
							</div>
						</div>	
					</div>
				<?php } ?>
			<?php $count++; $i = $i + 0.2; $j = $j + 0.2; endwhile;?>

			</div>
			</div>
	<?php endif;?>
	</div>
	<?php MedixareTheme_Helper::wp_reset_temp_query( $temp );?>
</div>