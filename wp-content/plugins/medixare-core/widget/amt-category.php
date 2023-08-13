<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
class MedixareTheme_Category_Widget extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'rt-category',
			'description' => esc_html__( 'Medixare Category Widget' , 'medixare-core' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'rt-categories', __( 'Medixare: Categories' ), $widget_ops );
	}
	public function widget( $args, $instance ) {
		static $first_dropdown = true;

		$default_title = __( '' );
		$title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$count        = ! empty( $instance['count'] ) ? '1' : '0';
		$limit        = ! empty( $instance['limit'] ) ? $instance['limit'] : 6;
		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		 
		$thumb_size = 'medixare-size3';
		$amt_args = array (
		    'taxonomy' => 'category',  
		    'hide_empty' => true,  
		    'include' => 'all',  
		    'fields' => 'all', 
		);

		$select_style = ( !empty( $instance['select_style'] ) ) ? $instance['select_style'] : 'box-style-1';
		$terms = get_terms($amt_args );

		?>

		<?php if ( $select_style == 'box-style-1' ) { ?>
		<div class="rt-category-widget <?php echo esc_attr( $select_style ); ?>">
			<?php 
			$i = 0;
			foreach( $terms as $term ) { 
				if( $limit && $i == $limit ) {
					break;
				}
				?>
				<div class="rt-item space">
					<a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
					<?php 
					$get_image  = get_term_meta( $term->term_id , 'rt_category_image', 'true' ); 
					if ( $get_image ) {	
						echo wp_get_attachment_image( $get_image, $thumb_size );
					}else {
						echo '<img class="wp-post-image" src="'.MEDIXARE_ASSETS_URL.'element/noimage_540X400.jpg" alt="'.get_the_title().'">';
					}
					?>
					<div class="rt-content">
			            <h4 class="rt-cat-name">
			                <?php echo esc_html( $term->name ); ?>
			            </h4>
			            <?php if( $count == 1 ) { ?>
			            <p class="rt-cat-count"><?php echo esc_html( $term->count ); ?></p>
			        	<?php } ?>
			        </div>
			    </a>
			    </div>
			<?php $i++; } ?>
		</div>
		<?php } else if ( $select_style == 'box-style-2' ) { ?>
		<div class="rt-category-widget <?php echo esc_attr( $select_style ); ?>">
			<?php 
			$i = 0;
			foreach( $terms as $term ) { 
				if( $limit && $i == $limit ) {
					break;
				}
				?>
				<div class="rt-item space">
					<a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
		            <span class="rt-cat-name">
		                <?php echo esc_html( $term->name ); ?>
		            </span>
		            <?php if( $count == 1 ) { ?>
		            <span class="rt-cat-count"><?php echo esc_html( $term->count ); ?></span>
		        	<?php } ?>
				    </a>
			    </div>
			<?php $i++; } ?>
		</div>
		<?php } else if ( $select_style == 'box-style-3' ) { ?>
		<div class="rt-category-widget <?php echo esc_attr( $select_style ); ?>">
			<?php 
			$i = 0;
			foreach( $terms as $term ) { 
				if( $limit && $i == $limit ) {
					break;
				}
				?>
				<div class="rt-item space">
					<a href="<?php echo esc_url( get_category_link( $term->term_id ) ); ?>">
		            <span class="rt-cat-name">
		                <?php echo esc_html( $term->name ); ?>
		            </span>
		            <?php if( $count == 1 ) { ?>
		            <span class="rt-cat-count">(<?php echo esc_html( $term->count ); ?>)</span>
		        	<?php } ?>
				    </a>
			    </div>
			<?php $i++; } ?>
		</div>
		<?php } ?>

		<?php
		
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['limit']        = absint( $new_instance['limit'] );
		$instance['count']        = ! empty( $new_instance['count'] ) ? 1 : 0;
		$instance['select_style'] = isset( $new_instance['select_style'] ) ? $new_instance['select_style'] : 'box-style-1';

		return $instance;
	}

	public function form( $instance ) {
		// Defaults.
		$instance     = wp_parse_args( (array) $instance, array( 
			'title' => '', 
			'limit' => '',
			'count' => ''
		) );
		$select_style = ( !empty( $instance['select_style'] ) ) ? $instance['select_style'] : 'box-style-1';
		$count = isset( $instance['count'] ) ? (bool) $instance['count'] : false;
		?>		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>" />
		</p>

		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>"<?php checked( $count ); ?> />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'select_style' )); ?>"><?php esc_html_e( 'Select Layout Style : ', 'medixare-core' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'select_style' )); ?>">
				<option <?php if ( $select_style == 'box-style-1' ) {  echo 'selected'; } ?> value="box-style-1"><?php esc_html_e( 'Style 1' , 'medixare-core' ); ?></option>
				<option <?php if ( $select_style == 'box-style-2' ) {  echo 'selected'; } ?> value="box-style-2"><?php esc_html_e( 'Style 2' , 'medixare-core' ); ?></option>
				<option <?php if ( $select_style == 'box-style-3' ) {  echo 'selected'; } ?> value="box-style-3"><?php esc_html_e( 'Style 3' , 'medixare-core' ); ?></option>
			</select>
		</p>
		<?php
	}

}
