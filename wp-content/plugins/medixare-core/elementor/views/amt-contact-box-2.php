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

$address_key = 'address_link';
$this->add_link_attributes($address_key, $data['address_url']);

?>

<div class="amt-contact__section_2 theme-bg p-relative pb-120">
    <div class="tp-box__shadow">
        <div class="tp-contact__from-wrapper white-bg pt-80 pb-80 p-relative z-index-11">
            <div class="row align-items-center amt-column-rev">
                <div class="col-lg-12">
                    <div class="tp-contact__info-wrapper">
                        <div class="tp-section__title_wrapper">
                            <h3 class="tp-section__title amt-section__title"><?php echo wp_kses_post($data['title-1']); ?> <span><?php echo wp_kses_post($data['title-2']); ?></span> <?php echo wp_kses_post($data['title-3']); ?></h3>
                        </div>
                        <div class="tp-contact__info">
                            <div class="tp-contact__info-box-2 d-flex">
                                <div class="tp-contact__info-icon tp-contact__info-icon-color-1">
                                    <span><i class="<?php echo esc_attr($data['email-icon']['value']); ?>" aria-hidden="true"></i></span>
                                </div>
                                <div class="tp-contact__info-title-wrapper mb-30">
                                    <?php if ($data['title_display'] == 'yes') { ?>
                                        <h4 class="tp-contact__info-title">
                                            <?php echo wp_kses_post($data['email-title']); ?>
                                        </h4>
                                    <?php } ?>
                                    <span>
                                        <?php if (!empty($data['email-1'])) { ?>
                                            <a href="mailto:<?php echo wp_kses_post($data['email-1']); ?>"><?php echo wp_kses_post($data['email-1']); ?></a>
                                        <?php } ?>
                                        <?php if (!empty($data['email-2'])) { ?>
                                            <a href="mailto:<?php echo wp_kses_post($data['email-2']); ?>"><?php echo wp_kses_post($data['email-2']); ?></a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="tp-contact__info">
                            <div class="tp-contact__info-box-2 d-flex">
                                <div class="tp-contact__info-icon tp-contact__info-icon-color-2">
                                    <span><i class="<?php echo esc_attr($data['phone-icon']['value']); ?>" aria-hidden="true"></i></span>
                                </div>
                                <div class="tp-contact__info-title-wrapper mb-30">
                                    <?php if ($data['title_display'] == 'yes') { ?>
                                        <h4 class="tp-contact__info-title">
                                            <?php echo wp_kses_post($data['number-title']); ?>
                                        </h4>
                                    <?php } ?>
                                    <span>
                                        <?php if (!empty($data['phone-1'])) { ?>
                                            <a href="callto:<?php echo wp_kses_post($data['phone-1']); ?>"><?php echo wp_kses_post($data['phone-1']); ?></a>
                                        <?php } ?>
                                        <?php if (!empty($data['phone-2'])) { ?>
                                            <a href="callto:<?php echo wp_kses_post($data['phone-2']); ?>"><?php echo wp_kses_post($data['phone-2']); ?></a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="tp-contact__info">
                            <div class="tp-contact__info-box-2 d-flex">
                                <div class="tp-contact__info-icon tp-contact__info-icon-color-3">
                                    <span><i class="<?php echo esc_attr($data['address-icon']['value']); ?>" aria-hidden="true"></i></span>
                                </div>
                                <div class="tp-contact__info-title-wrapper mb-30">
                                    <?php if ($data['title_display'] == 'yes') { ?>
                                        <h4 class="tp-contact__info-title">
                                            <?php echo wp_kses_post($data['address-title']); ?>
                                        </h4>
                                    <?php } ?>
                                    <span>
                                        <?php if (!empty($data['address'])) { ?>
                                            <a <?php $this->print_render_attribute_string($address_key); ?>><?php echo wp_kses_post($data['address']); ?></a>
                                        <?php } ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>