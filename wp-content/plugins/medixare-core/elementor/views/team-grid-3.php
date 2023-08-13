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

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
}
else if ( get_query_var('page') ) {
	$paged = get_query_var('page');
}
else {
	$paged = 1;
}

$args = array(
	'post_type'      => 'medixare_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
	'paged' => $paged
);

if ( !empty( $data['cat'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'medixare_team_category',
			'field' => 'term_id',
			'terms' => $data['cat'],
		)
	);
}

switch ( $data['orderby'] ) {
	case 'title':
	case 'menu_order':
	$args['order'] = 'ASC';
	break;
}

$query = new WP_Query( $args );
$temp = MedixareTheme_Helper::wp_set_temp_query( $query );

$col_class = "col-lg-{$data['col_lg']} col-md-{$data['col_md']} col-sm-{$data['col_sm']} col-xs-{$data['col_xs']}";
?>
<div class="team-default team-multi-layout-3 team-grid-<?php echo esc_attr( $data['style'] );?>">
	<div class="row <?php echo esc_attr( $data['item_space'] );?>">
		<?php $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post();
			$id            	= get_the_id();
			$position   	= get_post_meta( $id, 'medixare_team_position', true );
			$socials       	= get_post_meta( $id, 'medixare_team_socials', true );
			$social_fields 	= MedixareTheme_Helper::team_socials();
			if ( $data['contype'] == 'content' ) {
				$content = apply_filters( 'the_content', get_the_content() );
			}
			else {
				$content = apply_filters( 'the_excerpt', get_the_excerpt() );;
			}
			$content = wp_trim_words( $content, $data['count'], '' );
			$content = "$content";
		?>
			<div class="team-item <?php echo esc_attr( $col_class );?>">
				<div class="team-content-wrap <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="team-thums">
						<a href="<?php the_permalink();?>">
							<?php
							if ( has_post_thumbnail() ){
								the_post_thumbnail( $thumb_size );
							} else {
								echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
							}
							?>
						</a>
						<div class="mask-wrap">
							<div class="team-content">					
								<div class="top-content">
									<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
									<?php if ( $data['designation_display']  == 'yes' ) { ?>
									<div class="team-designation"><?php echo esc_html( $position );?></div>
									<?php } ?>
									<?php if ( $data['content_display']  == 'yes' ) { ?>
									<p class="team-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
									<?php } ?>
								</div>
								<?php if ( !empty( $socials ) && $data['social_display']  == 'yes' ) { ?>
								<ul class="team-social">
									<?php foreach ( $socials as $key => $social ): ?>
										<?php if ( !empty( $social ) ): ?>
											<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; } ?>
		<?php } ?>
	</div>
	<?php if ( $data['more_items_display'] == 'yes' ) { ?>
	<?php if ( $data['more_button'] == 'show' ) { ?>
		<?php if ( !empty( $data['see_button_text'] ) ) { ?>
		<div class="team-button"><a class="button-style-1" href="<?php echo esc_url( $data['see_button_link'] );?>"><?php echo esc_html( $data['see_button_text'] );?><i class="fas fa-arrow-right"></i></a></div>
		<?php } ?>
	<?php } else { ?>
		<?php MedixareTheme_Helper::pagination(); ?>
	<?php } } ?>
	<?php MedixareTheme_Helper::wp_reset_temp_query( $temp ); ?>
</div>
