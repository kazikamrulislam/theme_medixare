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

global $post;
$medixare_has_entry_meta  = ($data['post_category'] == 'yes' || $data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists('medixare_reading_time') || $data['post_view'] == 'yes' && function_exists('medixare_views')) ? true : false;
$author = $post->post_author;
$thumb_size = 'medixare-size3';

$p_ids = array();
foreach ($data['posts_not_in'] as $p_idsn) {
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

if (!empty($data['catid'])) {
	if ($data['query_type'] == 'category') {
		$args['tax_query'] = [
			[
				'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $data['catid'],
			],
		];
	}
}
if (!empty($data['postid'])) {
	if ($data['query_type'] == 'posts') {
		$args['post__in'] = $data['postid'];
	}
}

$query = new WP_Query($args);
$temp = MedixareTheme_Helper::wp_set_temp_query($query);
$col_class = "col-xl-{$data['col_xl']} col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-{$data['col']}";

?>


<div class="amt-post-grid-3 amt-post-grid-<?php echo esc_attr($data['style']); ?>">
	<div class="row <?php echo esc_attr($data['item_gutter']); ?>">
		<?php $i = $data['delay'];
		$j = $data['duration'];
		if ($query->have_posts()) : ?>
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<?php

				$content = MedixareTheme_Helper::get_current_post_content();
				$content = wp_trim_words(get_the_excerpt(), $data['count'], '.');
				$content = "<p>$content</p>";
				$title = wp_trim_words(get_the_title(), $data['title_count'], '');

				$medixare_comments_number = number_format_i18n(get_comments_number());
				$medixare_comments_html = $medixare_comments_number == 1 ? esc_html__('Comment', 'medixare-core') : esc_html__('Comments', 'medixare-core');
				$medixare_comments_html = '<span class="comment-number">' . $medixare_comments_number . '</span> ' . $medixare_comments_html;

				$medixare_time_html = sprintf('<span><span>%s </span>%s %s</span>', get_the_time('d'), get_the_time('M'), get_the_time('Y'));

				$id = get_the_ID();
				$youtube_link = get_post_meta(get_the_ID(), 'medixare_youtube_link', true);

				?>
				<div class="amt-post-grid__items <?php echo esc_attr($col_class); ?> <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($i); ?>s" data-wow-duration="<?php echo esc_attr($j); ?>s">
					<div class="amt-post-grid__item">
						<div class="amt-post-grid__thumb col-md-4 w-img">
							<?php if (($data['post_video'] == 'yes' && 'video' == get_post_format($id) && !empty($youtube_link))) { ?>
								<div class="amt-video video-btn-wrap position-center"><a class="amt-play play-btn <?php echo esc_attr($data['play_button_size']); ?> amt-video-popup" href="<?php echo esc_url($youtube_link); ?>"><i class="fas fa-play"></i></a></div>
							<?php } ?>
							<a href="<?php the_permalink(); ?>">
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail($thumb_size);
								} else {
									echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/noimage_540X400.jpg') . '" alt="' . get_the_title() . '">';
								}
								?>
							</a>
						</div>
						<div class="amt-post-grid__content col-md-8">
							<!-- <?php if ($data['post_category'] == 'yes') { ?>
								<?php if ($data['cat_layout'] == 'cat_layout1') { ?>
									<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
								<?php } elseif ($data['cat_layout'] == 'cat_layout2') { ?>
									<span class="entry-categories style-2 meta-dark-color"><?php echo the_category(', '); ?></span>
								<?php } ?>
							<?php } ?> -->
							<?php if ($medixare_has_entry_meta) { ?>
								<ul class="entry-meta">
									<?php if ($data['post_category'] == 'yes') { ?>
										<li><span class="entry-categories style-2 meta-dark-color"><?php echo the_category(', '); ?></span></li>
									<?php } if ($data['post_date'] == 'yes') { ?>
										<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
									<?php } ?>
								</ul>
							<?php } ?>
							<h3 class="amt-post-grid__title mb-25"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h3>
							<?php if ($data['content_display'] == 'yes') { ?>
								<!-- <div class="post_excerpt amt-post-grid-desc"><?php echo wp_kses_post($content); ?></div> -->
							<?php } ?>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2;
				$j = $j + 0.1;
			endwhile; ?>
	</div>
<?php endif; ?>
<?php MedixareTheme_Helper::wp_reset_temp_query($temp); ?>
</div>