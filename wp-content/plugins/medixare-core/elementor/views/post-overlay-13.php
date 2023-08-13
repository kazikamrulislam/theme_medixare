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

$medixare_has_entry_meta1  = ( $data['post_author'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;

$medixare_has_entry_meta2  = ( $data['small_post_author'] == 'yes' || $data['small_post_date'] == 'yes' || $data['small_post_comment'] == 'yes' || $data['small_post_length'] == 'yes' && function_exists( 'medixare_reading_time' ) || $data['small_post_view'] == 'yes' && function_exists( 'medixare_views' ) ) ? true : false;


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



<div class="amt-post-overlay-default amt-post-overlay-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?> <?php echo esc_attr( $data['left_right_order'] );?>">
	<?php $count = 1; $i = $data['delay']; $j = $data['duration']; 
		if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post();?>
		<?php			
				
			$medixare_comments_number = number_format_i18n( get_comments_number() );
			$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__( 'Comment' , 'medixare-core' ) : esc_html__( 'Comments' , 'medixare-core' );
			$medixare_comments_html = '<span class="comment-number">'. $medixare_comments_number . '</span> ' . $medixare_comments_html;		
			$medixare_time_html = sprintf( '<span><span>%s </span>%s %s</span>', get_the_time( 'd' ), get_the_time( 'M' ), get_the_time( 'Y' ) );

			$id = get_the_ID();
			$youtube_link = get_post_meta( get_the_ID(), 'medixare_youtube_link', true );			

			$wrapper_class = $item_box = $title_size = $separator_class = $title = '';
			if ( 2 === $count ) {
				$wrapper_class = 'col-12 col-lg-8';
				$thumb_size = 'medixare-size1';	
				$item_box = 'single-box';
				$title_size = 'title-size-lg';		
				$separator_class = '';	
				$title = wp_trim_words( get_the_title(), $data['title_count'], '' );					
			} else {
				$wrapper_class = 'col-12 col-lg-4';
				$thumb_size = 'medixare-size5';
				$item_box = 'multi-box';
				$title_size = 'title-size-md';	
				$separator_class = 'amt-item-list';
				$title = wp_trim_words( get_the_title(), $data['small_title_count'], '' );	
			}
		?>
			<div class="<?php echo esc_attr( $wrapper_class ); ?>">
				<div class="amt-item-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="amt-item <?php echo esc_attr( $separator_class ); ?>">
						<div class="amt-image">
							<?php if ( $item_box == 'single-box' ) { ?>								
								<?php if ( ( $data['post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
							<?php } ?>
							<?php if ( $item_box == 'multi-box' ) { ?>								
								<?php if ( ( $data['small_post_video'] == 'yes' && 'video' == get_post_format( $id ) && !empty( $youtube_link ) ) ) { ?>
									<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr( $data['play_button_size'] );?> amt-video-popup" href="<?php echo esc_url( $youtube_link );?>"><i class="fas fa-play"></i></a></div>
								<?php } ?>
							<?php } ?>
							<a class="figure-overlay" href="<?php the_permalink(); ?>">
								<?php
									if ( has_post_thumbnail() ){
										the_post_thumbnail( $thumb_size );
									} else {
										echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_420X420.jpg' ) . '" alt="'.get_the_title().'">';
									}
								?>
							</a>
							<?php if ( $item_box == 'single-box' ) { ?>
								<?php if ( $data['post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<span class="entry-categories style-1 small-view position-absolute"><?php echo medixare_category_prepare(); ?></span>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<span class="entry-categories style-2 small-view position-absolute meta-light-color"><?php echo the_category( ', ' );?></span>
									<?php } ?>
								<?php } ?>										
							<?php } ?>	
							<?php if ( $item_box == 'multi-box' ) { ?>
								<?php if ( $data['small_post_category'] == 'yes' ) { ?>
									<?php if ( $data['cat_layout'] == 'cat_layout1' ) { ?>
									<span class="entry-categories style-1 small-view position-absolute"><?php echo medixare_category_prepare(); ?></span>
									<?php } elseif ( $data['cat_layout'] == 'cat_layout2' ) { ?>
									<span class="entry-categories style-2 small-view position-absolute meta-light-color"><?php echo the_category( ', ' );?></span>
									<?php } ?>
								<?php } ?>										
							<?php } ?>									
						</div>
						<div class="entry-content">	
							<?php if ( $item_box == 'single-box' ) { ?>
								<?php if ( $medixare_has_entry_meta1 ) { ?>
								<ul class="entry-meta meta-light-color mb-1">
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
							<?php } ?>
							<?php if ( $item_box == 'multi-box' ) { ?>	
								<?php if ( $medixare_has_entry_meta2 ) { ?>
								<ul class="entry-meta meta-light-color mb-0">
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
							<?php } ?>
							<h3 class="entry-title <?php echo esc_attr( $title_size ); ?> title-light-color"><a href="<?php the_permalink();?>"><?php echo esc_html( $title );?></a></h3>					
						</div>
					</div>
				</div>
			</div>
			<?php
			$count++;
			endwhile;
		endif;
		?>
	</div>
	<?php MedixareTheme_Helper::wp_reset_temp_query( $temp );?>
</div>