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
	<h2 class="entry-title <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="1.2s" data-wow-duration="1s"><?php echo wp_kses_post( $data['title'] ); ?>
	</h2>
	<?php } ?>
</div> 