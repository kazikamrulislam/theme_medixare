<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

global $post;

$medixare_team_position 		= get_post_meta( $post->ID, 'medixare_team_position', true );
$medixare_team_website       	= get_post_meta( $post->ID, 'medixare_team_website', true );
$medixare_team_expertise        = get_post_meta( $post->ID, 'medixare_team_expertise', true );
$medixare_team_experience       = get_post_meta( $post->ID, 'medixare_team_experience', true );
$medixare_team_email    		= get_post_meta( $post->ID, 'medixare_team_email', true );
$medixare_team_phone    		= get_post_meta( $post->ID, 'medixare_team_phone', true );
$medixare_team_address    		= get_post_meta( $post->ID, 'medixare_team_address', true );
$medixare_team_info       		= get_post_meta( $post->ID, 'medixare_team_info', true );
$medixare_team_skill       		= get_post_meta( $post->ID, 'medixare_team_skill', true );
$medixare_team_education       	= get_post_meta( $post->ID, 'medixare_team_education', true );
$medixare_team_awards       	= get_post_meta( $post->ID, 'medixare_team_awards', true );
$medixare_team_counter      	= get_post_meta( $post->ID, 'medixare_team_count', true );
$socials        				= get_post_meta( $post->ID, 'medixare_team_socials', true );
$socials        				= array_filter( $socials );
$socials_fields 				= MedixareTheme_Helper::team_socials();

$medixare_team_contact_form 	= get_post_meta( $post->ID, 'medixare_team_contact_form', true );

$content = get_the_content();
$content = apply_filters( 'the_content', $content );
$content = wp_trim_words( get_the_excerpt(), MedixareTheme::$options['team_excerpt_limit'], '' );

$thumb_size = 'medixare-size6';
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'team-single' ); ?>>
	<div class="team-single-content">
		<div class="row">
		<div class="col-lg-4 col-md-5 col-12">
				<div class="team-thumb">
					<?php
						if ( has_post_thumbnail() ){
							the_post_thumbnail( $thumb_size );
						} else {
							echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_560X680.jpg' ) . '" alt="'.get_the_title().'">';
						}
					?>	
				</div>
			</div>				
			<div class="col-lg-8 col-md-7 col-12">
				<div class="team-content">
					<div class="team_member_detail">
						<div class="team-heading">
							<h2 class="entry-title"><?php the_title(); ?></h2>
							<?php if ( MedixareTheme::$options['team_position'] ) { ?>
								<?php if ( $medixare_team_position ) { ?>
									<span class="designation"><?php echo esc_html( $medixare_team_position );?></span>
								<?php } ?>
							<?php }?>
						</div>
						<?php if ( MedixareTheme::$options['team_excerpt'] ) { ?>
							<?php //the_excerpt();?>
							<?php if ( MedixareTheme::$options['team_ar_excerpt'] ) { ?>
								<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
							<?php } ?>
						<?php } ?>
						<!-- Team info -->
						<?php if ( MedixareTheme::$options['team_info'] ) { ?>
						<?php if ( !empty( $medixare_team_website ) ||  !empty( $medixare_team_phone ) || !empty( $medixare_team_email ) || !empty( $medixare_team_address ) || !empty( $medixare_team_expertise )) { ?>
						<div class="team-info">
							<!-- <h4><?php esc_html_e( 'Info', 'medixare' );?></h4> -->
							<ul>
								<?php if ( !empty( $medixare_team_website ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Website', 'medixare' );?> : </span><?php echo esc_html( $medixare_team_website );?></li>
								<?php } if ( !empty( $medixare_team_phone ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Phone', 'medixare' );?> : </span><a href="tel:<?php echo esc_html( $medixare_team_phone );?>"><?php echo esc_html( $medixare_team_phone );?></a></li>
								<?php } if ( !empty( $medixare_team_expertise ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Expertise', 'medixare' );?> : </span><?php echo esc_html( $medixare_team_expertise );?></li>
								<?php } if ( !empty( $medixare_team_experience ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Experience', 'medixare' );?> : </span><?php echo esc_html( $medixare_team_experience );?></li>
								<?php } if ( !empty( $medixare_team_email ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Email', 'medixare' );?> : </span><a href="mailto:<?php echo esc_html( $medixare_team_email );?>"><?php echo esc_html( $medixare_team_email );?></a></li>
								<?php } if ( !empty( $medixare_team_address ) ) { ?>	
									<li><span class="team-label"><?php esc_html_e( 'Address', 'medixare' );?> : </span><?php echo esc_html( $medixare_team_address );?></li>	
								<?php } ?>
							</ul>
						</div>
						<?php } } ?>
					</div>
					<?php if ( MedixareTheme::$options['team_social'] ) { ?>
						<div class="team_social_area">
							<?php if ( !empty( $socials ) ) { ?>
							<ul class="team-social">
								<?php foreach ( $socials as $key => $value ): ?>
									<li><a target="_blank" href="<?php echo esc_url( $value ); ?>"><i class="fab <?php echo esc_attr( $socials_fields[$key]['icon'] );?>"></i></a></li>
								<?php endforeach; ?>
							</ul>						
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row team_content">
			<div class="col-md-12">
				<?php the_content();?>
			</div>
		</div>
		<div class="row team_member_qualification">
			<?php if ( MedixareTheme::$options['team_skill'] ) { ?>
				<div class="col-md-4 col-sm-6 col-xs-12">
				<!-- Team Skills -->
					<?php if ( !empty( $medixare_team_skill ) ) { ?>
					<div class="amt-skill-wrap">
						<div class="amt-skills">
							<h2><?php esc_html_e( 'Skill', 'medixare' );?></h2>
							<?php foreach ( $medixare_team_skill as $skill ): ?>
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
				</div>
			<?php } ?>
			<?php if ( MedixareTheme::$options['team_education'] ) { ?>
				<?php if ( !empty( $medixare_team_education ) ) { ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="education_title">
							<h2><?php esc_html_e( 'Education', 'medixare' );?></h2>
						</div>
						<div class="education_description">
						<?php echo esc_html( $medixare_team_education );?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
			<?php if ( MedixareTheme::$options['team_awards'] ) { ?>
				<?php if ( !empty( $medixare_team_awards ) ) { ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="award">
							<h2><?php esc_html_e( 'Awards', 'medixare' );?></h2>
						</div>
						<div class="award_desc">
							<?php echo esc_html( $medixare_team_awards );?>
						</div>
					</div>
				<?php }?>
			<?php } ?>
		</div>
	</div>
	
	<!-- <?php if( MedixareTheme::$options['show_related_team'] == '1' && is_single() && !empty ( medixare_related_team() ) ) { ?>
	<div class="related-post">
		<?php echo medixare_related_team(); ?>
	</div>
	<?php } ?> -->
</div>