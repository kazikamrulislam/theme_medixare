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

$medixare_has_entry_meta  = ($data['post_author'] == 'yes' || $data['post_date'] == 'yes' || $data['post_comment'] == 'yes' || $data['post_length'] == 'yes' && function_exists('medixare_reading_time') || $data['post_view'] == 'yes' && function_exists('medixare_views')) ? true : false;

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

<style>
	.tp-service__thumb {
		overflow: hidden;
	}

	.tp-service__thumb img {
		-webkit-transition: all 0.4s ease-out 0s;
		-moz-transition: all 0.4s ease-out 0s;
		-ms-transition: all 0.4s ease-out 0s;
		-o-transition: all 0.4s ease-out 0s;
		transition: all 0.4s ease-out 0s;
	}

	.tp-service__item:hover .tp-service__thumb img {
		transform: rotate(-3deg) scale(1.1);
	}

	.tp-service__content {
		padding: 40px 30px;
	}

	.tp-service__title {
		font-size: 24px;
		font-weight: 600;
		color: var(--tp-common-black-2);
		text-transform: capitalize;
	}

	.tp-service__content .tp-service-desc {
		color: var(--tp-text-5);
	}

	.tp-readmore-btn {
		font-size: 15px;
		font-weight: 600;
		padding: 5px 15px;
		background-color: #ff446026;
		letter-spacing: -0.01rem;
		display: inline-block;
		color: var(--tp-theme-primary);
		border-radius: 5px;
		-webkit-transition: all 0.3s ease-out 0s;
		-moz-transition: all 0.3s ease-out 0s;
		-ms-transition: all 0.3s ease-out 0s;
		-o-transition: all 0.3s ease-out 0s;
		transition: all 0.3s ease-out 0s;
	}
</style>

<div class="amt-post-grid-default amt-post-grid-<?php echo esc_attr($data['style']); ?>">
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
				<div class="<?php echo esc_attr($col_class); ?> <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($i); ?>s" data-wow-duration="<?php echo esc_attr($j); ?>s">
					<div class="tp-service__item">
						<div class="tp-service__thumb w-img">
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
						<div class="tp-service__content">
							<?php if ($data['post_category'] == 'yes') { ?>
								<?php if ($data['cat_layout'] == 'cat_layout1') { ?>
									<span class="entry-categories style-1"><?php echo medixare_category_prepare(); ?></span>
								<?php } elseif ($data['cat_layout'] == 'cat_layout2') { ?>
									<span class="entry-categories style-2 meta-dark-color"><?php echo the_category(', '); ?></span>
								<?php } ?>
							<?php } ?>
							<?php if ($medixare_has_entry_meta) { ?>
								<ul class="entry-meta">
									<?php if ($data['post_date'] == 'yes') { ?>
										<li class="post-date"><i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?></li>
									<?php }
									if ($data['post_author'] == 'yes') { ?>
										<li class="post-author"><i class="far fa-user"></i><?php esc_html_e('by ', 'medixare'); ?><?php the_author_posts_link(); ?></li>
									<?php }
									if ($data['post_comment'] == 'yes') { ?>
										<li class="post-comment"><i class="far fa-comments"></i><a href="<?php echo get_comments_link(get_the_ID()); ?>"><?php echo wp_kses($medixare_comments_html, 'alltext_allow'); ?></a></li>
									<?php }
									if (($data['post_length'] == 'yes') && function_exists('medixare_reading_time')) { ?>
										<li class="post-reading-time meta-item"><i class="far fa-clock"></i><?php echo medixare_reading_time(); ?></li>
									<?php }
									if (($data['post_view'] == 'yes') && function_exists('medixare_views')) { ?>
										<li><span class="post-views meta-item"><i class="fas fa-signal"></i><?php echo medixare_views(); ?></span></li>
									<?php } ?>
								</ul>
							<?php } ?>
							<h3 class="tp-service__title mb-25"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h3>
							<?php if ($data['content_display'] == 'yes') { ?>
								<div class="post_excerpt tp-service-desc"><?php echo wp_kses_post($content); ?></div>
							<?php } ?>
							<?php if ($data['post_read'] == 'yes') { ?>
								<div class="tp-service__btn-wrapper"><a class="tp-readmore-btn" href="<?php the_permalink(); ?>"><?php echo wp_kses_post($data['read_more_text']); ?></a>
								</div>
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