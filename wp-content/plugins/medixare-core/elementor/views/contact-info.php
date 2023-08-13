<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
use MedixareTheme_Helper;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

// icon , image

$getimg = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'icon_image' );

$final_icon_class       = " fas fa-map-marker-alt";
$final_icon_image_url   = '';
if ( is_string( $icon_class['value'] ) && $dynamic_icon_class =  $icon_class['value']  ) {
  $final_icon_class     = $dynamic_icon_class;
}
if ( is_array( $icon_class['value'] ) ) {
  $final_icon_image_url = $icon_class['value']['url'];
}

?>
<div class="amt-contact-info">
	<div class="amt-item item-<?php echo esc_attr( $data['icontype'] );?>">
		<?php if ( !empty( $data['icontype']== 'image' ) ) { ?>		            
			<span class="amt-img"><?php echo wp_kses_post($getimg);?></span>
		<?php }else{?> 	
		<?php if ( $final_icon_image_url ): ?>
			<span class="amt-icon"><img src="<?php echo esc_url( $final_icon_image_url ); ?>" alt="SVG Icon"></span>
		<?php else: ?>
			<span class="amt-icon"><i class="<?php  echo esc_attr( $final_icon_class ); ?>"></i></span>
		<?php endif ?>
		<?php }  ?>	

		<div class="amt-content">
		<?php if ( !empty( $data['address'] ) ) { ?>
			<p class="entry-text"><?php echo wp_kses_post( $data['address'] );?></p>
		<?php } ?>
		</div>
	</div>
</div>