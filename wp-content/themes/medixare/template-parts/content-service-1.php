<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'medixare-size6';
$id = get_the_ID();

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['team_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="service-item">
		<div class="service-content-wrap-1">		
			<div class="service-thums">
				<a href="<?php the_permalink();?>">
					<?php
					if ( has_post_thumbnail() ){
						the_post_thumbnail( $thumb_size );
					} else {
						echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
					}
					?>
				</a>
			</div>
			<div class="mask-wrap">
				<div class="service-content">					
					<h3 class="service-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php //if ( MedixareTheme::$options['service_button'] ) { ?>
						<!-- <div class="service-designation"><?php //echo esc_html( $position );?></div> -->
					<?php //} ?>
					<?php if ( MedixareTheme::$options['service_ar_excerpt'] ) { ?>
						<p><?php the_excerpt(); ?></p>
					<?php } ?>
					<?php if ( MedixareTheme::$options['service_ar_button'] ) { ?>
						<button class="service_details_btn">
							<a href="<?php the_permalink(); ?>">Read More</a>
						</button>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</article>