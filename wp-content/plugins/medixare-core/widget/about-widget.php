<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

class MedixareTheme_About_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
            'medixare_about_author', // Base ID
            esc_html__( 'Medixare : About Author', 'medixare-core' ), // Name
            array( 'description' => esc_html__( 'About Author Widget', 'medixare-core' ) ) // Args
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

		$img   = wp_get_attachment_image( $instance['ab_image'], 'medixare-size5' );

		?>
		
		<div class="author-widget" style="background-image: url(<?php echo wp_get_attachment_image_url($instance['bg_image'],'full') ; ?>)">
			<?php	
			if( !empty( $instance['ab_image'] ) ) {
				?><span><?php echo wp_kses( $img, 'alltext_allow' ); ?></span><?php
			}?>
			<div class="content-box">
				<?php
				if( !empty( $instance['subtitle'] ) ) {
					?><h3><?php echo esc_html( $instance['subtitle'] ); ?></a></h3><?php
				}
				if( !empty( $instance['text'] ) ){
					?><p><?php echo esc_html( $instance['text'] ); ?></p><?php
				}
				if( !empty( $instance['buttontext'] ) ) {
					?><a class="button-style-1" href="<?php echo esc_url( $instance['buttonurl'] ); ?>"><?php echo esc_html( $instance['buttontext'] ); ?></a><?php
				}
				if( !empty( $instance['facebook'] || $instance['twitter'] || $instance['linkedin'] || $instance['pinterest'] || $instance['skype'] || $instance['youtube'] || $instance['instagram'] || $instance['behance'] || $instance['dribbble'] ) ) {
				?>
				<div class="author-social">
					<?php
					if( !empty( $instance['facebook'] ) ){
						?><a href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a><?php
					}
					if( !empty( $instance['twitter'] ) ){
						?><a href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php
					}
					if( !empty( $instance['linkedin'] ) ){
						?><a href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a><?php
					}
					if( !empty( $instance['pinterest'] ) ){
						?><a href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a><?php
					}
					if( !empty( $instance['skype'] ) ){
						?><a href="<?php echo esc_url( $instance['skype'] ); ?>" target="_blank"><i class="fab fa-skype"></i></a><?php
					}
					if( !empty( $instance['youtube'] ) ){
						?><a href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><i class="fab fa-youtube"></i></a><?php
					}
					if( !empty( $instance['instagram'] ) ){
						?><a href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a><?php
					}
					if( !empty( $instance['behance'] ) ){
						?><a href="<?php echo esc_url( $instance['behance'] ); ?>" target="_blank"><i class="fab fa-behance"></i></a><?php
					}
					if( !empty( $instance['dribbble'] ) ){
						?><a href="<?php echo esc_url( $instance['dribbble'] ); ?>" target="_blank"><i class="fab fa-dribbble"></i></a><?php
					}
					?>
				</div>
			<?php } ?>
			</div>
		</div>
		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	public function update( $new_instance, $old_instance ){
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['ab_image']  = ( ! empty( $new_instance['ab_image'] ) ) ? sanitize_text_field( $new_instance['ab_image'] ) : '';
		$instance['bg_image']  = ( ! empty( $new_instance['bg_image'] ) ) ? sanitize_text_field( $new_instance['bg_image'] ) : '';
		$instance['subtitle']  = ( ! empty( $new_instance['subtitle'] ) ) ? wp_kses_post( $new_instance['subtitle'] ) : '';
		$instance['text']      = ( ! empty( $new_instance['text'] ) ) ? wp_kses_post( $new_instance['text'] ) : '';
		$instance['buttontext']     = ( ! empty( $new_instance['buttontext'] ) ) ? sanitize_text_field( $new_instance['buttontext'] ) : '';
		$instance['buttonurl']     = ( ! empty( $new_instance['buttonurl'] ) ) ? sanitize_text_field( $new_instance['buttonurl'] ) : '';
		$instance['facebook']      = ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']       = ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']      = ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']     = ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['skype']       = ( ! empty( $new_instance['skype'] ) ) ? sanitize_text_field( $new_instance['skype'] ) : '';
		$instance['youtube']      = ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['instagram']     = ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['behance']       = ( ! empty( $new_instance['behance'] ) ) ? sanitize_text_field( $new_instance['behance'] ) : '';
		$instance['dribbble']      = ( ! empty( $new_instance['dribbble'] ) ) ? sanitize_text_field( $new_instance['dribbble'] ) : '';

		return $instance;
	}

	public function form( $instance ){
		$defaults = array(
			'title'   		=> esc_html__( 'About Author' , 'medixare-core' ),
			'subtitle'		=> '',
			'text'			=> '',
			'ab_image'    	=> '',
			'bg_image'    	=> '',
			'buttontext'   => '',
			'buttonurl'   	=> '',
			'facebook'    => '',
			'twitter'     => '',
			'skype'       => '',
			'youtube'     => '',
			'linkedin'    => '',
			'pinterest'   => '',
			'instagram'   => '',
			'behance'     => '',
			'dribbble'    => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults );

		$fields = array(
			'title'     => array(
				'label' => esc_html__( 'Title', 'medixare-core' ),
				'type'  => 'text',
			),
			'ab_image'    => array(
				'label'   => esc_html__( 'Author', 'medixare-core' ),
				'type'    => 'image',
			),
			'bg_image'    => array(
				'label'   => esc_html__( 'background image', 'medixare-core' ),
				'type'    => 'image',
			),
			'subtitle' => array(
				'label'   => esc_html__( 'Sub Title', 'medixare-core' ),
				'type'    => 'text',
			),
			'text' => array(
				'label'   => esc_html__( 'Text', 'medixare-core' ),
				'type'    => 'text',
			),
			'buttontext'     => array(
				'label' => esc_html__( 'Button Text', 'medixare-core' ),
				'type'  => 'text',
			),
			'buttonurl'     => array(
				'label' => esc_html__( 'Button URL', 'medixare-core' ),
				'type'  => 'text',
			), 
			'facebook'     => array(
				'label'    => esc_html__( 'Facebook URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'twitter'      => array(
				'label'    => esc_html__( 'Twitter URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'linkedin'     => array(
				'label'    => esc_html__( 'LinkedIn URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'pinterest'    => array(
				'label'    => esc_html__( 'Pinterest URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'skype'        => array(
				'label'    => esc_html__( 'Skype URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'youtube'      => array(
				'label'    => esc_html__( 'Youtube URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'instagram'    => array(
				'label'    => esc_html__( 'Instagram URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'behance'      => array(
				'label'    => esc_html__( 'Behance Plus URL', 'medixare-core' ),
				'type'     => 'url',
			),
			'dribbble'     => array(
				'label'    => esc_html__( 'Dribbble Plus URL', 'medixare-core' ),
				'type'     => 'url',
			),
		);

		AMT_Widget_Fields::display( $fields, $instance, $this );
	}
}