<?php

/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

namespace addonmonster\Medixare_Core;

use Elementor\Group_Control_Image_Size;
use MedixareTheme;
use MedixareTheme_Helper;
use \WP_Query;
use Elementor\Icons_Manager;

$btn_key = 'btn_link';
$this->add_link_attributes($btn_key, $data['link_url']);

?>

<style>
    .amt-hero__section {
        background-image: url("<?php echo MedixareTheme_Helper::get_asset_file('element/header-bg-1.jpg'); ?>");
    }
    .amt-hero__section::after {
        background-image: linear-gradient(90.1deg, <?php echo wp_kses_post($data['overlay-1']); ?>, #241f1b82 51.74%, <?php echo wp_kses_post($data['overlay-2']); ?>);
    }
</style>

<div class="amt-hero__section tp-hero__overlay p-relative z-index-11">
    <div class="container">
        <div class="tp-hero__content-wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-8">
                    <div class="tp-hero-title-wrapper">
                        <?php if ($data['subtitle_display'] == 'yes') { ?>
                            <span class="tp-section__subtitle has-circle-border mb-15"><?php echo wp_kses_post($data['sub_title']); ?></span>
                        <?php } ?>
                        <h1 class="tp-hero__title"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h1>
                        <?php if ($data['content_display'] == 'yes') { ?>
                            <p><?php echo wp_kses_post($data['text']); ?></p>
                        <?php } ?>
                        <div class="hero-btn-wrapper <?php echo esc_attr($data['animation']); ?> <?php echo esc_attr($data['animation_effect']); ?>" data-wow-delay="<?php echo esc_attr($data['animation_delay']); ?>s" data-wow-duration="<?php echo esc_attr($data['ani_duration']); ?>s">
                            <?php if ($data['button_display'] == 'yes') { ?>
                                <a <?php $this->print_render_attribute_string($btn_key); ?> class="tp-secondary-btn"><?php echo $data['amt-button']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($data['contact_info_display'] == 'yes') { ?>
                <div class="tp-hero__contact-info theme-bg">
                    <div class="tp-hero__contact-wrapper d-flex align-items-center">
                        <div class="tp-hero__contact-title-wrapper">
                            <h3 class="tp-hero__contact-title">
                                <span>
                                    <i class="<?php echo esc_attr($data['bottom-icon']['value']); ?>" aria-hidden="true"></i>
                                </span>
                                <?php echo wp_kses_post($data['contact-title']); ?>
                            </h3>
                        </div>
                        <div class="tp-hero__contact-action">
                            <a href="tel:<?php echo wp_kses_post($data['phone']); ?>">Call: <?php echo wp_kses_post($data['phone']); ?></a>
                            <a href="mailto:<?php echo wp_kses_post($data['email']); ?>">Email: <?php echo wp_kses_post($data['email']); ?></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>