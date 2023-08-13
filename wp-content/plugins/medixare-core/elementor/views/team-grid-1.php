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

$prefix      = MEDIXARE_CORE_THEME_PREFIX;
$thumb_size  = 'medixare-size6';

if (get_query_var('paged')) {
	$paged = get_query_var('paged');
} else if (get_query_var('page')) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'medixare_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
	'paged' => $paged
);

if (!empty($data['cat'])) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'medixare_team_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ($data['orderby']) {
	case 'title':
	case 'menu_order':
		$args['order'] = 'ASC';
		break;
}

$query = new WP_Query($args);
$temp = MedixareTheme_Helper::wp_set_temp_query($query);

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="amt-team__member  mb-30 fix team-grid-<?php echo esc_attr($data['style']); ?>">
	<div class="row <?php echo esc_attr($data['item_space']); ?>">
		<?php $i = $data['delay'];
		$j = $data['duration'];
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$id            	= get_the_id();
				$position   	= get_post_meta($id, 'medixare_team_position', true);
				$socials       	= get_post_meta($id, 'medixare_team_socials', true);
				$social_fields 	= MedixareTheme_Helper::team_socials();
				if ($data['contype'] == 'content') {
					$content = apply_filters('the_content', get_the_content());
				} else {
					$content = apply_filters('the_excerpt', get_the_excerpt());;
				}
				$content = wp_trim_words($content, $data['count'], '');
				$content = "$content";
		?>
				<div class="team-item <?php echo esc_attr($col_class); ?>">
					<div class="amt-team__member mb-30 fix <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($i); ?>s" data-wow-duration="<?php echo esc_attr($j); ?>s">
						<div class="amt-team__img w-img">
							<a href="<?php the_permalink(); ?>">
								<?php
								if (has_post_thumbnail()) {
									the_post_thumbnail($thumb_size);
								} else {
									echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/noimage_560X680.jpg') . '" alt="' . get_the_title() . '">';
								}
								?>
							</a>
						</div>
						<div class="amt-team__content white-bg">
							<div class="amt-team__title-wrapper">
								<h3 class="amt-team__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php if ($data['designation_display']  == 'yes') { ?>
									<div class="team-designation"><?php echo esc_html($position); ?></div>
								<?php } ?>
							</div>
							<div class="amt-team__btn">
								<span>
									<a href="<?php the_permalink(); ?>">
										<svg width="43" height="37" viewBox="0 0 43 37" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="28" cy="15" r="15" fill="currentColor" />
											<path d="M31.3337 12.8813C31.3975 12.3327 31.0044 11.8363 30.4558 11.7726L21.5159 10.7342C20.9673 10.6705 20.4709 11.0636 20.4072 11.6122C20.3435 12.1608 20.7366 12.6572 21.2852 12.7209L29.2317 13.6439L28.3088 21.5904C28.2451 22.139 28.6381 22.6354 29.1867 22.6991C29.7353 22.7628 30.2317 22.3698 30.2954 21.8212L31.3337 12.8813ZM1.62081 36.784L30.9612 13.5499L29.7196 11.9819L0.379194 35.216L1.62081 36.784Z" fill="currentColor" />
										</svg>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2;
				$j = $j + 0.1;
			} ?>
		<?php } ?>
	</div>
	<?php if ($data['more_items_display'] == 'yes') { ?>
		<?php if ($data['more_button'] == 'show') { ?>
			<?php if (!empty($data['see_button_text'])) { ?>
				<div class="team-button"><a class="button-style-1" href="<?php echo esc_url($data['see_button_link']); ?>"><?php echo esc_html($data['see_button_text']); ?></a></div>
			<?php } ?>
		<?php } else { ?>
			<?php MedixareTheme_Helper::pagination(); ?>
	<?php }
	} ?>
	<?php MedixareTheme_Helper::wp_reset_temp_query($temp); ?>
</div>