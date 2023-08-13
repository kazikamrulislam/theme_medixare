<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

?>
<div class="rt-button <?php echo esc_attr( $data['animation'] );?> <?php echo esc_attr( $data['animation_effect'] );?>" data-wow-delay="<?php echo esc_attr( $data['delay'] );?>s" data-wow-duration="<?php echo esc_attr( $data['duration'] );?>s">
	<?php if( !empty( $data['buttontext'] ) ) { ?>
		<a class="button-style-1" href="<?php echo esc_url( $data['buttonurl']['url'] );?>"><?php echo esc_html( $data['buttontext'] );?><i class="fas fa-arrow-right"></i></a>
	<?php } ?>
</div>