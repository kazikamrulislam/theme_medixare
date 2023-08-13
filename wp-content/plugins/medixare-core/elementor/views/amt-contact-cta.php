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

<div class="amt_cta__section">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="amt_section__title_wrapper">
					<?php if ($data['title_display'] == 'yes') { ?>
						<h3 class="amt_section__title"><?php echo wp_kses_post($data['amt_cta_title']); ?></h3>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="row amt_cta_btn_row">
			<?php if ($data['cta_btn_1'] == 'yes') { ?>
				<div class="col-lg-4 col-md-4 text-center">
					<div class="amt_cta__btn-wrapper">
						<a href="<?php echo wp_kses_post($data['button_url_1']['url']); ?>" class="cta-white-btn"><?php echo wp_kses_post($data['cta_btn_feedback']); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if ($data['cta_btn_2'] == 'yes') { ?>
				<div class="col-lg-4 col-md-4 text-center">
					<div class="amt_cta__btn-wrapper">
						<a href="<?php echo wp_kses_post($data['button_url_2']['url']); ?>" class="cta-white-btn"><?php echo wp_kses_post($data['cta_btn_contact']); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if ($data['cta_btn_3'] == 'yes') { ?>
				<div class="col-lg-4 col-md-4 text-center">
					<div class="amt_cta__btn-wrapper">
						<a href="<?php echo wp_kses_post($data['button_url_3']['url']); ?>" class="cta-white-btn"><?php echo wp_kses_post($data['cta_btn_career']); ?></a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>