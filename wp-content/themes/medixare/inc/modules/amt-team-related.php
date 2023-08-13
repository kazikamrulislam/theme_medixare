<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

if( ! function_exists( 'medixare_related_team' )){
	
	function medixare_related_team(){
		$thumb_size = 'medixare-size6';
		$post_id = get_the_id();	
		$number_of_avail_post = '';
		$current_post = array( $post_id );
		$title_length = MedixareTheme::$options['related_team_title_limit'] ? MedixareTheme::$options['related_team_title_limit'] : '';
		$related_post_number = MedixareTheme::$options['related_team_number'];
		
		$content 	= get_the_content();
		$content 	= apply_filters( 'the_content', $content );
		
		$team_related_title  = get_post_meta( get_the_ID(), 'team_related_title', true );

		# Making ready to the Query ...
		$query_type = MedixareTheme::$options['related_post_query'];

		$args = array(
			'post_type'				 => 'medixare_team',
			'post__not_in'           => $current_post,
			'posts_per_page'         => $related_post_number,
			'no_found_rows'          => true,
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'update_post_term_cache' => false,
		);

		# Checking Related Posts Order ----------
		if( MedixareTheme::$options['related_post_sort'] ){

			$post_order = MedixareTheme::$options['related_post_sort'];

			if( $post_order == 'rand' ){

				$args['orderby'] = 'rand';
			}
			elseif( $post_order == 'views' ){

				$args['orderby']  = 'meta_value_num';
				$args['meta_key'] = 'medixare_views';
			}
			elseif( $post_order == 'popular' ){

				$args['orderby'] = 'comment_count';
			}
			elseif( $post_order == 'modified' ){

				$args['orderby'] = 'modified';
				$args['order']   = 'ASC';
			}
			elseif( $post_order == 'recent' ){

				$args['orderby'] = '';
				$args['order']   = '';
			}
		}


		# Get related posts by author ----------
		if( $query_type == 'author' ){
			$args['author'] = get_the_author_meta( 'ID' );
		}

		# Get related posts by tags ----------
		elseif( $query_type == 'tag' ){
			$tags_ids  = array();
			$post_tags = get_the_terms( $post_id, 'post_tag' );

			if( ! empty( $post_tags ) ){
				foreach( $post_tags as $individual_tag ){
					$tags_ids[] = $individual_tag->term_id;
				}

				$args['tag__in'] = $tags_ids;
			}
		}

		# Get related posts by categories ----------
		else{
			
			$terms = get_the_terms( $post_id, 'medixare_team_category' );
			if ( $terms && ! is_wp_error( $terms ) ) {
			 
				$port_cat_links = array();
			 
				foreach ( $terms as $term ) {
					$port_cat_links[] = $term->term_id;
				}
			}
			
			$args['tax_query'] = array (
				array (
					'taxonomy' => 'medixare_team_category',
					'field'    => 'ID',
					'terms'    => $port_cat_links,
				)
			);

		}

		# Get the posts ----------
		$related_query = new wp_query( $args );
		/*the_carousel*/
		/*$swiper_data=array(
			'slidesPerView' 	=>2,
			'centeredSlides'	=>false,
			'loop'				=>true,
			'spaceBetween'		=>20,
			'slideToClickedSlide' =>true,
			'slidesPerGroup' => 1,
			'autoplay'				=>array(
				'delay'  => 1,
			),
			'speed'      =>500,
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>2),
				'768'    =>array('slidesPerView' =>2),
				'992'    =>array('slidesPerView' =>3),
				'1200'    =>array('slidesPerView' =>4),				
				'1600'    =>array('slidesPerView' =>4)				
			),
			'auto'   =>false
		);*/

		if ( MedixareTheme::$options['related_team_auto_play'] == 1 ) {
			$auto_play = true;
		} else {
			$auto_play = false;
		}

		$speed = intval(MedixareTheme::$options['related_team_auto_play_speed']);
		$delay = intval(MedixareTheme::$options['related_team_auto_play_delay']);
		
		$swiper_data = array(
			'slidesPerView' 	=>1,
			'centeredSlides'	=>false,
			'loop'				=>true,
			'spaceBetween'		=>24,
			'slidesPerGroup'	=>1,
			'slideToClickedSlide' =>true,
			'autoplay'          => $auto_play,
			'pauseOnMouseEnter' => true,
			'autoplaydelay'     => $delay,
			'speed'             => $speed,
			'breakpoints' =>array(
				'0'    =>array('slidesPerView' =>1),
				'576'    =>array('slidesPerView' =>1),
				'768'    =>array('slidesPerView' =>2),
				'992'    =>array('slidesPerView' =>2),
				'1200'    =>array('slidesPerView' =>2),				
				'1600'    =>array('slidesPerView' =>3)
			),
		);

		$swiper_data = json_encode( $swiper_data );
		
		?>
		
		<div class="team-default team-multi-layout-1 team-grid-style1">
			<div class="amt-swiper-slider-team related-post" data-xld = '<?php echo esc_attr( $swiper_data ); ?>'>
				<div class="section-title">
					<h3 class="related-title"><?php echo wp_kses( MedixareTheme::$options['team_related_title'] , 'alltext_allow' ); ?>
						<span class="titledot"></span>
						<span class="titleline"></span>
					</h3>				
					<div class="swiper-button">
		                <div class="swiper-button-prev"><i class="fas fa-chevron-left"></i></div>
		                <div class="swiper-button-next"><i class="fas fa-chevron-right"></i></div>
		            </div>
	            </div>
				<div class="swiper-wrapper" >
					<?php
						while ( $related_query->have_posts() ) {
						$related_query->the_post();
						$trimmed_title = wp_trim_words( get_the_title(), $title_length, '' );
						$id = get_the_ID();
						$socials       	= get_post_meta( $id, 'medixare_team_socials', true );
						$social_fields 	= MedixareTheme_Helper::team_socials();
						$position   	= get_post_meta( $id, 'medixare_team_position', true );
					?>
						<div class="team-item swiper-slide">						
							<div class="team-content-wrap">		
								<div class="team-thums">
									<a href="<?php the_permalink();?>">
										<?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( $thumb_size );
										} else {
											echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file( 'element/noimage_400X400.jpg' ) . '" alt="'.get_the_title().'">';
										}
										?>
									</a>
								</div>
								<div class="mask-wrap">
									<div class="team-content">					
										<h3 class="team-title"><a href="<?php the_permalink();?>"><?php echo esc_html( $trimmed_title ); ?></a></h3>
										<?php if ( MedixareTheme::$options['team_ar_position'] ) { ?>
										<div class="team-designation"><?php echo esc_html( $position );?></div>
										<?php } ?>
										<?php if ( MedixareTheme::$options['team_ar_excerpt'] ) { ?>
										<p><?php echo wp_kses( $content , 'alltext_allow' ); ?></p>
										<?php } ?>
										<?php if ( MedixareTheme::$options['team_ar_social'] ) { ?>
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
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
		wp_reset_postdata();
	}
}
?>