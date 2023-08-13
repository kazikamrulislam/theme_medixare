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
$this->add_link_attributes($btn_key, $data['event_link_url']);

?>

<div class="row">
	<div class="col-12">
		<div class="amt-event__shadow">
			<div class="amt-event__item amt-green-color mb-20 z-index-11 p-relative">
				<div class="row align-items-center">
					<div class="col-lg-9">
						<div class="row amt-event__content d-flex flex-wrap align-items-center">
							<div class="col-md-3 amt-event__date">
								<div class="event_date_box">
									<div class="event_date"><?php echo wp_kses_post($data['event_date']); ?></div>
									<div class="event_month"><?php echo wp_kses_post($data['select_month']); ?></div>
								</div>
							</div>
							<div class="col-md-9 amt-event__title-wrapper">
								<h3 class="amt-event__title"><?php echo wp_kses_post($data['title-part-1']); ?> <span><?php echo wp_kses_post($data['title-part-2']); ?></span></h3>
								<?php if ($data['event_excerpt_display'] == 'yes') { ?>
									<p><?php echo wp_kses_post($data['event_excerpt']); ?></p>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<?php if ($data['button_display'] == 'yes') { ?>
							<div class="amr_event_bitton">
								<div class="amt-evnet-btn-wrapper mr-40 <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
									<a <?php $this->print_render_attribute_string($btn_key); ?> class="amt-border-btn"><?php echo wp_kses_post($data['amt-event-button']); ?></a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>