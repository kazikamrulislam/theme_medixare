<?php 
/**
* Widget API: Recent Post Widget class
* By : Radius Theme
*/
Class MedixareTheme_Post_Box extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt-post-box',
			'description' => esc_html__( 'Post Display Widget' , 'medixare-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-post-box', esc_html__( 'Medixare : Posts display Box' , 'medixare-core' ), $widget_ops );
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
		$show_cat = isset( $instance['show_cat'] ) ? $instance['show_cat'] : false;
		
		$select_style = ( !empty( $instance['select_style'] ) ) ? $instance['select_style'] : 'box-style-1';
		$show_post_image = ( !empty( $instance['show_post_image'] ) ) ? $instance['show_post_image'] : 'yes';
		$post_display_order = ( !empty( $instance['post_display_order'] ) ) ? $instance['post_display_order'] : 'view';
		$show_no_preview_img = ( !empty( $instance['show_no_preview_img'] ) ) ? $instance['show_no_preview_img'] : 'none';
		
		if ( $post_display_order == 'view' ) {
		
			$result_query = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'orderby'   		  => 'meta_value_num',
				'meta_key'  		  => 'medixare_views',
				'ignore_sticky_posts' => true
			) ) );
		
		} else if ( $post_display_order == 'comment' ) {

			$result_query = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'post_status'         => 'publish',
				'orderby'   		  => 'comment_count',
				'ignore_sticky_posts' => true
			) ) );
		
		} else {
			
			$result_query = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
			) ) );			
		}
		
		if ($result_query->have_posts()) :
		?>
		<?php echo wp_kses_post($args['before_widget']); ?>
		<?php if ( $title ) {
			echo wp_kses_post($args['before_title']) . $title . wp_kses_post($args['after_title']);
		} ?>
		<div class="post-box-style number-counter g-3 <?php if ( $select_style == 'box-style-2' ) { ?>row<?php } ?>">
		<?php while ( $result_query->have_posts() ) : $result_query->the_post(); ?>
			<?php if ( $select_style == 'box-style-1' ) { ?>
			<div class="rt-news-box-widget <?php echo esc_attr( $select_style ); ?>">
				<div class="item-list">
					<?php if ( $show_post_image == 'yes' ) { ?>
						<div class="post-box-img">
							<a class="post-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( 'medixare-size5', ['class' => 'media-object'] );
								} elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
									echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_420X420.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
							?></a>
						</div>
					<?php } ?>
					<div class="post-content entry-content">
						<?php if ( $show_cat ) { ?>
						<div class="entry-cat">
						<?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'category' );
							foreach ( $term_lists as $term_list ){
								$link = get_term_link( $term_list->term_id, 'category' ); ?>
								<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a>
						<?php $i++; } ?>
						</div>
						<?php } ?>
						<?php if ( $show_date ) { ?>
							<ul class="entry-meta meta-dark-color">
								<li class="entry-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
							</ul>
						<?php } ?>
						<h4 class="entry-title title-dark-color title-size-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
			<?php } else if ( $select_style == 'box-style-2' ) { ?>
			<div class="col-6 <?php echo esc_attr( $select_style ); ?>">
				<div class="topic-box">				
					<?php if ( $show_post_image == 'yes' ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="rt-wid-post-img img-opacity-hover">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( 'medixare-size3', ['class' => 'media-object'] );
								} elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
									echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_540X400.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
							?>
						</a>
					<?php } ?>
					<div class="post-content entry-content">
						<?php if ( $show_cat ) { ?>
						<div class="entry-cat">
						<?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'category' );
							foreach ( $term_lists as $term_list ){
								$link = get_term_link( $term_list->term_id, 'category' ); ?>
								<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a>
						<?php $i++; } ?>
						</div>
						<?php } ?>
						<?php if ( $show_date ) { ?>
							<ul class="entry-meta meta-dark-color">
								<li class="entry-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
							</ul>
						<?php } ?>
						<h4 class="entry-title title-dark-color title-size-xs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
			<?php } else if ( $select_style == 'box-style-3' ) { ?>
			<div class="rt-news-box-widget <?php echo esc_attr( $select_style ); ?>">
				<div class="item-list">
					<?php if ( $show_post_image == 'yes' ) { ?>
						<div class="post-box-img">
							<a class="post-img" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( 'medixare-size5', ['class' => 'media-object'] );
								} elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
									echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_420X420.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
							?></a>
						</div>
					<?php } ?>
					<div class="post-content entry-content">
						<?php if ( $show_cat ) { ?>
						<div class="entry-cat">
						<?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'category' );
							foreach ( $term_lists as $term_list ){
								$link = get_term_link( $term_list->term_id, 'category' ); ?>
								<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a>
						<?php $i++; } ?>
						</div>
						<?php } ?>
						<?php if ( $show_date ) { ?>
							<ul class="entry-meta meta-light-color">
								<li class="entry-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
							</ul>
						<?php } ?>
						<h4 class="entry-title title-light-color title-size-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
			<?php } else if ( $select_style == 'box-style-4' ) { ?>
			<div class="col-6 <?php echo esc_attr( $select_style ); ?>">
				<div class="topic-box">				
					<?php if ( $show_post_image == 'yes' ) { ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="rt-wid-post-img img-opacity-hover">
							<?php
								if ( has_post_thumbnail() ){
									the_post_thumbnail( 'medixare-size3', ['class' => 'media-object'] );
								} elseif ( MedixareTheme::$options['display_no_preview_image'] == '1' ) {
									echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_540X400.jpg" alt="'. the_title_attribute( array( 'echo'=> false ) ) .'">';
								}
							?>
						</a>
					<?php } ?>
					<div class="post-content entry-content">
						<?php if ( $show_cat ) { ?>
						<div class="entry-cat">
						<?php
							$i = 1;
							$term_lists = get_the_terms( get_the_ID(), 'category' );
							foreach ( $term_lists as $term_list ){
								$link = get_term_link( $term_list->term_id, 'category' ); ?>
								<?php if ( $i > 1 ){ echo esc_html( ', ' ); } ?><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $term_list->name ); ?></a>
						<?php $i++; } ?>
						</div>
						<?php } ?>
						<?php if ( $show_date ) { ?>
							<ul class="entry-meta meta-light-color">
								<li class="entry-date"><i class="far fa-calendar-alt icon"></i><?php echo get_the_time( get_option( 'date_format' ) ); ?></li>
							</ul>
						<?php } ?>
						<h4 class="entry-title title-light-color title-size-xs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
				</div>
			</div>
			<?php } ?>
			
		<?php endwhile; ?>
		</div>
		<?php echo wp_kses_post($args['after_widget']); ?>
		<?php
		wp_reset_postdata();
		endif;
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance 				  = $old_instance;
		$instance['title'] 		  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] 	  = (int) $new_instance['number'];
		$instance['show_date']    = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['show_cat']     = isset( $new_instance['show_cat'] ) ? (bool) $new_instance['show_cat'] : false;
		$instance['select_style'] = isset( $new_instance['select_style'] ) ? $new_instance['select_style'] : 'box-style-1';
		$instance['show_post_image'] = isset( $new_instance['show_post_image'] ) ? $new_instance['show_post_image'] : 'yes';
		$instance['post_display_order'] = isset( $new_instance['post_display_order'] ) ? $new_instance['post_display_order'] : 'view';
		$instance['show_no_preview_img'] = isset( $new_instance['show_no_preview_img'] ) ? $new_instance['show_no_preview_img'] : 'none';
		return $instance;
	}
	
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		$show_cat = isset( $instance['show_cat'] ) ? (bool) $instance['show_cat'] : false;
		$select_style = ( !empty( $instance['select_style'] ) ) ? $instance['select_style'] : 'box-style-1';
		$show_post_image = ( !empty( $instance['show_post_image'] ) ) ? $instance['show_post_image'] : 'yes';
		$post_display_order = ( !empty( $instance['post_display_order'] ) ) ? $instance['post_display_order'] : 'view';
		$show_no_preview_img = ( !empty( $instance['show_no_preview_img'] ) ) ? $instance['show_no_preview_img'] : 'none';
		?>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:' , 'medixare-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title); ?>" /></p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_display_order' )); ?>"><?php esc_html_e( 'Post Display Order : ', 'medixare-core'  ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'post_display_order' )); ?>">
					<option <?php if ( $post_display_order == 'none' ) {  echo 'selected'; } ?> value="none"><?php esc_html_e( 'Recent' , 'medixare-core' ); ?></option>
					<option <?php if ( $post_display_order == 'view' ) {  echo 'selected'; } ?> value="view"><?php esc_html_e( 'Most Viewed' , 'medixare-core' ); ?></option>
					<option <?php if ( $post_display_order == 'comment' ) {  echo 'selected'; } ?> value="comment"><?php esc_html_e( 'Most Commented' , 'medixare-core' ); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'show_no_preview_img' )); ?>"><?php esc_html_e( 'Show no preview image : ' , 'medixare-core' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'show_no_preview_img' )); ?>">
					<option <?php if ( $show_no_preview_img == 'none' ) {  echo 'selected'; } ?> value="none"><?php esc_html_e( 'Hide' , 'medixare-core' ); ?></option>
					<option <?php if ( $show_no_preview_img == 'view' ) {  echo 'selected'; } ?> value="view"><?php esc_html_e( 'Show' , 'medixare-core' ); ?></option>
				</select>
			</p>
			<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts to show:', 'medixare-core' ); ?></label>
			<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number); ?>" size="3" /></p>

			<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' )); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' )); ?>"><?php esc_html_e( 'Display post date?' , 'medixare-core'); ?></label></p>
			
			<p><input class="checkbox" type="checkbox"<?php checked( $show_cat ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_cat' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_cat' )); ?>" />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_cat' )); ?>"><?php esc_html_e( 'Display post category?', 'medixare-core' ); ?></label></p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'select_style' )); ?>"><?php esc_html_e( 'Select Box Style : ', 'medixare-core' ); ?></label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'select_style' )); ?>">
					<option <?php if ( $select_style == 'box-style-1' ) {  echo 'selected'; } ?> value="box-style-1"><?php esc_html_e( 'Style 1' , 'medixare-core' ); ?></option>
					<option <?php if ( $select_style == 'box-style-2' ) {  echo 'selected'; } ?> value="box-style-2"><?php esc_html_e( 'Style 2' , 'medixare-core' ); ?></option>
					<option <?php if ( $select_style == 'box-style-3' ) {  echo 'selected'; } ?> value="box-style-3"><?php esc_html_e( 'Style 3' , 'medixare-core' ); ?></option>
					<option <?php if ( $select_style == 'box-style-4' ) {  echo 'selected'; } ?> value="box-style-4"><?php esc_html_e( 'Style 4' , 'medixare-core' ); ?></option>
				</select>
			</p>
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