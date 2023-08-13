<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use MedixareTheme_Helper;
use Elementor\Group_Control_Image_Size;

// image
$getimg = Group_Control_Image_Size::get_attachment_image_html($data, 'icon_image_size', 'video_image');
?>
<div class="amt-video-layout motion-effects">
	<div class="amt-video">
		<div class="amt-img">
			<?php if (!empty($data['video_image']['id'])) {
				Group_Control_Image_Size::print_attachment_image_html($data, 'video_image');
			} else {
				echo '<img class="wp-post-image" src="' . MedixareTheme_Helper::get_asset_file('element/about-video-bg.jpg') . '" alt="' . get_the_title() . '">';
			} ?>
		</div>
		<div class="amt-icon">
			<a class="amt-play amt-video-popup" href="<?php echo esc_url($data['videourl']['url']); ?>"><i class="fas fa-play"></i></a>
		</div>
	</div>
</div>
</div>