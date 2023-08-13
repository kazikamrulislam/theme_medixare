<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Group_Control_Image_Size;
use \WP_Query;
use \MedixareTheme_Helper;


$p_ids = array();
foreach ($data['posts_not_in'] as $p_idsn) {
	$p_ids[] = $p_idsn['post_not_in'];
}
$args = array(
	// 'posts_per_page' 	=> $data['itemlimit']['size'],
	'posts_per_page' 	=> $data['number'],
	'order' 			=> $data['post_ordering'],
	'orderby' 			=> $data['post_orderby'],
	'offset' 	 	 	=> $data['number_of_post_offset'],
	'post__not_in'   	=> $p_ids,
	'post_type'			=> 'medixare_service',
	'post_status'		=> 'publish'
);
if (!empty($data['catid'])) {
	if ($data['query_type'] == 'category') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'medixare_service_category',
				'field' => 'term_id',
				'terms' => $data['catid'],
			],
		];
	}
}
if (!empty($data['postid'])) {
	if ($data['query_type'] == 'medixare_service') {
		$args['post__in'] = $data['postid'];
	}
}

$query = new WP_Query($args);
$temp = MedixareTheme_Helper::wp_set_temp_query($query);
?>


<div class="amt-service__info-box amt-about__info-box-1 d-md-flex d-block <?php echo esc_attr($data['style']); ?>">
	<div class="row">
		<?php 
			$loop = new WP_Query($args);
			while ( $loop->have_posts() ) {
				$loop->the_post();
				global $post;
				$medixare_service_img 	        = get_post_meta( $post->ID, 'medixare_service_img', true );
				$service_excrpt 				= wp_trim_words( get_the_excerpt(), $data['count'], '.' );

		?>
			<div class="service_item col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
				<?php if ($data['amt-service_thumb_display'] == 'yes') { ?>
					<div class="amt-service_thumb">
						<?php
						if ( has_post_thumbnail() ){
							?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php
						} else {
							echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_1020X600.jpg' ) . '" alt="'.get_the_title().'">';
						}
						?>
					</div>
					<div class="amt-service-content-holder">
					<?php }
				if ($data['amt-service_title_display'] == 'yes') { ?>
						<div class="amt-service_title">
							<a href="<?php the_permalink(); ?>">
							<?php
							the_title();
							?>
							</a>
						</div>
					<?php }
				if ($data['amt-service_excerpt_display'] == 'yes') { ?>
						<div class="amt-service_excerpt">
							<?php echo wp_kses_post($service_excrpt); ?>
						</div>
					<?php }
				if ($data['amt-service_icon_display'] == 'yes') { ?>
					<div class="service_icon">
					<?php if ($medixare_service_img) {
							echo wp_get_attachment_image($medixare_service_img, 'full', true); }
					else {
						echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_1020X600.jpg' ) . '" alt="'.get_the_title().'">';
					}
				 ?>
					</div>
			<?php }
				if ($data['amt-service_loadmore_display'] == 'yes') { ?>
						<button class="amt-service_loadmore">
							<a href="<?php the_permalink(); ?>">Load more</a>
						</button>
					<?php } ?>
					</div>
			</div>
		<?php
		}
		wp_reset_query();
		?>
	</div>
</div>