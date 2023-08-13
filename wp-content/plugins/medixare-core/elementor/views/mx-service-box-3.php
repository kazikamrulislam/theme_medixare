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

<style>

	
</style>


<div class="amt-about__info-box-3 d-md-flex d-block <?php echo esc_attr($data['style']); ?>">
	<div class="row">
		<div class=" col-lg-6 col-md-12 col-sm-12 mb-4">
			<div class="amt-service__box-item-3 service-title-3">
				<div class="service__box_title">
					<div class="title_wrapper">
						<div class="amt-section__title_wrapper">
							<span class="amt-section__subtitle has-circle-border"><?php echo esc_attr($data['amt-section_3_sub_title']); ?></span>
							<h3 class="amt-section__title  mb-4"><?php echo esc_attr($data['amt-section_3_title_part-1']); ?> <br><span><?php echo esc_attr($data['amt-section_3_title_part-2']); ?></span></h3>
						</div>
						<div class="amt-section-bnt-wrapper">
							<a href="service/" class="amt-btn"><?php echo esc_attr($data['amt-section_3_title_btn_text']); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			// $args = array(
			// 	'post_type'      => 'medixare_service',
			// 	'posts_per_page' => 3,
			// );
			$loop = new WP_Query($args);
			while ( $loop->have_posts() ) {
				$loop->the_post();
				global $post;
				$medixare_service_img 	        = get_post_meta( $post->ID, 'medixare_service_img', true );
				$service_excrpt 				= wp_trim_words( get_the_excerpt(), $data['count'], '.' );
		?>
		<div class="col-lg-6 col-md-12 col-sm-12 mb-4">
			<div class="amt-service__box-item-3">
					<div class="amt-service_icon_box">
					<?php if ( $data['amt-service_icon_display'] == 'yes' ) { ?>	
						<div class="amt-service_box_left col-lg-3 col-md-3 col-sm-12">
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
						</div>
					<?php } ?>
						<div class="amt-service_box_right col-lg-9 col-md-9 col-sm-12">
							<?php if ( $data['amt-service_title_display'] == 'yes' ) { ?>
								<div class="amt-service_title">
									<?php 
										the_title();
									?>
								</div>
							<?php } if ( $data['amt-service_excerpt_display'] == 'yes' ) { ?>
								<div class="amt-service_excerpt">
									<?php echo wp_kses_post( $service_excrpt );?>
								</div>
							<?php }  if ( $data['amt-service_loadmore_display'] == 'yes' ) { ?>
								<button class="amt-service_loadmore">
									<a href="<?php the_permalink();?>">Load more</a>
								</button>
							<?php }?>
						</div>
					</div>
				</div>
		</div>
		<?php
			}
			wp_reset_query();
		?>
	</div>
</div>
