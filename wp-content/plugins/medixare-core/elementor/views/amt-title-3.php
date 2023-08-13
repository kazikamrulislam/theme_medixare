<?php

/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Gamxo_Core;

use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

extract($data);

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

?>

<style>
	.amt-section-title-3{
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.hero-btn-wrapper3{
		text-align: right;
	}
	@media (max-width: 767.98px){
        .mobile-alignment{
            text-align: center;
        }
	}	
	
</style>
<div class="amt-section-title-holder">
	<div class="row amt-section__title_wrapper amt-section-title-3">
		<div class="col-md-8 mobile-alignment">
			<h1 class="amt-section__title"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
		</div>
		<div class="col-md-4 mobile-alignment hero-btn-wrapper hero-btn-wrapper3 <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
			<?php if ($data['button_display'] == 'yes') { ?>
				<a <?php $this->print_render_attribute_string($btn_key); ?> class="amt-secondary-btn"><?php echo $data['amt-button']; ?></a>
			<?php } ?>
		</div>
	</div>
</div>