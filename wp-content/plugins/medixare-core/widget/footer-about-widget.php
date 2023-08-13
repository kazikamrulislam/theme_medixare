<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

class MedixareTheme_Footer_About_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'medixare_footer_about_author', // Base ID
            esc_html__( 'Medixare : About (For Footer)', 'medixare-core' ), // Name
            array( 'description' => esc_html__( 'Footer About Widget', 'medixare-core' ) ) // Args
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

		$img   = wp_get_attachment_image( $instance['logo_image'], 'full' );

		?>
		
		<div class="footer-about">
			<div class="logo-box">
			<?php  
				if( !empty( $instance['logo_image'] ) ) {
					?><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo wp_kses( $img, 'alltext_allow', 'allow_link' ); ?></a><?php
				}
			?>
			</div>			
			<div class="content-box">
				<?php
				if( !empty( $instance['description'] ) ){
					?><p><?php echo esc_html( $instance['description'] ); ?></p><?php
				}
				?>
			</div>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['logo_image']  = ( ! empty( $new_instance['logo_image'] ) ) ? sanitize_text_field( $new_instance['logo_image'] ) : '';
		$instance['description']      = ( ! empty( $new_instance['description'] ) ) ? wp_kses_post( $new_instance['description'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> '',
			'logo_image'    => '',
			'description'	=> ''
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'medixare-core' ),
				'type'  => 'text',
			),
			'logo_image'    => array(
				'label'   => esc_html__( 'Logo', 'medixare-core' ),
				'type'    => 'image',
			),
			'description' => array(
				'label'   => esc_html__( 'Description', 'medixare-core' ),
				'type'    => 'textarea',
			),
		);

		AMT_Widget_Fields::display( $fields, $instance, $this );
	}
}