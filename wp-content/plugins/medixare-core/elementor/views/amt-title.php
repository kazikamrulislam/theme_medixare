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

<div class="amt-section-title-holder">
	<div class="amt-section__title_wrapper common-text-align">
		<?php if ($data['subtitle_display'] == 'yes') { ?>
			<span class="amt-section__subtitle has-circle-border mb-15"><?php echo wp_kses_post($data['sub_title']); ?></span>
		<?php } ?>
			<h1 class="amt-section__title"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
		<?php if ($data['content_display'] == 'yes') { ?>
			<p><?php echo wp_kses_post($data['text']); ?></p>
		<?php } ?>
		<div class="hero-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
			<?php if ($data['button_display'] == 'yes') { ?>
				<a <?php $this->print_render_attribute_string($btn_key); ?> class="amt-secondary-btn"><?php echo $data['amt-button']; ?></a>
			<?php } ?>
		</div>
	</div>
</div>