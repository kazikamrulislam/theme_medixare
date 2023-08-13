<?php 
/**
* Widget API: Recent Post Widget class
* By : Radius Theme
*/

Class MedixareTheme_Post_Tab extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt-post-tab',
			'description' => esc_html__( 'Post Tab Display Widget' , 'medixare-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-post-tab', esc_html__( 'Medixare : Posts display Tab' , 'medixare-core' ), $widget_ops );
	}
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		
		$title = ( !empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( '' , 'medixare-core' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 6;
		if ( ! $number )
			$number = 6;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : true;
		$show_post_image = ( !empty( $instance['show_post_image'] ) ) ? $instance['show_post_image'] : 'yes';
		$show_no_preview_img = ( !empty( $instance['show_no_preview_img'] ) ) ? $instance['show_no_preview_img'] : 'none';
		$tab_id = time() + rand(1, 1000);
		?>
		
		
		<?php echo wp_kses_post($args['before_widget']); ?>
		<?php if ( $title ) {
			echo wp_kses_post($args['before_title']) . $title . wp_kses_post($args['after_title']);
		} ?>

		<div class="post-tab-layout">
			<ul class="btn-tab nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a href="#recent-<?php esc_html_e( $tab_id ); ?>" data-bs-toggle="tab" aria-expanded="true" class="active"><?php esc_html_e('Recent', 'medixare-core'); ?></a>
				</li>
				<li class="nav-item">
					<a href="#popular-<?php esc_html_e( $tab_id ); ?>" data-bs-toggle="tab" aria-expanded="false"><?php esc_html_e( 'Popular', 'medixare-core'); ?></a>
				</li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane animated fadeInUp active show" id="recent-<?php esc_html_e( $tab_id ); ?>">
					<?php $recent_query = new WP_Query( apply_filters( 'widget_posts_args', array(
						'posts_per_page'      => $number,
						'no_found_rows'       => true,
						'post_status'         => 'publish',
						'ignore_sticky_posts' => true
					) ) );
					if ( $recent_query->have_posts() ) { 						
					
						while ( $recent_query->have_posts() ) {

						$recent_query->the_post(); ?>						
						<div class="tab-item">
							<div class="media">
								<?php if ( $show_post_image == 'yes' ) { ?>
									<a class="tab-img-holder" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( 'medixare-size5', ['class' => 'media-object'] );
										} else {
											echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_420X420.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
										}
								?></a>
								<?php } ?>
								<div class="media-body entry-content">
									<?php if ( $show_date ) { ?>
									<ul class="entry-meta meta-dark-color mb-1">
										<li class="post-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>		
									</ul>
									<?php } ?>
									<h3 class="entry-title title-size-sm title-dark-color mb-0 title-row-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
					<?php }					
					wp_reset_postdata();
					} ?>										
				</div>				
				<div role="tabpanel" class="tab-pane animated fadeInUp" id="popular-<?php esc_html_e( $tab_id ); ?>">
					<?php
						$popular_query = new WP_Query( apply_filters( 'widget_posts_args', array(
							'posts_per_page'      => $number,
							'no_found_rows'       => true,
							'post_status'         => 'publish',
							'orderby'   		  => 'meta_value_num',
							'meta_key'  		  => 'medixare_views',
							'ignore_sticky_posts' => true
						) ) );
						if ( $popular_query->have_posts() ) {					
							while ( $popular_query->have_posts() ) {
							$popular_query->the_post(); ?>						
						<div class="tab-item">
							<div class="media">
								<?php if ( $show_post_image == 'yes' ) { ?>
									<a class="tab-img-holder" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
										if ( has_post_thumbnail() ){
											the_post_thumbnail( 'medixare-size5', ['class' => 'media-object'] );
										} else {
											echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_420X420.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
										}
									?></a>
								<?php } ?>
								<div class="media-body entry-content">
									<?php if ( $show_date ) { ?>
									<ul class="entry-meta meta-dark-color mb-1">
										<li class="post-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>		
									</ul>
									<?php } ?>
									<h3 class="entry-title title-size-sm title-dark-color mb-0 title-row-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
					<?php }					
					wp_reset_postdata();
					} ?>
				</div>				
			</div>

		</div>
		<?php echo wp_kses_post($args['after_widget']); ?>
	<?php	
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance 				  = $old_instance;
		$instance['title'] 		  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] 	  = (int) $new_instance['number'];
		$instance['show_date']    = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_post_image'] = isset( $new_instance['show_post_image'] ) ? $new_instance['show_post_image'] : 'yes';
		$instance['show_no_preview_img'] = isset( $new_instance['show_no_preview_img'] ) ? $new_instance['show_no_preview_img'] : 'none';
		return $instance;
	}
	
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_post_image = ( !empty( $instance['show_post_image'] ) ) ? $instance['show_post_image'] : 'yes';
		$show_no_preview_img = ( !empty( $instance['show_no_preview_img'] ) ) ? $instance['show_no_preview_img'] : 'none';
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:' , 'medixare-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_no_preview_img' )); ?>"><?php esc_html_e( 'Show no preview image : ', 'medixare-core' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'show_no_preview_img' )); ?>">
					<option <?php if ( $show_no_preview_img == 'none' ) {  echo 'selected'; } ?> value="none"><?php esc_html_e( 'Hide' , 'medixare-core' ); ?></option>
					<option <?php if ( $show_no_preview_img == 'view' ) {  echo 'selected'; } ?> value="view"><?php esc_html_e( 'Show' , 'medixare-core' ); ?></option>
				</select>
			</p>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'medixare-core' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number); ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' )); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?', 'medixare-core' ); ?></label></p>	
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_post_image' )); ?>"><?php esc_html_e( 'Show Post Image : ', 'medixare-core' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'show_post_image' )); ?>">
					<option <?php if ( $show_post_image == 'yes' ) {  echo 'selected'; } ?> value="yes"><?php esc_html_e( 'Display' , 'medixare-core' ); ?></option>
					<option <?php if ( $show_post_image == 'no' ) {  echo 'selected'; } ?> value="no"><?php esc_html_e( 'Hide' , 'medixare-core' ); ?></option>
				</select>
			</p>
			
		<?php
	}	
}