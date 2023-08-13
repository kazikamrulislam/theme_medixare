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
$thumb_size  = 'medixare-size4';

$args = array(
	'post_type'      => 'medixare_team',
	'posts_per_page' => $data['number'],
	'orderby'        => $data['orderby'],
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

?>
<div class="team-default team-multi-layout-2 owl-wrap team-slider-<?php echo esc_attr( $data['style'] );?>">
	<div class="amt-swiper-slider swiper-slider amt-swiper-nav-2" data-xld ="<?php echo esc_attr( $data['swiper_data'] );?>">
		<div class="swiper-wrapper">
		<?php $i = $data['delay']; $j = $data['duration']; 
			if ( $query->have_posts() ) :?>
			<?php while ( $query->have_posts() ) : $query->the_post();?>
				<?php
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
				$content = "<p>$content</p>";
				?>
				<div class="team-item swiper-slide <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $i );?>s" data-wow-duration="<?php echo esc_attr( $j );?>s">
					<div class="team-content-wrap">		
						<div class="team-thums">
							<a href="<?php the_permalink();?>">
								<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( $thumb_size );
								}
								else {
									if ( !empty( MedixareTheme::$options['no_preview_image']['id'] ) ) {
										echo wp_get_attachment_image( MedixareTheme::$options['no_preview_image']['id'], $thumb_size );
									}
									else {
										echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_img( 'noimage_480X504.jpg' ) . '" alt="'.get_the_title().'">';
									}
								}
								?>
							</a>
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
						<div class="mask-wrap">
							<div class="team-content">
								<h3 class="team-title"><a href="<?php the_permalink();?>"><?php the_title();?></a><?php if ( $data['designation_display']  == 'yes' ) { ?><span> - <?php echo esc_html( $position );?></span><?php } ?></h3>
								<?php if ( $data['content_display']  == 'yes' ) { ?>
								<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php $i = $i + 0.2; $j = $j + 0.1; endwhile;?>
		<?php endif;?>
		<?php wp_reset_postdata();?>
		</div>
		<?php if($data['display_arrow']=='yes'){  ?>
        <div class="swiper-navigation">
            <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
		    <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
        </div>
        <?php } if($data['display_buttet']=='yes') { ?>
        <div class="swiper-pagination"></div>
        <?php } ?>
	</div>
</div>