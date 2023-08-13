<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;
use MedixareTheme_Helper;

$medixare_socials = MedixareTheme_Helper::socials();

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
extract($data);

$attr = '';
if ( !empty( $data['url']['url'] ) ) {
	$attr  = 'href="' . $data['url']['url'] . '"';
	$attr .= !empty( $data['url']['is_external'] ) ? ' target="_blank"' : '';
	$attr .= !empty( $data['url']['nofollow'] ) ? ' rel="nofollow"' : '';
	
}
if ( $attr ) {
  $amt_logo = '<a ' . $attr . '>' .Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size' , 'amt_logo' ) . '</a>';
}
else {
	$amt_logo = Group_Control_Image_Size::get_attachment_image_html( $data, 'icon_image_size', 'amt_logo' );
}

?>

<div class="amt-image-default amt-image-style1">
	<div class="amt-image">
		<?php echo wp_kses_post($amt_logo);?>
	</div>
	<div class="entry-content">
		<h3 class="entry-title title-size-xl"><?php echo esc_html( $data['amt_title'] );?></h3>
		<p class="entry-text"><?php echo esc_html( $data['amt_text'] );?></p>
		<?php if ( $data['social_display'] == 'yes' ) { ?>
			<ul class="author-social">
				<?php foreach ( $medixare_socials as $medixare_social ): ?>
					<li><a target="_blank" href="<?php echo esc_url( $medixare_social['url'] );?>"><i class="fab <?php echo esc_attr( $medixare_social['icon'] );?>"></i></a></li>
				<?php endforeach; ?>
			</ul>
		<?php } ?>
	</div>
</div>		
