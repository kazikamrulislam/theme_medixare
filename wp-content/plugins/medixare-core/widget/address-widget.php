<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

class MedixareTheme_Address_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'medixare_address', // Base ID
            esc_html__( 'Medixare : Address (for footer)', 'medixare-core' ), // Name
            array( 'description' => esc_html__( 'Address Widget', 'medixare-core' ) ) // Args
            );
	}

	public function widget( $args, $instance ){
		echo wp_kses_post( $args['before_widget'] );
		if ( !empty( $instance['title'] ) ) {
			$html = apply_filters( 'widget_title', $instance['title'] );
			echo $html = $args['before_title'] . $html .$args['after_title'];
		}
		else {
			$html = '';
		}
		?>
		<p class="rtin-des"><?php if( !empty( $instance['description'] ) ) echo wp_kses_post( $instance['description'] ); ?></p>
		<ul class="corporate-address">
			<?php			 
			if( !empty( $instance['phone'] ) ){
				?><li><span><?php esc_html_e( 'Phone:' , 'medixare-core' ) ?></span> <a href="tel:<?php echo esc_attr( $instance['phone'] ); ?>"><?php echo esc_html( $instance['phone'] ); ?></a></li><?php
			}   
			if( !empty( $instance['email'] ) ){
				?><li><span><?php esc_html_e( 'Email:' , 'medixare-core' ) ?></span> <a href="mailto:<?php echo esc_attr( $instance['email'] ); ?>"><?php echo esc_html( $instance['email'] ); ?></a></li><?php
			} 
			if( !empty( $instance['fax'] ) ){
				?><li><span><?php esc_html_e( 'Fax:' , 'medixare-core' ) ?></span> <?php echo esc_html( $instance['fax'] ); ?></li><?php
			} 
			if( !empty( $instance['address'] ) ){
				?><li><span><?php esc_html_e( 'Office Address:' , 'medixare-core' ) ?></span> <?php echo esc_html( $instance['address'] ); ?></li><?php
			}    
			?>
		</ul>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description']   = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';
		$instance['address']   = ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';
		$instance['phone']     = ( ! empty( $new_instance['phone'] ) ) ? sanitize_text_field( $new_instance['phone'] ) : '';
		$instance['email']     = ( ! empty( $new_instance['email'] ) ) ? sanitize_email( $new_instance['email'] ) : '';
		$instance['fax']       = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';
		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'Corporate Office' , 'medixare-core' ),
			'description'	=> '',
			'address'		=> '',
			'phone'   		=> '',
			'email'   		=> '',
			'fax'     		=> ''  
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'medixare-core' ),
				'type'  => 'text',
			),
			'description' => array(
				'label'   => esc_html__( 'Description', 'medixare-core' ),
				'type'    => 'textarea',
			),
			'address'   => array(
				'label' => esc_html__( 'Address', 'medixare-core' ),
				'type'  => 'text',
			),      
			'phone'     => array(
				'label' => esc_html__( 'Phone Number', 'medixare-core' ),
				'type'  => 'text',
			),      
			'email'     => array(
				'label' => esc_html__( 'Email', 'medixare-core' ),
				'type'  => 'text',
			),      
			'fax'       => array(
				'label' => esc_html__( 'Fax', 'medixare-core' ),
				'type'  => 'text',
			),
		);

		AMT_Widget_Fields::display( $fields, $instance, $this );
	}
}