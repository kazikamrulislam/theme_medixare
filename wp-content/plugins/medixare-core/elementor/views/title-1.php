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
$this->add_link_attributes($btn_key, $data['mx-button']);

?>

<style>
	.amt-section-title-holder .tp-section__subtitle {
    color: var(--tp-text-1);
    font-size: 16px;
    line-height: 30px;
    font-weight: 600;
    display: inline-block;
	}
	.amt-section-title-holder .tp-section__subtitle.has-circle-border:before {
		content: "";
		width: 12.1px;
		height: 12px;
		background: var(--tp-theme-primary);
		display: inline-block;
		border-radius: 50%;
		margin-right: 10px;
	}
	.amt-section-title-holder .tp-section__title {
		font-size: 48px;
		font-weight: 700;
		letter-spacing: -1px;
		line-height: 1.2;
	}
	.amt-section-title-holder .tp-section__title span {
		font-weight: 300;
	}
	.amt-section-title-holder .tp-secondary-btn {
		display: inline-block;
		font-size: 14px;
		font-weight: 700;
		color: var(--tp-common-white);
		background: var(--tp-theme-primary);
		height: 60px;
		line-height: 60px;
		text-align: center;
		padding: 0 38px;
		text-transform: uppercase;
		border-radius: 5px;
		position: relative;
		letter-spacing: 1.4px;
	}
	.amt-section-title-holder .tp-secondary-btn:hover {
		color: var(--tp-common-white);
		background-color: var(--tp-theme-secondary);
	}
	.amt-section-title-holder .tp-section__title_wrapper p {
		color: var(--tp-text-1);
		font-size: 18px;
		line-height: 30px;
		margin-bottom: 40px;
	}
</style>

<div class="amt-section-title-holder">
	<div class=".tp-section__title_wrapper">
		<?php if ( $data['subtitle_display'] == 'yes' ) { ?>
			<span class="tp-section__subtitle has-circle-border mb-15"><?php echo wp_kses_post($data['sub_title']); ?></span>
		<?php } ?>

		<?php if ( $data['title_display'] == 'yes' ) { ?>	
			<h1 class="tp-section__title"><?php echo wp_kses_post($data['title-1']); ?><span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
		<?php } ?>	

		<?php if ( $data['content_display'] == 'yes' ) { ?>	
			<p><?php echo wp_kses_post($data['text']); ?></p>
		<?php } ?>

		<div class="hero-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
			<?php if ( $data['button_display'] == 'yes' ) { ?>
				<a <?php $this->print_render_attribute_string($btn_key); ?> class="tp-secondary-btn"><?php echo $data['mx-button']; ?></a>
			<?php } ?>

		</div>
	</div>
</div>