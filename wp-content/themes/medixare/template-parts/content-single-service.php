<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

global $post;

$thumb_size = 'medixare-size6';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'service-single' ); ?>>
	<div class="service-single-content">
		<div class="row service_content">
			<div class="col-md-12">
				<!-- <div class="service-thumb">
					<?php
						// if ( has_post_thumbnail() ){
						// 	the_post_thumbnail( $thumb_size );
						// } else {
						// 	echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
						// }
					?>	
				</div>-->
				<!-- <h2 class="entry-title"><?php the_title(); ?></h2> -->
				<?php the_content();?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<!-- Team Skills
				<?php if ( MedixareTheme::$options['service_skill'] ) { ?>
					<?php //if ( !empty( $medixare_service_skill ) ) { ?>
					<div class="amt-skill-wrap">
						<div class="amt-skills">
							<h2><?php esc_html_e( 'Skill', 'medixare' );?></h2>
							<?php foreach ( $medixare_service_skill as $skill ): ?>
								<?php
								if ( empty( $skill['skill_name'] ) || empty( $skill['skill_value'] ) ) {
									continue;
								}
								$skill_value = (int) $skill['skill_value'];
								$skill_style = "width:{$skill_value}%;";

								if ( !empty( $skill['skill_color'] ) ) {
									$skill_style .= "background-color:{$skill['skill_color']};";
								}
								?>
								<div class="amt-skill-each">
									<div class="amt-name"><?php echo esc_html( $skill['skill_name'] );?></div>
									<div class="progress">
										<div class="progress-bar progress-bar-striped wow slideInLeft" data-wow-delay="0s" data-wow-duration="3s" data-progress="<?php echo esc_attr( $skill_value );?>%" style="<?php echo esc_attr( $skill_style );?> animation-name: slideInLeft;"> <span><?php echo esc_html( $skill_value );?>%</span></div>
									</div>								
								</div>
							<?php endforeach;?> 
						</div>
					</div>
					<?php } ?>
				<?php //} ?> -->
			</div>
			<!-- <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="education_title">
					<h2>Education</h2>
				</div>
				<div class="education_description">
					Must explain to you how all praising uts pain was born and I will gives you a itself completed account of the system, and sed expounds the ut actual teachings of that greater
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="award">
					<h2>Awards</h2>
				</div>
				<div class="award_desc">
					Must explain to you how all praising uts pain was born and I will gives you a itself completed account of the system, and sed expounds the ut actual teachings of that greater
				</div>
			</div> -->
		</div>
	</div>
	
	<?php //if( MedixareTheme::$options['show_related_service'] == '1' && is_single() && !empty ( medixare_related_service() ) ) { ?>
	<!-- <div class="related-post">
		<?php //echo medixare_related_service(); ?>
	</div> -->
	<?php //} ?>
</div>