<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */
namespace addonmonster\Medixare_Core;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

?>
<div class="amt-section-title <?php echo esc_attr( $data['style'] ); ?>">
	<?php if( !empty ( $data['title'] ) ) { ?>
	<div class="entry-sub-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.5s" data-wow-duration="1s"><?php echo wp_kses_post( $data['sub_title'] ); ?>
	</div>
	<h2 class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="0.8s" data-wow-duration="1s"><?php echo wp_kses_post( $data['title'] ); ?>
	</h2>
	<p class="entry-text <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.1s" data-wow-duration="1s"><?php echo wp_kses_post( $data['text'] ); ?>
	</p>
	<?php } ?>
</div> 