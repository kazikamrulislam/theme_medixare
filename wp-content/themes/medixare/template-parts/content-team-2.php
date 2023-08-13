<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

$thumb_size = 'medixare-size6';
$id = get_the_ID();

$position   	= get_post_meta( $id, 'medixare_team_position', true );
$socials       	= get_post_meta( $id, 'medixare_team_socials', true );
$social_fields 	= MedixareTheme_Helper::team_socials();


$content = get_the_content();
$content = apply_filters( 'the_content', $content );
// $content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['team_arexcerpt_limit'], '' );

?>
<article id="post-<?php the_ID(); ?>">
	<div class="team-item team_archive-2">
		<div class="team-content-wrap">		
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
				
			</div>
			<div class="mask-wrap">
				<div class="team-content">
					<?php if ( MedixareTheme::$options['team_ar_social'] ) { ?>
						<ul class="team-social">
							<?php foreach ( $socials as $key => $social ): ?>
								<?php if ( !empty( $social ) ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $social );?>"><i class="fab <?php echo esc_attr( $social_fields[$key]['icon'] );?>" aria-hidden="true"></i></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php } ?>
					<h3 class="team-title">
						<a href="<?php the_permalink();?>">
							<?php the_title();?>
						</a>
					</h3>
					<?php if ( MedixareTheme::$options['team_ar_position'] ) { ?>
						<!-- <span> - <?php echo esc_html( $position );?></span> -->
					<?php } ?>
					<span>
					<?php 
					$terms = get_the_terms( $post->ID, 'medixare_team_category' );
					$i=1;
					foreach($terms as $term)
					{
						
						echo ($i==1) ? "": " - ";
						echo $term->name;
						$i++;
					}
					 ?>
					</span>

					<!-- <?php if ( MedixareTheme::$options['team_ar_excerpt'] ) { ?>
					<p class="team-text"><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
					<?php } ?> -->
					
				</div>
			</div>
		</div>
	</div>
</article>